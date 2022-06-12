<?php

namespace App\Http\Controllers;
use App\Models\Payrol;
use App\Models\Employee;
use App\Models\Loan;
use App\Models\Deduction;
use Illuminate\Http\Request;

class SalaryController extends Controller
{
   
    public function store( $employee_id , Request $request)
   
    {
      // Education::create($request->all() + ['employee_id' => $employee_id]);
      // Alert::success('Success!', 'Successfully added');
      // return redirect()->route('employeeducation.index',$employee_id);
      abort_if(Auth::user()->cannot('create payrol'), 403, 'Access Denied');
      
        $payrol = new Payrol();
        $payrol-> employee_id=$employee_id=request('employee_id');
        $payrol-> loan_id=$employee_id=request('employee_id');
        $payrol->month=request('month');
        $payrol->basic_salary=request('basic_salary');
        $payrol->work_overtime=request('work_overtime');
        $payrol->pay_date=request('pay_date');
        $payrol->loan_id=request('loan_id');
        $payrol->status=request('status');
        $payrol->paid_type=request('type');
        $payrol->final_salary=request('final_salary');
      



        $assignto = [];

  //insert using foreach loop
   foreach($request->assignto as   $deduction_id) {
 
   $payrol->deduction_id=request($deduction_id);
   $payrol->save(); 
        Alert::success('Success!', 'Successfully added');
        return redirect()->route('payrol.index',$employee_id);
    
  
      }
    }

}
