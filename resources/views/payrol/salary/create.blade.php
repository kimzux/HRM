@extends('layouts.app')

@section('content')
         <div class="page-wrapper">
            <div class="message"></div>
            <div class="header">
      <div class="container-fluid">
            <div class="header-body ml-2">
              <div class="row align-items-end">
                   <div class="col">
                      <h1 class="header-title">
                Create Payrol
                       </h1>
                    </div>
                </div> 
            </div> 
        </div>
    </div>
<div class="card m-4">
	    <div class="card-body">
            <h2 class="card-title" id="">Salary Setup for <mark>{{$employee->first_name}}</mark>
            </h2>
            <form method = "POST" action = "route('employee.salary.store' , $employee_id)" enctype = "multipart/form-data">
                   <div class="">
                                            
              <div class="form-group row">
                <label class="control-label text-left col-md-3">Month
                </label>
                <div class="col-md-9">
                <input type="hidden" name="year">
                <select class="form-control custom-select" data-placeholder="Choose a Category" tabindex="1" name="month" id="salaryMonth" required>
                  <option value="#">Select Here
                  </option>
                  <option value="1">January
                  </option>
                  <option value="2">February
                  </option>
                  <option value="3">March
                  </option>
                  <option value="4">April
                  </option>
                  <option value="5">May
                  </option>
                  <option value="6">June
                  </option>
                  <option value="7">July
                  </option>
                  <option value="8">August
                  </option>
                  <option value="9">September
                  </option>
                  <option value="10">October
                  </option>
                  <option value="11">November
                  </option>
                  <option value="12">December
                  </option>
                </select>
                </div>
              </div>
            <div class="row well"> 
            <div class="col-md-7">                                    
              <div class="form-group row">
                <label class="control-label text-left col-md-5">Basic Salary
                </label>
                <div class="col-md-7">
                <input type="number" name="basic_salary" class="form-control" id="" value="">
              </div> 
              </div>                                                                     
              <div class="form-group row" style="display:none">
                <label class="control-label text-left col-md-5">
                </label>
                <div class="col-md-7">
                <input type="hidden" name="employee_id" class="form-control hrate" id="hrate" value='{{$employee->id}}'>
                </div>
              </div>                                    
              <div class="form-group row" id="addition">
                <label class="control-label text-left col-md-5">Work Overtime
                </label>
                <div class="col-md-7">
                <input type="number" name="work_overtime" class="form-control" id="" value="">
              </div>
              </div>
              <div class="form-group row">
                <label class="control-label text-left col-md-5">Pay Date
                </label>
                <div class="col-md-7">
                  <input type="date" name="pay_date" class="form-control mydatetimepickerFull" id="" value="" required>
                </div>
              </div>              
              </div>
              <div class="col-md-7">                                     
              <div class="form-group row" id="deduction">
                <label class="control-label text-left col-md-5">Deduction
                </label>
                         <div class="col-md-7" >
                               <select class="js-example-basic-multiple" data-placeholder="Choose a Category" multiple="multiple" style="width:25%" tabindex="1" name="assignto[]">
                                                @foreach($deduction as $deduct)
                                                    <option value="{{ $deduct->id}}">{{ $deduct->name}}</option>
                                                    @endforeach
                                                </select>
                                                   </div>
                                                     
              </div>                                      
            
                <input hidden="hidden" type="text" name="loan_id" class="form-control loan" id="" value="">
                                           
              <div class="form-group row">
               
                <div class="col-md-7">
                   <input hidden="hidden" type="text" name="final_salary" class="form-control total_paid" id="" value="" required>
                </div>
              </div>
              <!--<div class="form-group row">
                <label class="control-label text-left col-md-5">Status
                </label>
                <div class="col-md-7">
                <select class="form-control custom-select" data-placeholder="Choose a Category" tabindex="1" name="status" required>
                  <option value="#">Select Here
                  </option>
                  <option value="Paid">Paid
                  </option>
                  <option value="Process">Process
                  </option>
                </select>    
              </div>     
              </div>-->
                                <div class="form-group row">
                                    <label class="control-label text-left col-md-5">Status</label><br>
                                    <div class="col-md-7">
                                    <input name="status" type="radio" id="radio_1" data-value="Paid" class="duration" value="Paid" checked="checked">
                                    <label for="radio_1">Paid</label>
                                    <input name="status" type="radio" id="radio_2" data-value="Process" class="type" value="Process">
                                    <label for="radio_2">Process</label>
                                    </div>
                                </div>                            
              </div>              
              </div>   
              <!--<div class="form-group row" style="margin-top: 25px;">
                <label class="control-label text-left col-md-3">Paid Type
                </label>
                <div class="col-md-9">
                <select class="form-control custom-select" data-placeholder="Choose a Category" tabindex="1" name="paid_type" required>
                  <option value="#">Select Here
                  </option>
                  <option value="Hand Cash">Hand Cash
                  </option>
                  <option value="Bank">Bank
                  </option>
                </select>
                </div>                 
              </div>-->
                                <div class="form-group row" style="margin-top: 25px;">
                               
                                  <label for="inputStatus" class="control-label col-md-3">Paid Type:</label>
                                
                                  <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" name="type" id="inlineRadio1" value="complete">
                                   <label class="form-check-label" for="inlineRadio1"> {{ (old('type') == 'handcash') ? 'checked' : '' }}Hand Cash</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                   <input class="form-check-input" type="radio" name="type" id="inlineRadio2" value="running">
                                   <label class="form-check-label" for="inlineRadio2"> {{ (old('status') == 'bank') ? 'checked' : '' }} Bank</label>
                                                   </div>
                                  
                             
                                </div>                             
                              
                     
                                                 
                                <div class="col-sm-offset-8 col-sm-8">
                        <hr class="sidebar-divider d-none d-md-block">
                        <button type="submit" name="submit" class="btn btn-primary" autocomplete="off">Submit</button>
                    </div>

              <?=csrf_field()?>       </form>
</div>

        </div>
</div>
<div>
<script>
    // In your Javascript (external .js resource or <script> tag)
    $(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});
    </script>
     @endsection