@extends('layouts.app')

@section('content')
<div class="header">
      <div class="container-fluid">
            <div class="header-body">
              <div class="row align-items-end">
                   <div class="col">
                      <h1 class="header-title">
                Edit Education
                       </h1>
                    </div>
                </div> 
            </div> 
        </div>
    </div>

                                    <div class="card m-5">
                                      
	                                    <div class="card-body">
			                                <form class="row" action="{{ route('employee.education.update', [$education->employee_id , $education->id]) }}" method="post" enctype="multipart/form-data" id="insert_education">
                                            @csrf
                                       @method('PATCH')  
                                            <span id="error"></span>
                                           <input hidden="hidden" type="text" name="employee_id" class="form-control form-control-line" value="{{  $employee_id}}" placeholder=" Degree Name" minlength="1" required> 
			                                  <div class="form-group col-md-6 m-t-5">
			                                        <label>Education Level</label>
			                                        <input type="text" name="education_type" class="form-control form-control-line" value="{{  $education->education_type}}"placeholder=" Degree Name" minlength="1" required> 
			                                    </div>
			                                    <div class="form-group col-md-6 m-t-5">
			                                        <label>Institute name</label>
			                                        <input type="text" name="institute" class="form-control form-control-line" value="{{  $education->institute}}" placeholder=" Institute name"  minlength="3" required> 
			                                    </div>
			                                    <div class="form-group col-md-6 m-t-5">
			                                        <label>Result</label>
			                                        <input type="text" name="result" class="form-control form-control-line" value="{{  $education->result}}" placeholder=" Result" minlength="2" required> 
			                                    </div>
			                                    <div class="form-group col-md-6 m-t-5">
			                                        <label>Passing Year</label>
			                                        <input type="numbe" name="year" value="{{  $education->year}}" class="form-control form-control-line" placeholder="Passing Year"> 
			                                    </div>
			                                  
			                                    <div class="form-actions col-md-6">
			                                        <button type="submit" class="btn btn-info">Update</button>
			                                    </div>
                                                <?=csrf_field()?>
			                                </form>
					                    </div>
                                    </div>
                                </div>



@endsection