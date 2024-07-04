<!-- resources/views/home.blade.php -->

@extends('dashlayout.app')

@section('title', 'DASHBOARD')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if(session('name'))
                            <p>Selamat datang, {{ session('name') }}!</p>
                        @else
                            <p>Selamat datang!</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection