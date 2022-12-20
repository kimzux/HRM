@extends('layouts.app')

@section('content')
      <div class="page-wrapper">
            <div class="message"></div>
            <div class="row page-titles">
            <div class="header">
      <div class="container-fluid">
            <div class="header-body ml-4">
              <div class="row align-items-end">
                   <div class="col">
                      <h1 class="header-title">
                     Projects
                       </h1>
                    </div>
                </div> 
            </div> 
        </div>
    </div>
                     

            <div class="container-fluid ml-4">
                <div class="row m-b-10"> 
                    <div class="col-12">
                        <button type="button" class="btn btn-info"><i class="fe fe-plus"></i><a data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap" class="text-white"><i class="" aria-hidden="true"></i> Add Project </a></button>
                        <button type="button" class="btn btn-primary"><i class="fe fe-bars"></i><a href="{{route('task.index')}}" class="text-white"><i class="" aria-hidden="true"></i>  Task List</a></button>
                        <button type="button" class="btn btn-primary"><i class="fe fe-bars"></i><a href="{{route('field.index')}}" class="text-white"><i class="" aria-hidden="true"></i>  Field Visit</a></button>
                      
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card card-outline-info">
                            <div class="card-header">
                                <h4 class="m-b-0 "> Project List                        
                                </h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive ">
                                    <table id="example" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Project Title</th>
                                                <th>Status </th>
                                                <th>Start Date </th>
                                                <th>End Date </th>
                                                <th>Action </th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Project Title</th>
                                                <th>Status </th>
                                                <th>Start Date </th>
                                                <th>End Date </th>
                                                <th>Action </th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        @foreach($project as $projects)
                                            <tr>
                                                <td>{{$projects->project_title}}</td>
                                                <td>{{$projects->project_status}}</td>
                                                <td>{{$projects->project_startdate}}</td>
                                                <td>{{$projects->project_enddate}}</td>
                                                <td class="d-flex">
                                                <a href="{{ route('project.edit', $projects->id)}}" class="btn btn-primary">Edit</a>
                                    <form action="{{ route('project.destroy', $projects->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                                    <button class="ml-4 btn btn-danger" type="submit"
                                        onclick="return confirm('Are you sure  you want to delete?')">Delete</button>
                                        <?=csrf_field()?>
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
                        <!-- sample modal content -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content ">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="exampleModalLabel1"><i class="fa fa-braille"></i> Add Project</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <form method="post" action="{{route('project.store')}}" id="btnSubmit" enctype="multipart/form-data">
                                    <div class="modal-body">
                                        <div class="row">
                                           <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Project Title</label>
                                                <input type="text" name="project_title" class="form-control" id="recipient-name1" minlength="8" maxlength="250" placeholder="">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Project Start Date</label>
                                                <input type="date" name="startdate" class="form-control datepicker" id="recipient-name1" placeholder="">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Project End Date</label>
                                                <input type="date" name="enddate" class="form-control datepicker" id="recipient-name1" required placeholder="">
                                            </div>
                                            <div class="form-group">
                                                <label for="message-text" class="control-label">Summary</label>
                                                <textarea class="form-control" name="project_summary" id="message-text1" placeholder=""></textarea>
                                            </div>
                                            </div>
                                            <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="message-text" class="control-label">Details</label>
                                                <textarea class="form-control" name="details" id="message-text1" minlength="10" maxlength="1300" rows="8" placeholder=""> </textarea>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Status</label>
                                                <select class="form-control custom-select" data-placeholder="Choose a Category" tabindex="1" name="project_status" required>
                                                    <option value="upcoming">Upcoming</option>
                                                    <option value="complete">Complete</option>
                                                    <option value="running">Running</option>
                                                </select>
                                            </div>
                                        </div>                                            
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                    <?= csrf_field() ?>
                                    </form>
                                </div>
                            </div>
                        </div>
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
                        <!-- /.modal -->    
 @endsection