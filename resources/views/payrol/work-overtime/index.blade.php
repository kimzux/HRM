@extends('layouts.app')

@section('content')
<div class="page-wrapper">
    <div class="message"></div>
    <div class="row page-titles">
    <div class="header">
      <div class="container-fluid">
            <div class="header-body ml-3">
              <div class="row align-items-end">
                   <div class="col">
                      <h1 class="header-title">
               Work Overtime
                       </h1>
                    </div>
                </div> 
            </div> 
        </div>
    </div>
            </div>
    </div>
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid ">
        <div class="row m-b-10">
            <div class="col-12">
                <button type="button" class="btn btn-info"><i class="fa fa-plus"></i><a data-toggle="modal" data-target="#leavemodel" data-whatever="@getbootstrap" class="text-white"><i class="" aria-hidden="true"></i> Add Work-Overtime</a></button>
            
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-12">
                <div class="card card-outline-info">
                    <div class="card-header">
                        <h4 class="m-b-0 "> Work-Overtime list  </h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive ">
                            <table id="example" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>ID </th>
                                        <th>employee name</th>
                                        <th>month</th>
                                        <th>total hours</th>
                                        <th>type of overtime</th>
                                        <th>Amount</th>
                                        <th>Proof</th>
                                        <th>status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                <th>ID </th>
                                        <th>employee name</th>
                                        <th>month</th>
                                        <th>total hours</th>
                                        <th>type of overtime</th>
                                        <th>Amount</th>
                                        <th>Proof</th>
                                        <th>status</th>
                                        <th>Action</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                @foreach( $work_overtime as $work)
                                <tr>
                                <td>{{$work->id}}</td>
                                <td>{{$work->employee->first_name}}</td>
                                <td>{{$work->month}}</td>
                                <td>{{$work->total_hours}}</td>
                                <td>@if($work->type==1.5)
                                        Rate A
                                        @elseif($work->type==2)
                                        Rate B
                                        @endif
                                <td>{{$work->amount}}</td>
                                <td><a href="{{ route('work.download', $work->id) }}" target="_blank">download</a></td>

                                <td>
                                            @if(is_null($work->status))
        <span class="p-2 mb-1 bg-primary text-white">Pending</span>
                    @elseif($work->status == 1)
        <span class="p-2 mb-1 bg-success text-white">Approved</span>
        @elseif($loans->status == 0)
        <span class="p-2 mb-1 bg-danger text-white">Rejected</span>
                 @endif</td>
                                     
                                        <td class="row">
                                        <a href="{{route('work-overtime.edit', $work->id)}}" title="edit" class="m-2 btn btn-sm btn-info waves-effect waves-light leaveapproval" data-id="<?php echo $work->id; ?>">Edit</a>
                                          
                                        @if(is_null($work->status))
                                            <a href="{{route('work-overtime.approve', $work->id)}}" title="approve" class="m-2 btn btn-sm btn-info waves-effect waves-light leaveapproval" data-id="<?php echo $work->id; ?>">Approve</a>
                                            <a href="{{route('work-overtime.decline', $work->id)}}" title="reject" class="m-2 btn btn-sm btn-info waves-effect waves-light  Status" data-id = "<?php echo $work->id; ?>" data-value="Rejected" >Reject</a><br>
                                             @elseif($work->status == 1)
                                               @elseif($work->status == 0)
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
        <div class="modal fade" id="leavemodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
            <div class="modal-dialog" role="document">
                <div class="modal-content ">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel1">Work-OverTime</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <form method="post" ction="{{route('work-overtime.store')}}" id="leaveform" enctype="multipart/form-data">
                        <div class="modal-body">
                        <div class="form-group ">
                                <label class="control-label">Assign To</label>
                                
                                  <select class="js-example-basic-single" data-placeholder="Choose a Category" tabindex="1" name="employee_id" id="assignval" style="width: 100%" required>
                                                  <option value="">Select here</option>
                                                   @foreach($employee as $employees)
                                                    <option value="{{ $employees->id}}">{{ $employees->first_name}}</option>
                                                    @endforeach
                                </select>
                            </div> 
                            <!-- <div class="form-group">
                                <label class="control-label">month</label>
                                <input type="month" name="month" class="form-control" id="recipient-name1" value="">
                            </div> -->
                            <div class="form-group">
                                <label class="control-label">Total Hours</label>
                                <input type="number" name="hours" class="form-control" id="recipient-name1" value="">
                            </div>
                            <div class="form-group">
                                                <label for="message-text" class="control-label">Proof</label>
                                                <input type="file" name="file_url" class="form-control" id="recipient-name1" required>
                                            </div>
                            <div class="form-group row">
                                    <label class="control-label text-left col-md-5">Overtime Type</label><br>
                                    <div class="col-md-7">
                                    <input name="status" type="radio" id="radio_1" data-value="Rate A" class="duration" value="1.5" checked="checked">
                                    <label for="radio_1">Rate A</label>
                                    <input name="status" type="radio" id="radio_2" data-value="Rate B" class="type" value="2">
                                    <label for="radio_2">Rate B</label>
                                    </div>
                                </div>    
                            <div class="form-group">
                                
                                <input type="hidden" name="amount" class="form-control" id="recipient-name1" value="">
                            </div>
                            <!-- <div class="form-group">
                                <label class="control-label">status</label>
                                <select class="form-control custom-select" data-placeholder="Choose a Category" tabindex="1" name="status" required>
                                    <option value="">Select Here</option>
                                    <option value="1">Active</option>
                                    <option value="0">InActive</option>
                                </select>
                            </div> -->
                            
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="id" value="" class="form-control" id="recipient-name1">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                        <?=csrf_field()?> 
                    </form>
                </div>
            </div>
        </div>
        <script>
        $(document).ready(function() {
    $('.js-example-basic-single ').select2({
              dropdownParent: $("#leavemodel")
      });
});
</script>
</script>
     <script>
    $(document).ready(function() {
    var table = $('#example').DataTable( {
        lengthChange: false,
        buttons: [ 'copy', 'excel', 'pdf', 'colvis' ]
    } );
 
    table.buttons().container()
        .appendTo( '#example_wrapper .col-md-6:eq(0)' );
} );
</script>

    @endsection