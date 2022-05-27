@extends('layouts.app')

@section('content')
<div class="header">
      <div class="container-fluid">
            <div class="header-body">
              <div class="row align-items-end">
                   <div class="col">
                      <h1 class="header-title">
                Edit Loan
                       </h1>
                    </div>
                </div> 
            </div> 
        </div>
    </div>
<div class="tab-pane ml-5" id="bank" role="tabpanel" style="width:50%">
     <div class="card">
	         <div class="card-body">
			              <form action="{{ route('loan.update', $loan->id) }}" method="post" enctype="multipart/form-data" >
                          @csrf
                        @method('PATCH') 
                          <div class="form-group">

                  <div class="form-group">
                          <label> Employee Name</label>     
                          <select class="js-example-basic-single"  tabindex="1" name="first_name" style="width:100%"  required>
                  <option value="">Select Here</option>
                      @foreach($employee as $employees)
                          <option value="{{ $employees->id}}">{{ $employees->first_name}}</option>
                                  @endforeach
                                        
                  </select>
                                      </div>
			                                 <div class="form-group">
			                                 <label> Amount</label>
			                                 <input type="number" name="amount" value="{{$loan->amount}}" class="form-control form-control-line"   required> 
			                                    </div>
                                                <div class="form-group">
			                                 <label> Approve Date</label>
			                                 <input type="date" name="appdate" value="{{$loan->approve_date}}" class="form-control form-control-line"   required> 
			                                    </div>
                                                <div class="form-group">
			                                 <label>Period</label>
			                                 <input type="number" name="install" value="{{$loan->period}}" class="form-control form-control-line"   required> 
			                                    </div>
                                                
                               
                               <input type="number"hidden="hidden" name="installment" value=" " class="form-control col-md-8 installment" id="recipient-name1" readonly>
               
                           <div class="form-group">
			                                 <label> loan No</label>
			                                 <input type="number" name="loanno" value="{{$loan->loan_no}}" class="form-control form-control-line"  required> 
			                                    </div>
                                                <div class="form-group">
                          <label> Status</label>     
                          <select name="status" class="form-control custom-select" required>
                                            <option>Select here</option>
                                            <option value="Granted" {{ $loan->status=== 'Granted' ? 'Selected' : '' }}>Granted</option>
                                            <option value="Deny" {{ $loan->status=== 'Deny' ? 'Selected' : '' }}>Deny</option>
                                            <option value="Done" {{ $loan->status=== 'Done' ? 'Selected' : '' }}>Done</option>
                                        </select>
                                      </div>
                                      <div class="form-group">
			                                 <label>Loan Details</label>
                                             <textarea class="form-control col-md-8" name="details" value="{{$loan->loan_detail}}" id="message-text1"></textarea>
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
    $('.js-example-basic-single').select2();
});
    </script>

    @endsection