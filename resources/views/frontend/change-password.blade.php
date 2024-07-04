@extends('layout.app')

@section('title', 'Booking')

@section('content')

@include('layout.navbar')
<div>
    <div class="container-fluid booking py-5" style="overflow: visible;">
        <div class="container py-5" style="min-height: 100vh;"> <!-- Menambah tinggi minimum -->
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="card">
                        <div class="card-header">Ubah Password</div>
                        <div class="card-body">
                            @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                            @endif

                            <form method="POST" action="{{ route('account.change-password') }}">
                                @csrf

                                <div class="mb-3">
                                    <label for="current_password" class="form-label">{{ __('Current Password') }}</label>
                                    <input id="current_password" type="password" class="form-control @error('current_password') is-invalid @enderror" name="current_password" required autocomplete="current-password">

                                    @error('current_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="new_password" class="form-label">{{ __('New Password') }}</label>
                                    <input id="new_password" type="password" class="form-control @error('new_password') is-invalid @enderror" name="new_password" required autocomplete="new-password">

                                    @error('new_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="confirm_password" class="form-label">{{ __('Confirm Password') }}</label>
                                    <input id="confirm_password" type="password" class="form-control" name="confirm_password" required autocomplete="new-password">
                                </div>
                                <button type="submit" class="btn btn-primary">{{ __('Change Password') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection