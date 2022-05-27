@extends('layouts.app')

@section('content')
<div class="header">
      <div class="container-fluid">
            <div class="header-body">
              <div class="row align-items-end">
                   <div class="col">
                      <h1 class="header-title">
                Edit Logistic
                       </h1>
                    </div>
                </div> 
            </div> 
        </div>
    </div>
<div class="tab-pane ml-5" id="bank" role="tabpanel" style="width:50%">
     <div class="card">
	         <div class="card-body">
			              <form action="{{ route('logistic.update', $logistic->id) }}" method="post" enctype="multipart/form-data" >
                          @csrf
                        @method('PATCH') 
                          <div class="form-group">
                        
			                                 <div class="form-group">
			                                 <label> Logistic Name</label>
			                                 <input type="text" name="logistic_name" value="{{$logistic->logistic_name}}" class="form-control form-control-line" placeholder="Bank Name" minlength="5" required> 
			                                    </div>
                                                <div class="form-group">
			                                 <label>Description</label>
			                                 <input type="text" name="description" value="{{$logistic->description}}" class="form-control form-control-line" placeholder="Bank Name" minlength="5" required> 
			                                    </div>
                                                <div class="form-group">
			                                 <label>Quantity</label>
			                                 <input type="number" name="quantity" value="{{$logistic->quantity}}" class="form-control form-control-line" placeholder="Bank Name" minlength="5" required> 
			                                    </div>
                                                <div class="form-group">
			                                 <label> entry date</label>
			                                 <input type="date" name="entry_date" value="{{$logistic->entry_date}}" class="form-control form-control-line" placeholder="Bank Name" minlength="5" required> 
			                                    </div>
                                                <div class="form-group">
                                                <input name="logistic_sup" type="checkbox" id="radio_2" data-value="Logistic" class="type" value="Logistic">
                                                <label for="radio_2">Add To Logistic Support List</label>
                                            </div> 
                                        
			                        <button type="submit" class="btn btn-info"> <i class="fa fa-check"></i>update </button>
			                     </div>
                                 <?=csrf_field()?>
			          </form>
				 </div>
          </div>
    </div>
    @endsection