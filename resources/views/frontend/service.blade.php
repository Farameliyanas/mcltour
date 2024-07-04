<!-- resources/views/home.blade.php -->

@extends('layout.app')

@section('title', 'Layanan')

@section('content')

    @include('layout.navbar')
     <!-- Services Start -->
     <div class="container-fluid bg-light service py-5">
            <div class="container py-5">
                <div class="mx-auto text-center mb-5" style="max-width: 900px;">
                    <h5 class="section-title px-3">Searvices</h5>
                    <h1 class="mb-0">Our Services</h1>
                </div>
                <div class="row g-4">
                    <div class="col-lg-6">
                        <div class="row g-4">
                            <div class="col-12">
                                <div class="service-content-inner d-flex align-items-center bg-white border border-primary rounded p-4 pe-0">
                                    <div class="service-content text-end">
                                        <h5 class="mb-4">Paket Tour Wisata</h5>
                                        <p class="mb-0" style="text-align: justify;">Kami menawarkan paket wisata lengkap dan terkurasi untuk memenuhi kebutuhan Anda, baik untuk perjalanan individu, keluarga, maupun kelompok. Tim profesional kami siap membantu Anda merencanakan dan mewujudkan liburan tak terlupakan.
                                        </p>
                                    </div>
                                    <div class="service-icon p-4">
                                        <i class="fa fa-globe fa-4x text-primary"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="service-content-inner d-flex align-items-center  bg-white border border-primary rounded p-4 pe-0">
                                    <div class="service-content text-end">
                                        <h5 class="mb-4">Pemesanan Hotel</h5>
                                        <p class="mb-0" style="text-align: justify;">Kami menyediakan platform pemesanan hotel yang terpercaya untuk membantu Anda menemukan hotel terbaik. Baik Anda mencari hotel mewah untuk liburan romantis, hotel bisnis yang nyaman untuk perjalanan kerja atau hotel keluarga.
                                        </p>
                                    </div>
                                    <div class="service-icon p-4">
                                        <i class="fa fa-hotel fa-4x text-primary"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="service-content-inner d-flex align-items-center bg-white border border-primary rounded p-4 pe-0">
                                    <div class="service-content text-end">
                                        <h5 class="mb-4">Outbound</h5>
                                        <p class="mb-0" style="text-align: justify;">Kami menawarkan program outbound yang dirancang untuk meningkatkan kinerja tim, membangun kekompakan, dan mengembangkan keterampilan individu. Program outbound kami dirancang untuk menantang dan memotivasi peserta.
                                        </p>
                                    </div>
                                    <div class="service-icon p-4">
                                        <i class="fa fa-cog fa-4x text-primary"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="row g-4">
                            <div class="col-12">
                                <div class="service-content-inner d-flex align-items-center bg-white border border-primary rounded p-4 ps-0">
                                    <div class="service-icon p-4">
                                        <i class="fa fa-globe fa-4x text-primary"></i>
                                    </div>
                                    <div class="service-content">
                                        <h5 class="mb-4">Layanan Transportasi</h5>
                                        <p class="mb-0" style="text-align: justify;">Kami menawarkan berbagai layanan transportasi yang aman, nyaman, dan terpercaya untuk memenuhi kebutuhan Anda. Tim profesional kami siap membantu Anda mencapai tujuan dengan mudah dan menyenangkan.
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="service-content-inner d-flex align-items-center bg-white border border-primary rounded p-4 ps-0">
                                    <div class="service-icon p-4">
                                        <i class="fa fa-user fa-4x text-primary"></i>
                                    </div>
                                    <div class="service-content">
                                        <h5 class="mb-4">Pemandu Wisata</h5>
                                        <p class="mb-0" style="text-align: justify;">Menjelajahi destinasi wisata baru bisa menjadi pengalaman yang luar biasa, namun terkadang terasa membingungkan dan melelahkan. Untuk itu, kami menawarkan layanan pemandu wisata profesional yang siap membantu Anda memaksimalkan pengalaman wisata Anda.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="service-content-inner d-flex align-items-center bg-white border border-primary rounded p-4 ps-0">
                                    <div class="service-icon p-4">
                                        <i class="fa fa-cog fa-4x text-primary"></i>
                                    </div>
                                    <div class="service-content">
                                        <h5 class="mb-4">Jasa Angkut Barang</h5>
                                        <p class="mb-0" style="text-align: justify;">Memindahkan barang bisa menjadi hal yang merepotkan, terutama jika barangnya besar, berat, atau banyak. Jangan khawatir, kami hadir untuk membantu Anda dengan layanan angkut barang yang aman dan terpercaya.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="text-center">
                            <a class="btn btn-primary rounded-pill py-3 px-5 mt-2" href="">Service More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Services End -->

@endsection
