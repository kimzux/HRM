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
                        
                          <div class="form-group">
                          <label> Deduction Name</label>     
                         
                          <input type="text" name="name" value="{{$deduction->name}}" class="form-control form-control-line"   required> 
			                                    </div>
	
			                                 <div class="form-group">
			                                 <label> Deduction Description</label>
			                                 <input type="text" name="description" value="{{$deduction->description}}" class="form-control form-control-line"  required> 
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