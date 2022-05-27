<?php

namespace App\Http\Controllers;
use App\Models\Loan;
use App\Models\Loan_install;
use App\Models\Project;
use App\Models\Employee;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    public function index()
    {
  
      $loan = Loan::all();
      $employee= Employee::select('id', 'first_name')->get();
    //   $loan_install = Loan_install::where('id',$id)->sum('quantity');
      return view('loan.index',  ['employee'=> $employee,'loan'=> $loan,'loan_install'=> $loan, ]);
    } 
    public function store(Request $request)
  {
    
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
    $loan =Loan::findOrFail($id);
    Product::where('id',$id)->sum('quantity');
    $employee= Employee::select('id', 'first_name')->get();
    return view('loan.edit',  ['employee'=> $employee,'loan'=> $loan, ]);
    } 
    public function update(Request $request, $id)
    {
      
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
}