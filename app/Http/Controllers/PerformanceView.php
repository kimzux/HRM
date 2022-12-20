<?php

namespace App\Http\Controllers;
use App\Models\Performance;
use App\Models\Employee;
use App\Models\Rate;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class PerformanceView extends Controller
{
    public function index()
    {
    abort_if(Auth::user()->cannot('view Performance'), 403, 'Access Denied');
    $department = auth()->user()->employee?
    auth()->user()->employee->department_id:null;
    
    $performance = Performance::query()
      ->select('performance.*')
      ->when(!auth()->user()->can('view all department performance'), function($query) use($department){
          $query->join('employee', 'employee.id', '=', 'perdeim.employee_id')
                ->where('employee.department_id', $department);
      })->get();
 
    $employee = auth()->user();

    return view('performance.employee.index', compact('performance','employee'));
    }
  
}
