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
                        <button type="button" class="btn btn-primary"><i class="fa fa-bars"></i><a href="{{route('loan.index')}}" class="text-white"><i class="" aria-hidden="true"></i>  Loan List</a></button>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card card-outline-info">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white"> Loan Installment                       
                                </h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive ">
                                    <table id="loan123" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Employee PIN</th>
                                                <th>Loan Id</th>
                                                <th>Loan Number </th>
                                                <th>Install Amount </th>
                                                <!--<th>Pay Amount</th>-->
                                                <th>Approve Date </th>
                                                <th>Receiver </th>
                                                <th>Install No </th>
                                                <th>Action </th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Employee PIN</th>
                                                <th>Loan Id</th>
                                                <th>Loan Number </th>
                                                <th>Install Amount </th>
                                                <!--<th>Pay Amount</th>-->
                                                <th>Approve Date </th>
                                                <th>Receiver </th>
                                                <th>Install No </th>
                                                <th>Action </th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                           
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
                                    <form role="form" method="post" action="Add_Loan_Installment" id="loanvalueform" enctype="multipart/form-data">
                                    <div class="modal-body">
                                             <div class="form-group">
                                                <label class="control-label">Assign To</label>
                                                <select class="js-example-basic-single" data-placeholder="Choose a Category" tabindex="1" name="first_name" id="assignval" style="width: 100%" required>
                                                  <option value="">Select here</option>
                                                   @foreach($employee as $employees)
                                                    <option value="{{ $employees->id}}">{{ $employees->first_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>  
                                            <div class="form-group">
                                                <label for="message-text" class="control-label">Loan Number</label>
                                                <input type="text" name="loanno" value="{{$loan_amount->loan_no}}"class="form-control" id="recipient-name1" readonly required>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Install Amount</label>
                                                <input type="text" name="amount" class="form-control" value="{{$loan_amount->install_amount }}" id="recipient-name1" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="message-text" class="control-label">Date</label>
                                                <input type="text" name="appdate" class="form-control mydatetimepickerFull" id="recipient-name1" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="message-text" class="control-label">Receiver</label>
                                                <input type="text" name="receiver" class="form-control" id="recipient-name1" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="message-text" class="control-label"> Install No</label>
                                                <input type="text" name="installno" class="form-control" id="recipient-name1" readonly required>
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