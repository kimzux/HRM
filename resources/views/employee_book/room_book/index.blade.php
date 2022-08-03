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
               Book Room
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
                <button type="button" class="btn btn-info"><i class="fa fa-plus"></i><a data-toggle="modal" data-target="#leavemodel" data-whatever="@getbootstrap" class="text-white"><i class="" aria-hidden="true"></i> Add Room</a></button>
               
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-12">
                <div class="card card-outline-info">
                    <div class="card-header">
                        <h4 class="m-b-0 "> Rooms Book List  </h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive ">
                            <table id="example" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>ID </th>
                                        
                                        <th>employee name</th>
                                        <th>room number</th>
                                        <th>reservation date</th>
                                        <th>time in</th>
                                        <th>time out</th>
                                        <th>status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                      <th>employee name</th>
                                        <th>room number</th>
                                        <th>reservation date</th>
                                        <th>time in</th>
                                        <th>time out</th>
                                        <th>status</th>
                                        <th>Action</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                @foreach( $book as $books)
                                <tr>
                                <td>{{$books->id}}</td>
                                <td>{{$books->employee->first_name}}</td>
                                <td>{{$books->room->room_no}}</td>
                                <td>{{$books->reservation_date}}</td>
                                <td>{{$books->time_in}}</td>
                                <td>{{$books->time_out}}</td>
                                <td>
                                            @if(is_null($books->status))
        <span class="p-2 mb-1 bg-primary text-white">Booked</span>
                    @elseif($books->status == 1)
        <span class="p-2 mb-1 bg-success text-white">Occupied</span>
                  @elseif($books->status == 0)
        <span class="p-2 mb-1 bg-danger text-white">Free</span>
                 @endif</td>
                                     
                                        <td class="row">
                                        @if(is_null($books->status))
                                            <a href="{{route('book.occupy', $books->id)}}" title="occupied" class=" m-2 btn btn-sm btn-info waves-effect waves-light leaveapproval" data-id="<?php echo $books->id; ?>">Occupied</a>
                                            <a href="{{route('book.cancel', $books->id)}}" title="cancel" class="m-2 btn btn-sm btn-info waves-effect waves-light  Status" data-id = "<?php echo $books->id; ?>" data-value="Cancel" >Cancel</a><br>
                                             @elseif($books->status == 1)
                                             <a href="{{route('book.cancel', $books->id)}}" title="cancel" class="m-2 btn btn-sm btn-info waves-effect waves-light  Status" data-id = "<?php echo $books->id; ?>" data-value="Cancel" >Cancel</a><br>
                                            
                                            @elseif($books->status == 0)
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
                        <h4 class="modal-title" id="exampleModalLabel1">Book Room</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <form method="post" action="{{route('book-room.store')}}" id="leaveform" enctype="multipart/form-data">
                        <div class="modal-body">
                        
                        <div class="form-group">
                                <label>Employee</label>
                                <input type="text" name="employee_id" class="form-control" value="{{$employee->name}}" id="recipient-name1" readonly>
                            </div>
                            <div class="form-group ">
                                <label class="control-label">Room book</label>
                                
                                  <select class="form-select" aria-label="Default select example" data-placeholder="Choose a Category" tabindex="1" name="room_no" id="assignval" style="width: 100%" required>
                                                  <option value="">Select here</option>
                                                   @foreach($room as $rooms)
                                                    <option value="{{ $rooms->id}}">{{ $rooms->room_no}}</option>
                                                    @endforeach
                                </select>
                            </div> 
                            <div class="form-group">
                                <label class="control-label">reservation date</label>
                                <input type="date" name="reserve_date" class="form-control" id="recipient-name1" minlength="1" maxlength="35" value="" required>
                            </div>
                            <div class="form-group">
                                <label class="control-label">time in</label>
                                <input type="time" name="time_in"  class="form-control" id="recipient-name1" value="">
                            </div>
                            <div class="form-group">
                                <label class="control-label">time out</label>
                                <input type="time" name="time_out"  class="form-control" id="recipient-name1" value="">
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