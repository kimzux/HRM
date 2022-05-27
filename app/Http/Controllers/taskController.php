<?php

namespace App\Http\Controllers;
use App\Models\Project;
use App\Models\Employee;
use App\Models\Task;
use App\Models\Employee_Task;
use Illuminate\Http\Request;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;

class taskController extends Controller
{
    public function index()
    {
    
      $task= Task::with('project','employee','employee_task.employee')->get();
      $employee = Employee::select('id', 'first_name')->get();
      $project = Project::select('id', 'project_title','project_startdate','project_enddate')->get();
   
      // $patient = Patient::with('reports.analyzes')->find(1);
      return view('task.index',  ['employee'=> $employee,'task'=> $task, 'project'=>$project]);
    }

    public function store(Request $request)
    {
        $task = new Task();
        $task->employee_id=request('first_name');
        $task->project_id=request('projectid');
        $task->task_title=request('title');
        $task->task_startdate=request('startdate');
        $task->task_enddate=request('enddate');
        $task->task_details=request('details');
        $task->task_status=request('status');
        $task->task_type=request('type');
        $dt1 = Carbon::parse($task->task_startdate);
        $dt2 = Carbon::parse($task->task_enddate);
        $task->save();



        $assignto = [];

  //insert using foreach loop
   foreach($request->assignto as   $employee_id) {
   $Collaborator = new Employee_Task();
   $Collaborator->task_id=$task->id;
   $Collaborator->employee_id=$employee_id;
   $Collaborator->save(); 
   
  }

        Alert::success('Success!', 'successful Task added');
        return back();       
        
}

}
