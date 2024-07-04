@extends('layout.app')

@section('title', 'Paket')

@section('content')

@include('layout.navbar')
<div class="container-fluid packages py-5">
    <div class="container py-5">
        <div class="mx-auto text-center mb-5" style="max-width: 900px;">
            <h5 class="section-title px-3">Paket </h5>
            <h1 class="mb-0">Paket Wisata</h1>
        </div>
        <div class="packages-carousel owl-carousel">
            <div class="packages-item">
                <div class="packages-img">
                    <img src="{{ asset('travel/img/packages-5.jpg') }}" class="img-fluid w-100 rounded-top" alt="Image">
                    <div class="packages-info d-flex border border-start-0 border-end-0 position-absolute" style="width: 100%; bottom: 0; left: 0; z-index: 5;">
                        <small class="flex-fill text-center border-end py-2"><i class="fa fa-map-marker-alt me-2"></i>Malang</small>
                        <small class="flex-fill text-center border-end py-2"><i class="fa fa-calendar-alt me-2"></i>1 days</small>
                        <small class="flex-fill text-center py-2"><i class="fa fa-user me-2"></i>/pax</small>
                    </div>
                    <div class="packages-price py-2 px-4">IDR 295K</div>
                </div>
                <div class="packages-content bg-light">
                    <div class="p-4 pb-0">
                        <h5 class="mb-0">Kota Wisata Batu</h5>
                        <small class="text-uppercase">Hotel Deals</small>
                        <div class="mb-3">
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                        </div>
                        <p class="mb-4">Batu, kota kecil yang terletak di dataran tinggi Malang, Batu menjadi destinasi sempurna untuk liburan bersama keluarga, teman, atau pasangan. Batu menawarkan keindahan alam yang indah.</p>
                    </div>
                    <div class="row bg-primary rounded-bottom mx-0">
                        <div class="col-6 text-start px-0">
                            <a href="#" class="btn-hover btn text-white py-2 px-4" data-bs-toggle="modal" data-bs-target="#imageModal" data-img-src="{{ asset('travel/img/batu.jpg') }}">Read More</a>
                        </div>
                        <div class="col-6 text-end px-0">
                            <a href="{{ route('booking') }}" class="btn-hover btn text-white py-2 px-4">Book Now</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="packages-item">
                <div class="packages-img">
                    <img src="{{ asset('travel/img/packages-2.jpg') }}" class="img-fluid w-100 rounded-top" alt="Image">
                    <div class="packages-info d-flex border border-start-0 border-end-0 position-absolute" style="width: 100%; bottom: 0; left: 0; z-index: 5;">
                        <small class="flex-fill text-center border-end py-2"><i class="fa fa-map-marker-alt me-2"></i>Bali</small>
                        <small class="flex-fill text-center border-end py-2"><i class="fa fa-calendar-alt me-2"></i>5 days</small>
                        <small class="flex-fill text-center py-2"><i class="fa fa-user me-2"></i>/pax</small>
                    </div>
                    <div class="packages-price py-2 px-4">IDR 2.700k</div>
                </div>
                <div class="packages-content bg-light">
                    <div class="p-4 pb-0">
                        <h5 class="mb-0">Pulau Dewata Bali</h5>
                        <small class="text-uppercase">Hotel Deals</small>
                        <div class="mb-3">
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                        </div>
                        <p class="mb-4">Bali, pulau surga di Indonesia, terkenal dengan pantai-pantainya yang menakjubkan, budaya yang kaya, dan pemandangan alam yang mempesona. Bali menjanjikan liburan yang tak terlupakan.</p>
                    </div>
                    <div class="row bg-primary rounded-bottom mx-0">
                        <div class="col-6 text-start px-0">
                            <a href="#" class="btn-hover btn text-white py-2 px-4" data-bs-toggle="modal" data-bs-target="#imageModal" data-img-src="{{ asset('travel/img/bali.jpg') }}">Read More</a>
                        </div>
                        <div class="col-6 text-end px-0">
                            <a href="{{ route('booking') }}" class="btn-hover btn text-white py-2 px-4">Book Now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="packages-item">
                <div class="packages-img">
                    <img src="{{ asset('travel/img/packages-3.jpg') }}" class="img-fluid w-100 rounded-top" alt="Image">
                    <div class="packages-info d-flex border border-start-0 border-end-0 position-absolute" style="width: 100%; bottom: 0; left: 0; z-index: 5;">
                        <small class="flex-fill text-center border-end py-2"><i class="fa fa-map-marker-alt me-2"></i>Bromo</small>
                        <small class="flex-fill text-center border-end py-2"><i class="fa fa-calendar-alt me-2"></i>1 days</small>
                        <small class="flex-fill text-center py-2"><i class="fa fa-user me-2"></i>/pax</small>
                    </div>
                    <div class="packages-price py-2 px-4">IDR 450k</div>
                </div>
                <div class="packages-content bg-light">
                    <div class="p-4 pb-0">
                        <h5 class="mb-0">Bromo Midnight</h5>
                        <small class="text-uppercase">Hotel Deals</small>
                        <div class="mb-3">
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                        </div>
                        <p class="mb-4">Gunung Bromo, ikon wisata di Jawa Timur, menawarkan panorama matahari terbit yang memukau dan lanskap vulkanik yang dramatis. Berada di tengah lautan pasir yang luas.</p>
                    </div>
                    <div class="row bg-primary rounded-bottom mx-0">
                        <div class="col-6 text-start px-0">
                            <a href="#" class="btn-hover btn text-white py-2 px-4" data-bs-toggle="modal" data-bs-target="#imageModal" data-img-src="{{ asset('travel/img/bromo.jpg') }}">Read More</a>
                        </div>
                        <div class="col-6 text-end px-0">
                            <a href="{{ route('booking') }}" class="btn-hover btn text-white py-2 px-4">Book Now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="packages-item">
                <div class="packages-img">
                    <img src="{{ asset('travel/img/packages-4.jpg') }}" class="img-fluid w-100 rounded-top" alt="Image">
                    <div class="packages-info d-flex border border-start-0 border-end-0 position-absolute" style="width: 100%; bottom: 0; left: 0; z-index: 5;">
                        <small class="flex-fill text-center border-end py-2"><i class="fa fa-map-marker-alt me-2"></i>Jogja</small>
                        <small class="flex-fill text-center border-end py-2"><i class="fa fa-calendar-alt me-2"></i>1 days</small>
                        <small class="flex-fill text-center py-2"><i class="fa fa-user me-2"></i>/pax</small>
                    </div>
                    <div class="packages-price py-2 px-4">IDR 295K</div>
                </div>
                <div class="packages-content bg-light">
                    <div class="p-4 pb-0">
                        <h5 class="mb-0">Tour DeJogja</h5>
                        <small class="text-uppercase">Hotel Deals</small>
                        <div class="mb-3">
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                        </div>
                        <p class="mb-4">Yogyakarta, kota istimewa, menawarkan pesona budaya yang kaya dan keindahan alam yang memukau. Di sini, Anda akan menemukan berbagai destinasi wisata yang menarik untuk dikunjungi.</p>
                    </div>
                    <div class="row bg-primary rounded-bottom mx-0">
                        <div class="col-6 text-start px-0">
                            <a href="#" class="btn-hover btn text-white py-2 px-4" data-bs-toggle="modal" data-bs-target="#imageModal" data-img-src="{{ asset('travel/img/jogja.jpg') }}">Read More</a>
                        </div>
                        <div class="col-6 text-end px-0">
                            <a href="{{ route('booking') }}" class="btn-hover btn text-white py-2 px-4">Book Now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="packages-item">
                <div class="packages-img">
                    <img src="{{ asset('travel/img/packages-6.jpg') }}" class="img-fluid w-100 rounded-top" alt="Image">
                    <div class="packages-info d-flex border border-start-0 border-end-0 position-absolute" style="width: 100%; bottom: 0; left: 0; z-index: 5;">
                        <small class="flex-fill text-center border-end py-2"><i class="fa fa-map-marker-alt me-2"></i>Dieng</small>
                        <small class="flex-fill text-center border-end py-2"><i class="fa fa-calendar-alt me-2"></i>1 days</small>
                        <small class="flex-fill text-center py-2"><i class="fa fa-user me-2"></i>/50 pax</small>
                    </div>
                    <div class="packages-price py-2 px-4">IDR 31jt</div>
                </div>
                <div class="packages-content bg-light">
                    <div class="p-4 pb-0">
                        <h5 class="mb-0">Dieng Plateau</h5>
                        <small class="text-uppercase">Hotel Deals</small>
                        <div class="mb-3">
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                        </div>
                        <p class="mb-4">Dieng, terletak di dataran tinggi Jawa Tengah, adalah surga bagi pecinta alam dengan keindahan alamnya yang menakjubkan dan kekayaan budaya yang unik. Dieng menawarkan pesona kawah aktif.</p>
                    </div>
                    <div class="row bg-primary rounded-bottom mx-0">
                        <div class="col-6 text-start px-0">
                            <a href="#" class="btn-hover btn text-white py-2 px-4" data-bs-toggle="modal" data-bs-target="#imageModal" data-img-src="{{ asset('travel/img/dieng.jpg') }}">Read More</a>
                        </div>
                        <div class="col-6 text-end px-0">
                            <a href="{{ route('booking') }}" class="btn-hover btn text-white py-2 px-4">Book Now</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Add more packages items as needed -->

        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Image Preview</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <img id="modalImage" src="" class="img-fluid" alt="Large Image">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var imageModal = document.getElementById('imageModal');
        imageModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget;
            var imgSrc = button.getAttribute('data-img-src');
            var modalImage = imageModal.querySelector('#modalImage');
            modalImage.src = imgSrc;
        });
    });
</script>

@endsection
