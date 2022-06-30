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
    // public function index($loan_id)
    // {
    //   abort_if(Auth::user()->cannot('view loan_install'), 403, 'Access Denied');
     
      
    //   $loan_install = Loan_install::with('loan')->where('loan_id', $loan_id)->get();
    //   return view('loan.loan_install.index', compact('loan_install','loan_id'));
    // } 
    public function store( Request $request)
    {
      abort_if(Auth::user()->cannot('create loan_install'), 403, 'Access Denied');
  
        $loan_install = new Loan_install();
        $loan_install->loan_id= $request->input('loan_id');
        $loan_install->date= $request->input('appdate');
        $loan_install->receiver = $request->input('receiver');
        $loan_install->amount_pay = $request->input('install_amount');
        $loan_install->install_number= $request->input('installno');
        $loan_install->note=$request->input('notes');
        $loan_install->save();
          Alert::success('Success!', 'Successfully added');
          return back();
      
       
      }
    
}
