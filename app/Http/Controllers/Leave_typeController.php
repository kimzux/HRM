<?php

namespace App\Http\Controllers;
use App\Models\Leave_type;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class Leave_typeController extends Controller
{
     public function index()
  {

    $leave_type = Leave_type::all();

    return view('leave.leave_type.index', compact('leave_type'));
  }
  public function store(Request $request)
    {
      // Education::create($request->all() + ['employee_id' => $employee_id]);
      // Alert::success('Success!', 'Successfully added');
      // return redirect()->route('employee.education.index',$employee_id);
        $leave = new Leave_type();
        $leave->leavename = request('leavename');
        $leave->day_no= request('day_no');
        $leave->save();
        Alert::success('Success!', 'Successfully added');
        return back();
  
      }
}
