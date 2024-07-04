@extends('layout.app')

@section('title', 'Booking')

@section('content')

@include('layout.navbar')

<!-- Tour Booking Start -->
<div class="container-fluid booking py-5">
    <div class="container py-5">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6">
                <h5 class="section-booking-title pe-3">Pemesanan</h5>
                <h1 class="text-white mb-4">Pemesanan Online</h1>
                <p class="text-white mb-4" style="text-align: justify;">
                    Selamat datang di layanan pemesanan online kami! Kami menyediakan berbagai pilihan paket wisata dan transportasi yang dapat disesuaikan dengan kebutuhan dan keinginan Anda. Dengan sistem pemesanan yang mudah dan cepat, Anda bisa merencanakan perjalanan impian Anda tanpa ribet.
                </p>
                <p class="text-white mb-4" style="text-align: justify;">
                    Jangan tunda lagi, mulailah petualangan Anda sekarang juga! Klik tombol "Pesan Sekarang" dan rasakan kemudahan merencanakan perjalanan bersama kami.
                </p>
            </div>
            <div class="col-lg-6">
                <h1 class="text-white mb-3">Pesan Penawaran Wisata</h1>
                <form action="{{ route('submit_booking') }}" method="POST">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control bg-white border-0 @error('name') is-invalid @enderror" id="name" name="name" placeholder="Your Name" value="{{ old('name') }}">
                                <label for="name">Nama Anda</label>
                                @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="number" class="form-control bg-white border-0 @error('no_telepon') is-invalid @enderror" id="no_telepon" name="no_telepon" placeholder="NO Telephon" value="{{ old('no_telepon') }}">
                                <label for="no_telepon">NO TELP</label>
                                @error('no_telepon')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="date" class="form-control bg-white border-0 @error('from_datetime') is-invalid @enderror" id="fromDatetime" name="from_datetime" placeholder="From Date & Time" value="{{ old('from_datetime') }}">
                                        <label for="fromDatetime">Reservasi Untuk Tanggal</label>
                                        @error('from_datetime')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <select class="form-select bg-white border-0 @error('nama_wisata') is-invalid @enderror" id="selectnama_wisata" name="nama_wisata">
                                    <option value="">Pilih Nama Paket</option>
                                    @foreach($wisataData as $wisata)
                                    <option value="{{ $wisata->nama_wisata }}" data-harga="{{ $wisata->harga }}" {{ old('nama_wisata') == $wisata->nama_wisata ? 'selected' : '' }}>{{ $wisata->nama_wisata }}</option>
                                    @endforeach
                                </select>
                                <label for="selectnama_wisata">Nama Paket</label>
                                @error('nama_wisata')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="number" class="form-control bg-white border-0 @error('pax') is-invalid @enderror" id="jumlah_pax" name="pax" placeholder="Jumlah Pax" value="{{ old('pax') }}">
                                <label for="pax">Jumlah Pax</label>
                                @error('pax')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control bg-white border-0" id="harga_wisata_display" readonly>
                                <input type="hidden" class="form-control bg-white border-0" id="harga_wisata" name="harga_wisata">
                                <label for="harga_wisata_display">Harga Paket</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control bg-white border-0" id="total_bayar_display" readonly>
                                <input type="hidden" class="form-control bg-white border-0" id="total_bayar" name="total_bayar">
                                <label for="total_bayar_display">Total Bayar</label>
                                @error('total_bayar')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-floating">
                                <textarea class="form-control bg-white border-0 @error('special_request') is-invalid @enderror" placeholder="Special Request" id="special_request" name="special_request" style="height: 100px">{{ old('special_request') }}</textarea>
                                <label for="special_request">Permintaan Spesial</label>
                                @error('special_request')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary text-white w-100 py-3" type="submit">Pesan Sekarang</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#selectnama_wisata').on('change', function() {
            var selectedHarga = parseFloat($(this).find(':selected').data('harga')) || 0;
            $('#harga_wisata').val(selectedHarga); // Simpan nilai harga aktual ke input tersembunyi

            // Format harga dengan "Rp." di depannya dan tampilkan di input readonly
            $('#harga_wisata_display').val(selectedHarga ? 'Rp. ' + selectedHarga.toFixed(2) : '');
            calculateTotal(); // Hitung ulang total bayar
        });

        function calculateTotal() {
            var pax = parseInt($('#jumlah_pax').val()) || 0;
            var hargaWisata = parseFloat($('#harga_wisata').val()) || 0;
            var total = pax * hargaWisata;

            // Tampilkan total bayar dengan format "Rp." di depannya
            $('#total_bayar').val(total.toFixed(2)); // Simpan nilai total bayar ke input tersembunyi
            $('#total_bayar_display').val(total ? 'Rp. ' + total.toFixed(2) : ''); // Tampilkan di input readonly
        }

        $('#jumlah_pax').on('change', function() {
            calculateTotal(); // Hitung ulang total bayar ketika jumlah pax berubah
        });

        // Panggil calculateTotal pertama kali saat dokumen siap
        calculateTotal();

        // Handle form submission
        $('#submitBookingBtn').click(function(e) {
            e.preventDefault();
            var form = $(this).closest('form');
            $.ajax({
                url: form.attr('action'),
                type: 'POST',
                data: form.serialize(),
                success: function(response) {
                    // Tampilkan modal pembayaran dengan data yang sudah disimpan
                    $('#modalNama').text(response.data.name);
                    $('#modalNoTelp').text(response.data.no_telp);
                    $('#modalTanggal').text(response.data.tanggal_reservasi);
                    $('#modalNamaWisata').text(response.data.nama_paket);
                    $('#modalPax').text(response.data.jml_pax);
                    $('#modalTotalBayar').text('Rp. ' + response.data.total_bayar.toFixed(2));
                    $('#modalSpecialRequest').text(response.data.spesial_request);

                    // Generate QR Code (contoh, sesuaikan dengan logika dan library QR Code yang digunakan)
                    var qrUrl = generateQRCode(response.data.total_bayar);
                    $('#modalQrCode').attr('src', qrUrl);

                    // Tampilkan modal
                    $('#paymentModal').modal('show');
                },
                error: function(error) {
                    console.error('Error submitting booking:', error);
                    alert('Gagal melakukan pemesanan. Silakan coba lagi.');
                }
            });
        });

        // Fungsi contoh untuk menghasilkan QR Code (sesuaikan dengan logika pembuatan QR Code di backend Anda)
        function generateQRCode(totalBayar) {
            // Contoh URL untuk generate QR Code, sesuaikan dengan logika Anda
            return 'https://example.com/qrcode?total=' + totalBayar;
        }
    });
</script>

@endsection


