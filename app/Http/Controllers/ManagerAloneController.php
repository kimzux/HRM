<?php

namespace App\Http\Controllers;
use App\Models\Employee;
use App\Models\Notice;
use App\Models\Project;
use App\Models\Leave_application;

class ManagerAloneController extends Controller
{
    public function index()
    {
        abort_if(auth()->user()->cannot('manager dashboard'), 403, 'Access Denied');
        $department = auth()->user()->employee?
        auth()->user()->employee->department_id:null;

        $total_employees = Employee::where('department_id', $department)->count();
       $total_leaves = Leave_application::whereIn('employee_id', Employee::where('department_id', $department)->select('id'))->count();
        $notice = Notice::all();
        return view('manager_dashboard', [
            'total_employees' => $total_employees,
            'total_leaves' => $total_leaves,
            'notice' => $notice,
        ]);
    }
}
