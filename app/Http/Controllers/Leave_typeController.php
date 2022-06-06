<?php

namespace App\Http\Controllers;
use App\Models\Leave_type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class Leave_typeController extends Controller
{
     public function index()
  {

    abort_if(Auth::user()->cannot('view leave_type'), 403, 'Access Denied');
    $leave_type = Leave_type::all();

    return view('leave.leave_type.index', compact('leave_type'));
  }
  public function store(Request $request)
    {
      // Education::create($request->all() + ['employee_id' => $employee_id]);
      // Alert::success('Success!', 'Successfully added');
      // return redirect()->route('employee.education.index',$employee_id);
      abort_if(Auth::user()->cannot('create leave_type'), 403, 'Access Denied');
        $leave = new Leave_type();
        $leave->leavename = request('leavename');
        $leave->day_no= request('day_no');
        $leave->save();
        Alert::success('Success!', 'Successfully added');
        return back();
  
      }
      public function destroy($id)
      {
        abort_if(Auth::user()->cannot('delete leave_type'), 403, 'Access Denied');
    
        $leave= Leave_type::findOrFail($id);
        $leave->delete();
        Alert::success('Success!', 'Successfully deleted');
        return back();
        // return redirect('/foodie')->with('success', 'Corona Case Data is successfully deleted');
      }
      public function edit($id)
  {
    abort_if(Auth::user()->cannot('edit leave_type'), 403, 'Access Denied');
    $leave_type = Leave_type::findOrFail($id);
    return view('leave.leave_type.edit', compact('leave_type'));
  }
  public function update(Request $request, Leave_type $leave_type)

  {
    abort_if(Auth::user()->cannot('update leave_type'), 403, 'Access Denied');

      $request->validate([

          'leavename' => 'required',

          'day_no' => 'required',

      ]);
  

      $leave_type->update($request->all());
      Alert::success('Success!', 'Successfully updated');
      return redirect()->route('leave_type.index');
     

  }



}
