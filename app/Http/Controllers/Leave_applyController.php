<?php

namespace App\Http\Controllers;
use App\Models\Leave_type;
use App\Models\Leave_application;
use App\Models\Employee;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Carbon\Carbon;

class Leave_applyController extends Controller
{
    public function index()
    {
  
      $leave_apply = Leave_application::all();
      $employee = Employee::select('id', 'first_name')->get();
      $leave_type = Leave_type::select('id', 'leavename')->get();
      return view('leave.leave_application.index',  ['employee'=> $employee,'leave_apply'=> $leave_apply, 'leave_type'=>$leave_type]);
    }
    public function store(Request $request)
    {
        $leave = new Leave_application();
        $leave->employee_id=request('first_name');
        $leave->leave_id=request('leavename');
        $leave->startdate=request('startdate');
        $leave->enddate=request('enddate');
        $leave->reason=request('reason');
        $dt = new Carbon('startdate');
        $dt2 = new Carbon('enddate');
        $interval = $dt->diff('enddate');
        $days = $interval->format('%a');//now do whatever you like with $days
        
        $leave->save();
        Alert::success('Success!', 'Successfully added');
      return back();




    }
}
