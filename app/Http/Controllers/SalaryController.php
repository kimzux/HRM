<?php

namespace App\Http\Controllers;
use App\Models\Salary;
use App\Models\Employee;
use App\Models\Loan;
use App\Models\Deduction;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SalaryController extends Controller
{
  public function index()
  {

    abort_if(Auth::user()->cannot('view salary'), 403, 'Access Denied');
    $salary = Salary::all();
    $employee= Employee::select('id', 'first_name')->get();
    return view('payrol.salary-info.index', compact('salary','employee'));
  }
   
  public function store(Request $request)
  {
    
    abort_if(Auth::user()->cannot('create salary'), 403, 'Access Denied');
    $salary = new Salary();
    $salary->employee_id = request('employee_id');
    $salary -> basic_salary = request('salary');
    $salary->save();
    Alert::success('Success!', 'Successfully added');
    return back();
  }
    

}
