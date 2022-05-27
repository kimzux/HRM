@extends('layouts.app')

@section('content')
<div class="header">
      <div class="container-fluid">
            <div class="header-body">
              <div class="row align-items-end">
                   <div class="col">
                      <h1 class="header-title">
                Edit Logistic Support List
                       </h1>
                    </div>
                </div> 
            </div> 
        </div>
    </div>
<div class="tab-pane ml-5" id="bank" role="tabpanel" style="width:50%">
     <div class="card">
	         <div class="card-body">
			              <form action="{{ route('logsupport.update', $logsupport->id) }}" method="post" enctype="multipart/form-data" >
                          @csrf
                        @method('PATCH') 
                          <div class="form-group">
                          <div class="form-group">
			                                 <label>Logistic List</label>
			                                 <select class="js-example-basic-single"  tabindex="1" name="logistic_name" style="width:100%" required>
                  <option value="">Select Here</option>
                  @foreach($logistic as $log)
                 <option value="{{$log->id}}">{{$log->logistic_name}}</option>
                     @endforeach
                  </select>
                  </div>
                  <div class="form-group">
                          <label>Project Name</label>     
                          <select class="js-example-basic-single"  tabindex="1" name="project_title" style="width:100%"  required>
                  <option value="">Select Here</option>
                  @foreach($project as $projects)
                                                    <option value="{{$projects->id}}">{{$projects->project_title}}</option>
                                                   @endforeach                  
                  </select>
               </div>
                  <div class="form-group">
                          <label> Task List</label>     
                          <select class="js-example-basic-single"  tabindex="1" name="task_title" style="width:100%"  required>
                  <option value="">Select Here</option>
                  @foreach($task as $tasks)
                 <option value="{{ $tasks->id}}">{{ $tasks->task_title}}</option>
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
			                                 <label>Start Date</label>
			                                 <input type="date" name="startdate" value="{{$logsupport->startdate}}" class="form-control form-control-line"   required> 
			                                    </div>
                                                <div class="form-group">
			                                 <label>End Date</label>
			                                 <input type="date" name="enddate" value="{{$logsupport->enddate}}" class="form-control form-control-line"   required> 
			                                    </div>
                                                <div class="form-group">
			                                 <label>Assign Qty</label>
			                                 <input type="number" name="quantity" value="{{$logsupport->quantity}}" class="form-control form-control-line"   required> 
			                                    </div>
                                                <input type="number" name="remain_day" hidden="hidden" class="form-control" id="recipient-name1" readonly>
                                                <div class="form-group">
			                                 <label> Remarks</label>
                                             <textarea class="form-control col-md-8" name="remark" id="message-text1" vvalue="{{$logsupport->remark}}"></textarea>
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