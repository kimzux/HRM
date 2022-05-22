@extends('layouts.app')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>

    <div class="card-body">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div><br />
        @endif

        <div class="d-sm-flex align-items-center justify-content-between mb-4"> 
         <h1 class="h2 mb-0 text-gray-800">Edit Project</h1>
         </div>
        <hr class="sidebar-divider d-none d-md-block">
        <div class="card bg-light mb-3" style="max-width: 50rem">
            <div class="align-items-center justify-content-between mb-4">
                <div class="card-body">
                    <form method="post" action="{{ route('project.update',$project->id )  }}">
                    @csrf
                                       @method('PUT') 
                        
                         <div class="form-group row">
                            <label for="projecttitle" class="col-sm-2 col-form-label"><b>Project title:</b></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="project_title" value="{{ $project->project_title}}" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="productprice" class="col-sm-2 col-form-label"><b>Project startdate:</b></label>
                            <div class="col-sm-4">
                                <input type="date" class="form-control"  name="startdate" value="{{ $project->project_startdate}}" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="productprice" class="col-sm-2 col-form-label"><b>Project enddate:</b></label>
                            <div class="col-sm-4">
                                <input type="date" class="form-control"  name="enddate" value="{{ $project->project_enddate}}" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="productprice" class="col-sm-2 col-form-label"><b>Summary:</b></label>
                            <div class="col-sm-4">
                                <textarea class="form-control"  name="project_summary" value="{{ $project->project_summary}}"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="productprice" class="col-sm-2 col-form-label"><b>Details:</b></label>
                            <div class="col-sm-4">
                                <textarea type="text" class="form-control"  name="details" value="{{ $project->details}}"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                        <label for="productprice" class="col-sm-2 col-form-label"><b>Status:</b></label>
                            <div class="col-sm-4">
                                        <select name="project_status" class="form-control custom-select" required>
                                            <option>Select Status</option>
                                            <option value="Upcoming" {{ $project->project_status=== 'upcoming' ? 'Selected' : '' }}>Upcoming</option>
                                            <option value="complete" {{ $project->project_status=== 'complete' ? 'Selected' : '' }}>Complete</option>
                                            <option value="Running" {{ $project->project_status=== 'Running' ? 'Selected' : '' }}>Running</option>                 
                                        </select>
                              </div>
                                    </div>
                        

                        <div class="form-group row">
                            <label for="button" class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-offset-8 col-sm-8">
                                <button type="submit" class="btn btn-primary">update</button>
                            </div>
                        </div>

                        <?= csrf_field() ?>
                    </form>
                </div>
            </div>

        </div>
    @endsection
