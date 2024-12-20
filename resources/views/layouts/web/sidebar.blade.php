<div class="sidebar" data-background-color="dark">
    <div class="sidebar-logo">
      <!-- Logo Header -->
      <div class="logo-header" data-background-color="dark">
        <a href="index.html" class="logo">
            @if(empty($csetting) || empty($csetting['image']))
                <img
                    src="{{ asset('assets/img/logo.png') }}"
                    alt="navbar brand"
                    class="navbar-brand"
                    style="width:150px;height:50px"
                />
            @else
                <img
                    src="{{ asset('assets/img/' . $csetting['image']) }}"
                    alt="navbar brand"
                    class="navbar-brand"
                    style="width:150px;height:50px"
                />
            @endif
        </a>
        <div class="nav-toggle">
          <button class="btn btn-toggle toggle-sidebar">
            <i class="gg-menu-right"></i>
          </button>
          <button class="btn btn-toggle sidenav-toggler">
            <i class="gg-menu-left"></i>
          </button>
        </div>
        <button class="topbar-toggler more">
          <i class="gg-more-vertical-alt"></i>
        </button>
      </div>
      <!-- End Logo Header -->
    </div>
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
      <div class="sidebar-content">
        <ul class="nav nav-secondary">
          <li class="nav-item active">
            <a
              href="{{route('dashboard')}}"
              class="collapsed"
              aria-expanded="false"
            >
              <i class="fas fa-home"></i>
              <p>Dashboard</p>
            </a>

          </li>
          <li class="nav-section">
            <span class="sidebar-mini-icon">
              <i class="fa fa-ellipsis-h"></i>
            </span>
            <h4 class="text-section">BOOKINGS AND REPORTS</h4>
          </li>
          <li class="nav-item">
            <a href="{{route('allbooking')}}">
              <i class="fas fa-layer-group"></i>
              <p>Booking</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('allpromolist')}}">
              <i class="fas fa-th-list"></i>
              <p>Promo code</p>
            </a>
          </li>
          <li class="nav-item">
            <a  href="{{route('allterminal')}}">
              <i class="fas fa-dollar-sign"></i>
              <p>Price</p>
            </a>
          </li>
           <li class="nav-item">
            <a  href="{{route('allbookingprice')}}">
              <i class="fas fa-wallet"></i>
              <p>Booking Price</p>
            </a>
          </li>
          <li class="nav-item">
            <a data-bs-toggle="collapse" href="#tables">
              <i class="fas fa-clipboard-list"></i>
              <p>Reports</p>
              <span class="caret"></span>
            </a>
            <div class="collapse" id="tables">
              <ul class="nav nav-collapse">
                <li>
                  <a href="{{route('todayreport')}}">
                    <span class="sub-item">Today Booking</span>
                  </a>
                </li>

                <li>
                  <a href="{{route('currentmonthreport')}}">
                    <span class="sub-item">Current Month Booking</span>
                  </a>
                </li>
               
              </ul>
            </div>
          </li>

              <li class="nav-section">
                <span class="sidebar-mini-icon">
                  <i class="fa fa-ellipsis-h"></i>
                </span>
                <h4 class="text-section">SETTINGS</h4>
              </li>

              <li class="nav-item">
                <a href="{{route('alluserlist')}}">
                  <i class="fas fa-user"></i>
                  <p>Users</p>

                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('allcontact')}}">
                  <i class="fas fa-phone"></i>
                  <p>Contact</p>
                </a>
              </li>
              <li class="nav-item">
                <a data-bs-toggle="collapse" href="#tables1">
                  <i class="fas fa-table"></i>
                  <p>Setting</p>
                  <span class="caret"></span>
                </a>
                <div class="collapse" id="tables1">
                  <ul class="nav nav-collapse">
                    <li>
                      <a href="{{route('csetting')}}">
                        <span class="sub-item">Company</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
        </ul>
      </div>
    </div>
  </div>
