@extends('layouts.app')

@section('content')

<div class="page-wrapper">
    <div class="header">
      <div class="container-fluid">
            <div class="header-body">
              <div class="row align-items-end">
                   <div class="col">
                      <h1 class="header-title">
                Add Employee
                      </h1>
                    </div>
                </div> 
            </div> 
        </div>
    </div>

            
    <div class="container-fluid">
      <div class="row m-b-10"> 
            <div class="col-12">
                        <!-- <button type="button" class="btn btn-primary"><i class="fa fa-bars"></i><a href="{{route('employee.index')}}" class="text-white"><i class="" aria-hidden="true"></i>  Employee List</a></button> -->
                <ul class="nav nav-tabs">
                   <li class="nav-item">
                     <a href="#registration" class="nav-link active" data-toggle="tab">Registration</a>
                   </li>
                    <li class="nav-item">
                      <a href="#profile" class="nav-link" data-toggle="tab">Excel Registration</a>
                    </li>
               
                </ul>
                        <!-- <button type="button" class="btn btn-primary"><i class="fa fa-bars"></i><a href="mployee/Disciplinary" class="text-white"><i class="" aria-hidden="true"></i>  Disciplinary List</a></button> -->
            </div>
        </div>
           
        <div class="row mt-4">
                    <div class="col-12" >
                        <div class="card card-outline-info tab-pane fade show active"  id="registration">
                            <div class="card-header">
                                <h4 class="m-b-0 "><i class="fe fe-user" aria-hidden="true"></i> Add New Employee<span class="pull-right " ></span></h4>
                            </div>
                            <div class="card-body">

                                <form class="row" method="post" action="{{route('employee.store')}}" enctype="multipart/form-data">
                                    <div class="form-group col-md-3 m-t-20">
                                        <label>First Name</label>
                                        <input type="text" name="first_name" class="form-control form-control-line" placeholder="Your first name" minlength="2" required > 
                                    </div>
                                    <div class="form-group col-md-3 m-t-20">
                                        <label>Last Name </label>
                                        <input type="text" id="" name="last_name" class="form-control form-control-line" value="" placeholder="Your last name" minlength="2" required> 
                                    </div>
                                    <div class="form-group col-md-3 m-t-20">
                                        <label>Employee Code </label>
                                        <input type="text" name="em_code" class="form-control form-control-line" placeholder="ID"> 
                                    </div>
                                    <div class="form-group col-md-3 m-t-20">
                                        <label>Department</label>
                                        <select name="dep_name" value="" class="form-control custom-select" required>
                                            <option>Select Department</option>
                                            @foreach ($employees as $employee)
                                             <option value="{{ $employee->id }}"> {{ $employee->dep_name }} </option>
                                                 @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3 m-t-20">
                                        <label>Designation </label>
                                        <select name="des_name" class="form-control custom-select" required>
                                            <option>Select Designation</option>
                                            @foreach ($value as $employees)
                                            <option value="{{ $employees->id }}"> {{ $employees->des_name }} </option>
                                                 @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3 m-t-20">
                                        <label>Gender </label>
                                        <select name="gender" class="form-control custom-select" required>
                                            <option>Select Gender</option>
                                            <option value="MALE">Male</option>
                                            <option value="FEMALE">Female</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3 m-t-20">
                                        <label>NID</label>
                                        <input type="text" name="em_nid" class="form-control" value="" placeholder="" minlength="10" required> 
                                    </div>
                                    <div class="form-group col-md-3 m-t-20">
                                        <label>Contact Number </label>
                                        <input type="text" name="em_phone" class="form-control" value="" placeholder="+8801231456" minlength="10" maxlength="15" required> 
                                    </div>
                                    <div class="form-group col-md-3 m-t-20">
                                        <label>Date Of Birth </label>
                                        <input type="date" name="dob" id="example-email2"  class="form-control" placeholder="" required> 
                                    </div>
                                    <div class="form-group col-md-3 m-t-20">
                                        <label>Date Of Joining </label>
                                        <input type="date" name="joindate" id="example-email2"  class="form-control" placeholder=""> 
                                    </div>
                                    <div class="form-group col-md-3 m-t-20">
                                        <label>Date Of Leaving </label>
                                        <input type="date" name="leavedate" id="example-email2"  class="form-control" placeholder=""> 
                                    </div>
                                    <div class="form-group col-md-3 m-t-20">
                                        <label>Email </label>
                                        <input type="email" id="example-email2" name="email" class="form-control" placeholder="email@mail.com" minlength="7" required > 
                                    </div>
                                    <div class="form-group col-md-3 m-t-20">
                                        <label>Address</label>
                                        <input type="text" name="em_address" class="form-control" value="" required> 
                                    </div><!--
                                    <div class="form-group col-md-3 m-t-20">
                                        <label>Password </label>
                                        <input type="text" name="password" class="form-control" value="" placeholder="**********"> 
                                    </div>
                                    <div class="form-group col-md-3 m-t-20">
                                        <label>Confirm Password </label>
                                        <input type="text" name="confirm" class="form-control" value="" placeholder="**********"> 
                                    </div>-->
                                    <div class="form-group col-md-3 m-t-20">
                                        <label>Image </label>
                                        <input type="file" name="image" class="form-control" value=""> 
                                    </div>
                                    <div class="form-actions col-md-12">
                                        <button type="submit" class="btn btn-info"> <i class="fa fa-check"></i> Save</button>
                                        <button type="button" class="btn btn-info">Cancel</button>
                                    </div>
                                    <?=csrf_field()?>  
                                </form>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile">
                  <div class="card bg-light mb-3" style="max-width: 60rem">
                    <div class="card-header">Upload the Employee From Excel File 
                     
                    </div>
                    <div class="card-body">
                      
                      <h5 class="card-title">
                      <br><p class="card-text pt-4" >This part allows you to upload all employee information.</p>
                      <form method="post" action="" enctype="multipart/form-data">
                      <input id="fileSelect" type="file" name="select_file" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" /> 
                      <div class="col-sm-offset-8 col-sm-8">
                        <hr class="sidebar-divider d-none d-md-block">
                        <button type="submit" name="submit" class="btn btn-primary" autocomplete="off">Save</button>
                    </div>
                    <?=csrf_field()?>
                  </form> 
                      </h5>
                    </div>
                  </div>
                  
                </div>
              
            </div>
                    </div>
                </div>
    </div> 
</div>           

@endsection