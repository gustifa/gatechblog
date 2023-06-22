
@php
    $id = Auth::user()->id;
    $agentId = App\Models\User::find($id);
    $status = $agentId->status;
@endphp

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
            <a href="{{route('agent.dashboard')}}" class="nav-link">
              <i class="link-icon" data-feather="box"></i>
              <span class="link-title">Dashboard</span>
            </a>
          </li>
          @if($status === 'active')
          <li class="nav-item nav-category">web apps</li>
          
          
          <!-- property -->
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#agentproperty" role="button" aria-expanded="false" aria-controls="emails">
              <i class="link-icon" data-feather="user"></i>
              <span class="link-title">Property</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="agentproperty">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="{{route('agent.all.property')}}" class="nav-link">All Property</a>
                </li>
                <li class="nav-item">
                  <a href="{{route('agent.add.property')}}" class="nav-link">Add Property</a>
                </li>
                
              </ul>
            </div>
          </li>
          <!-- End property -->

          <!-- property -->
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#package" role="button" aria-expanded="false" aria-controls="emails">
              <i class="link-icon" data-feather="user"></i>
              <span class="link-title">Package</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="package">
              
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="{{route('all.package')}}" class="nav-link">Package</a>
                </li>

                <li class="nav-item">
                  <a href="{{route('buy.package')}}" class="nav-link">Buy Package</a>
                </li>
                
                
              </ul>
            </div>
            
          </li>
          <!-- End property -->
          @else
          @endif
          <li class="nav-item nav-category">My Account</li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#myprofile" role="button" aria-expanded="false" aria-controls="emails">
              <i class="link-icon" data-feather="user"></i>
              <span class="link-title">My Account</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="myprofile">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="{{route('agent.profile')}}" class="nav-link">Change Profile</a>
                </li>
                <li class="nav-item">
                  <a href="{{route('agent.password.change')}}" class="nav-link">Change Password</a>
                </li>
                <li class="nav-item">
                  <a href="{{route('agent.logout')}}" class="nav-link">Logout</a>
                </li>
              </ul>
            </div>
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