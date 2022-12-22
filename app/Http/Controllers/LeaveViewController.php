<?php

namespace App\Http\Controllers;

use App\Models\Leave_type;
use App\Models\Leave_application;
use App\Models\Employee;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class LeaveViewController extends Controller
{
   public function index() 
   {
    abort_if(Auth::user()->cannot('view leave'), 403, 'Access Denied');
    $employee = auth()->user();
    $leave_type = Leave_type::select('id', 'leavename')->get();
    $leave_apply = Leave_application::where('employee_id',auth()->user()->employee_id )->orderBy('created_at', 'desc')->get();
    return view('leave.leave_application.leave_employee.index',  ['employee' => $employee, 'leave_apply' => $leave_apply, 'leave_type' => $leave_type]);
   }

   public function store(Request $request)
   {  
     abort_if(Auth::user()->cannot('create leave'), 403, 'Access Denied');
     $leave = new Leave_application;
     $employee_id = auth()->user()->employee_id;
     $start_date = Carbon::parse($request->startdate);
     $end_date = Carbon::parse($request->enddate);
     $total_days = $start_date->diffInDays($end_date);
     $leave_type = Leave_type::find($request->leave_type_id);
     $pendingLeaveApplication = Leave_application::where('employee_id', $employee_id)->whereNull('status')->orderBy('created_at', 'desc')->first();
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
     $leave->employee_id = $employee_id;
     $leave->leave_id = $leave_type->id;
     $leave->start_date = $request->startdate;
     $leave->end_date = $request->enddate;
     $leave->reason = $request->reason;
     $leave->total_day = $total_days;
     $leave->day_remain = $balance - $total_days;
     $leave->save();
     Alert::success('Success!', 'application successful added');
     return back();
   }
   public function edit($id)
  {
    abort_if(Auth::user()->cannot('edit leave'), 403, 'Access Denied');
    $leave_apply = Leave_application::findOrFail($id);
    $employee = auth()->user();
    $leave_type = Leave_type::select('id', 'leavename')->get();
    return view('leave.leave_application.leave_employee.edit',  ['employee' => $employee, 'leave_type' => $leave_type, 'leave_apply' => $leave_apply, $id]);
  }
  public function update(Request $request, $id)
  {
    abort_if(Auth::user()->cannot('update leave'), 403, 'Access Denied');

     $leave = Leave_application::findOrFail($id);
     $employee_id = auth()->user()->employee_id;
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
     $leave->employee_id = $employee_id;
     $leave->leave_id = $leave_type->id;
     $leave->start_date = $request->startdate;
     $leave->end_date = $request->enddate;
     $leave->reason = $request->reason;
     $leave->total_day = $total_days;
     $leave->day_remain = $balance - $total_days;
     $leave->save();
     Alert::success('Success!', 'application successful updated');
     return back();
    }
}