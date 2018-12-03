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
          @if(Auth::user()->level=='ADMIN')
          <li class="nav-item">
            <a class="nav-link" href="/">
              <i class="menu-icon mdi mdi-television"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#transaksi" aria-expanded="false" aria-controls="ui-basic">
              <i class="menu-icon mdi mdi-content-copy"></i>
              <span class="menu-title">Reservation</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="transaksi">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="{{route('planes_reservation.index')}}">Planes</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link " href="{{route('trains_reservation.index')}}">Trains</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="menu-icon fa fa-users"></i>
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
                  <a class="nav-link " href="{{route('trains_schedule.index')}}">Kereta Api</a>
                </li>
              </ul>
            </div>
          </li>
          @else
          <li class="nav-item">
            <a class="nav-link" href="/">
              <i class="menu-icon mdi mdi-television"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#transaksi" aria-expanded="false" aria-controls="ui-basic">
              <i class="menu-icon mdi mdi-content-copy"></i>
              <span class="menu-title">Reservation</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="transaksi">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="{{route('planes_reservation.index')}}">Planes</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link " href="{{route('trains_reservation.index')}}">Trains</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="menu-icon fa fa-users"></i>
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
                  <a class="nav-link " href="{{route('trains_schedule.index')}}">Kereta Api</a>
                </li>
              </ul>
            </div>
          </li>
          @endif
        </ul>
      </nav>