  <div class="app-menu navbar-menu border-end">
      <!-- LOGO -->
      <div class="navbar-brand-box">
          <!-- Dark Logo-->
          <a href="{{ route('dashboard') }}" class="logo logo-dark">
              <span class="logo-sm">
                  Meeting
              </span>
              <span class="logo-lg">
                  Meeting Room App
              </span>
          </a>
          <!-- Light Logo-->
          <a href="{{ route('dashboard') }}" class="logo logo-light">
              <span class="logo-sm">
                  Meeting
              </span>
              <span class="logo-lg">
                  Meeting Room App
              </span>
          </a>
          <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
              id="vertical-hover">
              <i class="ri-record-circle-line"></i>
          </button>
      </div>

      <div id="scrollbar">
          <div class="container-fluid">

              <div id="two-column-menu">
              </div>
              <br>

              <ul class="navbar-nav mb-4" id="navbar-nav">
                  <li class="nav-item">
                      <a class="nav-link menu-link" href="{{ route('dashboard') }}" role="button" aria-expanded="true"
                          aria-controls="sidebarDashboards">
                          <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Dashboards</span>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link menu-link" href="{{ route('meetingrooms.index') }}" role="button"
                          aria-expanded="true" aria-controls="sidebarDashboards">
                          <x-svg-icon /> <span data-key="t-dashboards">Meeting Rooms</span>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link menu-link" href="{{ route('bookingroom.index') }}" role="button"
                          aria-expanded="true" aria-controls="sidebarDashboards">
                          <i class="ri-apps-2-line"></i> <span data-key="t-dashboards">Booking</span>
                      </a>
                  </li>


                  {{-- <li class="nav-item">
                      <a href="{{ route('bookingroom.index') }}" class="nav-link">
                          <i class="ri-apps-2-line"></i> Booking </span></a>
                  </li> --}}



                  </li> <!-- end Dashboard Menu -->

              </ul>
          </div>
          <!-- Sidebar -->
      </div>

      <div class="sidebar-background"></div>
  </div>
