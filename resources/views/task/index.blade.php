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
                     Task
                       </h1>
                    </div>
                </div> 
            </div> 
        </div>
    </div>
            <div class="container-fluid ml-4">

                <div class="row m-b-10"> 
                    <div class="col-12">
                                             
                        <button type="button" class="btn btn-info"><i class="fa fa-plus"></i><a data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap" class="text-white"><i class="" aria-hidden="true"></i> Add Task </a></button>
                        <button type="button" class="btn btn-primary"><i class="fa fa-bars"></i><a href="{{route('project.index')}}" class="text-white"><i class="" aria-hidden="true"></i>  Project List</a></button>
                        <button type="button" class="btn btn-primary"><i class="fa fa-bars"></i><a href="" class="text-white"><i class="" aria-hidden="true"></i>  Field Visit</a></button>
                        
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card card-outline-info">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white"> Task List                   
                                </h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive ">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Project Title</th>
                                                <th>Tasks Title </th>
                                                <th>Start Date </th>
                                                <th>End Date </th>
                                                <th>Assigned Employee </th>
                                                <!--<th>Action </th>-->
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Project Title</th>
                                                <th>Tasks Title </th>
                                                <th>Start Date </th>
                                                <th>End Date </th>
                                                <th>Assigned Employee </th>
                                                <!--<th>Action </th>-->
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        @foreach($task as $tasks)
                                            <tr>
                                                <td>{{$tasks->project->project_title}}</td>
                                                <td>{{$tasks->task_title}}</td>
                                                <td>{{$tasks->task_startdate}}</td>
                                                <td>{{$tasks->task_enddate}}</td>
                                                <td>
                                            
                                                {{$tasks->employee->first_name}}, 
                                                @foreach($collab as $collabs)
                                                {{$collabs->employee->first_name}}
                                             @endforeach
                                                </td>
<!--                                                <td class="jsgrid-align-center ">
                                                    <a href="#" title="Edit" class="btn btn-sm btn-info waves-effect waves-light taskmodal" data-id="<?php #echo $value->id ?>"><i class="fa fa-pencil-square-o"></i></a>
                                                    <a onclick="alert('Are you sure want to delet this Value?')" href="#" title="Delete" class="btn btn-sm btn-info waves-effect waves-light TasksDelet" data-id="<?php #echo $value->id ?>"><i class="fa fa-trash-o"></i></a>
                                                </td>-->
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>  
            </div>
                        <!-- sample modal content -->
                        <div class="modal fade" id="exampleModal" role="dialog" tabindex="-1" aria-labelledby="exampleModalLabel1">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content ">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="exampleModalLabel1">Add Tasks</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <form method="post" action="{{route('task.store')}}" id="tasksModalform" enctype="multipart/form-data">
                                    <div class="modal-body">
                                             <div class="form-group row">
                                                <label class="control-label col-md-3">Project List</label>
                                                <select class="form-control custom-select col-md-8 proid" data-placeholder="Choose a Category" tabindex="1" name="projectid">
                                                   @foreach($project as $projects): ?>
                                                    <option value="{{$projects->id}}">{{$projects->project_title}}</option>
                                                   @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group row">
                                                <label class="control-label col-md-3">Project Date</label>
                                                <input type="text" value="{{$projects->project_startdate}}" name="project_startdate" class="form-control col-md-4" id="recipient-name1" readonly>
                                                <input type="text" value="{{$projects->project_enddate}}" name="project_enddate" class="form-control col-md-4" id="recipient-name1" readonly>
                                            </div>                                              
                                             <div class="form-group row">
                                                <label class="control-label col-md-3">Assign To</label>
                                                <div class="col-md-4 ">
                                                <select class="js-example-basic-single" data-placeholder="Choose a Category" tabindex="1" name="first_name">
                                                  <option value="">Select Here</option>
                                                   @foreach($employee as $employees)
                                                    <option value="{{ $employees->id}}">{{ $employees->first_name}}</option>
                                                    @endforeach
                                                </select>
                                                   </div>
                                                <label class="control-label col-md-2">Collaborators</label>
                                                <div class="col-md-3" >
                                                <select class="js-example-basic-multiple" data-placeholder="Choose a Category" multiple="multiple" style="width:25%" tabindex="1" name="assignto[]">
                                                @foreach($employee as $collaborator)
                                                    <option value="{{ $collaborator->id}}">{{ $collaborator->first_name}}</option>
                                                    @endforeach
                                                </select>
                                                   </div>
                                            </div>                                                                                   
                                            <div class="form-group row">
                                                <label class="control-label col-md-3">Task Title</label>
                                                <input type="text" name="title" class="form-control col-md-8" id="recipient-name1" minlength="8" maxlength="250" placeholder="Task....">
                                            </div>
                                            <div class="form-group row">
                                                <label class="control-label col-md-3">Task Start Date</label>
                                                <input type="date" name="startdate" class="form-control col-md-3 mydatetimepickerFull" id="recipient-name1">
                                                
                                                <label class="control-label col-md-2">Task End Date</label>
                                                <input type="date" name="enddate" class="form-control col-md-3 mydatetimepickerFull" id="recipient-name1">
                                            </div>
                                            <div class="form-group row">
                                                <label for="message-text" class="control-label col-md-3">Details</label>
                                                <textarea class="form-control col-md-8" name="details" id="message-text1" minlength="10" maxlength="1400"></textarea>
                                            </div> 
                             <div class="form-group row">
                                  <label for="inputStatus" class="control-label col-md-3">Status:</label>
                                
                                  <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" name="status" id="inlineRadio1" value="complete">
                                   <label class="form-check-label" for="inlineRadio1"> {{ (old('status') == 'complete') ? 'checked' : '' }} Complete</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                   <input class="form-check-input" type="radio" name="status" id="inlineRadio2" value="running">
                                   <label class="form-check-label" for="inlineRadio2"> {{ (old('status') == 'running') ? 'checked' : '' }} Running</label>
                                      </div>
                                      <div class="form-check form-check-inline">
                                   <input class="form-check-input" type="radio" name="status" id="inlineRadio3" value="Cancel">
                                   <label class="form-check-label" for="inlineRadio2"> {{ (old('status') == 'canncel') ? 'checked' : '' }} Cancel</label>
                                      </div>

                                  
                                </div>         
                                <div class="form-group row">
                                  <label for="inputStatus" class="control-label col-md-3">Type:</label>
                                
                                  <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" name="type" id="inlineRadio1" value="complete">
                                   <label class="form-check-label" for="inlineRadio1"> {{ (old('type') == 'office') ? 'checked' : '' }} Office</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                   <input class="form-check-input" type="radio" name="type" id="inlineRadio2" value="running">
                                   <label class="form-check-label" for="inlineRadio2"> {{ (old('status') == 'field') ? 'checked' : '' }} Field</label>
                                                   </div>
                                  
                                </div>                                    
                                                        
                                              
                                    <div class="modal-footer">
                                        <input type="hidden" name="id" class="form-control" id="recipient-name1">                                       
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Submit</button>
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
              dropdownParent: $("#exampleModal")
      });
});
    </script>
    <script>
    // In your Javascript (external .js resource or <script> tag)
    $(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});
    </script>

@endsection     