@extends('layouts.app')

@section('content')
<div class="tab-pane m-4" id="experience" role="tabpanel">
        <div class="card">
        <div class="header">
      <div class="container-fluid">
            <div class="header-body">
              <div class="row align-items-end">
                   <div class="col">
                      <h3 class="header-title">
            Employee Experience
                      </h3>
                    </div>
                </div> 
            </div> 
        </div>
    </div>
                <div class="card-body">
                    <div class="table-responsive ">
                        <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                   
                                    <th>Company name</th>
                                    <th>Position </th>
                                    <th>Address</th>
                                    <th>Work Duration </th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                            
                                    <th>Company name</th>
                                    <th>Position </th>
                                    <th>Address</th>
                                    <th>Work Duration </th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                            @foreach($experience as $exp)
                                <tr>
                                <td>{{$exp->exp_company}}</td>
                                <td>{{$exp->exp_com_position}}</td>
                                <td>{{$exp->comp_address}}</td>
                                <td>{{$exp->work_duration}}</td>
                                   <td class="jsgrid-align-center ">
                                    <a href="{{ route('employee.experience.edit', [ $exp->employee_id , $exp->id]) }}" class="btn btn-primary">Edit</a>
                                        <a  hidden="hidden" onclick="confirm('Are you sure want to delet this Value?')" href="#" title="Delete" class="btn btn-sm btn-info waves-effect waves-light edudelet"  data-id=""><i class="fa fa-trash-o"></i></a>
                                    </td>  
                                </tr>
                                @endforeach
                            </tbody>
                         </table>
                    </div>
                </div>                                     
	                                <div class="card-body">
			                            <form class="row" action="{{ route('employee.experience.store' , $employee_id) }}" method="post" enctype="multipart/form-data">
                                            <input hidden="hidden" type="text" name="employee_id" class="form-control form-control-line" value="{{  $employee_id}}" placeholder=" Degree Name" minlength="1" required> 
			                                    	<div class="form-group col-md-6 m-t-5">
			                                    	    <label> Company Name</label>
			                                    	    <input type="text" name="company_name" class="form-control form-control-line company_name"  placeholder="Company Name" minlength="2" required> 
			                                    	</div>
			                                    	<div class="form-group col-md-6 m-t-5">
			                                    	    <label>Position</label>
			                                    	    <input type="text" name="position_name" class="form-control form-control-line position_name" placeholder="Position" minlength="3" required> 
			                                    	</div>
			                                    	<div class="form-group col-md-6 m-t-5">
			                                    	    <label>Address</label>
			                                    	    <input type="text" name="address" class="form-control form-control-line duty" placeholder=" Duty"  minlength="7" required> 
			                                    	</div>
			                                    	<div class="form-group col-md-6 m-t-5">
			                                    	    <label>Working Duration</label>
			                                    	    <input type="text" name="work_duration" class="form-control form-control-line working_period"  placeholder="Working Duration" required> 
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