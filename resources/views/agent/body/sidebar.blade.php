
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
          <li class="nav-item nav-category">My Property</li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#myprofile-a" role="button" aria-expanded="false" aria-controls="myprofile-a">
              <i class="link-icon" data-feather="user"></i>
              <span class="link-title">Property</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="myprofile-a">
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

          <li class="nav-item nav-category">My Package</li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#agentproperty" role="button" aria-expanded="false" aria-controls="agentproperty">
              <i class="link-icon" data-feather="user"></i>
              <span class="link-title">Package</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="agentproperty">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="{{route('package.history')}}" class="nav-link">History Package</a>
                </li>
                <li class="nav-item">
                  <a href="{{route('buy.package')}}" class="nav-link">Buy Package</a>
                </li>
                
              </ul>
            </div>


           
          </li>

          <!-- <li class="nav-item">
            <a class="nav-link" href="{{route('buy.package')}}" role="button" aria-expanded="false" aria-controls="agentproperty">
              <i class="link-icon" data-feather="user"></i>
              <span class="link-title">Buy Package</span>
          
            </a>
 
          </li>
        


          <li class="nav-item">
            <a class="nav-link" href="{{route('package.history')}}" role="button" aria-expanded="false" aria-controls="allpackage">
              <i class="link-icon" data-feather="user"></i>
              <span class="link-title">Package Histori</span>
            </a>
          </li> -->

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