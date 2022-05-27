<?php

namespace App\Http\Controllers;
use App\Models\Logistic;
use App\Models\Project;
use App\Models\Employee;
use App\Models\Task;
use App\Models\Logsupport;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class LogsupportController extends Controller
{
   
    public function index()
    {
  
      $logsupport = Logsupport::all();
      $employee = Employee::select('id', 'first_name')->get();
      $project = Project::select('id', 'project_title')->get();
      $task= Task::select('id', 'task_title')->get();
      $logistic= Logistic::select('id', 'logistic_name')->get();
      return view('logistic.logsupport.index',  ['employee'=> $employee,'task'=> $task, 'project'=>$project,'logistic'=> $logistic,'logsupport'=> $logsupport, ]);
    } 
    public function store(Request $request)
    {
      
        $logsupport = new Logsupport();
        $logsupport->logistic_id= request('logistic_name');
        $logsupport->employee_id = request('first_name');
        $logsupport->project_id = request('project_title');
        $logsupport->task_id = request('task_title');
        $logsupport->quantity =$quantity=request('qty');
        $logsupport->startdate = request('startdate');
        $logsupport->enddate= request('enddate');
        $logsupport->remark= request('remark');
        $logsupport->remain_quantity=$qty=($logsupport->logistic->quantity)-$quantity;
        if($quantity>($logsupport->logistic->quantity)){
            Alert::Warning('warning!', 'its exceed the total logistic number');
            return back();
          }
    
           else{
        $logsupport->save();
        Alert::success('Success!', 'application successful added');
        return back();
       
      
      }
    }
      public function edit($id)
      {
      $logsupport = Logsupport::findOrFail($id);
      $employee = Employee::select('id', 'first_name')->get();
      $project = Project::select('id', 'project_title')->get();
      $task= Task::select('id', 'task_title')->get();
      $logistic= Logistic::select('id', 'logistic_name')->get();
      return view('logistic.logsupport.edit',  ['employee'=> $employee,'task'=> $task, 'project'=>$project,'logistic'=> $logistic,'logsupport'=> $logsupport, ]);
    } 
    public function update(Request $request, $id)
    {
      
        $logsupport = Logsupport::findOrFail($id);
        $logsupport->logistic_id= request('logistic_name');
        $logsupport->employee_id = request('first_name');
        $logsupport->project_id = request('project_title');
        $logsupport->task_id = request('task_title');
        $logsupport->quantity =$quantity=request('quantity');
        $logsupport->startdate = request('startdate');
        $logsupport->enddate= request('enddate');
        $logsupport->remark= request('remark');
        $logsupport->remain_quantity=$qty=($logsupport->logistic->quantity)-$quantity;
        if($quantity>($logsupport->logistic->quantity)){
            Alert::Warning('warning!', 'its exceed the total logistic number');
            return back();
          }
    
           else{
        $logsupport->update();
        Alert::success('Success!', 'Successfully updades');
        return redirect()->route('logsupport.index');
      
      }
        
  
      }
  
     


}