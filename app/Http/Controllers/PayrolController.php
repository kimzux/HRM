<?php

namespace App\Http\Controllers;
use App\Models\Payrol;
use App\Models\Employee;
use App\Models\Loan;
use App\Models\Deduction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PayrolController extends Controller
{
    public function index()
    {
      abort_if(Auth::user()->cannot('view payrol'), 403, 'Access Denied');
      $salary = Payrol::all();
  
      return view('payrol.salary.index', compact('salary'));
    }
    public function create()
    {
      abort_if(Auth::user()->cannot('show payrol'), 403, 'Access Denied');
     
      $salary = Employee::with('payrol')->get();
   
      
      return view('payrol.salary.show', compact('salary'));
    }
    public function show($id)
    {
      abort_if(Auth::user()->cannot('create view payrol'), 403, 'Access Denied');
      $employee = Employee::where('id',$id)->firstOrFail();
      $deduction=Deduction::select('id', 'name')->get();
      // $loan=Loan::where('employee_id',$id)->firstOrFail();
      return view('payrol.salary.create',compact('employee','deduction'));
    }
   



     
}

