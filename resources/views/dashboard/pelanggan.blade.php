<!-- resources/views/home.blade.php -->

@extends('dashlayout.app')

@section('title', 'Pelanggan')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Daftar Pelanggan</h4>
                    <!-- Tombol untuk membuka modal -->
                    <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalPelangganCreate">
                        Tambah Data Pelanggan
                    </button> -->
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped text-center">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pelanggan</th>
                                    <th>Email Pelanggan</th>
                                    <th>Alamat</th>
                                    <th>Nomor Telp</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($pelanggan->isEmpty())
                                <tr>
                                    <td colspan="8" style="text-align: center;">Tidak ada data</td>
                                </tr>
                                @else
                                @foreach($pelanggan as $key => $pelanggan)
                                <tr>
                                    <td>{{ $key + 1 }}</td> <!-- Nomor urutan -->
                                    <td>{{ $pelanggan->name }}</td>
                                    <td>{{ $pelanggan->email}}</td>
                                    <td>{{ $pelanggan->alamat }}</td>
                                    <td>{{ $pelanggan->nomor_telp }}</td>
                                    <td>{{ $pelanggan->jenis_kelamin }}</td>
                                    <td>
                                        <a href="#edit{{$pelanggan->id}}" class="btn btn-warning edit-btn" data-bs-toggle="modal">
                                            <i class='fa fa-edit'></i>
                                            <span class="btn-label">Edit</span>
                                        </a>
                                        <a href="#delete{{$pelanggan->id}}" class="btn btn-danger delete-btn" data-bs-toggle="modal">
                                            <i class='fa fa-trash'></i>
                                            <span class="btn-label">Delete</span>
                                        </a>
                                        @include('dashboard.actionp', ['pelanggan' => $pelanggan]) <!-- Mengirimkan data wisata ke action.blade.php -->
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
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const buttons = document.querySelectorAll('.edit-btn, .delete-btn');

        buttons.forEach(button => {
            // Sembunyikan teks "Edit" dan "Delete" saat halaman dimuat
            button.querySelector('.btn-label').style.display = 'none';

            button.addEventListener('mouseenter', function() {
                this.querySelector('i').style.display = 'none';
                this.querySelector('.btn-label').style.display = 'inline-block';
            });

            button.addEventListener('mouseleave', function() {
                this.querySelector('i').style.display = 'inline-block';
                this.querySelector('.btn-label').style.display = 'none';
            });

            button.addEventListener('click', function(event) {
                event.preventDefault();
                let id = this.getAttribute('data-id');
                if (this.classList.contains('edit-btn')) {
                    // Tambahkan logika untuk edit di sini
                    console.log('Edit button clicked for id:', id);
                } else if (this.classList.contains('delete-btn')) {
                    // Tambahkan logika untuk hapus di sini
                    console.log('Delete button clicked for id:', id);
                }
            });
        });
    });
</script>
@include('dashboard.create1')
@endsection