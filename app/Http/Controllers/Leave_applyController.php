<?php

namespace App\Http\Controllers;

use App\Models\Leave_type;
use App\Models\Leave_application;
use App\Models\Employee;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Leave_applyController extends Controller
{
  public function index()
  {
    abort_if(Auth::user()->cannot('view leave_application'), 403, 'Access Denied');

    $department = auth()->user()->employee?
    auth()->user()->employee->department_id:null;
    
    $leave_apply = Leave_application::query()
      ->select('leave_application.*')
      ->when(!auth()->user()->can('view all department application'), function($query) use($department){
          $query->join('employee', 'employee.id', '=', 'leave_application.employee_id')
                ->where('employee.department_id', $department);
      })->get();
    $employee = Employee::select('id', 'first_name')->get();
    $leave_type = Leave_type::select('id', 'leavename')->get();
    return view('leave.leave_application.index',  ['employee' => $employee, 'leave_apply' => $leave_apply, 'leave_type' => $leave_type]);
  }
  public function store(Request $request)
  {
    abort_if(Auth::user()->cannot('create leave_application'), 403, 'Access Denied');
    $leave = new Leave_application;
    $employee_id = $request->first_name;
    $start_date = Carbon::parse($request->startdate);
    $end_date = Carbon::parse($request->enddate);
    $total_days = $start_date->diffInDays($end_date);
    $leave_type = Leave_type::find($request->leave_type_id);

    $pendingLeaveApplication = Leave_application::where('employee_id', $employee_id)
      ->whereNull('status')
      ->orderBy('created_at', 'desc')->first();

    //reject if there is pending leave application
    if ($pendingLeaveApplication) {
      Alert::warning('warning!', 'You can\'t apply until the previous application is processed!');
      return back();
    }

    // check if last approved leave application of same leave type
    $lastLeaveApplicationOfSameType =  Leave_application::where('employee_id', $employee_id)
      ->where('leave_id', $request->leave_type_id)
      ->where('status', 1)
      ->whereBetween('created_at', [now()->startOfYear()->toDateString(), now()->endOfYear()->toDateString()])
      ->orderBy('created_at', 'desc')->first();


    $balance = $lastLeaveApplicationOfSameType ?
      $lastLeaveApplicationOfSameType->day_remain : $leave_type->day_no;


    // reject if  $balance exceed application days
    if ($balance < $total_days) {
      Alert::Warning('warning!', 'its exceed the total leave balance');
      return back();
    }

    $leave->employee_id = $request->first_name;
    $leave->leave_id = $leave_type->id;
    $leave->start_date = $request->startdate;
    $leave->end_date = $request->enddate;
    $leave->reason = $request->reason;
    $leave->total_day = $total_days;
    $leave->day_remain = $balance - $total_days;
    $leave->save();

    Alert::success('Success!', 'application successful added');
    return back();
    // $reamining_days = $leave_type->day_no - $total_days;

    // if ($reamining_days <= 0) {
    //   Alert::Warning('warning!', 'you cant apply since your leave day finish');
    //   return back();
    // }

    // Check if there is last application
    // if ($lastLeave != NULL) {

    //   // check if the last application was approved
    //   // Null == pending, 1 == approved, 0 == rejected

    //   if ($lastLeave->status == NULL) {

    //     Alert::warning('warning!', 'You can\'t apply until the previous application is processed!');
    //     return back();
    //   } else if ($lastLeave->status == 1) {

    //     // Create new application by considering the last leave application
    //     // Set days remaining according to last application

    //     if ($lastLeave->day_remain > $total_days) {

    //       $reamining_days = $lastLeave->day_remain - $total_days;
    //     } else if ($lastLeave->day_remain < $total_days) {

    //       Alert::warning('Warning!', 'Your application exceeded your remaining days!');
    //       return back();
    //     }
    //   }

    // Mechanisms for calculating remaining days after REJECTION should go here.
    // else if($lastLeave->status === 0)
    // }


  }



  public function edit($id)
  {
    abort_if(Auth::user()->cannot('edit leave_application'), 403, 'Access Denied');
    $leave_apply = Leave_application::findOrFail($id);
    $employee = Employee::select('id', 'first_name')->get();
    $leave_type = Leave_type::select('id', 'leavename')->get();
    return view('leave.leave_application.edit',  ['employee' => $employee, 'leave_type' => $leave_type, 'leave_apply' => $leave_apply, $id]);
  }
  public function update(Request $request, $id)
  {
    abort_if(Auth::user()->cannot('update leave_application'), 403, 'Access Denied');

    $leave = Leave_application::findOrFail($id);
    $employee_id = $request->first_name;
    $start_date = Carbon::parse($request->startdate);
    $end_date = Carbon::parse($request->enddate);
    $total_days = $start_date->diffInDays($end_date);
    $leave_type = Leave_type::find($request->leave_type_id);

    $pendingLeaveApplication = Leave_application::where('employee_id', $employee_id)
      ->whereNull('status')
      ->orderBy('created_at', 'desc')->first();

    //reject if there is pending leave application
    if ($pendingLeaveApplication) {
      Alert::warning('warning!', 'You can\'t apply until the previous application is processed!');
      return back();
    }

    // check if last approved leave application of same leave type
    $lastLeaveApplicationOfSameType =  Leave_application::where('employee_id', $employee_id)
      ->where('leave_id', $request->leave_type_id)
      ->where('status', 1)
      ->whereBetween('created_at', [now()->startOfYear()->toDateString(), now()->endOfYear()->toDateString()])
      ->orderBy('created_at', 'desc')->first();


    $balance = $lastLeaveApplicationOfSameType ?
      $lastLeaveApplicationOfSameType->day_remain : $leave_type->day_no;


    // reject if  $balance exceed application days
    if ($balance < $total_days) {
      Alert::Warning('warning!', 'its exceed the total leave balance');
      return back();
    }

    $leave->employee_id =  $employee_id;
    $leave->leave_id = $leave_type->id;
    $leave->start_date = $request->startdate;
    $leave->end_date = $request->enddate;
    $leave->reason = $request->reason;
    $leave->total_day = $total_days;
    $leave->day_remain = $balance - $total_days;
    $leave->save();

    Alert::success('Success!', 'application successful added');
    return back();
    // $reamining_days = $leave_type->day_no - $total_days;

    // if ($reamining_days <= 0) {
    //   Alert::Warning('warning!', 'you cant apply since your leave day finish');
    //   return back();
    // }

    // Check if there is last application
    // if ($lastLeave != NULL) {

    //   // check if the last application was approved
    //   // Null == pending, 1 == approved, 0 == rejected

    //   if ($lastLeave->status == NULL) {

    //     Alert::warning('warning!', 'You can\'t apply until the previous application is processed!');
    //     return back();
    //   } else if ($lastLeave->status == 1) {

    //     // Create new application by considering the last leave application
    //     // Set days remaining according to last application

    //     if ($lastLeave->day_remain > $total_days) {

    //       $reamining_days = $lastLeave->day_remain - $total_days;
    //     } else if ($lastLeave->day_remain < $total_days) {

    //       Alert::warning('Warning!', 'Your application exceeded your remaining days!');
    //       return back();
    //     }
    //   }

    // Mechanisms for calculating remaining days after REJECTION should go here.
    // else if($lastLeave->status === 0)
    // }


  }

  public function approve($id)
  {
    abort_if(Auth::user()->cannot('approve leave_application'), 403, 'Access Denied');
    $leave = Leave_application::findOrFail($id);
    $leave->status = 1; //Approved
    $leave->save();
    Alert::success('Approved!', 'application successful approved');
    return redirect()->back(); //Redirect user somewhere
  }

  public function decline($id)
  {
    abort_if(Auth::user()->cannot('reject leave_application'), 403, 'Access Denied');
    $leave = Leave_application::findOrFail($id);
    $leave->status = 0; //Declined
    $leave->save();
    Alert::info('Rejected!', 'application successful rejected');
    return redirect()->back(); //Redirect user somewhere

  }
}
