<!-- resources/views/home.blade.php -->

@extends('layout.app')

@section('title', 'About')

@section('content')

    @include('layout.navbar')

<!-- Contact Start -->
<div class="container-fluid contact bg-light py-5">
            <div class="container py-5">
                <div class="mx-auto text-center mb-5" style="max-width: 900px;">
                    <h5 class="section-title px-3">Kontak Kami</h5>
                    <h1 class="mb-0">Hubungi Kami</h1>
                </div>
                <div class="row g-5 align-items-center">
                    <div class="col-lg-12">
                        <div class="bg-white rounded p-4">
                            <div class="text-center mb-4">
                                <i class="fa fa-map-marker-alt fa-3x text-primary"></i>
                                <h4 class="text-primary"><Address></Address></h4>
                                <p class="mb-0">Travel Company, <br> 📍Kota Madiun</p>
                            </div>
                            <div class="text-center mb-4">
                                <i class="fa fa-phone-alt fa-3x text-primary mb-3"></i>
                                <h4 class="text-primary">WhatsApp</h4>
                                <p class="mb-0">+62 838-4532-0159</p>

                            </div>

                            <div class="text-center">
                                <i class="fa fa-envelope-open fa-3x text-primary mb-3"></i>
                                <h4 class="text-primary">Email</h4>
                                <p class="mb-0">mcltransportservice@gmail.com</p>

                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="rounded">
                            <iframe class="rounded w-100"
                            style="height: 450px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3954.4462736191554!2d111.5272138745516!3d-7.635061575511467!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e79bf1e53148fc9%3A0x37733dae70a83a38!2sPT.%20MCL%20TOUR%20%26%20TRANSPORT%20MADIUN!5e0!3m2!1sid!2sid!4v1716600751768!5m2!1sid!2sid"
                            loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact End -->
@include('layout.footer')

@endsection
