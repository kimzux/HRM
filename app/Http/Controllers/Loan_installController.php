<?php

namespace App\Http\Controllers;
use App\Models\Loan;
use App\Models\Loan_install;
use App\Models\Project;
use App\Models\Employee;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Loan_installController extends Controller
{
    public function index($loan_id)
    {
      abort_if(Auth::user()->cannot('view loan_install'), 403, 'Access Denied');
     
      
      $loan_install = Loan_install::with('loan')->where('loan_id', $loan_id)->get();
      return view('loan.loan_install.index', compact('loan_install','loan_id'));
    } 
    public function store( $loan_id,  $employee_id , Request $request)
    {
      abort_if(Auth::user()->cannot('create loan_install'), 403, 'Access Denied');
        $loan_install = new Loan_install();
        $loan_install->loan_id=$loan_id=request('loan_id');
        $loan_install->employee_id=request('employee_id');
        $loan_install->date= request('appdate');
        $loan_install->receiver = request('receiver');
        $loan_install->amount_pay = request('install_amount');
        $loan_install->install_number= request('installno');
        $loan_install->note= request('notes');
        $loan_install->save();
          Alert::success('Success!', 'Successfully added');
          return back();
      
  
      }
    
}
