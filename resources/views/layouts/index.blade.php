<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Aplikasi Ticket</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{url('assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css')}}">
  <link rel="stylesheet" href="{{url('assets/vendors/css/vendor.bundle.base.css')}}">
  <link rel="stylesheet" href="{{url('assets/vendors/css/vendor.bundle.addons.css')}}">
  <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
  <link rel="stylesheet" href="{{url('assets/vendors/iconfonts/font-awesome/css/font-awesome.css')}}">
  <link rel="stylesheet" href="{{url('assets/css/home.css')}}">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{url('assets/css/style.css')}}">
  <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap4.min.css')}}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{url('assets/images/favicon.png')}}" />
</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
        <a class="navbar-brand brand-logo" href="/">
          <img src="{{url('images/nexusv1.png')}}" alt="logo" />
        </a>
        <a class="navbar-brand brand-logo-mini" href="/">
          <img src="{{url('images/nexusv1.png')}}" alt="logo" />
        </a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center">
        <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item dropdown d-none d-xl-inline-block">
              <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <span class="profile-text">Hello, {{ Auth::user()->fullname }}</span>
                @if(Auth::user()->gambar)
                <img class="img-xs rounded-circle" src="{{url('images/user', Auth::user()->gambar)}}" alt="Profile image">
                @else
                <img class="img-xs rounded-circle" src="{{url('images/user/default.png')}}" alt="Profile image">
                @endif
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                <a class="dropdown-item mt-2" href="{{route('user.edit', Auth::user()->id)}}">
                  Manage Accounts
                </a>
                <a class="dropdown-item" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                  </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
                </form>
              </div>
            </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      @section('sidebar')
          @include('layouts.sidebar',['user' => Auth::User()])
      @show
      <div class="main-panel">
        <div class="content-wrapper">
      @yield('content')
      <!-- main-panel ends -->
      </div>
        
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
    <div class="container-fluid clearfix">
        <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2018
          Website design by <a href="#" target="_blank" title="Newbier">ENC &copy;orp.</a> All rights reserved.</span>
        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with
          <i class="mdi mdi-heart text-danger"></i>
          <i class="mdi mdi-heart text-danger"></i>
          <i class="mdi mdi-heart text-danger"></i>
        </span>
    </div>
</footer>        <!-- partial -->
      </div>
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="{{url('assets/vendors/js/vendor.bundle.base.js')}}"></script>
  <script src="{{url('assets/vendors/js/vendor.bundle.addons.js')}}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="{{url('assets/js/off-canvas.js')}}"></script>
  <script src="{{url('assets/js/misc.js')}}"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{{url('assets/js/dashboard.js')}}"></script>
  <!-- End custom js for this page-->
  
  <script src="{{url('assets/js/jquery.nicescroll.js')}}"></script>
  <script src="{{url('assets/js/scripts.js')}}"></script>
  <script src="{{url('assets/js/jquery.nicescroll.js')}}"></script>
  <script src="{{url('assets/js/jquery.dataTables.min.js')}}"></script>
  <script src="{{url('assets/js/dataTables.bootstrap4.min.js')}}"></script>
  <script src="{{url('assets/js/sweetalert2.all.js')}}"></script>
  <script src="{{url('assets/js/select2.min.js')}}"></script>
  <script src="{{url('assets/js/jquery.mask.min.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>

  @include('sweet::alert')
  @section('js')

  @show
</body>

</html>
