<?php

namespace App\Http\Controllers;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function index()
    {
      abort_if(Auth::user()->cannot('view project'), 403, 'Access Denied');
  
      $project = Project::all();
  
      return view('project.index', compact('project'));
    }
    public function store(Request $request)
    {
      abort_if(Auth::user()->cannot('create project'), 403, 'Access Denied');
        $project = new Project();
        $project->project_title=request('project_title');
        $project->project_startdate=request('startdate');
        $project->project_enddate=request('enddate');
        $project->details=request('details');
        $project->project_summary=request('project_summary');
        $project->project_status=request('project_status');
        $dt1 = Carbon::parse($project->project_startdate);
        $dt2 = Carbon::parse($project->project_enddate);
        $project->save();
        Alert::success('Success!', 'successful added');
        return back();       
        
}
public function destroy($id)
{
  abort_if(Auth::user()->cannot('delete project'), 403, 'Access Denied');
  $project = Project::findOrFail($id);
  $project->delete();
  Alert::success('Success!', 'Successfully deleted');
  return back();
  // return redirect('/foodie')->with('success', 'Corona Case Data is successfully deleted');
}
public function edit($id)
{
  abort_if(Auth::user()->cannot('edit project'), 403, 'Access Denied');
  $project = Project::findOrFail($id);
  return view('project.edit', compact('project'));
}

public function update(Request $request, $id)
{
  abort_if(Auth::user()->cannot('update project'), 403, 'Access Denied');
 
    $project= Project::findOrFail($id);
    $project->project_title=request('project_title');
    $project->project_startdate=request('startdate');
    $project->project_enddate=request('enddate');
    $project->details=request('details');
    $project->project_summary=request('project_summary');
    $project->project_status=request('project_status');
    $dt1 = Carbon::parse($project->project_startdate);
    $dt2 = Carbon::parse($project->project_enddate);
    $project->update();
    Alert::success('Success!', 'successful updated');
    return redirect()->route('project.index');       
    
     }
}
