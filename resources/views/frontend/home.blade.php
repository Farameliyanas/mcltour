<!-- resources/views/home.blade.php -->

@extends('layout.app')

@section('title', 'MCL TOUR')

@section('content')
    <!-- Konten Home -->
    @include('layout.navbar')
    @include('frontend.start')
    
    <!-- Konten About -->
    @include('frontend.about')
    
    <!-- Konten Services -->
    @include('frontend.service')
    
    <!-- Konten Packages -->
    @include('frontend.packages')
    
    <!-- Konten Blog -->
    @include('frontend.blog')
    
    <!-- Konten Dropdown Pages -->
    @include('frontend.destination')
    @include('frontend.explore')
    
    <!-- Konten Booking -->
    @auth
        @include('frontend.booking')
    @else
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h3>Anda harus login untuk mengakses halaman ini.</h3>
                    <p>Silakan <a href="{{ route('login') }}">login</a> atau <a href="{{ route('register') }}">register</a> jika belum memiliki akun.</p>
                </div>
            </div>
        </div>
    @endauth
    
    <!-- Konten Gallery -->
    @include('frontend.gallery')
    
    <!-- Konten Travel Guides -->
    @include('frontend.travel_guides')
    
    <!-- Konten Testimonial -->
    @include('frontend.testimoni')
    
    <!-- Konten Contact -->
    @include('frontend.contact')
@endsection
