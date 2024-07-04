@extends('dashlayout.app')

@section('title', 'Transaksi')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Daftar Transaksi</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped text-center">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pemesan</th>
                                    <th>Paket</th>
                                    <th>Jumlah Pax</th>
                                    <th>No Telp</th>
                                    <th>Tanggal Reservasi</th>
                                    <th>Spesial Request</th>
                                    <th>Status</th>
                                    <th>Total Bayar</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($transaksi->isEmpty())
                                    <tr>
                                        <td colspan="9" class="text-center">Tidak ada data</td>
                                    </tr>
                                @else
                                    @foreach($transaksi as $key => $trx)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $trx->name }}</td>
                                            <td>{{ $trx->nama_paket }}</td>
                                            <td>{{ $trx->jml_pax }}</td>
                                            <td>{{ $trx->no_telp }}</td>
                                            <td>{{ $trx->tanggal_reservasi }}</td>
                                            <td>{{ $trx->spesial_request }}</td>
                                             <!-- Menampilkan status pembayaran dengan button warna -->
                                            <td>
                                                @if($trx->status_bayar == 1)
                                                    <button class="btn btn-success">Lunas</button>
                                                @else
                                                    <button class="btn btn-warning">Belum Lunas</button>
                                                @endif
                                            </td>

                                            <td>{{ number_format($trx->total_bayar, 0, ',', '.') }}</td>
                                            <td>
                                                <a href="#delete{{ $trx->id }}" data-bs-toggle="modal" class="btn btn-danger">
                                                    <i class='fa fa-trash'></i> Hapus
                                                </a>
                                                @include('dashboard.actiont', ['transaksi' => $trx])
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
