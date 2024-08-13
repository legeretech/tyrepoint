<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>ADMIN | Dashboard</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <!-- Favicons -->
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


  <link href="/admin_assets/assets/css/style.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="/adminindex" class="logo d-flex align-items-center">
        <img src="/admin_assets/assets/img/logo.jpg" alt="">
        <!-- <span class="d-none d-lg-block">TYRE POINT</span> -->
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <!-- <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div>End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->



        <li class="nav-item dropdown pe-4">
          <a class="nav-link nav-profile d-flex align-items-center pe-4" href="#" data-bs-toggle="dropdown">
            <!-- <img src="/admin_assets/assets/img/profile-img.jpg" alt="Profile" class="rounded-circle"> -->
            <center><span class="d-none d-md-block ps-4"></center>
              <h6 class="mt-2 text-uppercase"><b>{{auth()->user()->name}}</b></h6>
            </span>
          </a><!-- End Profile Image Icon -->
          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
          <h6 class="text-uppercase"><b>{{auth()->user()->role->role}}</b></h6>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <a class="dropdown-item d-flex align-items-center" href="/admin/myprofile">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <a class="dropdown-item d-flex align-items-center" href="/admin/logout">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>
          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
      <li class="nav-item">
        <a class="nav-link " href="/admin/dashboard">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>
      @if(auth()->user()->role->role === 'admin')
      <li class="nav-item">
        <a class="nav-link collapsed" href="/admin/shop">
          <i class="ri-store-3-fill"></i>
          <span>Shops</span>
        </a>
      </li>
      @endif
      <li class="nav-item">
        <a class="nav-link collapsed" href="/admin/order">
          <i class="ri-list-check"></i>
          <span>Order Details</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="/admin/vehicle">
          <i class="bx bx-car"></i>
          <span>Vehicle Info</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="/admin/customer">
          <i class="bi bi-people"></i>
          <span>Customer</span>
        </a>
      </li>

      @if(auth()->user()->role->role === 'admin')
      <li class="nav-item">
        <a class="nav-link collapsed" href="/admin/alignment">
          <i class="bx bxs-grid-alt"></i>
          <span>Wheel Alignments</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bx bxs-category"></i><span>Categories</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li class="nav-item">
            <a class="nav-link collapsed" href="/admin/category">
              <i class="bx bxs-category-alt"></i>
              <span>Category</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link collapsed" href="/admin/subcategory">
              <i class="bx bxs-category-alt"></i>
              <span>Sub Category</span>
            </a>
          </li>
        </ul>
      </li>
      <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="/admin/coupon">
          <i class="ri-coupon-3-fill"></i>
          <span>Coupons</span>
        </a>
      </li> -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="/admin/gallery">
          <i class="bx bxs-image"></i>
          <span>Gallery</span>
        </a>
      </li>
     
      <li class="nav-item">
        <a class="nav-link collapsed" href="/admin/banner">
          <i class="bx bxs-card"></i>
          <span>Banner</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="/admin/news">
          <i class="bx bx-news"></i>
          <span>News</span>
        </a>
      </li>
      @endif
      <li class="nav-item">
        <a class="nav-link collapsed" href="/admin/daily_month_report">
          <i class="ri-calendar-2-line"></i>
          <span>Daily Month Report</span>
        </a>
      </li>
    </ul>
  </aside><!-- End Sidebar-->


  <main id="main" class="main">
    @yield('admin-body')

  </main>
  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer" style=" text-align:center; position: fixed; bottom: 0; left: 0; width: 100%;">
    <div class="copyright">
      &copy; Copyright <strong><span></span></strong>. All Rights Reserved
    </div>
    <!-- <div class="credits">
      All the links in the footer should remain intact.
      You can delete the links only if you purchased the pro version.
      Licensing information: https://bootstrapmade.com/license/
      Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div> -->
</footer><!-- End Footer -->


  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="/admin_assets/assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="/admin_assets/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/admin_assets/assets/vendor/chart.js/chart.umd.js"></script>
  <script src="/admin_assets/assets/vendor/echarts/echarts.min.js"></script>
  <script src="/admin_assets/assets/vendor/quill/quill.js"></script>
  <script src="/admin_assets/assets/vendor/simple-datatables/simple-datatables.js"></script>
<script></script>
  <script src="/admin_assets/assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="/admin_assets/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="/admin_assets/assets/js/main.js"></script>

</body>

</html>