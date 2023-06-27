<nav class="sidebar">
      <div class="sidebar-header">
        <a href="#" class="sidebar-brand">
          Gatech<span>Blog</span>
        </a>
        <div class="sidebar-toggler not-active">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
      <div class="sidebar-body">
        <ul class="nav">
          <li class="nav-item nav-category">Main</li>
          <li class="nav-item">
            <a href="{{route('admin.dashboard')}}" class="nav-link">
              <i class="link-icon" data-feather="box"></i>
              <span class="link-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item nav-category">Mail</li>
          <!-- Property Type -->
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#mail" role="button" aria-expanded="false" aria-controls="mail">
              <i class="link-icon" data-feather="mail"></i>
              <span class="link-title">Mail</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="mail">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="{{route('admin.property.message')}}" class="nav-link">Inbox</a>
                </li>
                
              </ul>
            </div>
          </li>
          <!-- End Property Type -->

          <li class="nav-item nav-category">web apps</li>
          <!-- Property Type -->
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#propertytype" role="button" aria-expanded="false" aria-controls="propertytype">
              <i class="link-icon" data-feather="mail"></i>
              <span class="link-title">Property Type</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="propertytype">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="{{route('all.type')}}" class="nav-link">All Type</a>
                </li>
                <li class="nav-item">
                  <a href="{{route('add.type')}}" class="nav-link">Add Type</a>
                </li>
              </ul>
            </div>
          </li>
          <!-- End Property Type -->
          
          <!-- Amenities -->
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#amenities" role="button" aria-expanded="false" aria-controls="emails">
              <i class="link-icon" data-feather="user"></i>
              <span class="link-title">Amenities</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="amenities">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="{{route('all.amenities')}}" class="nav-link">All Amenities</a>
                </li>
                <li class="nav-item">
                  <a href="{{route('add.amenities')}}" class="nav-link">Add Amenities</a>
                </li>
                
              </ul>
            </div>
          </li>
          <!-- End Amenities -->
          <!-- Amenities -->
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#property" role="button" aria-expanded="false" aria-controls="emails">
              <i class="link-icon" data-feather="user"></i>
              <span class="link-title">Property</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="property">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="{{route('all.property')}}" class="nav-link">All Property</a>
                </li>
                <li class="nav-item">
                  <a href="{{route('add.property')}}" class="nav-link">Add Property</a>
                </li>
                
              </ul>
            </div>
          </li>
          <!-- End Amenities -->

          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#package_histori" role="button" aria-expanded="false" aria-controls="package_histori">
              <i class="link-icon" data-feather="user"></i>
              <span class="link-title">Package</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="package_histori">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="{{route('admin.package.history')}}" class="nav-link">Package History</a>
                </li>
              </ul>
            </div>
          </li>

          
          <li class="nav-item nav-category">User All Function</li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#uiComponents" role="button" aria-expanded="false" aria-controls="uiComponents">
              <i class="link-icon" data-feather="feather"></i>
              <span class="link-title">Manage Agent</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="uiComponents">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="{{route('all.agent')}}" class="nav-link">All Agent</a>
                </li>
                <li class="nav-item">
                  <a href="" class="nav-link">Add Agent</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#icons" role="button" aria-expanded="false" aria-controls="icons">
              <i class="link-icon" data-feather="smile"></i>
              <span class="link-title">Icons</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="icons">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="pages/icons/feather-icons.html" class="nav-link">Feather Icons</a>
                </li>
                <li class="nav-item">
                  <a href="pages/icons/flag-icons.html" class="nav-link">Flag Icons</a>
                </li>
                <li class="nav-item">
                  <a href="pages/icons/mdi-icons.html" class="nav-link">Mdi Icons</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item nav-category">Pages</li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#general-pages" role="button" aria-expanded="false" aria-controls="general-pages">
              <i class="link-icon" data-feather="book"></i>
              <span class="link-title">Special pages</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="general-pages">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="pages/general/blank-page.html" class="nav-link">Blank page</a>
                </li>
                <li class="nav-item">
                  <a href="pages/general/faq.html" class="nav-link">Faq</a>
                </li>
                <li class="nav-item">
                  <a href="pages/general/invoice.html" class="nav-link">Invoice</a>
                </li>
                <li class="nav-item">
                  <a href="pages/general/profile.html" class="nav-link">Profile</a>
                </li>
                <li class="nav-item">
                  <a href="pages/general/pricing.html" class="nav-link">Pricing</a>
                </li>
                <li class="nav-item">
                  <a href="pages/general/timeline.html" class="nav-link">Timeline</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#authPages" role="button" aria-expanded="false" aria-controls="authPages">
              <i class="link-icon" data-feather="unlock"></i>
              <span class="link-title">Authentication</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="authPages">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="pages/auth/login.html" class="nav-link">Login</a>
                </li>
                <li class="nav-item">
                  <a href="pages/auth/register.html" class="nav-link">Register</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#errorPages" role="button" aria-expanded="false" aria-controls="errorPages">
              <i class="link-icon" data-feather="cloud-off"></i>
              <span class="link-title">Error</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="errorPages">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="pages/error/404.html" class="nav-link">404</a>
                </li>
                <li class="nav-item">
                  <a href="pages/error/500.html" class="nav-link">500</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item nav-category">Docs</li>
          <li class="nav-item">
            <a href="https://www.nobleui.com/html/documentation/docs.html" target="_blank" class="nav-link">
              <i class="link-icon" data-feather="hash"></i>
              <span class="link-title">Documentation</span>
            </a>
          </li>
        </ul>
      </div>
    </nav>

    <!-- Settingan Sidebar Awal -->
    <!-- <nav class="settings-sidebar">
      <div class="sidebar-body">
        <a href="#" class="settings-sidebar-toggler">
          <i data-feather="settings"></i>
        </a>
        <div class="theme-wrapper">
          <h6 class="text-muted mb-2">Light Theme:</h6>
          <a class="theme-item" href="../demo1/dashboard.html">
            <img src="../assets/images/screenshots/light.jpg" alt="light theme">
          </a>
          <h6 class="text-muted mb-2">Dark Theme:</h6>
          <a class="theme-item active" href="../demo2/dashboard.html">
            <img src="../assets/images/screenshots/dark.jpg" alt="light theme">
          </a>
        </div>
      </div>
    </nav> -->

    <!-- Settingan Sidebar Akhir -->