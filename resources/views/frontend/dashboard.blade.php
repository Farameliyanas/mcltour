@extends('layout.app')

@section('tittle')
    Dashboard
@endsection

@section('content')

@include('layout.header')
@include('layout.sidebar')
<body class="g-sidenav-show  bg-gray-100">

  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <div class="container-fluid py-4 px-5">
      <div class="row">
        <div class="col-md-12">
          <div class="d-md-flex align-items-center mb-3 mx-2">
            <div class="mb-md-0 mb-3">
              <h3 class="font-weight-bold mb-0">Hello, Noah</h3>
              <p class="mb-0">Apps you might like!</p>
            </div>
            <button type="button" class="btn btn-sm btn-white btn-icon d-flex align-items-center mb-0 ms-md-auto mb-sm-0 mb-2 me-2">
              <span class="btn-inner--icon">
                <span class="p-1 bg-success rounded-circle d-flex ms-auto me-2">
                  <span class="visually-hidden">New</span>
                </span>
              </span>
              <span class="btn-inner--text">Messages</span>
            </button>
            <button type="button" class="btn btn-sm btn-dark btn-icon d-flex align-items-center mb-0">
              <span class="btn-inner--icon">
                <svg width="16" height="16" xmlns="https://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="d-block me-2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
                </svg>
              </span>
              <span class="btn-inner--text">Sync</span>
            </button>
          </div>
        </div>
      </div>
      <hr class="my-0">
      <div class="row">
        <div class="position-relative overflow-hidden">
          <div class="swiper mySwiper mt-4 mb-2">
            <div class="swiper-wrapper">
              <div class="swiper-slide">
              </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="swiper-button-prev"></div>
          <div class="swiper-button-next"></div>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-12">
          <div class="card shadow-xs border">
            <div class="card-header pb-0">
              <div class="d-sm-flex align-items-center mb-3">
              </div>
            <div class="card-body p-3">
              <div class="chart mt-n6">
                <canvas id="chart-line" class="chart-canvas" height="300"></canvas>
              </div>
            </div>
          </div>
        </div>
      </div>
      @include('layout.footer')
    </div>

</body>
@endsection
