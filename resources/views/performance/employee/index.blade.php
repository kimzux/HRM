@extends('layouts.app')

@section('content')
<div class="page-wrapper">
    <div class="header">
        <div class="container-fluid">
            <div class="header-body ml-1">
                <div class="row align-items-end">
                    <div class="col">
                        <h1 class="header-title">
                            Performance Review
                        </h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid mt-4">
            <div class="row m-b-10">
                <div class="col-12">
                    <button type="button" class="btn btn-info"><i class="fa fa-plus"></i><a data-toggle="modal" data-target="#appmodel" data-whatever="@getbootstrap" class="text-white"><i class="" aria-hidden="true"></i> Add Goals Provided</a></button>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-12">
                    <div class="card card-outline-info">
                        <div class="card-header">
                            <h4 class="m-b-0"> Goals List
                            </h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive ">
                                <table id="example" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Employee Name</th>
                                            <th>Goals</th>
                                            <th>Expectation</th>
                                            <th>Expected Timeline</th>
                                            <th>start Date</th>
                                            <th>End Date</th>
                                            <th>Timeline</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Employee Name</th>
                                            <th>Goals</th>
                                            <th>Expectation</th>
                                            <th>Expected Timeline</th>
                                            <th>start Date</th>
                                            <th>End Date</th>
                                            <th>Timeline</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach($performance as $perform)
                                        <tr style="vertical-align:top">
                                            <td><mark>{{$perform->employee->first_name}}</mark></td>
                                            <td>{{$perform->goals}}</td>
                                            <td>{{$perform->expectation}}</td>
                                            <td>{{$perform->expected_delivery_time}}</td>
                                            <td>{{$perform->start_date}}</td>
                                            <td>{{$perform->end_date}}</td>
                                            <td>{{$perform->timeline}} days</td>
                                            <td class="d-flex">
                                                <a href="{{ route('performance.edit', $perform->id)}}" title="Edit" class="m-2 btn btn-sm btn-info waves-effect waves-light leaveapp" data-id="<?php echo $perform->id; ?>">Edit</a>
                                                <a href="{{ route('performance.show', $perform->id)}}" title="Rate" class="m-2 btn btn-sm btn-primary waves-effect waves-light leaveapp" data-id="<?php echo $perform->id; ?>">Rate</a>
                                                <form action="{{ route('performance.destroy', $perform->id)}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="m-2 btn btn-sm btn-danger" type="submit" onclick="return confirm('Are you sure  you want to delete?')">Delete</button>
                                                    <?= csrf_field() ?>
                                                </form>
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
                            <h4 class="modal-title" id="exampleModalLabel1">Employee Perfomance Review</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <form method="post" action="{{route('performance.store')}}" id="leaveapply" enctype="multipart/form-data">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Employee</label>
                                    <input type="hidden" name="employee_id" value="{{ @$employee->id}}">
                                    <input type="text" name="first_name" class="form-control" id="recipient-name1" value="{{ @$employee->name}}" readonly>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" id="hourlyFix">Goals</label>
                                    <textarea name="goals" class="form-control" id="expectation" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" id="hourlyFix">Expectations</label>
                                    <textarea name="expect" class="form-control" id="expectation" required></textarea>
                                </div>
                                <div class="form-group" id="expectedtime">
                                    <label class="control-label">Expected Delivery Time</label>
                                    <input type="date" name="expected_time" class="form-control" id="recipient-name1" required>
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
                                    <input type="hidden" class="form-control" name="timeline" id="message-text1" required minlength="10">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <input type="hidden" name="id" class="form-control" id="recipient-name1" required>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                            <?= csrf_field() ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('.js-example-basic-single ').select2({
            dropdownParent: $("#appmodel")
        });
    });
</script>
<script>
    $(document).ready(function() {
        var table = $('#example').DataTable({
            lengthChange: false,
            buttons: ['copy', 'excel', 'pdf', 'colvis']
        });

        table.buttons().container()
            .appendTo('#example_wrapper .col-md-6:eq(0)');
    });
</script>

@endsection
