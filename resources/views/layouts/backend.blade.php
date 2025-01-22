<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Bandung Merch|Dasboard</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="/vendor/stellar/assets/vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="/vendor/stellar/assets/vendors/flag-icon-css/css/flag-icons.min.css">
    <link rel="stylesheet" href="/vendor/stellar/assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="/vendor/stellar/assets/vendors/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" href="/vendor/stellar/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="/vendor/stellar/assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="/vendor/stellar/assets/vendors/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="/vendor/stellar/assets/vendors/chartist/chartist.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="/vendor/stellar/assets/css/vertical-light-layout/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="/vendor/stellar//vendor/stellar/assets/images/favicon.png" />
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      <nav class="flex-row p-0 navbar default-layout-navbar col-lg-12 col-12 fixed-top d-flex">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
          <a class="navbar-brand brand-logo" href="/dashboard">
            <img src="/vendor/stellar/assets/images/logo.svg" alt="logo" class="logo-dark" />
            <img src="/vendor/stellar/assets/images/logo-light.svg" alt="logo-light" class="logo-light">
          </a>
          <a class="navbar-brand brand-logo-mini" href="index.html"><img src="/vendor/stellar/assets/images/logo-mini.svg" alt="logo" /></a>
          <button class="navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="icon-menu"></span>
          </button>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center">
            <h5 class="mb-0 font-weight-medium d-none d-lg-flex text-uppercase">{{ $title }}</h5>
          <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item dropdown d-none d-xl-inline-flex user-dropdown">
              <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                  <img class="img-xs rounded-circle ms-2" src={{ asset('assets/no_user.png') }} alt="Profile image"> <span class="font-weight-normal text-uppercase"> {{ auth()->user()->username }} </span></a>
                  <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                <div class="text-center dropdown-header">
                  <img class="img-md rounded-circle" src={{ asset('assets/no_user.png') }} width="100" alt="Profile image">
                  <p class="mt-3 mb-1">{{ auth()->user()->name }}</p>
                  <p class="mb-0 font-weight-light text-muted">{{ auth()->user()->email }}</p>
                </div>
                <a href="/logout" class="dropdown-item"><i class="dropdown-item-icon icon-power text-primary"></i>Sign Out</a>
              </div>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="icon-menu"></span>
          </button>
        </div>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        @include('layouts.sidebar')

        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            @yield('content')
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="float-none mt-1 text-center float-sm-right d-block mt-sm-0">Hand-crafted & made with <i class="icon-heart text-danger"></i></span>
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>

      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="/vendor/stellar/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="/vendor/stellar/assets/vendors/chart.js/chart.umd.js"></script>
    <script src="/vendor/stellar/assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
    <script src="/vendor/stellar/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="/vendor/stellar/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script src="/vendor/stellar/assets/vendors/moment/moment.min.js"></script>
    <script src="/vendor/stellar/assets/vendors/daterangepicker/daterangepicker.js"></script>
    <script src="/vendor/stellar/assets/vendors/chartist/chartist.min.js"></script>
    <script src="/vendor/stellar/assets/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="/vendor/stellar/assets/js/jquery.cookie.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="/vendor/stellar/assets/js/off-canvas.js"></script>
    <script src="/vendor/stellar/assets/js/hoverable-collapse.js"></script>
    <script src="/vendor/stellar/assets/js/misc.js"></script>
    <script src="/vendor/stellar/assets/js/settings.js"></script>
    <script src="/vendor/stellar/assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="/vendor/stellar/assets/js/dashboard.js"></script>
    <!-- End custom js for this page -->

    @yield('scripts')
  </body>
</html>
