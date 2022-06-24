<?php

namespace App\Http\Controllers;
use App\Models\Loan;
use App\Models\Loan_install;
use App\Models\Project;
use App\Models\Employee;
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
      $loan->employee_id= request('first_name');
      $loan->amount= request('amount');
      $loan->approve_date = request('appdate');
      $loan->period = request('install');
      $loan->install_amount= $total=  ($loan->amount= request('amount'))/ ($loan->period = request('install'));
      $loan->loan_no= request('loanno');
      $loan->status= request('status');
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
      return back();

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
       $loan->approve_date = request('appdate');
      $loan->period = request('install');
      $loan->install_amount= $total=  ($loan->amount= request('amount'))/ ($loan->period = request('install'));
      $loan->loan_no= request('loanno');
      $loan->status= request('status');
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
    $loan_install = Loan_install::with('loan')->where('loan_id', $loan_id)->first();
    
    return view('loan.loan_install.index', compact('loan_install','loan_id','employee_id'));

}
}