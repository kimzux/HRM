
@extends('layouts.app')

@section('content')
<div class="tab-pane m-4" id="experience" role="tabpanel">
        <div class="card">
        <div class="header">
      <div class="container-fluid">
            <div class="header-body">
              <div class="row align-items-end">
                   <div class="col">
                      <h3 class="header-title">
            Employee Bank Infomation
                      </h3>
                    </div>
                </div> 
            </div> 
        </div>
    </div>
    <div class="card-body">
                    <div class="table-responsive ">
                        <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                   
                                    <th>Holder Name</th>
                                    <th>Bank Name </th>
                                    <th>Branch Name</th>
                                    <th>Account Number</th>
                                    <th>ccount type</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                            
                                   <th>Holder Name</th>
                                    <th>Bank Name </th>
                                    <th>Branch Name</th>
                                    <th>Account Number</th>
                                    <th>ccount type</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                            @foreach($bank as $bank_info)
                                <tr>
                                <td>{{$bank_info->holder_name}}</td>
                                <td>{{$bank_info->bank_name}}</td>
                                <td>{{$bank_info->branch_name}}</td>
                                <td>{{$bank_info->account_number}}</td>
                                <td>{{$bank_info->account_type}}</td>
                                   <td class="jsgrid-align-center ">
                                    <a href="{{ route('employee.bank.edit', [ $bank_info->employee_id , $bank_info->id]) }}" class="btn btn-primary">Edit</a>
                                        <a  hidden="hidden" onclick="confirm('Are you sure want to delet this Value?')" href="#" title="Delete" class="btn btn-sm btn-info waves-effect waves-light edudelet"  data-id=""><i class="fa fa-trash-o"></i></a>
                                    </td>  
                                </tr>
                                @endforeach
                            </tbody>
                         </table>
                    </div>

<div class="tab-pane" id="bank" role="tabpanel">
     <div class="card">
	         <div class="card-body">
			              <form class="row" action="{{ route('employee.bank.store' , $employee_id) }}" method="post" enctype="multipart/form-data">
			                    <div class="form-group col-md-6 m-t-5">
                                <input type="hidden" name="employee_id" value="{{  $employee_id}}">
                                       <input type="hidden" name="id" value="<?php if(!empty($bank->id)) echo $bank->id  ?>">
			                              <label> Bank Holder Name</label> 
			                                    <input type="text" name="holder_name" value="" class="form-control form-control-line" placeholder="Bank Holder Name" minlength="5" required> 
			                                </div>
			                                 <div class="form-group col-md-6 m-t-5">
			                                 <label>Bank Name</label>
			                                 <input type="text" name="bank_name" value="" class="form-control form-control-line" placeholder="Bank Name" minlength="5" required> 
			                                    </div>
			                                    <div class="form-group col-md-6 m-t-5">
			                                        <label>Branch Name</label>
			                                        <input type="text" name="branch_name" value="" class="form-control form-control-line" placeholder=" Branch Name"> 
			                                    </div>
			                                    <div class="form-group col-md-6 m-t-5">
			                                        <label>Bank Account Number</label>
			                                        <input type="text" name="account_number" value="" class="form-control form-control-line" minlength="5" required> 
			                                    </div>
			                                    <div class="form-group col-md-6 m-t-5">
			                                        <label>Bank Account Type</label>
			                                        <input type="text" name="account_type" value="" class="form-control form-control-line" placeholder="Bank Account Type"> 
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