@extends('layouts.app')

@section('content')
      <div class="page-wrapper">
      <div class="header">
      <div class="container-fluid">
            <div class="header-body">
              <div class="row align-items-end">
                   <div class="col">
                      <h1 class="header-title">
                Notice Board
                       </h1>
                    </div>
                </div> 
            </div> 
        </div>
    </div>
        <div class="container-fluid mt-4">
                <div class="row m-b-10"> 
                    <div class="col-12">
                        <button type="button" class="btn btn-info"><i class="fa fa-plus"></i><a data-toggle="modal" data-target="#noticemodel" data-whatever="@getbootstrap" class="text-white "><i class="" aria-hidden="true"></i> Add Notice </a></button>
                    </div>
                </div> 
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card card-outline-info">
                            <div class="card-header">
                                    <h4 class="m-b-0 text-white"> Notice</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive ">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Sl</th>
                                                <th>Title</th>
                                                <th>File</th>
                                                <th>Date</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Sl</th>
                                                <th>Title</th>
                                                <th>File</th>
                                                <th>Date</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        @foreach($notice as $value)
                                            <tr>
                                                <td><?php echo $value->id; ?></td>
                                                <td><?php echo $value->title; ?></td>
                                                <td><a href="<?php echo $value->file_url ?>" target="_blank"><?php echo $value->file_url; ?></a></td>
                                                <td><?php echo $value->date; ?></td>
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
                        <div class="modal fade" id="noticemodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content ">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="exampleModalLabel1">Notice Board</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <form role="form" method="post" action="{{route('notice.store')}}" id="btnSubmit" enctype="multipart/form-data">
                                    <div class="modal-body">
                                            <div class="form-group">
                                                <label for="message-text" class="control-label">Notice Title</label>
                                                <textarea class="form-control" name="title" id="message-text1" required minlength="25" maxlength="150"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Document</label>
                                                <label for="recipient-name1" class="control-label">Title</label>
                                                <input type="file" name="file_url" class="form-control" id="recipient-name1" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="message-text" class="control-label">Published Date</label>
                                                <input type="date" name="date" class="form-control" id="recipient-name1" required>
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                    <?=csrf_field()?>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endsection    <!-- /.modal --> 
  
