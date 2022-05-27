<?php

namespace App\Http\Controllers;
use App\Models\Loan;
use App\Models\Loan_install;
use App\Models\Project;
use App\Models\Employee;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class Loan_installController extends Controller
{
    public function index()
    {
  
      $loan_install = Loan_install::all();
      $employee= Employee::select('id', 'first_name')->get();
      $loan_amount= Loan::first();
    //   $loan_install = Loan_install::where('id',$id)->sum('quantity');
      return view('loan.loan_install.index',  ['employee'=> $employee,'loan_amount'=> $loan_amount,'loan_install'=> $loan_install, ]);
    } 
    
}
