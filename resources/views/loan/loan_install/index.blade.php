@extends('layouts.app')

@section('content')
<div class="page-wrapper">
<div class="message"></div>
<div class="row page-titles">
<div class="container-fluid">
            <div class="header-body ml-3">
              <div class="row align-items-end">
                   <div class="col">
                      <h1 class="header-title">
                    Loan Installments
                       </h1>
                    </div>
                   
                </div> 
            </div> 
        </div>
            </div>
            <div class="container-fluid mt-4">
                <div class="row m-b-10"> 
                    <div class="col-12">
                        <button type="button" class="btn btn-info"><i class="fa fa-plus"></i><a data-toggle="modal" data-target="#loanmodel" data-whatever="@getbootstrap" class="text-white"><i class="" aria-hidden="true"></i> Add Loan Installment </a></button>
                                          </div>
                </div>
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card card-outline-info">
                            <div class="card-header">
                                <h4 class="m-b-0"> Loan Installment                       
                                </h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive ">
                                    <table id="loan123" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                              
                                               
                                                <th>Loan Number </th>
                                                <th>Amount Pay</th>
                                                <!--<th>Pay Amount</th>-->
                                             
                                                <th>Receiver </th>
                                                <th>Action </th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                
                                              
                                                <th>Loan Number </th>
                                                <th>Amount Pay </th>
                                                <!--<th>Pay Amount</th>-->
                                           
                                                <th>Receiver </th>
                                                <th>Action </th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        @foreach($loan_install as $loans)
                                               
                                               <td>{{$loans->loan->id }}</td>
                                               <td>{{$loans->amount_pay}}</td>
                                         
                                               <td>{{$loans->receiver }}</td>
                                               <td class="row ">
                                               <div class="d-flex">
                                               <a href="{{ route('loan.loan_installment.edit', [ $loans->loan_id , $loans->id])}}" class="m-2 btn btn-primary">Edit</a>
                                               <!-- <a href="{{ route('loan.show',$loans->id)}}" class=" m-2 btn btn-success">add installment</a> -->

                                                </td>
                                           </tr>
                                       @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                        <!-- sample modal content -->
                        <div class="modal fade" id="loanmodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content ">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="exampleModalLabel1">Add Loan</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <form role="form" method="post" action="{{route('loan.loan_installment.store', $loan_id)}}" id="loanvalueform" enctype="multipart/form-data">
                                    <div class="modal-body">
                                             <div class="form-group">
                                               
                                            </div>  
                                            <input hidden="hidden" type="text" name="loan_id" class="form-control form-control-line" value="{{  $loan_id}}" placeholder=" Degree Name" minlength="1" required> 
			                                
                                            
                                                
                                          
                                                <div class="form-group">
                                                <label for="message-text" class="control-label">Amount pay</label>
                                                <input type="number" name="install_amount" class="form-control"  id="recipient-name1" >
                                            </div>
                                                
                                           
                                          
                                            <div class="form-group">
                                                <label for="message-text" class="control-label">Receiver</label>
                                                <input type="text" name="receiver" class="form-control" id="recipient-name1" required>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="message-text" class="control-label"> Notes</label>
                                                <textarea class="form-control" name="notes" id="message-text1"></textarea>
                                            </div>                                        
                                        
                                    </div>
                                    <div class="modal-footer">
                                       <input type="hidden" name="loanid" value="">
                                       <input type="hidden" name="id" value="">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>

                    <?=csrf_field()?>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- /.modal --> 
                         
                         
                        <script>
$(document).ready(function() {
    $('.js-example-basic-single ').select2({
              dropdownParent: $("#loanmodel")
      });
});
    </script>
    
   
  
@endsection