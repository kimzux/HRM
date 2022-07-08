<?php

namespace App\Http\Controllers;
use App\Models\Loan;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoanViewController extends Controller
{
    public function index()
    {
      abort_if(Auth::user()->cannot('view employee-loan'), 403, 'Access Denied');
     
      $employee = auth()->user();
  
 
      $loan = Loan::where('employee_id',auth()->user()->employee_id )
      ->orderBy('created_at', 'desc')->get();
    
      return view('loan.loan-apply.index',  ['employee'=> $employee,'loan'=> $loan ]);
 
  
 
}
public function store(Request $request)
{
    
  abort_if(Auth::user()->cannot('create leave'), 403, 'Access Denied');
  $loan = new Loan;
  $employee_id = auth()->user()->employee_id;

  $pendingLoanApplication = Loan::where('employee_id', $employee_id)
    ->whereNull('status')
    ->orderBy('created_at', 'desc')->first();

  //reject if there is pending leave application
  if ($pendingLoanApplication) {
    Alert::warning('warning!', 'You can\'t apply until the previous application is processed!');
    return back();
  }

  // check if last approved leave application of same leave type


  $loan->employee_id = $employee_id;
  $loan->amount= request('amount');
      $loan->period = request('install');
      $loan->install_amount= $total=  ($loan->amount= request('amount'))/ ($loan->period = request('install'));
      $loan->loan_detail= request('details');
      if(empty($loan->total_pay)){
        $loan->total_due= request('amount');
      }
      else{
        $loan->total_due= (request('amount'))-($loan->total_pay);
        // ($loan->total_due->amount= request('amount'))-();
      }

  Alert::success('Success!', 'application successful added');
  return back();
 }


}