@extends('layouts.app')

@section('content')
<div class="header">
      <div class="container-fluid">
            <div class="header-body">
              <div class="row align-items-end">
                   <div class="col">
                      <h1 class="header-title">
                Edit Deduction
                       </h1>
                    </div>
                </div> 
            </div> 
        </div>
    </div>
<div class="tab-pane ml-5" id="deduction" role="tabpanel" style="width:50%">
     <div class="card">
	         <div class="card-body">
			              <form action="{{ route('deduction.update', $deduction->id) }}" method="post" enctype="multipart/form-data" >
                          @csrf
                        @method('PATCH') 
                        <div class="form-group ">
                                <label class="control-label">Assign To</label>
                                
                                  <select class="js-example-basic-single" data-placeholder="Choose a Category" tabindex="1" name="employee_id" id="assignval" style="width: 100%" required>
                                                  <option value="">Select here</option>
                                                   @foreach($employee as $employees)
                                                    <option value="{{ $employees->id}}">{{ $employees->first_name}}</option>
                                                    @endforeach
                                </select>
                            </div>   
                          <div class="form-group">
                          <label> Deduction Name</label>     
                         
                          <input type="text" name="name" value="{{$deduction->name}}" class="form-control form-control-line"  minlength="5" required> 
			                                    </div>
	
			                                 <div class="form-group">
			                                 <label> Deduction Percentage</label>
			                                 <input type="number" name="amount" value="{{$deduction->amount}}" step="any" class="form-control form-control-line"  minlength="5" required> 
			                                    </div>
	
                                        
			                        <button type="submit" class="btn btn-info"> <i class="fa fa-check"></i>update </button>
			                     </div>
                                 <?=csrf_field()?>
			          </form>
				 </div>
          </div>
    </div>
    <script>
        $(document).ready(function() {
    $('.js-example-basic-single ').select2({
              dropdownParent: $("#deduction")
      });
});
</script>
    @endsection