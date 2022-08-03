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
               Rooms
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
                <button type="button" class="btn btn-info"><i class="fa fa-plus"></i><a href="{{ route('book.index')}}" class="text-white"><i class="" aria-hidden="true"></i>Book Room</a></button>
           
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-12">
                <div class="card card-outline-info">
                    <div class="card-header">
                        <h4 class="m-b-0 "> Room List  </h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive ">
                            <table id="example" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>ID</th> 
                                        <th>Room Number</th>
                                        <th>size</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                        <th>ID </th>
                                        <th>Room Number</th>
                                        <th>Size</th>
                                        <th>Action</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                @foreach( $room as $rooms)
                                <tr>
                                <td>{{$rooms->id}}</td>
                                <td>{{$rooms->room_no}}</td>
                                <td>{{$rooms->size}}</td>
                                    <td class="row">
                                    <a href="{{ route('room.edit', $rooms->id)}}" class="btn btn-primary">Edit</a>
                                    <form action="{{ route('room.destroy', $rooms->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                                    <button class="ml-4 btn btn-danger" type="submit"
                                        onclick="return confirm('Are you sure  you want to delete?')">Delete</button>
                                        <?=csrf_field()?>
                                   </form>
                                    </td> 
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
                        <h4 class="modal-title" id="exampleModalLabel1">Room</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <form method="post" ction="{{route('room.store')}}" id="leaveform" enctype="multipart/form-data">
                        <div class="modal-body">
                        
                            <div class="form-group">
                                <label class="control-label">Room Number</label>
                                <input type="text" name="room_no" class="form-control" id="recipient-name1" minlength="1" maxlength="35" value="" required>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Room Capacity</label>
                                <input type="number" name="size"  class="form-control" id="recipient-name1" value="">
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
        
    @endsection