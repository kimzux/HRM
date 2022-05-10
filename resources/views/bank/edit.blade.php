@extends('layouts.app')

@section('content')
<div class="header">
      <div class="container-fluid">
            <div class="header-body">
              <div class="row align-items-end">
                   <div class="col">
                      <h1 class="header-title">
                Edit Bank Information
                       </h1>
                    </div>
                </div> 
            </div> 
        </div>
    </div>
<div class="tab-pane" id="bank" role="tabpanel">
     <div class="card">
	         <div class="card-body">
			              <form class="row" action="{{ route('employee.bank.update', [$bank->employee_id , $bank->id]) }}" method="post" enctype="multipart/form-data">
                          @csrf
                        @method('PATCH') 
                          <div class="form-group col-md-6 m-t-5">
                                <input type="hidden" name="employee_id" value="{{  $employee_id}}">
                                       <input type="hidden" name="id" value="<?php if(!empty($bank->id)) echo $bank->id  ?>">
			                              <label> Bank Holder Name</label> 
			                                    <input type="text" name="holder_name" value="{{$bank->holder_name}}" class="form-control form-control-line" placeholder="Bank Holder Name" minlength="5" required> 
			                                </div>
			                                 <div class="form-group col-md-6 m-t-5">
			                                 <label>Bank Name</label>
			                                 <input type="text" name="bank_name" value="{{$bank->bank_name}}" class="form-control form-control-line" placeholder="Bank Name" minlength="5" required> 
			                                    </div>
			                                    <div class="form-group col-md-6 m-t-5">
			                                        <label>Branch Name</label>
			                                        <input type="text" name="branch_name" value="{{$bank->branch_name}}" class="form-control form-control-line" placeholder=" Branch Name"> 
			                                    </div>
			                                    <div class="form-group col-md-6 m-t-5">
			                                        <label>Bank Account Number</label>
			                                        <input type="text" name="account_number" value="{{$bank->account_number}}" class="form-control form-control-line" minlength="5" required> 
			                                    </div>
			                                    <div class="form-group col-md-6 m-t-5">
			                                        <label>Bank Account Type</label>
			                                        <input type="text" name="account_type" value="{{$bank->account_type}}" class="form-control form-control-line" placeholder="Bank Account Type"> 
			                                    </div>
			                            <div class="form-actions col-md-12">
                                        
			                        <button type="submit" class="btn btn-info"> <i class="fa fa-check"></i> Save</button>
			                     </div>
                                 <?=csrf_field()?>
			          </form>
				 </div>
          </div>
    </div>
    @endsection