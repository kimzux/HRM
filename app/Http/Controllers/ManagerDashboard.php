<?php

namespace App\Http\Controllers;
use App\models\Notice;
use App\Models\Perdeim;
use App\Models\Leave_application;
use Illuminate\Http\Request;

class ManagerDashboard extends Controller
{
    public function index()
    {
        $employee = auth()->user();
        $leaves= Leave_application::where('employee_id',auth()->user()->employee_id )
        ->count();
        $perdeim= Perdeim::where('employee_id',auth()->user()->employee_id )
        ->count();
        $notice = Notice::all();
        return view('dashboard', compact('notice','leaves','perdeim'));
    
    }
    
    
    
}
