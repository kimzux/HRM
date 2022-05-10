@extends('layouts.app')

@section('content')

<div class="header">
      <div class="container-fluid">
            <div class="header-body">
              <div class="row align-items-end">
                   <div class="col">
                      <h1 class="header-title">
                Edit Experience
                       </h1>
                    </div>
                </div> 
            </div> 
        </div>
    </div>
                     
	                                <div class="card-body">
			                            <form class="row" action="{{ route('employee.experience.update', [$experience->employee_id , $experience->id]) }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                       @method('PATCH')  
                                            <input hidden="hidden" type="text" name="employee_id" class="form-control form-control-line" value="{{  $employee_id}}" placeholder=" Degree Name" minlength="1" required> 
			                                    	<div class="form-group col-md-6 m-t-5">
			                                    	    <label> Company Name</label>
			                                    	    <input type="text" name="company_name"  value="{{ $experience->exp_company }}" class="form-control form-control-line company_name"  placeholder="Company Name" minlength="2" required> 
			                                    	</div>
			                                    	<div class="form-group col-md-6 m-t-5">
			                                    	    <label>Position</label>
			                                    	    <input type="text" name="position_name" value="{{ $experience->exp_com_position }}" class="form-control form-control-line position_name" placeholder="Position" minlength="3" required> 
			                                    	</div>
			                                    	<div class="form-group col-md-6 m-t-5">
			                                    	    <label>Address</label>
			                                    	    <input type="text" name="address"  value="{{ $experience->comp_address}}" class="form-control form-control-line duty" placeholder=" Duty"  minlength="7" required> 
			                                    	</div>
			                                    	<div class="form-group col-md-6 m-t-5">
			                                    	    <label>Working Duration</label>
			                                    	    <input type="text" name="work_duration"   value="{{ $experience->work_duration}}" class="form-control form-control-line working_period"  placeholder="Working Duration" required> 
			                                    	</div>
			                                
		                                    	<div class="form-actions col-md-12">
                                                                                                 
		                                    	    <button type="submit" class="btn btn-info"> <i class="fa fa-check"></i> Save</button>
		                                    	</div>
                                                <?=csrf_field()?>
			                                </form>
					                    </div>
     </div>
                               
</div>
@endsection