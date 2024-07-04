@extends('layout.app')

@section('title', 'Detail Transaksi')

@section('content')
@include('layout.navbar')

<div class="container-fluid booking py-5">
    <div class="container py-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        Detail Transaksi
                    </div>
                    <div class="card-body">
                        <p>Nama: {{ $reservasi->nama_paket }}</p>
                        <p>No Telepon: {{ $reservasi->no_telp }}</p>
                        <p>Tanggal Reservasi: {{ $reservasi->tanggal_reservasi }}</p>
                        <p>Jumlah Pax: {{ $reservasi->jml_pax }}</p>
                        <p>Total Bayar: Rp. {{ number_format($reservasi->total_bayar, 2) }}</p>
                        <p>Special Request: {{ $reservasi->spesial_request ?? '-' }}</p>
                        <!-- Tambahkan informasi lain yang relevan -->

                        <button type="button" class="btn btn-primary mt-4" id="payButton">Bayar Sekarang</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaksi</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Midtrans Client Key -->
    <script type="text/javascript"
        src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ config('midtrans.client_key') }}"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<body>
     <script type="text/javascript">
        // When the button is clicked
        var payButton = document.getElementById('payButton');
        payButton.addEventListener('click', function () {
            // Trigger snap popup. Replace '{{$snapToken}}' with the actual token
            window.snap.pay('{{ $snapToken }}', {
                onSuccess: function(result) { console.log('success'); console.log(result); },
                onPending: function(result) { console.log('pending'); console.log(result); },
                onError: function(result) { console.log('error'); console.log(result); },
                onClose: function() { console.log('customer closed the popup without finishing the payment'); }
            });
        });
    </script>

</html>

<script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{config('midtrans.client_key')}}"></script>
<script type="text/javascript">
    // For example trigger on button clicked, or any time you need
    var payButton = document.getElementById('pay-button');
    payButton.addEventListener('click', function() {
        // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
        window.snap.pay('{{$snapToken}}', {
            onSuccess: function(result) {
                /* You may add your own implementation here */
                alert("payment success!");
                console.log(result);
            },
            onPending: function(result) {
                /* You may add your own implementation here */
                alert("wating your payment!");
                console.log(result);
            },
            onError: function(result) {
                /* You may add your own implementation here */
                alert("payment failed!");
                console.log(result);
            },
            onClose: function() {
                /* You may add your own implementation here */
                alert('you closed the popup without finishing the payment');
            }
        })
    });
</script>

@endsection