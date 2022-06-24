<?php

namespace App\Http\Controllers;
use App\Models\WorkOverTime;
use App\Models\Employee;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class WorkOverTimeController extends Controller
{
    public function index()
    {
  
      abort_if(Auth::user()->cannot('view work-overtime'), 403, 'Access Denied');
      $work_overtime = WorkOverTime::all();
      $employee= Employee::select('id', 'first_name')->get();
  
      return view('payrol.work-overtime.index', compact('work_overtime','employee'));
    }
    public function store(Request $request)
    {
      
    abort_if(Auth::user()->cannot('create work-overtime'), 403, 'Access Denied');
      // Education::create($request->all() + ['employee_id' => $employee_id]);
      // Alert::success('Success!', 'Successfully added');
      // return redirect()->route('employee.education.index',$employee_id);
        $work_overtime = new WorkOverTime();
        $work_overtime->employee_id = request('employee_id');
        $work_overtime->amount= request('amount');
        $work_overtime->save();
        Alert::success('Success!', 'Successfully added');
        return back();
  
      }
      
      public function destroy($id)
      {
    
        abort_if(Auth::user()->cannot('delete work-overtime'), 403, 'Access Denied');
        $work_overtime= WorkOverTime::findOrFail($id);
        $work_overtime->delete();
        Alert::success('Success!', 'Successfully deleted');
        return back();
        // return redirect('/foodie')->with('success', 'Corona Case Data is successfully deleted');
      }
      public function edit($id)
      {
        
    abort_if(Auth::user()->cannot('edit work-overtime'), 403, 'Access Denied');
        $work_overtime =WorkOverTime::findOrFail($id);
        $employee= Employee::select('id', 'first_name')->get();
        return view('payrol.work-overtime.edit', compact('work_overtime','employee'));
      }
      public function update(Request $request, WorkOverTime $work_overtime)

      {
        
    abort_if(Auth::user()->cannot('update work-overtime'), 403, 'Access Denied');
    
          $request->validate([
            'employee_id'=> 'required',
    
              'amount' => 'required',
    
          ]);
      
    
          $work_overtime->update($request->all());
          Alert::success('Success!', 'Successfully updated');
          return redirect()->route('work-overtime.index');
         
    
      }
}
