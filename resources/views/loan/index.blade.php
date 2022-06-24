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
              Grand Loan
                       </h1>
                    </div>
                </div> 
            </div> 
        </div>
    
            </div>
         <div class="container-fluid mt-4">
            <div class="row m-b-10"> 
                <div class="col-12">
                    <button type="button" class="btn btn-info"><i class="fe fe-plus"></i><a data-toggle="modal" data-target="#loanmodel" data-whatever="@getbootstrap" class="text-white"><i class="" aria-hidden="true"></i> Add Loan </a></button>
                   
                </div>
            </div> 
            <div class="row mt-4">
                <div class="col-12">
                    <div class="card card-outline-info">
                        <div class="card-header">
                            <h4 class="m-b-0 "> Loan List                     
                            </h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive ">
                                <table id="example" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Employee Code</th>
                                            <th>Amount</th>
<!--                                            <th>Interest Percentage </th>
                                            <th>Installment Period </th>-->
                                            <th>Installment </th>
                                            <th>Total Pay </th>
                                            <th>Total Due </th>
                                            <th>Approve Date </th>
                                            <th>Status </th>
                                            <th>Action </th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Employee Code</th>
                                            <th>Amount</th>
<!--                                            <th>Interest Percentage </th>
                                            <th>Installment Period </th>-->
                                            <th>Installment </th>
                                            <th>Total Pay </th>
                                            <th>Total Due </th>
                                            <th>Approve Date </th>
                                            <th>Status </th>
                                            <th>Action </th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <tr>
                                    @foreach($loan as $loans)
                                               
                                                <td>{{$loans->employee->first_name }}</td>
                                                <td>{{$loans->employee->em_code }}</td>
                                                <td>{{$loans->amount}}</td>
                                                <td>{{$loans->install_amount }}</td>
                                                <td>{{$loans->total_pay }}</td>
                                                <td>{{$loans->total_due }}</td>
                                                <td>{{$loans->approve_date}}</td>
                                                <td>{{$loans->status}}</td>
                                                <td class="row ">
                                                <div class="d-flex">
                                                <a href="{{ route('loan.edit', $loans->id)}}" class="m-2 btn btn-primary">Edit</a>
                                                <a href="{{ route('loan.show',[ $loans->id, $loans->employee_id])}}" class=" m-2 btn btn-success">add installment</a>

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
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content ">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel1">Loan</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <form role="form" method="post" action="{{route('loan.store')}}" id="btnSubmit" enctype="multipart/form-data">
                    <div class="modal-body">
                             <div class="form-group row">
                                <label class="control-label col-md-2">Assign To</label>
                                
                                  <select class="js-example-basic-single" data-placeholder="Choose a Category" tabindex="1" name="first_name" id="assignval" style="width: 100%" required>
                                                  <option value="">Select here</option>
                                                   @foreach($employee as $employees)
                                                    <option value="{{ $employees->id}}">{{ $employees->first_name}}</option>
                                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group row">
                                <label for="message-text" class="control-label col-md-3">Amount</label>
                                <input type="number" name="amount" value="" class="form-control col-md-8 amount" id="recipient-name1" required>
                            </div> 
<!--                            <div class="form-group row">
                                <label for="message-text" class="control-label col-md-3">Interest Percentage</label>
                                <input type="number" name="interest" value="" class="form-control col-md-8" id="recipient-name1" required>
                            </div>-->                                                         
                            <div class="form-group row">
                                <label class="control-label col-md-3">Approve Date</label>
                                <input type="date" name="appdate" class="form-control col-md-8 mydatetimepickerFull" id="recipient-name1" value="" required>
                            </div>
                            <div class="form-group row">
                                <label for="message-text" class="control-label col-md-3">Install Period</label>
                                <input type="number" name="install" value="" class="form-control col-md-8 period" id="recipient-name1" required>
                            </div>
                            
                               
                                <input type="number"hidden="hidden" name="installment" value=" " class="form-control col-md-8 installment" id="recipient-name1" readonly>
                            
                            
                            <div class="form-group row">
                                <label for="message-text" class="control-label col-md-3"> Loan No</label>
                                <input type="number" name="loanno"  class="form-control col-md-8" id="recipient-name1" required >
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3">Status</label>
                                <select class="form-control custom-select col-md-8" data-placeholder="Choose a Category" tabindex="1" name="status" value="" required>
                                    <option value="">Select here</option>
                                    <option value="Granted">Granted</option>
                                    <option value="Deny">Deny</option>
                                    <option value="Done">Done</option>
                                </select>
                            </div>
                            <div class="form-group row">
                                <label for="message-text" class="control-label col-md-3">Loan Details</label>
                                <textarea class="form-control col-md-8" name="details" value="" id="message-text1"></textarea>
                            </div>                                                                        
                        
                    </div>
                    <div class="modal-footer">
                       <input type="hidden" name="id" value="">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    <?=csrf_field()?>
                    </form>
                </div>
            </div>
        
                         
                      

  
<script>
$(document).ready(function() {
    $('.js-example-basic-single ').select2({
              dropdownParent: $("#loanmodel")
      });
});
    </script>
     <script>
    $(document).ready(function() {
    var table = $('#example').DataTable( {
        lengthChange: false,
        buttons: [ 'copy', 'excel', 'pdf', 'colvis' ]
    } );
 
    table.buttons().container()
        .appendTo( '#example_wrapper .col-md-6:eq(0)' );
} );
</script>
@endsection