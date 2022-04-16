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
        <img src="assets/img/logo.svg" class="navbar-brand-img 
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
              <img src="assets/img/avatars/profiles/avatar-1.jpg" class="avatar-img rounded-circle" alt="...">
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
       
          <li class="nav-item {{ Request::url() == url('/home') ? 'active' : '' }}">">
            <a class="nav-link" href="{{route('home')}}">
              <i class="fe fe-home"></i> Dashboards
            </a>
         </li>
       
         
          <li class="nav-item dropdown">
            <a class="nav-link" href="#sidebarComponents" data-toggle="collapse" role="button" aria-expanded="false"
              aria-controls="sidebarComponents">
              <i class="fe fe-user"></i> user-management
            </a>
            <div class="collapse " id="sidebarComponents">
              <ul class="nav nav-sm flex-column">
           
                <li class="nav-item">
                  <a href="{{ route('users.index') }}" class="nav-link">
                    Users
                  </a>
                </li>
               
                <li class="nav-item">
                  <a href="{{ route('roles.index') }}" class="nav-link">
                    Roles
                  </a>
                </li>
              
               </ul>     
            </div>        
          </li>
      
          <li class="nav-item">
            <a class="nav-link" href="#sidebarAuth" data-toggle="collapse" role="button" aria-expanded="false"
              aria-controls="sidebarAuth">
              <i class="fe fe-user"></i> Authentication
            </a>
            <div class="collapse" id="sidebarAuth">
              <ul class="nav nav-sm flex-column">
                <li class="nav-item">
                  <a href="#sidebarSignIn" class="nav-link" data-toggle="collapse" role="button" aria-expanded="false"
                    aria-controls="sidebarSignIn">
                    Sign in
                  </a>
                  <div class="collapse" id="sidebarSignIn">
                    <ul class="nav nav-sm flex-column">
                      <li class="nav-item">
                        <a href="sign-in-cover.html" class="nav-link">
                          Cover
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="sign-in-illustration.html" class="nav-link">
                          Illustration
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="sign-in.html" class="nav-link">
                          Basic
                        </a>
                      </li>
                    </ul>
                  </div>
                </li>
                <li class="nav-item">
                  <a href="#sidebarSignUp" class="nav-link" data-toggle="collapse" role="button" aria-expanded="false"
                    aria-controls="sidebarSignUp">
                    Sign up
                  </a>
                  <div class="collapse" id="sidebarSignUp">
                    <ul class="nav nav-sm flex-column">
                      <li class="nav-item">
                        <a href="sign-up-cover.html" class="nav-link">
                          Cover
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="sign-up-illustration.html" class="nav-link">
                          Illustration
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="sign-up.html" class="nav-link">
                          Basic
                        </a>
                      </li>
                    </ul>
                  </div>
                </li>
                <li class="nav-item">
                  <a href="#sidebarPassword" class="nav-link" data-toggle="collapse" role="button" aria-expanded="false"
                    aria-controls="sidebarPassword">
                    Password reset
                  </a>
                  <div class="collapse" id="sidebarPassword">
                    <ul class="nav nav-sm flex-column">
                      <li class="nav-item">
                        <a href="password-reset-cover.html" class="nav-link">
                          Cover
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="password-reset-illustration.html" class="nav-link">
                          Illustration
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="password-reset.html" class="nav-link">
                          Basic
                        </a>
                      </li>
                    </ul>
                  </div>
                </li>
                <li class="nav-item">
                  <a href="#sidebarError" class="nav-link" data-toggle="collapse" role="button" aria-expanded="false"
                    aria-controls="sidebarError">
                    Error
                  </a>
                  <div class="collapse" id="sidebarError">
                    <ul class="nav nav-sm flex-column">
                      <li class="nav-item">
                        <a href="error-illustration.html" class="nav-link">
                          Illustration
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="error.html" class="nav-link">
                          Basic
                        </a>
                      </li>
                    </ul>
                  </div>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item d-md-none">
            <a class="nav-link" href="#sidebarModalActivity" data-toggle="modal">
              <span class="fe fe-bell"></span> Notifications
            </a>
          </li>
        </ul>

        <!-- Divider -->
        <hr class="navbar-divider my-3">
        <!-- Heading -->
        <h6 class="navbar-heading">
          Documentation
        </h6>

        <!-- Navigation -->
        <ul class="navbar-nav mb-md-4">
          <li class="nav-item">
            <a class="nav-link " href="getting-started.html">
              <i class="fe fe-clipboard"></i> Getting started
            </a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link" href="#sidebarComponents" data-toggle="collapse" role="button" aria-expanded="false"
              aria-controls="sidebarComponents">
              <i class="fe fe-book-open"></i> Components
            </a>
            <div class="collapse " id="sidebarComponents">
              <ul class="nav nav-sm flex-column">
                <li class="nav-item">
                  <a href="components.html#alerts" class="nav-link">
                    Alerts
                  </a>
                </li>
                <li class="nav-item">
                  <a href="components.html#avatars" class="nav-link">
                    Avatars
                  </a>
                </li>
                <li class="nav-item">
                  <a href="components.html#badges" class="nav-link">
                    Badges
                  </a>
                </li>
                <li class="nav-item">
                  <a href="components.html#breadcrumb" class="nav-link">
                    Breadcrumb
                  </a>
                </li>
                <li class="nav-item">
                  <a href="components.html#buttons" class="nav-link">
                    Buttons
                  </a>
                </li>
                <li class="nav-item">
                  <a href="components.html#button-group" class="nav-link">
                    Button group
                  </a>
                </li>
                <li class="nav-item">
                  <a href="components.html#cards" class="nav-link">
                    Cards
                  </a>
                </li>
                <li class="nav-item">
                  <a href="components.html#charts" class="nav-link">
                    Charts
                  </a>
                </li>
                <li class="nav-item">
                  <a href="components.html#dropdowns" class="nav-link">
                    Dropdowns
                  </a>
                </li>
                <li class="nav-item">
                  <a href="components.html#forms" class="nav-link">
                    Forms
                  </a>
                </li>
                <li class="nav-item">
                  <a href="components.html#icons" class="nav-link">
                    Icons
                  </a>
                </li>
                <li class="nav-item">
                  <a href="components.html#lists" class="nav-link">
                    Lists
                  </a>
                </li>
                <li class="nav-item">
                  <a href="components.html#loaders" class="nav-link">
                    Loaders
                  </a>
                </li>
                <li class="nav-item">
                  <a href="components.html#modal" class="nav-link">
                    Modal
                  </a>
                </li>
                <li class="nav-item">
                  <a href="components.html#navs" class="nav-link">
                    Navs
                  </a>
                </li>
                <li class="nav-item">
                  <a href="components.html#navbarExample" class="nav-link">
                    Navbar
                  </a>
                </li>
                <li class="nav-item">
                  <a href="components.html#page-headers" class="nav-link">
                    Page headers
                  </a>
                </li>
                <li class="nav-item">
                  <a href="components.html#pagination" class="nav-link">
                    Pagination
                  </a>
                </li>
                <li class="nav-item">
                  <a href="components.html#popovers" class="nav-link">
                    Popovers
                  </a>
                </li>
                <li class="nav-item">
                  <a href="components.html#progress" class="nav-link">
                    Progress
                  </a>
                </li>
                <li class="nav-item">
                  <a href="components.html#social-posts" class="nav-link">
                    Social post
                  </a>
                </li>
                <li class="nav-item">
                  <a href="components.html#tables" class="nav-link">
                    Tables
                  </a>
                </li>
                <li class="nav-item">
                  <a href="components.html#tooltips" class="nav-link">
                    Tooltips
                  </a>
                </li>
                <li class="nav-item">
                  <a href="components.html#typography" class="nav-link">
                    Typography
                  </a>
                </li>
                <li class="nav-item">
                  <a href="components.html#utilities" class="nav-link">
                    Utilities
                  </a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="changelog.html">
              <i class="fe fe-git-branch"></i> Changelog <span class="badge badge-primary ml-auto">v1.3.0</span>
            </a>
          </li>
        </ul>
      </div> <!-- / .navbar-collapse -->
    </div>
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
                          <img src="assets/img/avatars/profiles/avatar-1.jpg" alt="..." class="avatar-img rounded-circle">
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
              <img src="assets/img/avatars/profiles/avatar-1.jpg" alt="..." class="avatar-img rounded-circle">
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
                                    @csrf
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