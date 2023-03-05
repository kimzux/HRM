@extends('layouts.app')

@section('content')
<div class="header">
      <div class="container-fluid">
            <div class="header-body">
              <div class="row align-items-end">
                   <div class="col">
                      <h1 class="header-title">
                Edit Asset
                       </h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
<div class="tab-pane ml-5" id="bank" role="tabpanel" style="width:50%">
     <div class="card">
	         <div class="card-body">
			              <form action="{{ route('asset.update', $asset->id) }}" method="post" enctype="multipart/form-data" >
                          @csrf
                        @method('PATCH')
                          <div class="form-group">
                          <label> Category Type</label>
                          <select name="category_type" class="form-control custom-select" required>
                                            <option value="">Select category</option>
                                            <option value="ASSETS" {{ $asset->category_type=== 'ASSETS' ? 'Selected' : '' }}>Assets</option>
                                            <option value="LOGISTIC" {{ $asset->category_type=== 'LOGISTIC' ? 'Selected' : '' }}>Logistice</option>
                                        </select>
                                      </div>
			                                 <div class="form-group">
			                                 <label> Category Name</label>
			                                 <input type="text" name="category_name" value="{{$asset->category_name}}" class="form-control form-control-line" placeholder="Bank Name" minlength="5" required>
			                                    </div>


			                        <button type="submit" class="btn btn-info"> <i class="fa fa-check"></i>update </button>
			                     </div>
                                 <?=csrf_field()?>
			          </form>
				 </div>
          </div>
    </div>
    @endsection
