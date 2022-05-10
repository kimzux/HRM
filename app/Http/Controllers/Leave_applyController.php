<?php

namespace App\Http\Controllers;
use App\Models\Leave_type;
use App\Models\Leave_application;
use App\Models\Employee;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class Leave_applyController extends Controller
{
    public function index()
    {
  
      $leave_apply = Leave_application::all();
      $employee = Employee::select('id', 'first_name')->get();
      $leave_type = Leave_type::select('id', 'leavename')->get();
      return view('leave.leave_application.index',  ['employee'=> $employee,'leave_apply'=> $leave_apply, 'leave_type'=>$leave_type]);
    }
}
