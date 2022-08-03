<?php

namespace App\Http\Controllers;

use App\Models\Benefit;
use App\Models\Employee;
use App\Models\EmployeeBenefit;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeBenefitController extends Controller
{
    public function index()
    {
  
      abort_if(Auth::user()->cannot('view deduction'), 403, 'Access Denied');
      $benefit_employee = EmployeeBenefit::all();
      $employee= Employee::select('id', 'first_name')->get();
      $benefits= benefit::select('id', 'name')->get();
      return view('payrol.employee-benefit.index', ['employee'=> $employee,'benefit_employee'=> $benefit_employee, 'benefits'=>$benefits]);
    }
    public function store(Request $request)
    {
      
    abort_if(Auth::user()->cannot('create deduction'), 403, 'Access Denied');
      // Education::create($request->all() + ['employee_id' => $employee_id]);
      // Alert::success('Success!', 'Successfully added');
      // return redirect()->route('employee.education.index',$employee_id);
        $benefit = new EmployeeBenefit();
        $benefit->employee_id = request('employee_id');
        $benefit->benefit_id = request('benefit_id');
        $benefit->effective_date = request('effective_date');
        $benefit->amount= request('amount');
        $benefit->save();
        Alert::success('Success!', 'Successfully added');
        return back();
  
      }
}
