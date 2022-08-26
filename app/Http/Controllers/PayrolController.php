<?php

namespace App\Http\Controllers;

use App\Models\Payroll;
use App\Models\Employee;
use App\Models\Loan;
use App\Models\Payslip;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use \PDF;
use App\Models\Deduction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PayrolController extends Controller
{
  public function index()
  {
    abort_if(Auth::user()->cannot('view payrol'), 403, 'Access Denied');
    $payroll = Payroll::all();

    return view('payrol.salary.index', compact('payroll'));
  }
  public function create()
  {
    abort_if(Auth::user()->cannot('show payrol'), 403, 'Access Denied');

    $salary = Employee::with('payrol', 'department')->get();

    return view('payrol.salary.show', compact('salary'));
  }
  public function show($id)
  {
    abort_if(Auth::user()->cannot('create view payrol'), 403, 'Access Denied');
    $payroll = Payroll::where('id', $id)->firstOrFail();
    $payslip = Payslip::with('employee')->where('payroll_id', $id)->get();
    return view('payrol.salary.create', compact('payroll', 'payslip' ));
  }
  public function store(Request $request)

  {

    abort_if(Auth::user()->cannot('create payrol'), 403, 'Access Denied');

    # TODO LIST
    $payroll = Payroll::query()->create([
      'month' => $request->month,
      'status' => 0
    ]);

    $employees = Employee::query()->with([
      'deduction',
      'benefit',
      'loan' => function ($query) {
        $query->where('install_amount', '>', 0);
      },
      'workOvertime' => function ($query) use ($payroll) {
        $query->where('month', $payroll->month)->where('status', 1);
      },
      'salary'
    ])->get();

    $employees->each(function ($employee) use ($payroll) {
      # payslip
      $payslip = $payroll->payslips()->create([
        'salary' => $employee->salary->basic_salary,
        'employee_id' => $employee->id,
        'allowance_amount' => 0,
        'deduction_amount' => 0,
        'net_pay' => 0,
      ]);

      // Create payslip deductions from employee deductions
      $employee->deduction->each(function ($deduction) use ($payslip) {
        $payslip->deductions()->create([
          'deduction_name' => $deduction->deduction->name,
          'amount' => ($deduction->amount * $payslip->salary) / 100,
        ]);
      });

      // Create payslip deductions from employee loans
      $employee->loan->each(function ($loan) use ($payslip) {
        $payslip->deductions()->create([
          'deduction_name' => $loan->loan_detail,
          'amount' => $loan->install_amount > $loan->amount_due ? $loan->amount_due : $loan->install_amount
        ]);

        // # Kept track loan installments from payroll also

      });


      // Create payslip benefits from employee benefits
      $employee->benefit->each(function ($EmpBenefit) use ($payslip) {
        $payslip->benefits()->create([
          'benefit_name' => $EmpBenefit->benefit->name,
          'amount' => $EmpBenefit->amount,
        ]);
      });

      // Create payslip benefits from employee overtime
      $employee->overtime->each(function ($overtime) use ($payslip) {
        $payslip->benefits()->create([
          'benefit_name' => "Overtime $overtime->type",
          'amount' => $overtime->amount,
        ]);
      });

      # update totals
      $total_deduction = $payslip->deductions()->sum('amount');
      $total_allowance = $payslip->benefits()->sum('amount');

      $payslip->update(['deduction_amount' => $total_deduction, 'allowance_amount' => $total_allowance, 'net_pay' => ($total_allowance + $payslip->salary) - $total_deduction]);
    });


    return redirect()->route('payrol.index');
  }
  public function view_payslip($id)
  {   
      abort_if(Auth::user()->cannot('payslip'), 403, 'Access Denied');
      $payslip = Payslip::findOrFail($id);
    
      // $pdf = PDF::loadView('payrol.payslip.index', compact('payslip'));

    
      return view('payrol.payslip.index', compact('payslip'));
  }
  public function generate_payslip($id)
  {   
      abort_if(Auth::user()->cannot('payslip'), 403, 'Access Denied');
      $payslip = Payslip::findOrFail($id);
    
      $pdf = PDF::loadView('payrol.payslip.slip', compact('payslip'));
      return $pdf->stream('payslip.pdf');

  }
}
