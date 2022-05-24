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
			              <form action="{{ route('assetlist.update', $assetlist->id) }}" method="post" enctype="multipart/form-data" >
                          @csrf
                        @method('PATCH') 
                          <div class="form-group">
                          <div class="form-group">
			                                 <label>Asset Name</label>
			                                 <input type="text" name="asset_name" value="{{$assetlist->asset_name}}" class="form-control form-control-line" minlength="5" required> 
			                                    </div>
                          <label> Category Type</label>     
                          <select name="category_name" class="form-control custom-select" required>
                         <option>Select Category Name</option>
                                            @foreach ($asset as $ass)
                                            <option value="{{ $ass->id }}"{{ $ass->category_name=== ' $ass->id ' ? 'Selected' : '' }}> {{ $ass->category_name}} </option>
                                                 @endforeach
                                          </select>
                                      </div>
			                                 <div class="form-group">
			                                 <label> Assets Brand</label>
			                                 <input type="text" name="asset_brand" value="{{$assetlist->asset_brand}}" class="form-control form-control-line"   required> 
			                                    </div>
                                                <div class="form-group">
			                                 <label> Assets Model</label>
			                                 <input type="text" name="asset_model" value="{{$assetlist->asset_model}}" class="form-control form-control-line"   required> 
			                                    </div>
                                                <div class="form-group">
			                                 <label> Assets code</label>
			                                 <input type="text" name="asset_code" value="{{$assetlist->asset_code}}" class="form-control form-control-line"   required> 
			                                    </div>
                                                <div class="form-group">
			                                 <label> Configuration</label>
			                                 <input type="text" name="configuration" value="{{$assetlist->configuration}}" class="form-control form-control-line"  required> 
			                                    </div>
                                                <div class="form-group">
			                                 <label> puerchasing date</label>
			                                 <input type="date" name="purchase_date" value="{{$assetlist->purchase_date}}" class="form-control form-control-line"  required> 
			                                    </div>
                                                <div class="form-group">
                                                <label> price</label>
			                                 <input type="number" name="price" value="{{$assetlist->price}}" class="form-control form-control-line"  required> 
			                                    </div>
                                                <div class="form-group">
                                                <label> Quantity</label>
			                                 <input type="number" name="quantity" value="{{$assetlist->quantity}}" class="form-control form-control-line"  required> 
			                                    </div>
                                        
                                        
			                        <button type="submit" class="btn btn-info"> <i class="fa fa-check"></i>update </button>
			                     </div>
                                 <?=csrf_field()?>
			          </form>
				 </div>
          </div>
    </div>
    @endsection