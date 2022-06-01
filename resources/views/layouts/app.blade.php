@include('layouts.header')
@include('sweetalert::alert')
  <!-- NAVIGATION
    ================================================== -->
<div>
  <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light" id="sidebar">
    <div class="container-fluid">

      <!-- Toggler -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidebarCollapse" aria-controls="sidebarCollapse"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Brand -->
      <a class="navbar-brand" href="{{'home'}}">
        <img src="/assets/img/logo.svg" class="navbar-brand-img 
            mx-auto" alt="...">
      </a>

      <!-- User (xs) -->
      <div class="navbar-user d-md-none">

        <!-- Dropdown -->
        <div class="dropdown">

          <!-- Toggle -->
          <a href="#!" id="sidebarIcon" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            <div class="avatar avatar-sm avatar-online">
              <img src="/assets/img/avatars/profiles/avatar-1.jpg" class="avatar-img rounded-circle" alt="...">
            </div>
          </a>
      
          <!-- Menu -->
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="sidebarIcon">
          <a href="#" class="dropdown-item"> {{ Auth::user()->name }}</a>
          <hr class="dropdown-divider">
            <a href="profile-posts.html" class="dropdown-item">Profile</a>
            <a href="settings.html" class="dropdown-item">Settings</a>
            <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
          </div>

        </div>

      </div>

      <!-- Collapse -->
      <div class="collapse navbar-collapse" id="sidebarCollapse">

        <!-- Form -->
        <form class="mt-4 mb-3 d-md-none">
          <div class="input-group input-group-rounded input-group-merge">
            <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="Search"
              aria-label="Search">
            <div class="input-group-prepend">
              <div class="input-group-text">
                <span class="fe fe-search"></span>
              </div>
            </div>
          </div>
        </form>

        <!-- Navigation -->
        <ul class="navbar-nav">
        @can('View Dashboard')
          <li class="nav-item {{ Request::url() == url('/home') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('home') }}">
              <i class="fe fe-home"></i> Dashboards
            </a>
         </li>
       @endcan
         @canany(['View users','View role'])
       
         <li class="nav-item {{ Request::url() == url('user-management') ? 'active' : '' }}">
            <a class="nav-link" href="#sidebarComponent" data-toggle="collapse" role="button" aria-expanded="false"
              aria-controls="sidebarComponents">
              <i class="fe fe-users"></i> user-management
            </a>
            <div class="collapse " id="sidebarComponent">
              <ul class="nav nav-sm flex-column">
           
                <li class="nav-item">
                @can('View users')
                  <a href="{{ route('users.index') }}" class="nav-link">
                    Users
                  </a>
                  @endcan
                </li>
               
                <li class="nav-item">
                @can('View role')
                  <a href="{{ route('roles.index') }}" class="nav-link">
                    Roles
                  </a>
                  @endcan
                </li>
              
               </ul>     
            </div>        
          </li>
          @endcan
          @canany(['View Department','View Designation'])
          <li class="nav-item dropdown {{ Request::url() == url('organization') ? 'active' : '' }}">
            <a class="nav-link" href="#sidebarAuth" data-toggle="collapse" role="button" aria-expanded="false"
              aria-controls="sidebarAuth">
              <i class="fe fe-layout"></i> Organization
            </a>
            <div class="collapse" id="sidebarAuth">
              <ul class="nav nav-sm flex-column">
                <li class="nav-item">
                @can('View Department')
                  <a href="{{ route('department.index') }}" class="nav-link">
                    Department
                  </a>
                  @endcan
                </li>
                <li class="nav-item">
                @can('View Designation')
                  <a href="{{ route('designation.index') }}" class="nav-link">
                    Designation
                  </a>
                  @endcan
                </li>
              </ul>
            </div>
          </li>
          @endcan
          @canany(['View employee','View disciplinary','in-active'])
          <li class="nav-item dropdown">
            <a class="nav-link" href="#sidebarComponents" data-toggle="collapse" role="button" aria-expanded="false"
              aria-controls="sidebarComponents">
              <i class="fe fe-users"></i> Employees
            </a>
            <div class="collapse " id="sidebarComponents">
              <ul class="nav nav-sm flex-column">
                <li class="nav-item">
                @can('View employee')
                  <a href="{{route('employee.index')}}" class="nav-link">
                    employee
                  </a>
                  @endcan
                </li>
                <li class="nav-item">
                  <a href="{{route('disciplinary.index')}}"  class="nav-link">
                    Disciplinary
                  </a>
                </li>
                <li class="nav-item">
                  <a href="components.html#badges" class="nav-link">
                    In-active
                  </a>
                </li>
             </ul>
             @endcan
           </div>
        </li>
        <li class="nav-item dropdown ">
            <a class="nav-link" href="#sidebarRu" data-toggle="collapse" role="button" aria-expanded="false"
              aria-controls="sidebarRu">
              <i class="fe fe-layout"></i>Leave
            </a>
            <div class="collapse" id="sidebarRu">
              <ul class="nav nav-sm flex-column">
                <li class="nav-item">
             
                  <a href="{{route('holiday.index')}}" class="nav-link">
                    Holiday
                  </a>
            
                </li>
                <li class="nav-item">
              
                  <a href="{{route('leave_type.index')}}" class="nav-link">
                    Leave Type
                  </a>
               
                </li>
                <li class="nav-item">
              
                  <a href="{{route('leave_apply.index')}}" class="nav-link">
                    Leave Application
                  </a>
               
                </li>
                <li class="nav-item">
              
              <a href="{{route('leave_earn.index')}}" class="nav-link">
                Leave Earn
              </a>
           
            </li>
                <li class="nav-item">
              
              <a href="{{route('disciplinary.index')}}"class="nav-link">
                Report
              </a>
           
            </li>
              </ul>
            </div>
          </li>
          <li class="nav-item dropdown ">
            <a class="nav-link" href="#sidebarkipa" data-toggle="collapse" role="button" aria-expanded="false"
              aria-controls="sidebarkipa">
              <i class="fe fe-layout"></i>project
            </a>
            <div class="collapse" id="sidebarkipa">
              <ul class="nav nav-sm flex-column">
                <li class="nav-item">
             
                  <a href="{{route('project.index')}}" class="nav-link">
                    projects
                  </a>
            
                </li>
                <li class="nav-item">
                  <a href="{{route('task.index')}}" class="nav-link">
                  Tasks list
                  </a>
               
                </li>
                <li class="nav-item">
                  <a href="{{route('field.index')}}" class="nav-link">
                  Field visit
                  </a>
               
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item dropdown ">
            <a class="nav-link" href="#sidebarj" data-toggle="collapse" role="button" aria-expanded="false"
              aria-controls="sidebarj">
              <i class="fe fe-layout"></i>Loan
            </a>
            <div class="collapse" id="sidebarj">
              <ul class="nav nav-sm flex-column">
                <li class="nav-item">
             
                  <a href="{{route('loan.index')}}" class="nav-link">
                    Grand Loan
                  </a>
            
                </li>
                <li class="nav-item">
                  <a href="{{route('loan_installment.index')}}" class="nav-link">
                    Installment Loan
                  </a>
               
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item dropdown ">
            <a class="nav-link" href="#sidebarch" data-toggle="collapse" role="button" aria-expanded="false"
              aria-controls="sidebarch">
              <i class="fe fe-printer"></i>Assets
            </a>
            <div class="collapse" id="sidebarch">
              <ul class="nav nav-sm flex-column">
                <li class="nav-item">
             
                  <a href="{{route('asset.index')}}" class="nav-link">
                    Asset Category
                  </a>
            
                </li>
                <li class="nav-item">
                  <a href="{{route('assetlist.index')}}" class="nav-link">
                    Asset List
                  </a>
               
                </li>
                <li class="nav-item">
                  <a href="{{route('logistic.index')}}" class="nav-link">
                    Logistic List
                  </a>
               
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item dropdown ">
            <a class="nav-link" href="#sidebarone" data-toggle="collapse" role="button" aria-expanded="false"
              aria-controls="sidebarone">
              <i class="fe fe-credit-card"></i>Payrol
            </a>
            <div class="collapse" id="sidebarone">
              <ul class="nav nav-sm flex-column">
                <li class="nav-item">
             
                  <a href="" class="nav-link">
                    Department
                  </a>
            
                </li>
                <li class="nav-item">
                  <a href="" class="nav-link">
                    Designation
                  </a>
               
                </li>
                
              </ul>
            </div>
            <li class="nav-item {{ Request::url() == url('/notice') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('notice.index') }}">
              <i class="fe fe-file-text"></i>Notice
            </a>
         </li>
         @can('View Setting')
         <li class="nav-item {{ Request::url() == url('/setting') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('setting.index') }}">
              <i class="fe fe-settings"></i> settings
            </a>
         </li>
         @endcan
          </li>
       
       
      </div> <!-- / .navbar-collapse -->
    </div>
          </li>
        <!-- Divider -->
        
  </nav>
  <!-- MAIN CONTENT
    ================================================== -->
  <div class="main-content">
    <nav class="navbar navbar-expand-md navbar-light d-none d-md-flex" id="topbar">
      <div class="container-fluid">
        <!-- Form -->
        <form class="form-inline mr-4 d-none d-md-flex">
          <div class="input-group input-group-flush input-group-merge" data-toggle="lists" data-lists-values='["name"]'>
            <!-- Input -->
            <input type="search" class="form-control form-control-prepended dropdown-toggle search" data-toggle="dropdown"
              placeholder="Search" aria-label="Search">
            <div class="input-group-prepend">
              <div class="input-group-text">
                <i class="fe fe-search"></i>
              </div>
          </div>
          </div>
        </form>

        <!-- User -->
        <div class="navbar-user">

          <!-- Dropdown -->
          <div class="dropdown mr-4 d-none d-md-flex">

            <!-- Toggle -->
            <a href="#" class="text-muted" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span class="icon active">
                <i class="fe fe-bell"></i>
              </span>
            </a>
            <!-- Menu -->
            <div class="dropdown-menu dropdown-menu-right dropdown-menu-card">
              <div class="card-header">
                <div class="row align-items-center">
                  <div class="col">
                    <!-- Title -->
                    <h5 class="card-header-title">
                      Notifications
                    </h5>
                  </div>
                  <div class="col-auto">
                    <!-- Link -->
                    <a href="#!" class="small">
                      View all
                    </a>
                  </div>
                </div> <!-- / .row -->
              </div> <!-- / .card-header -->
              <div class="card-body">
               <!-- List group -->
                <div class="list-group list-group-flush my--3">
                  <a class="list-group-item px-0" href="#!">

                    <div class="row">
                      <div class="col-auto">

                        <!-- Avatar -->
                        <div class="avatar avatar-sm">
                          <img src="/assets/img/avatars/profiles/avatar-1.jpg" alt="..." class="avatar-img rounded-circle">
                        </div>

                      </div>
                      <div class="col ml--2">
                        <!-- Content -->
                        <div class="small text-muted">
                          <strong class="text-body">Dianna Smiley</strong> shared your post with <strong class="text-body">Ab
                            Hadley</strong>, <strong class="text-body">Adolfo Hess</strong>, and <strong class="text-body">3
                            others</strong>.
                        </div>

                      </div>
                      <div class="col-auto">
                        <small class="text-muted">
                          2m
                        </small>
                      </div>
                    </div> <!-- / .row -->
                  </a>
              
                </div>

              </div>
            </div> <!-- / .dropdown-menu -->

          </div>

          <!-- Dropdown -->
          <div class="dropdown">

            <!-- Toggle -->
            <a href="#" class="avatar avatar-sm avatar-online dropdown-toggle" role="button" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">
              <img src="/assets/img/avatars/profiles/avatar-1.jpg" alt="..." class="avatar-img rounded-circle">
            </a>

            <!-- Menu -->
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="sidebarIcon">
          <a href="#" class="dropdown-item"> {{auth()->user()->name}}</a>
          <hr class="dropdown-divider">
            <a href="profile-posts.html" class="dropdown-item">Profile</a>
            <a href="settings.html" class="dropdown-item">Settings</a>
            <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    class="d-none">
                                    <?=csrf_field()?>
                                </form>
          </div>

          </div>

        </div>

      </div>
    </nav>

    <main class="py-4">
            @yield('content')
        </main>
 </div>

    <!-- HEADER -->



    
  @include('layouts.footer')