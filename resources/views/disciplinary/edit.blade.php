 
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

        <!-- <div class="d-sm-flex align-items-center justify-content-between mb-4"> 
         <h1 class="h3 mb-0 text-gray-800">Add student</h1>
         </div> -->
        <hr class="sidebar-divider d-none d-md-block">
        <div class="card bg-light mb-3" style="max-width: 50rem">
            <div class="align-items-center justify-content-between mb-4">
                <div class="card-body">
                    <form method="post" action="{{ route('disciplinary.update',$disciplinary->id )  }}">
                                            @csrf
                                       @method('PATCH')  
                        <div class="form-group row">
                            <label for="disciplinary" class="col-sm-2 col-form-label"><b>Employee name:</b></label>
                            <div class="col-sm-6">
                                <select class="form-control" name="first_name">
                                <option>Select employee</option>
                                            @foreach ($disci as $disc)
                                            <option value="{{ $disc->id }}"{{ $disc->first_name=== ' $disc->id ' ? 'Selected' : '' }}> {{ $disc->first_name }} </option>
                                                 @endforeach

                                                                 
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="productquantity" class="col-sm-2 col-form-label"><b>disciplinary action:</b></label>
                            <div class="col-sm-4">
                            <select class="form-control custom-select" data-placeholder="Choose a Category" tabindex="1" name="disciplinary_action" value="">
                                                                <option value="Verbel Warning"{{ $disciplinary->disciplinary_action=== 'Verbel Warning' ? 'Selected' : '' }}>Verbel Warning</option>
                                                                <option value="Writing Warning" {{ $disciplinary->disciplinary_action=== 'Writing Warning' ? 'Selected' : '' }}>Writing Warning</option>
                                                                <option value="Demotion" {{ $disciplinary->disciplinary_action=== 'Demotion' ? 'Selected' : '' }}>Demotion</option>
                                                                <option value="Suspension" {{ $disciplinary->disciplinary_action=== 'Suspension' ? 'Selected' : '' }}>Suspension</option>
                                                            </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="productprice" class="col-sm-2 col-form-label"><b>title:</b></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="title" value="{{$disciplinary->title}}" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="productprice" class="col-sm-2 col-form-label"><b>Details:</b></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="details" value="{{$disciplinary->details}}" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="button" class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-offset-8 col-sm-8">
                                <button type="submit" class="btn btn-primary">Update Data</button>
                            </div>
                        </div>

                        <?= csrf_field() ?>
                    </form>
                </div>
            </div>

        </div>
    @endsection
