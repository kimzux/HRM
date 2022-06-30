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
         <h1 class="h2 mb-0 text-gray-800">Edit Goals</h1>
         </div>
        <hr class="sidebar-divider d-none d-md-block">
        <div class="card mb-3" style="max-width: 50rem">
            <div class="align-items-center justify-content-between mb-4">
                <div class="card-body">
                    <form method="post" action="{{ route('performance.update', $performance->id )  }}">
                    @csrf
                                       @method('PUT') 
                         <div class="form-group">
                                <label>Employee</label>
                                <select class="js-example-basic-single"  tabindex="1" name="first_name" style="width:100%"  required>
                  <option value="">Select Here</option>
                      @foreach($employee as $employees)
                          <option value="{{ $employees->id}}">{{ $employees->first_name}}</option>
                                  @endforeach
                                        
                  </select>
    </div>
                        <div class="form-group">
                                <label class="control-label" id="hourlyFix">Goals</label>
                                <textarea name="goals" class="form-control" id="expectation" value="{{ $performance->goals}}"></textarea>
                            </div>
                            <div class="form-group">
                                <label class="control-label" id="hourlyFix">Expectations</label>
                                <textarea name="expect" class="form-control" id="expectation" value="{{ $performance->expectation}}"></textarea>
                            </div>
                            
                            <div class="form-group" id="expectedtime">
                                <label class="control-label">Expected Delivery Time</label>
                                <input type="text" name="expected_time" class="form-control" value="{{ $performance->expected_delivery_time}}" id="recipient-name1">
                            </div>
                        <div class="form-group row">
                            <label for="productquantity" class="col-sm-2 col-form-label"><b>Start Date:</b></label>
                            <div class="col-sm-4">
                                <input type="date" class="form-control" name="startdate" value="{{ $performance->start_date}}" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="productprice" class="col-sm-2 col-form-label"><b>End Date:</b></label>
                            <div class="col-sm-4">
                                <input type="date" class="form-control" name="enddate" value="{{ $performance->end_date}}" />
                            </div>
                        </div>
                       
                        <div class="form-group">
                                <input  type="hidden" class="form-control"  name="timeline" value="{{$performance->timeline}}" id="message-text1" required minlength="10">                                                
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
        <script>
    // In your Javascript (external .js resource or <script> tag)
$(document).ready(function() {
    $('.js-example-basic-single ').select2({
            
      });
});
    </script>
    @endsection
