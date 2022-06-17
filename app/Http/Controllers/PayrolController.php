<?php

namespace App\Http\Controllers;
use App\Models\Payrol;
use App\Models\Employee;
use App\Models\Loan;
use App\Models\Benefit;
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
     
      $salary = Employee::with('payrol','department')->get();
   
      
      return view('payrol.salary.show', compact('salary'));
    }
    public function show($id)
    {
      abort_if(Auth::user()->cannot('create view payrol'), 403, 'Access Denied');
      $employee = Employee::where('id',$id)->firstOrFail();
      $deduction=Deduction::select('id', 'name')->get();
      // $payroll = Timelog::select('employee_id',DB::raw('SUM(deductions) as total_deductions'))->with('employee')->groupBy('employee_id')->get();
      $benefit=Benefit::select('id', 'name')->get();
      $loan=Loan::where('employee_id',$id)->get();
      return view('payrol.salary.create',compact('employee','deduction','benefit','loan'));
    }
    public function store(Request $request)
   
    {
    
      abort_if(Auth::user()->cannot('create payrol'), 403, 'Access Denied');
      
        $payrol = new Payrol();
        $payrol-> employee_id=request('employee_id');
        $payrol->month=request('month');
        $payrol->basic_salary=request('basic_salary');
        $payrol->work_overtime=request('work_overtime');
        $payrol->pay_date=request('pay_date');
        $payrol->loan_id=request('loan_id');
        $payrol->status=request('status');
        $payrol->paid_type=request('type');

        
        $deduct= $request->input('deduction');

        $payrol->deduction_id = implode(',', $deduct);
        $benefit= $request->input('benefit');

        $payrol->benefit_id = implode(',', $benefit);
        $payrol->final_salary=request('final_salary');
   
          $payrol->save(); 
        Alert::success('Success!', 'Successfully added');
        return redirect()->route('payrol.index');
    
  
      }
    }
    


     


