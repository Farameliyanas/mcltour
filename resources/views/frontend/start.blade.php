<!-- resources/views/home.blade.php -->

@extends('layout.app')

@section('title', 'MCLTOUR')

@section('content')
    <!-- Konten Home -->
    @include('layout.navbar')
    <!-- About Start -->
    <div class="carousel-header">
     <div id="carouselId" class="carousel slide" data-bs-ride="carousel">
         <ol class="carousel-indicators">
             <li data-bs-target="#carouselId" data-bs-slide-to="0" class="active"></li>
             <li data-bs-target="#carouselId" data-bs-slide-to="1"></li>
             <li data-bs-target="#carouselId" data-bs-slide-to="2"></li>
         </ol>
         <div class="carousel-inner" role="listbox">
             <div class="carousel-item active">
                 <img src="{{ asset('travel/img/carousel-2.jpg') }}" class="img-fluid" alt="Image">
                 <div class="carousel-caption">
                     <!-- Your caption content here -->
                 </div>
             </div>
             <div class="carousel-item">
                 <img src="{{ asset('travel/img/carousel-1.jpg') }}" class="img-fluid" alt="Image">
                 <div class="carousel-caption">
                     <!-- Your caption content here -->
                 </div>
             </div>
             <div class="carousel-item">
                 <img src="{{ asset('travel/img/carousel-3.jpg') }}" class="img-fluid" alt="Image">
                 <div class="carousel-caption">
                     <!-- Your caption content here -->
                 </div>
             </div>
         </div>
         <button class="carousel-control-prev" type="button" data-bs-target="#carouselId" data-bs-slide="prev">
             <span class="carousel-control-prev-icon btn bg-primary" aria-hidden="false"></span>
             <span class="visually-hidden">Previous</span>
         </button>
         <button class="carousel-control-next" type="button" data-bs-target="#carouselId" data-bs-slide="next">
             <span class="carousel-control-next-icon btn bg-primary" aria-hidden="false"></span>
             <span class="visually-hidden">Next</span>
         </button>
     </div>
 </div>
 <!-- Carousel End -->

@endsection
