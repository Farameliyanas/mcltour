<!-- resources/views/home.blade.php -->

@extends('layout.app')

@section('title', 'About')

@section('content')

@include('layout.navbar')
<!-- About Start -->
<div class="container-fluid about py-5">
    <div class="container py-5">
        <div class="row g-5 align-items-center">
            <div class="col-lg-5">
                <div class="h-100" style="border: 50px solid; border-color: transparent #13357B transparent #13357B;">
                    <img src="{{ asset('travel/img/about-img.jpg') }}" class="img-fluid w-100 h-100" alt="">
                </div>
            </div>
            <div class="col-lg-7" style="background: linear-gradient(rgba(255, 255, 255, .8), rgba(255, 255, 255, .8)), url('/travel/img/about-img-1.png');">
                <h1 class="mb-4" style="text-align: justify;">Selamat Datang di <span class="text-primary">MCL TOUR dan Transport Madiun</span></h1>
                <h5 class="section-about-title pe-3" style="text-align: justify;">Tentang Kami</h5>
                <p class="mb-4" style="text-align: justify;">Selamat datang di PT MCL Tour & Transport Madiun, mitra terpercaya Anda dalam layanan biro perjalanan wisata dan jasa transportasi. Kami berdedikasi untuk memberikan pengalaman perjalanan yang tak terlupakan dengan berbagai pilihan destinasi menarik serta layanan transportasi yang nyaman dan aman!</p>

                <h5 class="section-about-title pe-3" style="text-align: justify;">Profil Perusahaan</h5>
                <p class="mb-4" style="text-align: justify;">PT MCL Tour & Transport Madiun berdiri dengan komitmen untuk menjadi yang terdepan dalam industri perjalanan wisata dan transportasi. Dengan tim profesional yang berpengalaman dan berdedikasi, kami memastikan setiap perjalanan Anda dirancang dan dieksekusi dengan sempurna. Baik itu untuk keperluan wisata, bisnis, atau acara khusus, kami selalu siap memberikan solusi terbaik yang sesuai dengan kebutuhan Anda.</p>

                <h5 class="section-about-title pe-3" style="text-align: justify;">Layanan Kami</h5>
                <p class="mb-4" style="text-align: justify;"><span class="fw-bold">1. Biro Perjalanan Wisata :</span> Kami menawarkan berbagai paket wisata menarik, mulai dari tur domestik hingga internasional. Setiap paket dirancang dengan cermat untuk memastikan Anda mendapatkan pengalaman terbaik, lengkap dengan akomodasi, transportasi, dan panduan wisata yang berpengalaman.</p>
                <p class="mb-4" style="text-align: justify;"><span class="fw-bold">2. Jasa Transportasi :</span> Kami menyediakan berbagai pilihan transportasi yang nyaman dan aman, mulai dari kendaraan pribadi, bus wisata, hingga layanan antar-jemput bandara. Semua armada kami dirawat dengan baik dan dikendarai oleh sopir profesional yang berpengalaman.</p>

                <h5 class="section-about-title pe-3" style="text-align: justify;">Mengapa Memilih Kami?</h5>
                <p class="mb-4" style="text-align: justify;"><span class="fw-bold">1. Pengalaman dan Keahlian:</span> Dengan bertahun-tahun pengalaman di industri, kami memahami setiap detail yang dibutuhkan untuk menciptakan perjalanan yang sempurna.</p>
                <p class="mb-4" style="text-align: justify;"><span class="fw-bold">2. Pelayanan Prima :</span> Kepuasan pelanggan adalah prioritas utama kami. Kami selalu berusaha memberikan layanan terbaik dengan mengutamakan kenyamanan dan keamanan Anda.</p>
                <p class="mb-4" style="text-align: justify;"><span class="fw-bold">3. Fleksibilitas :</span> Kami menawarkan berbagai paket dan layanan yang dapat disesuaikan dengan kebutuhan dan anggaran Anda.</p>
                <p class="mb-4" style="text-align: justify;"><span class="fw-bold">4. Inovasi :</span> Kami terus berinovasi untuk menghadirkan pengalaman baru dan menarik bagi pelanggan kami, mengikuti tren terbaru dalam industri pariwisata dan transportasi.</p>

            </div>
        </div>
    </div>
</div>
<!-- About End -->
@include('layout.footer')

@endsection
