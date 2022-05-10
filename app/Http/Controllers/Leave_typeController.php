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
      public function destroy($id)
      {
    
        $leave= Leave_type::findOrFail($id);
        $leave->delete();
        Alert::success('Success!', 'Successfully deleted');
        return back();
        // return redirect('/foodie')->with('success', 'Corona Case Data is successfully deleted');
      }
      public function edit($id)
  {
    $leave_type = Leave_type::findOrFail($id);
    return view('leave.leave_type.edit', compact('leave_type'));
  }
  public function update(Request $request, Leave_type $leave_type)

  {

      $request->validate([

          'leavename' => 'required',

          'day_no' => 'required',

      ]);
  

      $leave_type->update($request->all());
      Alert::success('Success!', 'Successfully updated');
      return redirect()->route('leave_type.index');
     

  }



}
