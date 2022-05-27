@extends('layouts.app')

@section('content')
<div class="header">
      <div class="container-fluid">
            <div class="header-body">
              <div class="row align-items-end">
                   <div class="col">
                      <h1 class="header-title">
                Edit Field Application
                       </h1>
                    </div>
                </div> 
            </div> 
        </div>
    </div>
<div class="tab-pane ml-5" id="bank" role="tabpanel" style="width:50%">
     <div class="card">
	         <div class="card-body">
			              <form action="{{ route('field.update', $field->id) }}" method="post" enctype="multipart/form-data" >
                          @csrf
                        @method('PATCH') 
                          <div class="form-group">
                          <div class="form-group">
			                                 <label>Project Name</label>
			                                 <select class="js-example-basic-single"  tabindex="1" name="project_id" style="width:100%" required>
                  <option value="">Select Here</option>
                  @foreach($project as $projects): 
                   <option value="{{$projects->id}}">{{$projects->project_title}}</option>
                  @endforeach
                  </select>
                  </div>
                  <div class="form-group">
                          <label> Employee Name</label>     
                          <select class="js-example-basic-single"  tabindex="1" name="first_name" style="width:100%"  required>
                  <option value="">Select Here</option>
                      @foreach($employee as $employees)
                          <option value="{{ $employees->id}}">{{ $employees->first_name}}</option>
                                  @endforeach
                                        
                  </select>
                                      </div>
			                                 <div class="form-group">
			                                 <label> Field location</label>
			                                 <input type="text" name="flocation" value="{{$field->field_location}}" class="form-control form-control-line"   required> 
			                                    </div>
                                                <div class="form-group">
			                                 <label> Approximate Start Date</label>
			                                 <input type="date" name="startdate" value="{{$field->field_startdate}}" class="form-control form-control-line"   required> 
			                                    </div>
                                                <div class="form-group">
			                                 <label> Approximate End Date</label>
			                                 <input type="date" name="enddate" value="{{$field->field_enddate}}" class="form-control form-control-line"   required> 
			                                    </div>
                                                <input type="number" name="totalDays" hidden="hidden" class="form-control" id="recipient-name1" readonly>
                                                <div class="form-group">
			                                 <label> Notes</label>
			                                 <input type="text" name="notes" value="{{$field->notes}}" class="form-control form-control-line"  required> 
			                                    </div>
                                                <div class="form-group">
			                                 <label>actual Return date</label>
			                                 <input type="date" name="actualReturnDate" value="{{$field->return_date}}" class="form-control form-control-line"  required> 
			                                    </div>
                                               
                                        
			                        <button type="submit" class="btn btn-info"> <i class="fa fa-check"></i>update </button>
			                     </div>
                                 <?=csrf_field()?>
			          </form>
				 </div>
          </div>
    </div>
    <script>
   $(document).ready(function() {
    $('.js-example-basic-single').select2();
});
    </script>

    @endsection