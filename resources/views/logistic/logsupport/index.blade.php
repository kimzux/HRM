@extends('layouts.app')

@section('content')
      <div class="page-wrapper">
      <div class="message"></div>
            <div class="row page-titles">
            <div class="container-fluid">
            <div class="header-body ">
              <div class="row align-items-end">
                   <div class="col">
                      <h1 class="header-title">
                   Logistic Support List
                       </h1>
                    </div>
                </div> 
            </div> 
        </div>
               
      
            <div class="container-fluid mt-4">
                <div class="row m-b-10"> 
                    <div class="col-12">
                        <button type="button" class="btn btn-info"><i class="fa fa-plus"></i><a data-toggle="modal" data-target="#supportmodel" data-whatever="@getbootstrap" class="text-white"><i class="" aria-hidden="true"></i> Add Logistic Support</a></button>                       
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card card-outline-info">
                            <div class="card-header">
                                <h4 class="m-b-0 "> Logistic Support List</h4>
                            </div>

                            <div class="card-body">
                                <div class="table-responsive ">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Logistic Name</th>
                                                <th>Assign User </th>
                                                <th>Project Name</th>
                                                <th>Task Name</th>
                                                <th>Quantity</th>
                                                <th>StartDate</th>
                                                <th>End Date</th>
                                                <th>Remain Qty</th>
                                                <th>Action </th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Logistic Name</th>
                                                <th>Assign User </th>
                                                <th>Project Name</th>
                                                <th>Task Name</th>
                                                <th>Quantity</th>
                                                <th>StartDate</th>
                                                <th>End Date</th>
                                                <th>Remain Qty</th>
                                                <th>Action </th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        @foreach($logsupport as $logis)
                                            <tr>
                                                <td>{{$logis->logistic->logistic_name }}</td>
                                                <td>{{$logis->employee->first_name }}</td>
                                                <td>{{$logis->project->project_title}}</td>
                                                <td>{{$logis->task->task_title}}</td>
                                                <td>{{$logis->quantity}}</td>
                                                <td>{{$logis->startdate}}</td>
                                                <td>{{$logis->enddate }}</td>
                                                <td>{{$logis->remain_quantity}}</td>
                                                <td class="row ">
                                                <a href="{{ route('logsupport.edit', $logis->id)}}" class="btn btn-primary">Edit</a>
                                                   
            </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                            <!-- sample modal content -->
                        <div class="modal fade" id="supportmodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content ">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="exampleModalLabel1"><i class="fa fa-map-o"></i> Add Logistice </h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <form method="post" action="{{route('logsupport.store')}}" id="logisticsform" enctype="multipart/form-data">
                                    <div class="modal-body">
                                           <div class="row">
                                            <div class="col-md-6">
                                             <div class="form-group">
                                                <label class="control-label">Logistic List</label>
                                                <select class="js-example-basic-single" data-placeholder="Choose a Category" tabindex="1" name="logistic_name" style="width:100%" required>
                                                  <option value="">Select Here</option>
                                                  @foreach($logistic as $log): ?>
                                                    <option value="{{$log->id}}">{{$log->logistic_name}}</option>
                                                   @endforeach
                                                </select>
                                        
                                            </div> 
                                             <div class="form-group">
                                                <label class="control-label">Project</label>
                                                <select class="js-example-basic-single" data-placeholder="Choose a Category" tabindex="1" name="project_title" id="OnEmValue" style="width:100%" required>
                                                  <option value="">Select Here</option>
                                                  @foreach($project as $projects)
                                                    <option value="{{$projects->id}}">{{$projects->project_title}}</option>
                                                   @endforeach
                                                </select>
                                               
                                            </div> 
                                             <div class="form-group">
                                                <label class="control-label">Task List</label>
                                                <select class="js-example-basic-single" data-placeholder="Choose a Category" tabindex="1" name="task_title" id="taskval" required>
                                                  <option value="">Select Here</option>
                                                   @foreach($task as $tasks)
                                                    <option value="{{ $tasks->id}}">{{ $tasks->task_title}}</option>
                                                    @endforeach
                                        
                                                </select>
                                             
                                            </div>  
                                             <div class="form-group">
                                                <label class="control-label">Employee Name</label>
                                                <select class="js-example-basic-single" data-placeholder="Choose a Category" tabindex="1" name="first_name" id="assignval" style="width: 100%" required>
                                                  <option value="">Select here</option>
                                                   @foreach($employee as $employees)
                                                    <option value="{{ $employees->id}}">{{ $employees->first_name}}</option>
                                                    @endforeach
                                        
                                                </select>
                                            </div> 
                                            </div>
                                            <div class="col-md-6">                                        
                                            <div class="form-group">
                                                <label class="control-label">Start Date</label>
                                                <input type="date" name="startdate" class="form-control mydatetimepickerFull" id="recipient-name1" value="" >
                                            </div>                                         
                                            <div class="form-group">
                                                <label class="control-label">End Date</label>
                                                <input type="date" name="enddate" class="form-control mydatetimepickerFull" id="recipient-name1" value="" >
                                            </div><!--                                          
                                            <div class="form-group">
                                                <label class="control-label">Back Date</label>
                                                <input type="date" name="backdate" class="form-control" id="recipient-name1" value="" >
                                            </div>-->
                                            <span>In Stock:<div style="color:red" class="qty"> </div></span>                                        
                                            <div class="form-group">
                                                <label class="control-label">Assign Qty</label>
                                                <input type="number" name="qty" class="form-control" id="recipient-name1 qty" value="" min="0" max="">
                                            </div><!--                                        
                                            <div class="form-group">
                                                <label class="control-label">Back Qty</label>
                                                <input type="text" name="backqty" class="form-control" id="recipient-name1" value="" >
                                            </div>-->
                                            <div class="form-group">
                                                <label class="control-label">Remarks</label>
                                                <textarea class="form-control col-md-8" name="remark" id="message-text1"></textarea>
                                            </div>                                            
                                        </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                       <input type="hidden" name="assid" value="">
                                       <div class="form-group">
                                <input hide="hidden" type="hidden" class="form-control"  name="remain_quantity" id="message-text1" required minlength="10">                                                
                            </div>
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                    <?=csrf_field()?>
                                    </form>
                                </div>
                            </div>
                        </div>
                            <!-- sample modal content -->
     

                        <script>
    // In your Javascript (external .js resource or <script> tag)
$(document).ready(function() {
    $('.js-example-basic-single ').select2({
              dropdownParent: $("#supportmodel")
      });
});
    </script>


@endsection       