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
    abort_if(Auth::user()->cannot('view employee performance'), 403, 'Access Denied');
    $employee = auth()->user();
    $performance = Performance::where('employee_id',auth()->user()->employee_id )->orderBy('created_at', 'desc')->get();;
    return view('performance.employee.index', compact('performance','employee'));

    }
  
}
