<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <link
      rel="apple-touch-icon"
      sizes="76x76"
      href="{{ asset('../assets/img/apple-icon.png') }}"
    />
    <link rel="icon" type="image/png" href="{{ asset('../assets/img/favicon.png') }}" />

    <!--     Fonts and icons     -->
    <link
      href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|Noto+Sans:300,400,500,600,700,800|PT+Mono:300,400,500,600,700"
      rel="stylesheet"
    />
    <!-- Nucleo Icons -->
    <link href="{{ asset('../assets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('../assets/css/nucleo-svg.css" rel="stylesheet') }}" />
    <!-- Font Awesome Icons -->
    <script
      src="https://kit.fontawesome.com/349ee9c857.js"
      crossorigin="anonymous"
    ></script>
    <link href="{{ asset('../assets/css/nucleo-svg.css" rel="stylesheet') }}" />
    <!-- CSS Files -->
    <link
      id="pagestyle"
      href="{{ asset('../assets/css/corporate-ui-dashboard.css?v=1.0.0') }}"
      rel="stylesheet"
    />
    <style>
        .card-plain {
          border: 2px solid #ddddddf7; /* Sesuaikan warna dan lebar garis sesuai kebutuhan */
          border-radius: 5px; /* Sesuaikan radius sudut sesuai kebutuhan */
          padding: 20px; /* Sesuaikan padding sesuai kebutuhan */
        }
      </style>
  </head>

  <body class="">
    <div class="container position-sticky z-index-sticky top-0">
      <div class="row">
        <div class="col-12">

        </div>
      </div>
    </div>
    <main class="main-content mt-0">
      <section>
        <div class="page-header min-vh-100">
          <div class="container">
            <div class="row">
              <div class="col-xl-4 col-md-6 d-flex flex-column mx-auto">
                <div class="card card-plain mt-8">
                    <div class="card-header pb-0 text-center bg-transparent">
                        <img src="{{ asset('../assets/img/LOgo MCL.jpg') }}" alt="LOgo MCL" class="img-fluid mb-2" style="max-width: 100px;">
                        <h3 class="font-weight-black text-dark" style="font-size: 25px; margin-bottom: 2;">Sign In</h3>
                      <p class="mb-0">Welcome back! Please enter your details.</p>
                    </div>
                  <div class="card-body">
                    <form role="form" a>
                      <label>Name</label>
                      <div class="mb-3">
                        <input
                          type="text"
                          class="form-control"
                          placeholder="Enter your name"
                          aria-label="Name"
                          aria-describedby="name-addon"
                        />
                      </div>
                      <label>Email Address</label>
                      <div class="mb-3">
                        <input
                          type="email"
                          class="form-control"
                          placeholder="Enter your email address"
                          aria-label="Email"
                          aria-describedby="email-addon"
                        />
                      </div>
                      <label>Password</label>
                      <div class="mb-3">
                        <input
                          type="email"
                          class="form-control"
                          placeholder="Enter password"
                          aria-label="Password"
                          aria-describedby="password-addon"
                        />
                      </div>
                      <div class="d-flex align-items-center">
                        <div class="form-check form-check-info text-left mb-0">
                          <input
                            class="form-check-input"
                            type="checkbox"
                            value=""
                            id="flexCheckDefault"
                          />
                          <label
                            class="font-weight-normal text-dark mb-0"
                            for="flexCheckDefault"
                          >
                            Remember for 14 days
                          </label>
                        </div>
                        <a
                          href="javascript:;"
                          class="text-xs font-weight-bold ms-auto"
                          >Forgot password</a
                        >
                      </div>
                      <div class="text-center">
                        <button
                          type="button"
                          class="btn btn-dark w-100 mt-4 mb-3"
                        >
                          Sign in
                        </button>
                        <button
                          type="button"
                          class="btn btn-white btn-icon w-100 mb-3"
                        >
                          <span class="btn-inner--icon me-1">
                            <img
                              class="w-5"
                              src="{{ asset('../assets/img/logos/google-logo.svg') }}"
                              alt="google-logo"
                            />
                          </span>
                          <span class="btn-inner--text"
                            >Sign in with Google</span
                          >
                        </button>
                      </div>
                    </form>
                  </div>
                  <div class="card-footer text-center pt-0 px-lg-2 px-1">
                    <p class="mb-4 text-xs mx-auto">
                      Don't have an account?
                      <a href="javascript:;" class="text-dark font-weight-bold"
                        >Sign up</a
                      >
                    </p>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
      </section>
    </main>
    <!--   Core JS Files   -->
    <script src="{{ asset('../assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('../assets/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('../assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('../assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
    <script>
      var win = navigator.platform.indexOf("Win") > -1;
      if (win && document.querySelector("#sidenav-scrollbar")) {
        var options = {
          damping: "0.5",
        };
        Scrollbar.init(document.querySelector("#sidenav-scrollbar"), options);
      }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Corporate UI Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('../assets/js/corporate-ui-dashboard.min.js?v=1.0.0') }}"></script>
  </body>
</html>
