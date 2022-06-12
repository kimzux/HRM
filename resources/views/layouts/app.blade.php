@include('layouts.header')
@include('sweetalert::alert')
  <!-- NAVIGATION
    ================================================== -->

  <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light" id="sidebar">
    <div class="container-fluid">

      <!-- Toggler -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidebarCollapse" aria-controls="sidebarCollapse"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Brand -->
      <a class="navbar-brand" href="{{'home'}}">
        <img src="/assets/img/logo.png" style=" height: auto; width: auto; max-height: 80px; max-width: 300px;" class="img-responsive" alt="examp">
      </a>

      <!-- User (xs) -->
      <div class="navbar-user d-md-none">

        <!-- Dropdown -->
        <div class="dropdown">
 
          <!-- Toggle -->
          <a href="#!" id="sidebarIcon" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            <div class="avatar avatar-sm avatar-online">
                <img src="/assets/img/avatars/profiles/avatar.png" alt="..." class="avatar-img rounded-circle">
            </div>
          </a>
      
          <!-- Menu -->
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="sidebarIcon">
          <a href="#" class="dropdown-item"> {{ Auth::user()->name }}</a>
          <hr class="dropdown-divider">
          <a class="dropdown-item" href="{{ route('changePasswordGet') }}">Change Password </a>
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
        
        <!-- Navigation -->
        <ul class="navbar-nav">
          <li class="nav-item {{ Request::url() == url('/home') ? 'active' : '' }}">
          @can('View Dashboard')
            <a class="nav-link" href="{{ route('home') }}">
              <i class="fe fe-home"></i> Dashboards
            </a>
            @endcan
         </li>
     
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
          @canany(['view employee','view disciplinary'])
          <li class="nav-item dropdown">
            <a class="nav-link" href="#sidebarComponents" data-toggle="collapse" role="button" aria-expanded="false"
              aria-controls="sidebarComponents">
              <i class="fe fe-users"></i> Employees
            </a>
            <div class="collapse " id="sidebarComponents">
              <ul class="nav nav-sm flex-column">
                <li class="nav-item">
                @can('view employee')
                  <a href="{{route('employee.index')}}" class="nav-link">
                    employee
                  </a>
                  @endcan
                </li>
                @can('view employee')
                <li class="nav-item">
                  <a href="{{route('disciplinary.index')}}"  class="nav-link">
                    Disciplinary
                  </a>
                  @endcan                                    
                </li>
               
             </ul>
             @endcan
           </div>
        </li>
        @canany(['view holiday','view leave_type', 'view leave_application','view leave_earn'])
        <li class="nav-item dropdown ">
            <a class="nav-link" href="#sidebarRu" data-toggle="collapse" role="button" aria-expanded="false"
              aria-controls="sidebarRu">
              <i class="fe fe-layout"></i>Leave
            </a>
            <div class="collapse" id="sidebarRu">
              <ul class="nav nav-sm flex-column">
                <li class="nav-item">
                @can('view holiday')
                  <a href="{{route('holiday.index')}}" class="nav-link">
                    Holiday
                  </a>
            @endcan
                </li>
                <li class="nav-item">
                @can('view leave_type')
                  <a href="{{route('leave_type.index')}}" class="nav-link">
                    Leave Type
                  </a>
               @endcan
                </li>
                <li class="nav-item">
                @can('view leave_application')
                  <a href="{{route('leave_apply.index')}}" class="nav-link">
                    Leave Application
                  </a>
               @endcan
                </li>
                <li class="nav-item">
                @can('view leave_earn')
              <a href="{{route('leave_earn.index')}}" class="nav-link">
                Leave Earn
              </a>
           @endcan
            </li>
               
              </ul>
              @endcan
            </div>
          </li>
          @canany(['view project','view task', 'view field'])
          <li class="nav-item dropdown ">
            <a class="nav-link" href="#sidebarkipa" data-toggle="collapse" role="button" aria-expanded="false"
              aria-controls="sidebarkipa">
              <i class="fe fe-layout"></i>project
            </a>
            <div class="collapse" id="sidebarkipa">
              <ul class="nav nav-sm flex-column">
                <li class="nav-item">
                @can('view project')
                  <a href="{{route('project.index')}}" class="nav-link">
                    projects
                  </a>
            @endcan
                </li>
                <li class="nav-item">
                @can('view task')
                  <a href="{{route('task.index')}}" class="nav-link">
                  Tasks list
                  </a>
               @endcan
                </li>
                <li class="nav-item">
                @can('view field')
                  <a href="{{route('field.index')}}" class="nav-link">
                  Field visit
                  </a>
               @endcan
                </li>
              </ul>
              @endcan
            </div>
          </li>
          @canany(['view loan', 'view loan_installment'])
          <li class="nav-item dropdown ">

            <a class="nav-link" href="#sidebarj" data-toggle="collapse" role="button" aria-expanded="false"
              aria-controls="sidebarj">
              <i class="fe fe-layout"></i>Loan
            </a>
            <div class="collapse" id="sidebarj">
              <ul class="nav nav-sm flex-column">
                <li class="nav-item">
                 @can('view loan')
                  <a href="{{route('loan.index')}}" class="nav-link">
                    Grand Loan
                  </a>
                @endcan
                </li>
                <li class="nav-item">
                  @can('view loan_installment')
                  <a href="{{route('loan_installment.index')}}" class="nav-link">
                    Installment Loan
                  </a>
               @endcan
                </li>
              </ul>
              @endcan
            </div>
          </li>
          @canany(['view assetlist','view category', 'view logistic'])
          <li class="nav-item dropdown ">
            <a class="nav-link" href="#sidebarch" data-toggle="collapse" role="button" aria-expanded="false"
              aria-controls="sidebarch">
              <i class="fe fe-printer"></i>Assets
            </a>
            <div class="collapse" id="sidebarch">
              <ul class="nav nav-sm flex-column">
                <li class="nav-item">
             @can('view category')
                  <a href="{{route('asset.index')}}" class="nav-link">
                    Asset Category
                  </a>
            @endcan
                </li>
                <li class="nav-item">
                  @can('view assetlist')
                  <a href="{{route('assetlist.index')}}" class="nav-link">
                    Asset List
                  </a>
               @endcan
                </li>
                <li class="nav-item">
                  @can('view logistic')
                  <a href="{{route('logistic.index')}}" class="nav-link">
                    Logistic List
                  </a>
               @endcan
                </li>
              </ul>
              @endcan
            </div>
          </li>
          <li class="nav-item dropdown ">
          @canany(['view deduction','view payrol','view benefits'])
            <a class="nav-link" href="#sidebarone" data-toggle="collapse" role="button" aria-expanded="false"
              aria-controls="sidebarone">
              <i class="fe fe-credit-card"></i>Payrol
            </a>
            <div class="collapse" id="sidebarone">
              <ul class="nav nav-sm flex-column">
                <li class="nav-item">
             @can('view deduction')
                  <a href="{{route('deduction.index')}}" class="nav-link">
                    Deduction
                  </a>
            @endcan
            <li class="nav-item">
             @can('view Benefits')
                  <a href="" class="nav-link">
                    Benefits
                  </a>
            @endcan
                </li>
                <li class="nav-item">
                  @can('view payrol')
                  <a href="{{route('payrol.index')}}" class="nav-link">
                    Payroll List
                  </a>
               @endcan
                </li>
                
              </ul>
              @endcan
            </div>
            @can('View Setting')
            <li class="nav-item {{ Request::url() == url('/notice') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('notice.index') }}">
              <i class="fe fe-file-text"></i>Notice
            </a>
         </li> @endcan

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
      <div class="container-fluid d-flex justify-content-end">
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



  
          </div>

          <!-- Dropdown -->
          <div class="dropdown">

            <!-- Toggle -->
            <a href="#" class="avatar avatar-sm avatar-online dropdown-toggle" role="button" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">
              <img src="/assets/img/avatars/profiles/avatar.png" alt="..." class="avatar-img rounded-circle">
            </a>

            <!-- Menu -->
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="sidebarIcon">
            <a href="#" class="dropdown-item"> {{auth()->user()->name}}</a>
            <hr class="dropdown-divider">
            <a class="dropdown-item" href="{{ route('changePasswordGet') }}">Change Password </a>
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

    <main class="p-4">
            @yield('content')
        </main>


    <!-- HEADER -->



    
  @include('layouts.footer')