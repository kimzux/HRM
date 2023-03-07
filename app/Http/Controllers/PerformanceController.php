<?php

namespace App\Http\Controllers;

use App\Models\Performance;
use App\Models\Employee;
use App\Models\Rate;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;


class PerformanceController extends Controller
{
    public function index()
    {

        abort_if(Auth::user()->cannot('view Performance'), 403, 'Access Denied');
        $department = auth()->user()->employee ?
            auth()->user()->employee->department_id : null;

        $performance = Performance::query()
            ->select('performance.*')
            ->when(!auth()->user()->can('view all department performance'), function ($query) use ($department) {
                $query->join('employee', 'employee.id', '=', 'perdeim.employee_id')
                    ->where('employee.department_id', $department);
            })->get();

        $employee = Employee::select('id', 'first_name')->get();

        return view('performance.index', compact('performance', 'employee'));
    }
    public function store(Request $request)
    {

        abort_if(Auth::user()->cannot('create performance'), 403, 'Access Denied');
        $performance = new Performance();
        $performance->employee_id = request('employee_id');
        $performance->goals = request('goals');
        $performance->expectation = request('expect');
        $performance->expected_delivery_time = request('expected_time');
        $performance->start_date = request('startdate');
        $performance->end_date = request('enddate');
        $dt1 = Carbon::parse($performance->start_date);
        $dt2 = Carbon::parse($performance->end_date);
        $total_days = $dt1->diffInDays($dt2);
        $performance->timeline = $total_days;
        $performance->save();

        Alert::success('Success!', 'successful Goals added');
        return back();
    }
    public function destroy($id)
    {
        abort_if(Auth::user()->cannot('delete performance'), 403, 'Access Denied');

        $performance = Performance::findOrFail($id);
        if ($performance) {
            $rates = Rate::where('performance_id', $performance->id)->get();
            foreach ($rates as $rate) {
                $rate->delete();
            }
        }
        $performance->delete();
        Alert::success('Success!', 'Successfully deleted');
        return redirect()->route('performance.index');
    }
    public function edit($id)
    {
        abort_if(Auth::user()->cannot('edit performance'), 403, 'Access Denied');
        $performance = Performance::findOrFail($id);
        $employee = Employee::select('id', 'first_name')->get();
        return view('performance.edit',  ['performance' => $performance, 'employee' => $employee]);
    }

    public function update(Request $request, $id)
    {
        abort_if(Auth::user()->cannot('update performance'), 403, 'Access Denied');

        $perform = Performance::findOrFail($id);
        $perform->employee_id = request('employee_id');
        $perform->goals = request('goals');
        $perform->expectation = request('expect');
        $perform->expected_delivery_time = request('expected_time');
        $perform->start_date = request('startdate');
        $perform->end_date = request('enddate');
        $dt1 = Carbon::parse($perform->start_date);
        $dt2 = Carbon::parse($perform->end_date);
        $total_days = $dt1->diffInDays($dt2);
        $perform->timeline = $total_days;
        $perform->update();
        Alert::success('Success!', 'Successfully updated');
        return redirect()->route('performance.index');
    }
    public function show($performance_id)
    {
        abort_if(Auth::user()->cannot('view Rate'), 403, 'Access Denied');
        $rate = Rate::with('performance')->where('performance_id', $performance_id)->get();
        return view('performance.rate.index', compact('rate', 'performance_id'));
    }

    public function RateAverage($performance_id)
    {
        abort_if(Auth::user()->cannot('view Rateaverage'), 403, 'Access Denied');
        $rate = Rate::where('performance_id', $performance_id)->avg('rate');
        return view('performance.rate.create', compact('rate', 'performance_id'));
    }
}
