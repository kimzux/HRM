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
                  <a href="{{route('leave_apply.index')}}" ><h4 class="card-title text-uppercase text-black mb-2">
                    Total Leaves
                  </h4>

                  <!-- Heading -->
                  <span class="h2 mb-0">
                  <?= $total_leaves?? '' ?>
                  </span>
                  </a>
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
                <a href="{{route('project.index')}}" ><h4 class="card-title text-uppercase text-black mb-2">
                    Total Projects
                  </h4>

                  <!-- Heading -->
                  <span class="h2 mb-0">
                  <?= $total_projects?? '' ?>
                  </span>
                  </a>
                </div>
                <div class="col-auto">

                  <!-- Icon -->
                  <span class="h2 fe fe-briefcase text-muted mb-0"></span>

                </div>
              </div> <!-- / .row -->

            </div>
                  

            </div>
         </div>
     </div>
</div>
@endsection
