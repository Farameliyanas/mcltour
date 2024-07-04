@extends('layout.app')

@section('title', 'Detail Transaksi')

@section('content')
@include('layout.navbar')
<div>
    <div class="container-fluid booking py-5" style="overflow: visible;">
        <div class="container py-5" style="min-height: 100vh;"> <!-- Menambah tinggi minimum -->
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="card">
                        <div class="card-header">Pembayaran Berhasil</div>
                        <div class="card-body">
                            <p>Terima kasih atas pembayaran Anda. Reservasi Anda telah berhasil disimpan.</p>
                            <div class="mt-4">
                                <a href="{{ route('home') }}" class="btn btn-primary">Kembali ke Beranda</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection