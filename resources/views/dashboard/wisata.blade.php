@extends('dashlayout.app')

@section('title', 'Wisata')

@section('content')
<!-- Konten Home -->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Daftar Wisata</h4>
                    <!-- Tombol untuk membuka modal -->
                    {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalCreate"> --}}
                        {{-- Tambah Data Wisata --}}
                    {{-- </button> --}}
                </div>
                <div class="card-body">
                    <table id="datatable" class="table table-striped text-center">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Destinasi Wisata</th>
                                <th>Nama Wisata</th>
                                <th>Harga</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($wisatas->isEmpty())
                            <tr>
                                <td colspan="5" style="text-align: center;">Tidak ada data</td>
                            </tr>
                            @else
                            @foreach($wisatas as $key => $wisata)
                            <tr>
                                <td>{{ $key + 1 }}</td> <!-- Nomor urutan -->
                                <td>{{ $wisata->destinasi }}</td>
                                <td>{{ $wisata->nama_wisata }}</td>
                                <td>{{ $wisata->harga }}</td>
                                <td>
                                    <a href="#edit{{$wisata->idwisata}}" class="btn btn-warning edit-btn" data-bs-toggle="modal">
                                        <i class='fa fa-edit'></i>
                                        <span class="btn-label">Edit</span>
                                    </a>
                                    <a href="#delete{{$wisata->idwisata}}" class="btn btn-danger delete-btn" data-bs-toggle="modal">
                                        <i class='fa fa-trash'></i>
                                        <span class="btn-label">Delete</span>
                                    </a>
                                    <!-- Include Modals -->
                                    @include('dashboard.action', ['wisata' => $wisata]) <!-- Mengirimkan data wisata ke action.blade.php -->
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


<!-- Modal untuk menambah data wisata -->
@include('dashboard.create')

@endsection
