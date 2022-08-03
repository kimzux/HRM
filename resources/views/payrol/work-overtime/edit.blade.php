@extends('layouts.app')

@section('content')
<div class="header">
      <div class="container-fluid">
            <div class="header-body">
              <div class="row align-items-end">
                   <div class="col">
                      <h1 class="header-title">
                Edit Work-Overtime
                       </h1>
                    </div>
                </div> 
            </div> 
        </div>
    </div>
<div class="tab-pane ml-5" id="bank" role="tabpanel" style="width:50%">
     <div class="card">
	         <div class="card-body">
			              <form action="{{ route('work-overtime.update', $work_overtime->id) }}" method="post" enctype="multipart/form-data" >
                          @csrf
                        @method('PATCH') 
                          <div class="form-group">

                  <div class="form-group">
                          <label> Employee Name</label>     
                          <select class="js-example-basic-single"  tabindex="1" name="first_name" style="width:100%"  required>
                  <option value="">Select Here</option>
                      @foreach($employee as $employees)
                          <option value="{{ $employees->id}}">{{ $employees->first_name}}</option>
                                  @endforeach
                                        
                  </select>
                                      </div>
                                      <div class="form-group">
                                <label>Total Hours</label>
                                <input type="number" name="hours" class="form-control" id="recipient-name1" value="">
                            </div>
                            <div class="form-group row">
                                    <label class="control-label text-left col-md-5">Overtime Type</label><br>
                                    <div class="col-md-7">
                                    <input name="status" type="radio" id="radio_1" data-value="Rate A" class="duration" value="1.5" checked="checked">
                                    <label for="radio_1">Rate A</label>
                                    <input name="status" type="radio" id="radio_2" data-value="Rate B" class="type" value="2">
                                    <label for="radio_2">Rate B</label>
                                    </div>
                                </div>    
                            <div class="form-group">
                                
                                <input type="hidden" name="amount" class="form-control" id="recipient-name1" value="">
                            </div>
			                                
                                 <?=csrf_field()?>
			          </form>
				 </div>
          </div>
    </div>
    <script>
   $(document).ready(function() {
    $('.js-example-basic-single').select2();
});
    </script>

    @endsection