<?php

namespace App\Http\Controllers;
use App\Models\Loan;
use App\Models\Loan_install;
use App\Models\Project;
use App\Models\Employee;
use App\Notifications\LoanApplicationApproved;
use App\Notifications\LoanApplicationRejected;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoanController extends Controller
{
    public function index()
    {
      abort_if(Auth::user()->cannot('view loan'), 403, 'Access Denied');
  
      $loan = Loan::all();
      $employee= Employee::select('id', 'first_name')->get();
    //   $loan_install = Loan_install::where('id',$id)->sum('quantity');
      return view('loan.index',  ['employee'=> $employee,'loan'=> $loan ]);
    } 
    public function store(Request $request)
  {
    abort_if(Auth::user()->cannot('create loan'), 403, 'Access Denied');
      $loan = new Loan();
      $employee_id = $request->first_name;
      $pendingLoanApplication = Loan::where('employee_id', $employee_id)
      ->whereNull('status')
      ->orderBy('created_at', 'desc')->first();
      $totalPayLoanApplication = Loan::where('employee_id', $employee_id)
      ->where('amount','total_pay') ->first();
  
    //reject if there is pending leave application
    if ($pendingLoanApplication) {
      Alert::warning('warning!', 'You can\'t apply until the previous application is processed!');
      return back();
    }
    if( $totalPayLoanApplication){
      Alert::warning('warning!', 'You can\'t apply until you finishpay the previously loan');
      return back();
    }
      $loan->employee_id= $employee_id ;
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
      $loan->save();
      Alert::success('Success!', 'Successfully added');
      return redirect()->route('loan.index');

    }
    public function edit($id)
  {
    abort_if(Auth::user()->cannot('edit loan'), 403, 'Access Denied');
    $loan =Loan::findOrFail($id);
    $employee= Employee::select('id', 'first_name')->get();
    return view('loan.edit',  ['employee'=> $employee,'loan'=> $loan, ]);
    } 
    public function update(Request $request, $id)
    {
      abort_if(Auth::user()->cannot('update loan'), 403, 'Access Denied');
      $loan = Loan::findOrFail($id);
      $loan->employee_id= request('first_name');
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
      $loan->update();
      Alert::success('Success!', 'Successfully updades');
        return redirect()->route('loan.index');

}
public function show($loan_id, Loan $employee_id)
{
  abort_if(Auth::user()->cannot('view loan_installment'), 403, 'Access Denied');
    $loan_install = Loan_install::with('loan')->where('loan_id', $loan_id)->get();
    
    return view('loan.loan_install.index', compact('loan_install','loan_id'));

}

public function approve($id)
  {
    abort_if(Auth::user()->cannot('approve loan'), 403, 'Access Denied');
    $loan = Loan::findOrFail($id);
    $loan->status = 1; //Approved
    $loan->save();
  
    $loan->employee->notify(new LoanApplicationApproved($loan));
    Alert::success('Approved!', 'Your loan have been approved');
    return redirect()->back(); //Redirect user somewhere
  }

  public function decline($id)
  {
    abort_if(Auth::user()->cannot('reject loan'), 403, 'Access Denied');
    $loan = Loan::findOrFail($id);
    $loan ->status = 0; //Declined
    $loan->save();
    $loan->employee->notify(new   LoanApplicationRejected($loan));
    Alert::info('Rejected!', 'Your loan have been rejected');
    return redirect()->back(); //Redirect user somewhere

  }
}