 <!-- Navbar & Hero Start -->

 <div class="container-fluid position-relative p-0">
     <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
         <a href="" class="navbar-brand p-0">
             <h1 class="m-0"><i class="fa fa-map-marker-alt me-3"></i>Travela</h1>
             <!-- <img src="img/logo.png" alt="Logo"> -->
         </a>
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
             <span class="fa fa-bars"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarCollapse">
             <div class="navbar-nav ms-auto py-0">
                 <a href="{{ route('home') }}" class="nav-item nav-link active">Home</a>
                 <a href="{{ route('about') }}" class="nav-item nav-link">About</a>
                 <a href="{{ route('services') }}" class="nav-item nav-link">Services</a>
                 <a href="{{ route('packages') }}" class="nav-item nav-link">Packages</a>
                 <a href="{{ route('blog') }}" class="nav-item nav-link">Blog</a>
                 <div class="nav-item dropdown">
                     <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                     <div class="dropdown-menu m-0">
                         <a href="{{ route('destination') }}" class="dropdown-item">Destination</a>
                         <a href="{{ route('explore_tour') }}" class="dropdown-item">Explore Tour</a>
                         <a href="{{ route('booking') }}" class="dropdown-item">Travel Booking</a>
                         <a href="{{ route('gallery') }}" class="dropdown-item">Our Gallery</a>
                         <a href="{{ route('travel_guides') }}" class="dropdown-item">Travel Guides</a>
                         <a href="{{ route('testimonial') }}" class="dropdown-item">Testimonial</a>
                         <a href="{{ route('404') }}" class="dropdown-item">404 Page</a>
                     </div>
                 </div>
                 <a href="{{ route('contact') }}" class="nav-item nav-link">Contact</a>

             </div>
             <a href="" class="btn btn-primary rounded-pill py-2 px-4 ms-lg-4">Book Now</a>
         </div>
     </nav>

     <!-- Carousel Start -->
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