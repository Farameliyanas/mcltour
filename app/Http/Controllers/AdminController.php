<?php

namespace App\Http\Controllers;

use App\Models\Wisata;
use App\Models\Pelanggan;
use App\Models\User;
use App\Models\Reservasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;

use Illuminate\Support\Facades\Log; // Tambahkan ini untuk mengimpor Log



class AdminController extends Controller
{
    // Tampilkan dashboard admin
    public function showDashboard()
    {
        return view('dashboard.dashboard');
    }

    // Tampilkan halaman wisata
    public function showWisata()
    {
        $wisatas = Wisata::all();
        return view('dashboard.wisata', compact('wisatas'));
    }

    // Tampilkan halaman pelanggan
    public function showPelanggan()
    {
        $pelanggan = Pelanggan::all();
        return view('dashboard.pelanggan', compact('pelanggan'));
    }

    // Tampilkan halaman transaksi
    public function showTransaksi()
    {
        // Ambil data dari model
        // $transaksi = Reservasi::where('status_bayar', 1)->get();
        // Ambil data dari model dan urutkan berdasarkan created_at secara descending
        $transaksi = Reservasi::orderBy('created_at', 'desc')->get();

        // Kirim data ke view
        return view('dashboard.transaksi', compact('transaksi'));
    }

    // Simpan wisata baru
    public function storeWisata(Request $request)
    {
        $wisata = new Wisata($request->all());
        $wisata->save();
        return redirect()->route('admin.wisata')->with('success', 'Wisata berhasil ditambahkan.');
    }

    // Perbarui data wisata
    public function updateWisata(Request $request, $id)
    {
        $wisata = Wisata::find($id);
        $wisata->update($request->all());
        return redirect()->route('admin.wisata')->with('success', 'Wisata berhasil diperbarui.');
    }

    // Hapus wisata
    public function destroyWisata($id)
    {
        $wisata = Wisata::find($id);
        $wisata->delete();
        return redirect()->route('admin.wisata')->with('success', 'Wisata berhasil dihapus.');
    }

    // Dapatkan data wisata
    public function getDataWisata()
    {
        $wisata = Wisata::all();
        return response()->json($wisata);
    }

    // Simpan pelanggan baru
    public function storePelanggan(Request $request)
    {
        $pelanggan = new Pelanggan($request->all());
        $pelanggan->save();
        return redirect()->route('admin.pelanggan')->with('success', 'Pelanggan berhasil ditambahkan.');
    }

    // Perbarui data pelanggan
    public function updatePelanggan(Request $request, $id)
    {
        $pelanggan = Pelanggan::find($id);
        $pelanggan->update($request->all());
        return redirect()->route('admin.pelanggan')->with('success', 'Pelanggan berhasil diperbarui.');
    }

    // Hapus pelanggan
    public function destroyPelanggan($id)
    {
        $pelanggan = Pelanggan::find($id);
        $pelanggan->delete();
        return redirect()->route('admin.pelanggan')->with('success', 'Pelanggan berhasil dihapus.');
    }

    // Dapatkan data transaksi
    public function getDataTransaksi()
    {
        $transaksi = Reservasi::where('status_bayar', 1)->get();
        return response()->json($transaksi);
    }

    // Hapus transaksi
    public function destroyTransaksi($id)
    {
        $transaksi = Reservasi::find($id);
        $transaksi->delete();
        return redirect()->route('admin.transaksi')->with('success', 'Transaksi berhasil dihapus.');
    }
    public function showUser()
    {
        $user = User::all();
        return view('dashboard.users', compact('user'));
    }

    // Menambah user (create)
    // Fungsi untuk menyimpan user baru
    public function storeUser(Request $request)
    {
        // Log data yang diterima untuk debugging
     Log::info('Data yang diterima untuk store:', $request->all());

        // Validasi data
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8'],
            'alamat' => ['required', 'string', 'max:255'],
            'nomor_telp' => ['required', 'numeric'],
            'jenis_kelamin' => ['required', 'string'],
            'role' => ['required', 'string'],
        ]);

        if ($validator->fails()) {
        Log::error('Validasi gagal:', $validator->errors()->toArray());
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Buat user baru
        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'alamat' => $request->alamat,
                'nomor_telp' => $request->nomor_telp,
                'jenis_kelamin' => $request->jenis_kelamin,
                'role' => $request->role,
            ]);

            Log::info('User berhasil ditambahkan:', $user->toArray());

            return redirect()->route('admin.users')->with('success', 'User added successfully.');
        } catch (\Exception $e) {
            Log::error('Gagal menambah user:', ['error' => $e->getMessage()]);
            return redirect()->back()->with('error', 'Failed to add user: ' . $e->getMessage());
        }
    }

    public function editUser($id)
    {
        $user = User::findOrFail($id);
        return view('dashboard.edit_user', compact('user'));
    }

    // Fungsi untuk update informasi user
    public function updateUser(Request $request, $id)
    {
        // Validasi data
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $id],
            'alamat' => ['required', 'string', 'max:255'],
            'nomor_telp' => ['required', 'numeric'],
            'jenis_kelamin' => ['required', 'string'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Update informasi user
        try {
            $user = User::findOrFail($id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->alamat = $request->alamat;
            $user->nomor_telp = $request->nomor_telp;
            $user->jenis_kelamin = $request->jenis_kelamin;
            $user->save();

            // Masukkan status ke log bahwa update berhasil
            Log::info('User updated successfully. User data:', ['user' => $user]);

            return redirect()->route('admin.users')->with('success', 'User updated successfully.');
        } catch (\Exception $e) {
            // Masukkan status ke log bahwa update gagal berserta pesan error
            Log::error('Failed to update user: ' . $e->getMessage());

            return redirect()->back()->with('error', 'Failed to update user: ' . $e->getMessage());
        }
    }

    // Fungsi untuk menghapus user
    public function destroyUser($id)
    {
        // Cari user berdasarkan ID
        $user = User::findOrFail($id);

        try {
            // Hapus user
            $user->delete();

            // Redirect ke halaman users dengan pesan sukses
            return redirect()->route('admin.users')->with('success', 'User deleted successfully.');
        } catch (\Exception $e) {
            // Jika terjadi kesalahan saat menghapus, kembali dengan pesan kesalahan
            return redirect()->back()->with('error', 'Failed to delete user: ' . $e->getMessage());
        }
    }
    public function decryptPassword($encryptedPassword)
    {
        try {
            return Crypt::decryptString($encryptedPassword);
        } catch (\Illuminate\Contracts\Encryption\DecryptException $e) {
            return 'Error: ' . $e->getMessage();
        }
    }
}
