<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>ADMIN | Login</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <link rel="apple-touch-icon" sizes="57x57" href="/img/fav-icon/apple-icon-57x57.png">
  <link rel="apple-touch-icon" sizes="60x60" href="/img/fav-icon/apple-icon-60x60.png">
  <link rel="apple-touch-icon" sizes="72x72" href="/img/fav-icon/apple-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="76x76" href="/img/fav-icon/apple-icon-76x76.png">
  <link rel="apple-touch-icon" sizes="114x114" href="/img/fav-icon/apple-icon-114x114.png">
  <link rel="apple-touch-icon" sizes="120x120" href="/img/fav-icon/apple-icon-120x120.png">
  <link rel="apple-touch-icon" sizes="144x144" href="/img/fav-icon/apple-icon-144x144.png">
  <link rel="apple-touch-icon" sizes="152x152" href="/img/fav-icon/apple-icon-152x152.png">
  <link rel="apple-touch-icon" sizes="180x180" href="/img/fav-icon/apple-icon-180x180.png">
  <link rel="icon" type="image/png" sizes="192x192" href="/img/fav-icon/android-icon-192x192.png">
  <link rel="icon" type="image/png" sizes="32x32" href="/img/fav-icon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="96x96" href="/img/fav-icon/favicon-96x96.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/img/fav-icon/favicon-16x16.png">
  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="/admin_assets/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/admin_assets/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="/admin_assets/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="/admin_assets/assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="/admin_assets/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="/admin_assets/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="/admin_assets/assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="/admin_assets/assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: ADMIN
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Updated: Apr 20 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-6 col-md-6 col-sm-12 col-12 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="/admin" class="logo d-flex align-items-center w-auto">
                  <img src="/admin_assets/assets/img/logo.jpg" alt="" height="100px" width="auto">
                  <!-- <span class="d-none d-lg-block">ADMIN</span> -->
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">
                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                    <p class="text-center small">Enter your username & password to login</p>
                  </div>
                  @if ($errors->any())
                  <div class="alert alert-danger">
                    <ul>
                      @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                      @endforeach
                    </ul>
                  </div>
                  @endif

                  <form class="row g-3 needs-validation" novalidate method="post" action="{{ route('doAdminLogin') }}">
                    {{ csrf_field() }}
                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Email</label>
                      <div class="input-group has-validation">
                        <input type="text" name="email" class="form-control" id="yourUsername" required>
                        <div class="invalid-feedback">Please enter your email.</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="yourPassword" required>
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Login</button>
                    </div>
                    <div class="col-12">
                      @error('excel_file')
                      <p class="text-primary">{{$message}}</p>
                      @enderror
                    </div>
                  </form>
                </div>

              </div>

              <div class="credits">
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="/admin_assets/assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="/admin_assets/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/admin_assets/assets/vendor/chart.js/chart.umd.js"></script>
  <script src="/admin_assets/assets/vendor/echarts/echarts.min.js"></script>
  <script src="/admin_assets/assets/vendor/quill/quill.js"></script>
  <script src="/admin_assets/assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="/admin_assets/assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="/admin_assets/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="/admin_assets/assets/js/main.js"></script>

</body>

</html>