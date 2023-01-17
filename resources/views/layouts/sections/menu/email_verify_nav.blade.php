          <!-- Navbar -->

          <nav class="layout-navbar navbar navbar-expand-xl align-items-center bg-navbar-theme" id="layout-navbar">
            <div class="container-fluid">
              <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                  <i class="bx bx-menu bx-sm"></i>
                </a>
              </div>

              <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
         
                <ul class="navbar-nav flex-row align-items-center ms-auto">
                  <!-- User -->
                  <ul class="navbar-nav ms-auto">
                    <!-- Authentication Links -->
         
                </ul>
                </ul>
                   <!-- Navbar -->

          <nav class="layout-navbar navbar navbar-expand-xl align-items-center bg-navbar-theme" id="layout-navbar">
            <div class="container-fluid">
              <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                  <i class="bx bx-menu bx-sm"></i>
                </a>
              </div>

              <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                <!-- Search -->
                {{-- <div class="navbar-nav align-items-center">
                  <div class="nav-item navbar-search-wrapper mb-0">
                    <a class="nav-item nav-link search-toggler px-0" href="javascript:void(0);">
                      <i class="bx bx-search-alt bx-sm"></i>
                      <span class="d-none d-md-inline-block text-muted">Search (Ctrl+/)</span>
                    </a>
                  </div>
                </div> --}}
                <!-- /Search -->

                <ul class="navbar-nav flex-row align-items-center ms-auto">
               

          

               

       

                  <!-- User -->
                  <li class="nav-item navbar-dropdown dropdown-user dropdown">
                    <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                      <div class="avatar avatar-online">
                        <img src="{{ asset(Auth::user()->avatar) }}" onerror="this.onerror=null;this.src='../assets/img/avatars/1.png';" alt class="rounded-circle" />
                      </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                      <li>
                        <a class="dropdown-item" href="{{ route('user.show', auth()->user()->id) }}">
                          <div class="d-flex">
                            <div class="flex-shrink-0 me-3">
                              <div class="avatar avatar-online">
                                <img src="{{ asset(Auth::user()->avatar) }}" onerror="this.onerror=null;this.src='../assets/img/avatars/1.png';" alt class="rounded-circle" />
                              </div>
                            </div>
                            <div class="flex-grow-1">
                              <span class="fw-semibold d-block lh-1">{{ auth()->user()->fullname }}</span>                              
                             
                              <small>{{ Auth::user()->role->role_name }}</small>
                            </div>
                          </div>
                        </a>
                      </li>
                      <li>
                        <div class="dropdown-divider"></div>
                      </li>
                      <li>
                        <a class="dropdown-item" href="{{ route('user.show', auth()->user()->id) }}">
                          <i class="bx bx-user me-2"></i>
                          <span class="align-middle">My Profile</span>
                        </a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="pages-account-settings-account.html">
                          <i class="bx bx-cog me-2"></i>
                          <span class="align-middle">Settings</span>
                        </a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="pages-account-settings-billing.html">
                          <span class="d-flex align-items-center align-middle">
                            <i class="flex-shrink-0 bx bx-credit-card me-2"></i>
                            <span class="flex-grow-1 align-middle">Billing</span>
                            <span class="flex-shrink-0 badge badge-center rounded-pill bg-danger w-px-20 h-px-20"
                              >4</span
                            >
                          </span>
                        </a>
                      </li>
                      <li>
                        <div class="dropdown-divider"></div>
                      </li>
                      <li>
                        <a class="dropdown-item" href="pages-help-center-landing.html">
                          <i class="bx bx-support me-2"></i>
                          <span class="align-middle">Help</span>
                        </a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="pages-faq.html">
                          <i class="bx bx-help-circle me-2"></i>
                          <span class="align-middle">FAQ</span>
                        </a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="pages-pricing.html">
                          <i class="bx bx-dollar me-2"></i>
                          <span class="align-middle">Pricing</span>
                        </a>
                      </li>
                      <li>
                        <div class="dropdown-divider"></div>
                      </li>
                      <li>
                        <form action="{{ route('user.logout') }}" method="POST">
                          @csrf
                          <button type="submit" class="dropdown-item"  >
                            <i class="bx bx-power-off me-2"></i>
                            <span class="align-middle">Log Out</span>
                          </button>
                        </form>
                       
                      </li>
                    </ul>
                  </li>
                  <!--/ User -->
                </ul>
              </div>

              <!-- Search Small Screens -->
              {{-- <div class="navbar-search-wrapper search-input-wrapper d-none">
                <input
                  type="text"
                  class="form-control search-input container-fluid border-0"
                  placeholder="Search..."
                  aria-label="Search..."
                />
                <i class="bx bx-x bx-sm search-toggler cursor-pointer"></i>
              </div> --}}
            </div>
          </nav>

          <!-- / Navbar -->
                  <!--/ User -->
                </ul>
              </div>

        
            </div>
          </nav>

          <!-- / Navbar -->