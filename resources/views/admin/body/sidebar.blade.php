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
          <li class="nav-item">
            <a href="{{route('admin.dashboard')}}" class="nav-link">
              <i class="link-icon" data-feather="home"></i>
              <span class="link-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('admin.property.message')}}">
              <i class="link-icon" data-feather="mail"></i>
              <span class="link-title">Mail</span>
            </a>

          </li>
          <li class="nav-item nav-category">web apps</li>
          @if(Auth::user()->can('type.menu'))
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#propertytype" role="button" aria-expanded="false" aria-controls="emails">
              <i class="link-icon" data-feather="mail"></i>
              <span class="link-title">Property Type</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="propertytype">
              <ul class="nav sub-menu">
              @if(Auth::user()->can('all.type'))
                <li class="nav-item">
                  <a href="{{route('all.type')}}" class="nav-link">All Type</a>
                </li>
              @endif
              @if(Auth::user()->can('add.type'))
                <li class="nav-item">
                  <a href="{{route('add.type')}}" class="nav-link">Add Type</a>
                </li>
                @endif
              </ul>
            </div>
          </li>
          @endif
          <!-- End Property Type -->
          
          <!-- Amenities -->
          @if(Auth::user()->can('ame.menu'))
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#amenities" role="button" aria-expanded="false" aria-controls="emails">
              <i class="link-icon" data-feather="user"></i>
              <span class="link-title">Amenities</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="amenities">
              <ul class="nav sub-menu">
                <li class="nav-item">
                @if(Auth::user()->can('all.ame'))
                  <a href="{{route('all.amenities')}}" class="nav-link">All Amenities</a>
                @endif
                </li>
                <li class="nav-item">
                @if(Auth::user()->can('add.ame'))
                  <a href="{{route('add.amenities')}}" class="nav-link">Add Amenities</a>
                  @endif
                </li>
                
              </ul>
            </div>
          </li>
          @endif
         
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
          
          <li class="nav-item">
            <a class="nav-link" href="{{route('admin.package.history')}}" role="button" aria-expanded="false" aria-controls="emails">
              <i class="link-icon" data-feather="user"></i>
              <span class="link-title">Package History</span>
            </a>
          </li>


          
          <li class="nav-item nav-category">User All Function</li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#uiComponents" role="button" aria-expanded="false" aria-controls="emails">
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
          
          <li class="nav-item nav-category">Setting</li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('site.setting')}}">
              <i class="link-icon" data-feather="book"></i>
              <span class="link-title">Site Setting</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#authPages" role="button" aria-expanded="false" aria-controls="authPages">
              <i class="link-icon" data-feather="unlock"></i>
              <span class="link-title">Role & Permission</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="authPages">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="{{route('all.permission')}}" class="nav-link">All Permission</a>
                </li>
                <li class="nav-item">
                  <a href="{{route('add.permission')}}" class="nav-link">Add Permission</a>
                </li>
                <li class="nav-item">
                  <a href="{{route('all.roles')}}" class="nav-link">All Roles</a>
                </li>
                <li class="nav-item">
                  <a href="{{route('add.roles')}}" class="nav-link">Add Roles</a>
                </li>
                <li class="nav-item">
                  <a href="{{route('all.roles.permission')}}" class="nav-link">All Role In Permission</a>
                </li>
                <li class="nav-item">
                  <a href="{{route('add.roles.permission')}}" class="nav-link">Role In Permission</a>
                </li>

                
              </ul>
            </div>
          </li>

          
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#errorPages" role="button" aria-expanded="false" aria-controls="errorPages">
              <i class="link-icon" data-feather="cloud-off"></i>
              <span class="link-title">Manage Admin</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="errorPages">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="{{route('all.admin')}}" class="nav-link">All Admin</a>
                </li>
                <li class="nav-item">
                  <a href="{{route('add.admin')}}" class="nav-link">Add Admin</a>
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