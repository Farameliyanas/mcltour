<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Reservasi;
use App\Models\User;
use App\Models\Wisata;
use App\Models\Transaction;
use Midtrans\Notification;
use Illuminate\Support\Facades\Http;

class BookingController extends Controller
{

    public function index()
    {

        // Mengambil semua data wisata
        $wisataData = Wisata::all();
        // $transactions = Transaction::orderBy('transaction_time', 'desc')->get();

        return view('frontend.booking', compact('wisataData'));
     }

    public function submitBooking(Request $request)
    {
        // Validasi data input
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'no_telepon' => 'required|string|max:50',
            'from_datetime' => 'required|date',
            'nama_wisata' => 'required|string',
            'pax' => 'required|integer',
            'special_request' => 'nullable|string',
        ]);

        // Dapatkan wisata_id berdasarkan nama_wisata
        $wisata_idwisata = $this->getPackageIdByDestination($request->nama_wisata);

        // Periksa jika wisata_id tidak ditemukan
        if (!$wisata_idwisata) {
            return redirect()->back()->withInput()->withErrors(['nama_wisata' => 'Nama paket wisata tidak valid.']);
        }

        // Simpan data ke dalam tabel reservasi
        $reservasi = Reservasi::create([
            'name' => $request->name,
            'nama_paket' => $request->nama_wisata,
            'paket_wisata_id' => $wisata_idwisata,
            'jml_pax' => $request->pax,
            'no_telp' => $request->no_telepon,
            'tanggal_reservasi' => $request->from_datetime,
            'total_bayar' => $request->total_bayar,
            'spesial_request' => $request->special_request,
            'created_by' => Auth::user()->email,
            'status_bayar' => 0,
        ]);

        // Redirect ke halaman transaksi dengan menyertakan ID reservasi
        return redirect()->route('transaksi', ['id' => $reservasi->id])->with('success', 'Reservasi berhasil disimpan.');
    }

    private function getPackageIdByDestination($nama_wisata)
    {
        $wisata = Wisata::where('nama_wisata', $nama_wisata)->first();

        if ($wisata) {
            return $wisata->idwisata;
        }

        return null;
    }

    public function show($id)
    {
        $reservasi = Reservasi::findOrFail($id);

        // Konfigurasi Midtrans
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        \Midtrans\Config::$isProduction = false;
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;

        // Menyiapkan parameter transaksi
        $params = [
            'transaction_details' => [
                'order_id' => $reservasi->id,
                'gross_amount' => $reservasi->total_bayar,
            ],
            'customer_details' => [
                'first_name' => $reservasi->name,
                'email' => Auth::user()->email,
                'phone' => $reservasi->no_telp,
            ],
        ];

        $snapToken = \Midtrans\Snap::getSnapToken($params);

        return view('frontend.transaksi', compact('snapToken', 'reservasi'));
    }

    public function handleNotification(Request $request)
    {
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        \Midtrans\Config::$isProduction = false;
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;

        $orderId = $request->input('order_id');
        $transactionStatus = $request->input('transaction_status');

        // Temukan reservasi
        $reservasi = Reservasi::find($orderId);

        if (!$reservasi) {
            return response()->json(['status' => 'error', 'message' => 'Reservasi tidak ditemukan'], 404);
        }

        // Periksa status transaksi
        $transactionData = $this->checkTransactionStatus($orderId);

        if (!$transactionData) {
            return response()->json(['status' => 'error', 'message' => 'Gagal mengambil status transaksi dari Midtrans'], 500);
        }

        $transactionStatus = $transactionData['transaction_status'];

        // Perbarui status pembayaran reservasi
        if ($transactionStatus == 'capture' || $transactionStatus == 'settlement') {
            $reservasi->update(['status_bayar' => 1]);

            // Panggil metode getCustomerData dengan orderID dari transactionData
            $customerData = $this->getCustomerData($transactionData['order_id']);

            if ($customerData) {
                // Proses data customer, misalnya kirim notifikasi
                $this->sendSuccessNotification($customerData);
            }

            return response()->json(['status' => 'success', 'message' => 'Pembayaran berhasil.']);
        } elseif ($transactionStatus == 'pending') {
            $reservasi->update(['status_bayar' => 0]);
        } elseif (in_array($transactionStatus, ['deny', 'cancel', 'expire'])) {
            $reservasi->update(['status_bayar' => -1]);
        }

        return response()->json(['status' => 'success', 'message' => 'Notifikasi diproses']);
    }


    public function checkTransactionStatus($orderId)
    {
        $serverKey = config('midtrans.server_key');
        $url = "https://api.sandbox.midtrans.com/v2/{$orderId}/status";

        // Melakukan permintaan ke API Midtrans
        $response = Http::withBasicAuth($serverKey, '')->get($url);

        // Periksa apakah permintaan berhasil
        if ($response->successful()) {
            // Menguraikan data respons
            $transactionData = json_decode($response->getBody()->getContents(), true);

            // Contoh struktur data yang mungkin diterima dari Midtrans
            $orderID = $transactionData['order_id'];
            $status = $transactionData['transaction_status'];
            $amount = $transactionData['gross_amount'];
            $paymentType = $transactionData['payment_type'];
            $transactionTime = $transactionData['transaction_time'];

            // Menyimpan data transaksi ke dalam database
            Transaction::updateOrCreate(
                ['order_id' => $orderID], // Kriteria untuk pencocokan atau pembaruan
                [
                    'order_id' => $orderID,
                    'status' => $status,
                    'amount' => $amount,
                    'payment_type' => $paymentType,
                    'transaction_time' => $transactionTime
                ]

            );


            // Kembalikan data transaksi
            return $transactionData;
        }

        // Jika permintaan gagal, kembalikan null atau menangani kesalahan
        return null;
    }
    public function success(Request $request)
    {
        $sender_number = '6283845414760'; // Ganti dengan nomor pengirim

        // Ambil order_id dari request POST
        $orderId = $request->input('order_id');
        $customerData = $this->getCustomerData($orderId);

        if (!$customerData) {
            return response()->json(['status' => 'error', 'message' => 'Pelanggan tidak ditemukan atau tidak ada pembayaran yang sukses'], 404);
        }

        $this->processBookingNotification($customerData);

        return view('frontend.success');
    }

    private function getCustomerData($orderID)
    {
        return Reservasi::leftJoin('transactions', 'reservasi.id', '=', 'transactions.order_id')
            ->where('reservasi.id', $orderID)
            ->where('reservasi.status_bayar', 1)
            ->select('reservasi.*', 'transactions.*')
            ->first();
    }

    private function sendSuccessNotification($customerData)
    {
        $this->processBookingNotification($customerData);
    }

    private function processBookingNotification($customerData)
    {
        $sender_number = '6283845414760';
        $nama_paket = $customerData->nama_paket;
        $jml_pax = $customerData->jml_pax;
        $total_bayar = $customerData->total_bayar;
        $customer_number = $customerData->no_telp;

        $customer_message = "🌟 Terima kasih telah melakukan pemesanan di PT. MCL Tour & Transport Madiun! 🌟\n\n" .
            "📅 Nama Paket Wisata: $nama_paket\n" .
            "👥 Jumlah Peserta (Pax): $jml_pax orang\n" .
            "💸 Jumlah Total Pembayaran: Rp " . number_format($total_bayar, 0, ',', '.') . "\n\n" .
            "Kami sangat senang Anda telah memilih layanan kami. Tim kami akan segera menghubungi Anda untuk informasi lebih lanjut dan memastikan perjalanan Anda berjalan dengan lancar. Jika Anda memiliki pertanyaan atau kebutuhan khusus, jangan ragu untuk menghubungi kami.\n\n" .
            "Selamat menikmati perjalanan Anda!\n\n" .
            "Salam Hangat,\n" .
            "PT. MCL Tour & Transport Madiun";

        $this->sendWhatsAppMessage($sender_number, $customer_number, $customer_message);

        // Ambil semua nomor telepon admin
        $admin_numbers = $this->getAdminNumbers();

        if ($admin_numbers) {
            // Kirim pesan peringatan ke semua admin
            $admin_message = "🔔 [PT. MCL Tour & Transport Madiun] Pemberitahuan Penting: Anda telah menerima pesan reservasi baru! Mohon segera periksa detailnya lebih lanjut untuk memproses permintaan ini. Terima kasih.\n\nLogin sebagai admin: https://admin.login.url";
            foreach ($admin_numbers as $admin_number) {
                $this->sendWhatsAppMessage($sender_number, $admin_number, $admin_message);
            }
        }
    }

    private function sendWhatsAppMessage($sender_number, $receiver_number, $message)
    {
        $data = [
            'api_key' => 'WNTMywpiLQ7WAYAgrJ2t8i3QACmRfn', // Ganti dengan api_key Anda
            'sender' => $sender_number,
            'number' => $receiver_number,
            'message' => $message
        ];

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://wa.izam.men/send-message',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode($data),
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return $response;
    }

    private function getAdminNumbers()
    {
        $admins = User::where('role', 'admin')->pluck('nomor_telp')->toArray();
        return $admins;
    }
}
