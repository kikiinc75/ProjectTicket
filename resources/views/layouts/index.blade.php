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
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile">
            <div class="nav-link">
              <div class="user-wrapper">
                <div class="profile-image">
                  @if(Auth::user()->gambar)
                <img src="{{url('images/user', Auth::user()->gambar)}}" alt="Profile image">
                @else
                <img src="{{url('images/user/default.png')}}" alt="Profile image">
                @endif
                </div>
                <div class="text-wrapper">
                  <p class="profile-name">{{ Auth::user()->fullname }}</p>
                  <div>
                    <small class="designation text-muted">{{ Auth::user()->level }}</small>
                    <span class="status-indicator online"></span>
                  </div>
                </div>
              </div>
              <button class="btn btn-success btn-block">New Project
                <i class="mdi mdi-plus"></i>
              </button>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/">
              <i class="menu-icon mdi mdi-television"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="menu-icon mdi mdi-content-copy"></i>
              <span class="menu-title">Data Aplikasi</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="{{route('customer.index')}}">Data Customer</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link " href="{{route('user.index')}}">Data User</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#plane" aria-expanded="false" aria-controls="ui-basic">
              <i class="menu-icon fa fa-plane"></i>
              <span class="menu-title">Plane</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="plane">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link " href="{{route('planes.index')}}">Data Pesawat</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link " href="{{route('airport.index')}}">Data Airport</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link " href="{{route('planes_detail.index')}}">Data Rincian Pesawat</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#train" aria-expanded="false" aria-controls="ui-basic">
              <i class="menu-icon fa fa-train"></i>
              <span class="menu-title">Train</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="train">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link " href="{{route('trains.index')}}">Data Kereta</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link " href="{{route('station.index')}}">Data Station</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link " href="{{route('trains_detail.index')}}">Data Rincian Kereta</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#schedule" aria-expanded="false" aria-controls="ui-basic">
              <i class="menu-icon fa fa-calendar"></i>
              <span class="menu-title">Schedule</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="schedule">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link " href="{{route('planes_schedule.index')}}">Pesawat</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link " href="#">Kereta Api</a>
                </li>
              </ul>
            </div>
          </li>
        </ul>
      </nav>
      @yield('content')
      <!-- main-panel ends -->
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
  <script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('js/dataTables.bootstrap4.min.js')}}"></script>
  <script src="{{asset('js/sweetalert2.all.js')}}"></script>
  <script src="{{asset('js/select2.min.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
  @include('sweet::alert')
  @section('js')

  @show
</body>

</html>
