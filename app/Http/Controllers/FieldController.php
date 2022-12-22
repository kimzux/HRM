<?php
namespace App\Http\Controllers;
use App\Models\Project;
use App\Models\Employee;
use App\Models\Field;
use Illuminate\Http\Request;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;
class FieldController extends Controller
{
    public function index()
  {
    abort_if(Auth::user()->cannot('view field'), 403, 'Access Denied');
    $field = Field::all();
    $employee = Employee::select('id', 'first_name')->get();
    $project = Project::select('id', 'project_title')->get();
    return view('field.index',  ['employee'=> $employee,'field'=> $field, 'project'=>$project]);
  
  }
  public function store(Request $request)
  {
    abort_if(Auth::user()->cannot('create field'), 403, 'Access Denied');
    $field = new Field();
    $field->employee_id=request('first_name');
    $field->project_id=request('project_id');
    $field->field_location=request('flocation');
    $field->field_startdate=request('startdate');
    $field->field_enddate=request('enddate');
    $field->return_date=request('actualReturnDate');
    $field->notes=request('notes');
    $dt1 = Carbon::parse($field->field_startdate);
    $dt2 = Carbon::parse($field->field_enddate);
    $field->field_totaldays=$interval = $dt1->diffInDays($dt2 );
    $field->save();
    Alert::success('Success!', 'successful field added');
    return back(); 
  }

  public function approved($id)
  {
   abort_if(Auth::user()->cannot('approved field'), 403, 'Access Denied');
   $field = Field::findOrFail($id);
   $field->status = 1; //Approved
   $field->save();
   Alert::success('Approved!', 'application successful approved');
   return redirect()->back(); //Redirect user somewhere
  }

 public function declined($id)
  {
  abort_if(Auth::user()->cannot('reject field'), 403, 'Access Denied');
  $field= Field::findOrFail($id);
  $field->status = 0; //Declined
  $field->save();
  Alert::warning('Rejected!', 'application successful rejected');
  return redirect()->back(); //Redirect user somewhere
  }
 public function edit($id)
  {
  abort_if(Auth::user()->cannot('edit field'), 403, 'Access Denied');
  $field =Field::findOrFail($id);
  $employee = Employee::select('id', 'first_name')->get();
  $project = Project::select('id', 'project_title')->get();
  return view('field.edit',  ['employee'=> $employee,'field'=> $field, 'project'=>$project]);
  }

  public function update(Request $request, $id)
  {
    abort_if(Auth::user()->cannot('update field'), 403, 'Access Denied');
    $field= Field::findOrFail($id);
    $field->employee_id=request('first_name');
    $field->project_id=request('project_id');
    $field->field_location=request('flocation');
    $field->field_startdate=request('startdate');
    $field->field_enddate=request('enddate');
    $field->return_date=request('actualReturnDate');
    $field->notes=request('notes');
    $dt1 = Carbon::parse($field->field_startdate);
    $dt2 = Carbon::parse($field->field_enddate);
    $field->field_totaldays=$interval = $dt1->diffInDays($dt2 );
    $field->update();
    Alert::success('Success!', 'successful updated');
    return redirect()->route('field.index');       
   }
          
}
