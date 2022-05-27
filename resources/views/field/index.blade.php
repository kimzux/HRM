@extends('layouts.app')

@section('content')

<div class="page-wrapper">
<div class="message"></div>
<div class="row page-titles">
<div class="container-fluid">
            <div class="header-body ml-4">
              <div class="row align-items-end">
                   <div class="col">
                      <h1 class="header-title">
                     Application
                       </h1>
                    </div>
                    <div class="col-md-7 align-self-center">
      <ol class="breadcrumb">
         
         <li class="breadcrumb-item active">Field Authorization Application
         </li>
      </ol>
   </div>
                </div> 
            </div> 
        </div>
   
</div>
<div class="container-fluid ml-3">
<div class="row m-b-10">
   <div class="col-12 mt-4">
      <button type="button" class="btn btn-info">
      <i class="fa fa-plus"></i>
      <a data-toggle="modal" data-target="#appmodel" data-whatever="@getbootstrap" class="text-white" id="addNewApplication">
      <i class="" aria-hidden="true"></i> Add Application 
      </a>
      </button>
   </div>
</div>
<div class="row mt-4">
   <div class="col-12">
      <div class="card card-outline-info">
         <div class="card-header">
            <h4 class="m-b-0"> Application List                        
            </h4>
         </div>
         <div class="card-body">
            <div class="table-responsive ">
               <table id="myTable" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                  <thead>
                     <tr>
                        <th>ID</th>
                        <th>Project Name</th>
                        <th>Location</th>
                        <th>Employee PIN</th>
                        <th>Employee Name</th>
                        <th>start Date</th>
                        <th>Approx. End Date</th>
                        <th>Total Days</th>
                        <th>Actual Return Date</th>
                        <th>Status</th>
                        <th>Action</th>
                     </tr>
                  </thead>
                  <tfoot>
                     <tr>
                        <th>ID</th>
                        <th>Project Name</th>
                        <th>Location</th>
                        <th>Employee PIN</th>
                        <th>Employee Name</th>
                        <th>start Date</th>
                        <th>Approx. End Date</th>
                        <th>Total Days</th>
                        <th>Actual Return Date</th>
                        <th>Status</th>
                        <th>Action</th>
                     </tr>
                  </tfoot>
                  <tbody>
                  @foreach($field as $field_visit)
                  <tr>
                     <td>{{$field_visit->id}}</td>
                     <td>{{$field_visit->project->project_title}}</td>
                     <td>{{$field_visit->field_location}}</td>
                     <td>{{$field_visit->employee->em_code}}</td>
                     <td>{{$field_visit->employee->first_name}}</td>
                     <td>{{$field_visit->field_startdate}}</td>
                     <td>{{$field_visit->field_enddate}}</td>
                     <td>{{$field_visit->field_totaldays}}</td>
                     <td>{{$field_visit->return_date}}</td>
                     <td>
                                            @if(is_null($field_visit->status))
        <span class="p-2 mb-1 bg-primary text-white">Pending</span>
                    @elseif($field_visit->status == 1)
        <span class="p-2 mb-1 bg-success text-white">Approved</span>
                  @elseif($field_visit->status == 0)
        <span class="p-2 mb-1 bg-danger text-white">Rejected</span>
                 @endif</td>
                                     
                                        <td class="row">
                                        @if(is_null($field_visit->status))
                                            <a href="{{route('field.approved', $field_visit->id)}}" title="Edit" class="btn btn-sm btn-info waves-effect waves-light leaveapproval" data-id="<?php echo $field_visit->id; ?>">Approved</a>
                                            <a href="{{route('field.declined',$field_visit->id)}}" title="Edit" class="m-2 btn btn-sm btn-info waves-effect waves-light  Status" data-id = "<?php echo $field_visit; ?>" data-value="Rejected" >Reject</a><br>
                                            <a href="{{ route('field.edit', $field_visit->id)}}" title="Edit" class="m-2 btn btn-sm btn-info waves-effect waves-light leaveapp" data-id="<?php echo $field_visit; ?>" >Edit</a>
                                            @elseif($field_visit->status == 1)
                                            @elseif($field_visit->status == 0)
                                        @endif
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



<div class="row">
    <div class="col-md-12">
        <ul>
            <li>When you edit the applied forms from the edit button, don't forget to reauthorize approving the info.</li>
            <li>Once you give the final approval and confirm final closing, the attendance will be permanently updated.</li>
        </ul>
    </div>
</div>
<div class="modal fade" id="appmodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
   <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content ">
         <div class="modal-header">
            <h4 class="modal-title" id="exampleModalLabel1">Field Authorization
            </h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;
            </span>
            </button>
         </div>
         <form method="post" action="{{route('field.store')}}" id="fieldAuthForm" enctype="multipart/form-data">
            <div class="modal-body">
              <div class="row">
              <div class="col-md-6">
               <div class="form-group">
                  <label>Project Name
                  </label>
                  <select class="js-example-basic-single"  tabindex="1" name="project_id" style="width:100%" required>
                  <option value="">Select Here</option>
                  @foreach($project as $projects): 
                   <option value="{{$projects->id}}">{{$projects->project_title}}</option>
                  @endforeach
                  </select>
               </div>
               <div class="form-group">
                  <label>Employee
                  </label>
                  <select class="js-example-basic-single"  tabindex="1" name="first_name" style="width:100%"  required>
                  <option value="">Select Here</option>
                      @foreach($employee as $employees)
                          <option value="{{ $employees->id}}">{{ $employees->first_name}}</option>
                                  @endforeach
                                        
                  </select>
               </div>
               <div class="form-group">
                  <label for="flocation" class="control-label">Field Location</label>
                  <input type="text" class="form-control" placeholder="Field location" name="flocation">
               </div>
               <div class="form-group">
                  <label class="control-label">Approximate Start Date</label>
                  <input type="date" name="startdate" class="form-control mydatetimepickerFull" id="recipient-name1" required>
               </div>
               </div>
               <div class="col-md-6">
               <div class="form-group" id="enddate">
                  <label class="control-label">Approximate End Date
                  </label>
                  <input type="date" name="enddate" class="form-control mydatetimepickerFull" id="recipient-name1">
               </div>               
               
               
               
                  <input type="number" name="totalDays" hidden="hidden" class="form-control" id="recipient-name1" readonly>
            
               <div class="form-group">
                  <label class="control-label">Notes
                  </label>
                  <textarea name="notes" id="notes" class="form-control" rows="5"></textarea>
               </div>
               <div class="form-group" id="returnDate">
                  <label class="control-label">Actual Return Date
                  </label>
                  <input type="date" name="actualReturnDate" class="form-control" id="">
               </div>
            </div>
            </div>
            </div>
            <div class="modal-footer">
              <input type="hidden" name="fid">
               <button type="button" class="btn btn-default" data-dismiss="modal">Close
               </button>
               <button type="submit" class="btn btn-primary">Submit
               </button>
            </div>
            <?=csrf_field()?>
         </form>
      </div>
   </div>
</div>

<script>
    // In your Javascript (external .js resource or <script> tag)
$(document).ready(function() {
    $('.js-example-basic-single ').select2({
              dropdownParent: $("#appmodel")
      });
});
    </script>

@endsection