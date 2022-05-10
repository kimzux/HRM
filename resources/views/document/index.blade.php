@extends('layouts.app')

@section('content')
<div class="tab-pane" id="document" role="tabpanel">

      <div class="card m-4">
                 <div class="card-body">
                 <div class="header-body">
              <div class="row align-items-end">
                   <div class="col">
                      <h3 class="header-title">
            Employee Files
                      </h3>
                    </div>
                </div> 
            </div> 
                    <div class="table-responsive ">
                        <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>ID </th>
                                    <th>File Title</th>
                                    <th>File </th>
                                    

                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>ID </th>
                                    <th>File Title</th>
                                    <th>File </th>
                                  
                                </tr>
                            </tfoot>
                            <tbody>
                            @foreach($file as $files)
                                <tr>
                                <td>{{$files->id}}</td>
                                <td>{{$files->file_title}}</td>
                                <td>{{$files->file_url}}</td>
                                </tr>
                                @endforeach
        
                            </tbody>
                        </table>
                    </div>
                </div>                                    
                                    <div class="card-body">
                                        <form class="row" action="{{ route('employee.document.store' , $employee_id) }}"method="post"  enctype="multipart/form-data">
                                            <div class="form-group col-md-6 m-t-5">
                                                <label class="">File Title</label>
                                                <input type="text" name="file_title" class="form-control" required="" aria-invalid="false" minlength="5" required>
                                            </div>
                                            <div class="form-group col-md-6 m-t-5">
                                                <label class="">File</label>
                                                <input type="file" name="file_url"  class="form-control" required="" aria-invalid="false" required>
                                            </div>
                                               <div class="form-group">
                                                <div class="col-sm-12">
                                                    <input type="hidden" name="employee_id" value="{{  $employee_id}}">                                                   
                                                    <button type="submit" class="btn btn-success">Add File</button>
                                                </div>
                                      </div>
                                      <?=csrf_field()?>
                                        </form>
                                    </div>
                                </div>
</div>
                                @endsection