@extends('layouts.app')

@section('content')
<div class="header">
      <div class="container-fluid">

        <!-- Body -->
        <div class="header-body">
          <div class="row align-items-end">
            <div class="col">

              <!-- Pretitle -->
              <h6 class="header-pretitle">
                Overview
              </h6>

              <!-- Title -->
              <h1 class="header-title">
                Dashboard
              </h1>

            </div>
            
          </div> <!-- / .row -->
        </div> <!-- / .header-body -->

      </div>
    </div> <!-- / .header -->

    <!-- CARDS -->
    <div class="container-fluid">
      <div class="row">
        <div class="col-12 col-lg-6 col-xl">

          <!-- Card -->
          <div class="card">
            <div class="card-body">
              <div class="row align-items-center">
                <div class="col">

                  <!-- Title -->
                  <a href="{{route('employee.index')}}" ><h4 class="card-title text-uppercase text-black mb-2">
                    Total Employees
                  </h4>
                  
                  <!-- Heading -->
                  <span class="h2 mb-0">
                  <?= $total_employees?? '' ?>
                  </span>

                  </a>
                </div>
                <div class="col-auto">

                  <!-- Icon -->
                  <span class="h2 fe fe-users text-muted mb-0"></span>

                </div>
              </div> <!-- / .row -->

            </div>
          </div>

        </div>
        <div class="col-12 col-lg-6 col-xl">

          <!-- Card -->
          <div class="card">
            <div class="card-body">
              <div class="row align-items-center">
                <div class="col">

                  <!-- Title -->
                  <h6 class="card-title text-uppercase text-muted mb-2">
                    Total Hours
                  </h6>

                  <!-- Heading -->
                  <span class="h2 mb-0">
                    763.5
                  </span>

                </div>
                <div class="col-auto">

                  <!-- Icon -->
                  <span class="h2 fe fe-briefcase text-muted mb-0"></span>

                </div>
              </div> <!-- / .row -->

            </div>
          </div>

        </div>
        <div class="col-12 col-lg-6 col-xl">
 <!-- Card -->
          <div class="card">
            <div class="card-body">
              <div class="row align-items-center">
                <div class="col">

                  <!-- Title -->
                  <h6 class="card-title text-uppercase text-muted mb-2">
                    Progress
                  </h6>

                  <div class="row align-items-center no-gutters">
                    <div class="col-auto">

                      <!-- Heading -->
                      <span class="h2 mr-2 mb-0">
                        84.5%
                      </span>

                    </div>
                    <div class="col">

                      <!-- Progress -->
                      <div class="progress progress-sm">
                        <div class="progress-bar" role="progressbar" style="width: 85%" aria-valuenow="85"
                          aria-valuemin="0" aria-valuemax="100"></div>
                      </div>

                    </div>
                  </div> <!-- / .row -->

                </div>
                <div class="col-auto">

                  <!-- Icon -->
                  <span class="h2 fe fe-clipboard text-muted mb-0"></span>

                </div>  

            </div>
         </div>
     </div>
</div>
@endsection
