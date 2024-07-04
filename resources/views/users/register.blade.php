<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('../assets/img/apple-icon.png') }}">
  <link rel="icon" type="image/png" href="{{ asset('../assets/img/favicon.png') }}">
  <title>
    Daftar Akun Pengguna Travel
  </title>
  <!-- Fonts and icons -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|Noto+Sans:300,400,500,600,700,800|PT+Mono:300,400,500,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="{{ asset('../assets/css/nucleo-icons.css') }}" rel="stylesheet" />
  <link href="{{ asset('../assets/css/nucleo-svg.css') }}" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/349ee9c857.js" crossorigin="anonymous"></script>
  <link href="{{ asset('../assets/css/nucleo-svg.css') }}" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="{{ asset('../assets/css/corporate-ui-dashboard.css?v=1.0.0') }}" rel="stylesheet" />
  <style>
    .card-plain {
      border: 2px solid #ddddddf7;
      border-radius: 5px;
      padding: 20px;
    }
  </style>
</head>

<body class="">

  <main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-100">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <div class="position-absolute w-40 top-0 start-0 h-100 d-md-block d-none">
              </div>
            </div>
          </div>
          <div class="col-md-4 d-flex flex-column mx-auto">
            <div class="card card-plain mt-8">
              <div class="card-header pb-0 text-center bg-transparent">
                <img src="{{ asset('../assets/img/LOgo MCL.jpg') }}" alt="LOgo MCL" class="img-fluid mb-2" style="max-width: 100px;">
                <h3 class="font-weight-black text-dark" style="font-size: 25px; margin-bottom: 2;">Sign Up</h3>
                <p class="mb-0">Nice to meet you! Please enter your details.</p>
              </div>
              <div class="card-body">
                <form role="form" method="POST" action="{{ route('register.submit') }}">
                  @csrf
                  <label>Name</label>
                  <div class="mb-3">
                    <input type="text" class="form-control" name="name" placeholder="Enter your name" aria-label="Name" aria-describedby="name-addon">
                    @error('name')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  <label>Email Address</label>
                  <div class="mb-3">
                    <input type="email" class="form-control" name="email" placeholder="Enter your email address" aria-label="Email" aria-describedby="email-addon">
                    @error('email')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  <label>Password</label>
                  <div class="mb-3">
                    <input type="password" class="form-control" name="password" placeholder="Create a password" aria-label="Password" aria-describedby="password-addon">
                    @error('password')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  <label>Alamat</label>
                  <div class="mb-3">
                    <input type="text" class="form-control" name="alamat" placeholder="Enter your address" aria-label="Alamat" aria-describedby="alamat-addon">
                    @error('alamat')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  <label>on</label>
                  <div class="mb-3">
                    <input type="number" class="form-control" name="nomor_telp" placeholder="Enter your phone number" pattern="[0-9]+" aria-label="Nomor Telepon" aria-describedby="nomor-telp-addon">
                    @error('nomor_telp')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  <label>Jenis Kelamin</label>
                  <div class="mb-3">
                    <select class="form-control" name="jenis_kelamin" aria-label="Jenis Kelamin" aria-describedby="jenis-kelamin-addon">
                      <option value="">Select gender</option>
                      <option value="Laki-laki">Laki-laki</option>
                      <option value="Perempuan">Perempuan</option>
                    </select>
                    @error('jenis_kelamin')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                   <div class="text-center">
                    <button type="submit" class="btn btn-dark w-100 mt-4 mb-3">Sign up</button>
                  </div>
                </form>
              </div>
              <div class="card-footer text-center pt-0 px-lg-2 px-1">
                <p class="mb-4 text-xs mx-auto">
                  Already have an account?
                  <a href="{{ route('login') }}" class="text-dark font-weight-bold">Sign in</a>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  <!-- Core JS Files -->
  <script src="{{ asset('../assets/js/core/popper.min.js') }}"></script>
  <script src="{{ asset('../assets/js/core/bootstrap.min.js') }}"></script>
  <script src="{{ asset('../assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
  <script src="{{ asset('../assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Corporate UI Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{ asset('../assets/js/corporate-ui-dashboard.min.js?v=1.0.0') }}"></script>
</body>

</html>