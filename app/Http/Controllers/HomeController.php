<?php

namespace App\Http\Controllers;
use App\Models\Notice;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Project;
use App\Models\Leave_application;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $total_employees = Employee::count();
        $total_leaves = Leave_application::count();
        $total_projects = Project::count();
        $notice = Notice::all();
        return view('home', [
            'total_employees' => $total_employees,
            'total_leaves' => $total_leaves,
            'total_projects' => $total_projects,
            'notice' => $notice,
        ]);
    }

    public function download($id)
    {
        $notice = Notice::where('id', $id)->firstOrFail();
        return response()->file(
         storage_path('app') . DIRECTORY_SEPARATOR . $notice->file_url);
    }
}
