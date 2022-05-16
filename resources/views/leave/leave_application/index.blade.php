@extends('layouts.app')

@section('content')
<div class="page-wrapper">
    <div class="message"></div>
    <div class="header">
      <div class="container-fluid">
            <div class="header-body ml-4">
              <div class="row align-items-end">
                   <div class="col">
                      <h1 class="header-title">
                Leave application
                       </h1>
                    </div>
                </div> 
            </div> 
        </div>
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <div class="row m-b-10">
           
            <div class="col-12">
                <button type="button" class="btn btn-info"><i class="fa fa-plus"></i><a data-toggle="modal" data-target="#appmodel" data-whatever="@getbootstrap" class="text-white"><i class="" aria-hidden="true"></i> Add Application </a></button>
                <button type="button" class="btn btn-primary"><i class="fa fa-bars"></i><a href="" class="text-white"><i class="" aria-hidden="true"></i>  Holiday List</a></button>
            </div>
          
        </div>
        <div class="row mt-4">
            <div class="col-12">
                <div class="card card-outline-info">
                    <div class="card-header">
                        <h4 class="m-b-0 text-white"> Application List
                        </h4>
                    </div>
                   
                    <div class="card-body">
                        <div class="table-responsive ">
                            <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Employee Name</th>
                                        <th>PIN</th>
                                        <th>Leave Type</th>
                                     
                                        <th>start Date</th>
                                        <th>End Date</th>
                                        <th>Leave Duration</th>
                                        <th>Leave Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>Employee Name</th>
                                    <th>PIN</th>
                                    <th>Leave Type</th>
                                    <th>start Date</th>
                                    <th>End Date</th>
                                    <th>Leave Duration</th>
                                    <th>Leave Status</th>
                                    <th>Action</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                @foreach($leave_apply as $apply)
                                    <tr style="vertical-align:top">
                                       
                                        <td><mark>{{$apply->employee->first_name}}</mark></td>
                                        <td>{{$apply->employee->em_code}}</td>
                                        <td>{{$apply->leave_type->leavename}}</td>
                                        <td>{{$apply->start_date}}</td>
                                        <td>{{$apply->end_date}}</td>
                                        <td>{{$apply->total_day}} days</td>
                                         @if($apply->status ==0)
                                        <td>Not approved</td>
                                        @endif
                                        
                                        <td class="row">
                
                                            <a href="{{route('leave.approve', $apply->id)}}"" title="Edit" class="btn btn-sm btn-info waves-effect waves-light leaveapproval" data-id="<?php echo $apply->id; ?>">Approved</a>
                                            <a href="{{route('leave.decline', $apply->id)}}" title="Edit" class="m-2 btn btn-sm btn-info waves-effect waves-light  Status" data-id = "<?php echo $apply->id; ?>" data-value="Rejected" >Reject</a><br>
                                          
                                            <a href="{{ route('leave_apply.edit', $apply->id)}}" title="Edit" class="m-2 btn btn-sm btn-info waves-effect waves-light leaveapp" data-id="<?php echo $apply->id; ?>" >Edit</a>
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
        <div class="modal fade" id="appmodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
            <div class="modal-dialog" role="document">
                <div class="modal-content ">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel1">Leave Application</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <form method="post" action="{{route('leave_apply.store')}}"" id="leaveapply" enctype="multipart/form-data">
                        <div class="modal-body">
                            
                            <div class="form-group">
                                <label>Employee</label>
                                <select class=" form-control custom-select selectedEmployeeID"  tabindex="1" name="first_name" required>
                                <option value="">Select Here..</option>
                                            @foreach ($employee as $employees)
                                             <option value="{{ $employees->id }}"> {{ $employees->first_name }} </option>
                                                 @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Leave Type</label>
                                <select class="form-control custom-select assignleave"  tabindex="1" name="leavename" id="leavetype" required>
                                    <option value="">Select Here..</option>
                                            @foreach ($leave_type as $leave)
                                             <option value="{{ $leave->id }}"> {{ $leave->leavename }} </option>
                                                 @endforeach
                                </select>
                            </div>
                            
                            
                            <div class="form-group">
                                <label class="control-label" id="hourlyFix">Start Date</label>
                                <input type="date" name="startdate" class="form-control" id="recipient-name1" required>
                            </div>
                            <div class="form-group" id="enddate">
                                <label class="control-label">End Date</label>
                                <input type="date" name="enddate" class="form-control" id="recipient-name1">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Reason</label>
                                <textarea class="form-control" name="reason" id="message-text1" required minlength="10"></textarea>                                                
                            </div>
                            <div class="form-group">
                                <input hide="hidden" type="hidden" class="form-control"  name="total_day" id="message-text1" required minlength="10">                                                
                            </div>
                            
                        </div>
                        
                        <div class="modal-footer">
                            <input type="hidden" name="id" class="form-control" id="recipient-name1" required>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                        <?=csrf_field()?>
                    </form>
                </div>
            </div>
        </div>

        
        <!-- Set leaves approved for ADMIN? -->
        <script type="text/javascript">
            $(document).ready(function() {
                $(".leaveapproval").click(function(e) {
                    e.preventDefault(e);
                    // Get the record's ID via attribute
                    var iid = $(this).attr('data-id');
                    $('#leaveapplyval').trigger("reset");
                    $('#appmodelcc').modal('show');
                    $.ajax({
                        url: 'LeaveAppbyid?id=' + iid,
                        method: 'GET',
                        data: '',
                        dataType: 'json',
                    }).done(function(response) {
                        console.log(response);
                        // Populate the form fields with the data returned from server
                        $('#leaveapplyval').find('[name="id"]').val(response.leaveapplyvalue.id).end();
                        $('#leaveapplyval').find('[name="emid"]').val(response.leaveapplyvalue.em_id).end();
                        $('#leaveapplyval').find('[name="applydate"]').val(response.leaveapplyvalue.apply_date).end();
                        $('#leaveapplyval').find('[name="typeid"]').val(response.leaveapplyvalue.typeid).end();
                        $('#leaveapplyval').find('[name="startdate"]').val(response.leaveapplyvalue.start_date).end();
                        $('#leaveapplyval').find('[name="enddate"]').val(response.leaveapplyvalue.end_date).end();
                        $('#leaveapplyval').find('[name="duration"]').val(response.leaveapplyvalue.leave_duration).end();
                        $('#leaveapplyval').find('[name="reason"]').val(response.leaveapplyvalue.reason).end();
                        $('#leaveapplyval').find('[name="status"]').val(response.leaveapplyvalue.leave_status).end();
                    });
                });
            });
        </script>
        @endsection