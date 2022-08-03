<?php

namespace App\Http\Controllers;

use App\Models\WorkOverTime;
use App\Models\Employee;
use App\Models\Salary;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

class WorkOverTimeController extends Controller
{
  public function index()
  {

    abort_if(Auth::user()->cannot('view work-overtime'), 403, 'Access Denied');
    $work_overtime = WorkOverTime::all();
    $employee = Employee::select('id', 'first_name')->get();

    return view('payrol.work-overtime.index', compact('work_overtime', 'employee'));
  }
  public function store(Request $request)
  {

    abort_if(Auth::user()->cannot('create work-overtime'), 403, 'Access Denied');
    // Education::create($request->all() + ['employee_id' => $employee_id]);
    // Alert::success('Success!', 'Successfully added');
    // return redirect()->route('employee.education.index',$employee_id);\
    $month = now()->startOfMonth()->subMonth()->format('Y-m');
    $request->validate([
      'employee_id' => [
        'required',
        Rule::exists(Employee::class, 'id'),
        Rule::unique(WorkOverTime::class, 'employee_id')
          ->where('month', $month)
          ->where('type', $request->status)
          ->where(function($q){
            $q->whereNull('status')->orWhere('status', 1);
          })
      ],
    
      'status' => ['required', Rule::in(1.5, 2)],
      'hours' => ['required', 'integer']
    ]);
  
    $work_overtime = new WorkOverTime();
    $employee_id = $work_overtime->employee_id = request('employee_id');
    $work_overtime->month = now()->startOfMonth()->subMonth()->format('Y-m');
    $hours = $work_overtime->total_hours = request('hours');
    $rate = $work_overtime->type = request('status');
    $path=Storage::putFile('file_url',$request->file('file_url'));
    $work_overtime->file_url = $path;
    $basic_salary = Salary::select('basic_salary')->where('employee_id', $employee_id)->first();
    $work_overtime->amount = ($basic_salary->basic_salary / 200) * $rate * $hours;
    $work_overtime->save();
    Alert::success('Success!', 'Successfully added');
    return back();
  }

  public function destroy($id)
  {

    abort_if(Auth::user()->cannot('delete work-overtime'), 403, 'Access Denied');
    $work_overtime = WorkOverTime::findOrFail($id);
    $work_overtime->delete();
    Alert::success('Success!', 'Successfully deleted');
    return back();
    // return redirect('/foodie')->with('success', 'Corona Case Data is successfully deleted');
  }
  public function edit($id)
  {

    abort_if(Auth::user()->cannot('edit work-overtime'), 403, 'Access Denied');
    $work_overtime = WorkOverTime::findOrFail($id);
    $employee = Employee::select('id', 'first_name')->get();
    return view('payrol.work-overtime.edit', compact('work_overtime', 'employee'));
  }
  public function update(Request $request, $id)

  {

    abort_if(Auth::user()->cannot('update work-overtime'), 403, 'Access Denied');

    $month = now()->startOfMonth()->subMonth()->format('Y-m');
    $request->validate([
      'employee_id' => [
        'required',
        Rule::exists(Employee::class, 'id'),
        Rule::unique(WorkOverTime::class, 'employee_id')
          ->where('month', $month)
          ->where('type', $request->status)
          ->where(function($q){
            $q->whereNull('status')->orWhere('status', 1);
          })
      ],
    
      'status' => ['required', Rule::in(1.5, 2)],
      'hours' => ['required', 'integer']
    ]);
  

    $work_overtime =WorkOverTime::findOrFail($id);;
    $employee_id = $work_overtime->employee_id = request('employee_id');
    $work_overtime->month = now()->startOfMonth()->subMonth()->format('Y-m');
    $hours = $work_overtime->total_hours = request('hours');
    $rate = $work_overtime->type = request('status');
    $path=Storage::putFile('file_url',$request->file('file_url'));
    $work_overtime->file_url = $path;
    $basic_salary = Salary::select('basic_salary')->where('employee_id', $employee_id)->first();
    $work_overtime->amount = ($basic_salary->basic_salary / 200) * $rate * $hours;
    Alert::success('Success!', 'Successfully updated');
    return redirect()->route('work-overtime.index');
  }
  public function approve($id)
  {
    abort_if(Auth::user()->cannot('approve work-overtime'), 403, 'Access Denied');
    $work_overtime = WorkOverTime::findOrFail($id);
    $work_overtime->status = 1; //Approved
    $work_overtime->save();


    Alert::success('Approved!', 'Your Work-Overtime have been approved');
    return redirect()->back(); //Redirect user somewhere
  }

  public function decline($id)
  {
    abort_if(Auth::user()->cannot('reject work-overtime'), 403, 'Access Denied');
    $work_overtime = WorkOverTime::findOrFail($id);
    $work_overtime->status = 0; //Declined
    $work_overtime->save();
    Alert::info('Rejected!', 'Your work-overtime have been rejected');
    return redirect()->back(); //Redirect user somewhere


  }
  public function download($id)
    {
      abort_if(Auth::user()->cannot('download work-overtime'), 403, 'Access Denied');
      $work_overtime= WorkOverTime::where('id', $id)->firstOrFail();
    
        return response()->file(storage_path('app') . DIRECTORY_SEPARATOR . $work_overtime->file_url);
       
    }
}
