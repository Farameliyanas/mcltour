<!-- resources/views/home.blade.php -->

@extends('dashlayout.app')

@section('title', 'Ubah Password')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-header">{{ __('Ubah Password') }}</div>

                    @if (session('error'))
                    <div class="alert alert-danger mt-3" role="alert">
                        {{ session('error') }}
                    </div>
                    @endif

                    @if (session('success'))
                    <div class="alert alert-success mt-3" role="alert">
                        {{ session('success') }}
                    </div>
                    @endif
                    <div class="card-body">
                        <form method="POST" action="{{ route('account.change-password') }}">
                            @csrf

                            <div class="mb-3">
                                <label for="current_password" class="form-label">{{ __('Password Saat Ini') }}</label>
                                <input id="current_password" type="password" class="form-control @error('current_password') is-invalid @enderror" name="current_password" required autocomplete="current-password">

                                @error('current_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="new_password" class="form-label">{{ __('Password Baru') }}</label>
                                <input id="new_password" type="password" class="form-control @error('new_password') is-invalid @enderror" name="new_password" required autocomplete="new-password">

                                @error('new_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="confirm_password" class="form-label">{{ __('Konfirmasi Password Baru') }}</label>
                                <input id="confirm_password" type="password" class="form-control" name="confirm_password" required autocomplete="new-password">
                            </div>

                            <button type="submit" class="btn btn-primary btn-sm" style="max-width: 200px; min-width: 120px;">{{ __('Ubah Password') }}</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection