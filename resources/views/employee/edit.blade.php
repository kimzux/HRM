@extends('layouts.app')

@section('content')

<div class="page-wrapper">
    <div class="header">
      <div class="container-fluid">
            <div class="header-body">
              <div class="row align-items-end">
                   <div class="col">
                      <h1 class="header-title">
                Edit Employee
                      </h1>
                    </div>
                </div> 
            </div> 
        </div>
    </div>

            
    <div class="container-fluid">    
        <div class="row mt-4">
                    <div class="col-12" >
                        
                            <div class="card-header">
                            <div class="col-md-5 align-self-center">
                    <h3 class="mb-0 "><i class="fe fe-user" style="color:#1976d2"></i> <?php echo $employee->first_name .' '.$employee->last_name; ?></h3>
                </div><!-- <h4 class="m-b-0 "><i class="fe fe-user" aria-hidden="true"></i> Edit Employee<span class="pull-right " ></span></h4> -->
              </div>
              <ul class="nav nav-tabs profile-tab ml-4" role="tablist">
                                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home" role="tab" style="font-size: 14px;">  Personal Info </a> </li>
                                <!-- <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile" role="tab" style="font-size: 14px;"> Address </a> </li> -->
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#education" role="tab" style="font-size: 14px;"> Education</a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#experience" role="tab" style="font-size: 14px;"> Experience</a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#bank" role="tab" style="font-size: 14px;"> Bank Account</a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#document" role="tab" style="font-size: 14px;"> Document</a> </li>
                                <!-- <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#salary" role="tab" style="font-size: 14px;"> Salary</a> </li> -->
                                <!-- <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#leave" role="tab" style="font-size: 14px;"> Leave</a> </li> -->
                                <!-- <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#social" role="tab" style="font-size: 14px;"> Social Media</a> </li> -->
                            </ul>
                            <div class="tab-content">
                            <div class="card card-outline-info tab-pane fade show active"  id="home" role="tabpanel">
                            <div class="card-body">
                                <form class="row" method="post" action="{{ route('employee.update', $employee->id ) }}" enctype="multipart/form-data">
                                            @csrf
                                       @method('PUT') 
                                <div class="form-group col-md-3 m-t-20">
                                        <label>First Name</label>
                                        <input type="text" name="first_name" class="form-control form-control-line" value="{{ $employee->first_name }}" placeholder="Your first name" minlength="2" required > 
                                    </div>
                                    <div class="form-group col-md-3 m-t-20">
                                        <label>Last Name </label>
                                        <input type="text" id="" name="last_name" class="form-control form-control-line" value="{{ $employee->last_name }}" placeholder="Your last name" minlength="2" required> 
                                    </div>
                                    <div class="form-group col-md-3 m-t-20">
                                        <label>Employee Code </label>
                                        <input type="text" name="em_code" class="form-control form-control-line"  value="{{ $employee->em_code }}" placeholder="ID"> 
                                    </div>
                                    <div class="form-group col-md-3 m-t-20">
                                        <label>Department </label>
                                        <select name="dep_name" class="form-control custom-select" required>
                                            <option>Select Department</option>
                                            @foreach ($employees as $employee_user)
                                            <option value="{{ $employee_user->id }}"{{ $employee_user->dep_name=== ' $employee_user->id ' ? 'Selected' : '' }}> {{ $employee_user->dep_name }} </option>
                                                 @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3 m-t-20">
                                        <label>Designation </label>
                                        <select name="des_name" class="form-control custom-select" required>
                                            <option>Select Designation</option>
                                            @foreach ($value as $employees)
                                            <option value="{{ $employees->id }}"{{ $employees->des_name=== ' $employees->id ' ? 'Selected' : '' }}> {{ $employees->des_name }} </option>
                                                 @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3 m-t-20">
                                        <label>Gender </label>
                                        <select name="gender" class="form-control custom-select" required>
                                            <option>Select Gender</option>
                                            <option value="MALE" {{ $employee->gender=== 'MALE' ? 'Selected' : '' }}>Male</option>
                                            <option value="FEMALE" {{ $employee->gender=== 'FEMALE' ? 'Selected' : '' }}>Female</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3 m-t-20">
                                        <label>NID</label>
                                        <input type="text" name="em_nid" class="form-control" value="{{ $employee->em_nid }}" placeholder="" minlength="10" required> 
                                    </div>
                                    <div class="form-group col-md-3 m-t-20">
                                        <label>Contact Number </label>
                                        <input type="text" name="em_phone" class="form-control" value="{{ $employee->em_phone }}" placeholder="+8801231456" minlength="10" maxlength="15" required> 
                                    </div>
                                    <div class="form-group col-md-3 m-t-20">
                                        <label>Date Of Birth </label>
                                        <input type="date" name="dob" id="example-email2" value="{{ $employee->dob }}" class="form-control" placeholder="" required> 
                                    </div>
                                    <div class="form-group col-md-3 m-t-20">
                                        <label>Date Of Joining </label>
                                        <input type="date" name="joindate" id="example-email2" value="{{ $employee->joindate }}" class="form-control" placeholder=""> 
                                    </div>
                                    <div class="form-group col-md-3 m-t-20">
                                        <label>Date Of Leaving </label>
                                        <input type="date" name="leavedate" id="example-email2"  value="{{ $employee->leavedate }}" class="form-control" placeholder=""> 
                                    </div>
                                    <div class="form-group col-md-3 m-t-20">
                                        <label>Email </label>
                                        <input type="email" id="example-email2" name="email" value="{{ $employee->email }}" class="form-control" placeholder="email@mail.com" minlength="7" required > 
                                    </div>
                                    <div class="form-group col-md-3 m-t-20">
                                        <label>Address</label>
                                        <input type="text" name="em_address" class="form-control" value="{{ $employee->em_address }}" required> 
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
                                        <input type="file" name="image" class="form-control" value="{{ $employee->image }}"> 
                                    </div>
                                    <div class="form-actions col-md-12">
                                        <button type="submit" class="btn btn-info"> <i class="fa fa-check"></i> Update</button>
                                        <button type="button" class="btn btn-info">Cancel</button>
                                    </div>
                                    <?=csrf_field()?>  
                                </form>
                                 </div>
                                 </div>
            
              @include('employee.education.index')
                        </div>
</div>
                  
                </div>
              
            </div>
                    </div>
                </div>
    </div> 
</div>           

@endsection