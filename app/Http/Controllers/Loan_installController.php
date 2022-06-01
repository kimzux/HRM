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
    //   $loan_install = Loan_install::where('id',$id)->sum('quantity');
      return view('loan.loan_install.index',  ['employee'=> $employee,'loan_install'=> $loan_install, ]);
    } 
    public function store(Request $request)
    {
      
        $loan_install = new Loan_install();
        $loan_install->employee_id= request('first_name');
        $loan_install->loan_id= request('install_amount');
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
