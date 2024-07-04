<!-- resources/views/home.blade.php -->

@extends('dashlayout.app')

@section('title', 'user')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Daftar user</h4>
                    <!-- Tombol untuk membuka modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalUserCreate">
                        Tambah Data user
                    </button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped text-center">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama user</th>
                                    <th>Email user</th>
                                    <th>Alamat</th>
                                    <th>Nomor Telepon</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($user->isEmpty())
                                <tr>
                                    <td colspan="8" style="text-align: center;">Tidak ada data</td>
                                </tr>
                                @else
                                @foreach($user as $key => $users)
                                <tr>
                                    <td>{{ $key + 1 }}</td> <!-- Nomor urutan -->
                                    <td>{{ $users->name }}</td>
                                    <td>{{ $users->email}}</td>
                                    <td>{{ $users->alamat }}</td>
                                    <td>{{ $users->nomor_telp }}</td>
                                    <td>{{ $users->jenis_kelamin }}</td>

                                    <td>
                                        <!-- Tombol Edit -->
                                        <a href="#edit{{$users->id}}" data-bs-toggle="modal" class="btn btn-warning"><i class='fa fa-edit'></i> Edit</a>
                                        <a href="#delete{{$users->id}}" data-bs-toggle="modal" class="btn btn-danger"><i class='fa fa-trash'></i> Hapus</a>
                                        <!-- Include Modals -->
                                        @include('dashboard.actionu', ['user' => $user]) <!-- Mengirimkan data wisata ke action.blade.php -->
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
@include('dashboard.create1')
@endsection