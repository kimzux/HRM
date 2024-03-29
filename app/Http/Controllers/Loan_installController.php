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
    public function store( Request $request)
    {
      abort_if(Auth::user()->cannot('create loan_install'), 403, 'Access Denied');
        $loan_install = new Loan_install();
        $loan_install->loan_id= $request->input('loan_id');
        $loan_install->receiver = $request->input('receiver');
        $loan_install->amount_pay = $request->input('install_amount');
        $loan_install->note=$request->input('notes');
        $loan_install->loan->total_due -= $loan_install->amount_pay;
        $loan_install->loan->total_pay += $loan_install->amount_pay;
        $loan_install->loan->save();
        $loan_install->save();
        Alert::success('Success!', 'Successfully added');
        return redirect()->back();
       
      }
    
}
