<?php

namespace App\Http\Controllers;
use App\Models\Perdeim;
use App\Models\PerdeimRetire;
use App\Models\Employee;
use App\Notifications\PerdeimApplicationApproved;
use App\Notifications\PerdeimApplicationRejected;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PerdeimController extends Controller
{
    public function index()
    {
  
      abort_if(Auth::user()->cannot('view perdeim'), 403, 'Access Denied');
      $department = auth()->user()->employee?
      auth()->user()->employee->department_id:null;
      
      $perdeim = Perdeim::query()->select('perdeim.*')->when(!auth()->user()->can('view all department perdeim'), function($query) use($department){
            $query->join('employee', 'employee.id', '=', 'perdeim.employee_id')->where('employee.department_id', $department);})->get();
      $employee= Employee::select('id', 'first_name')->get();
      return view('perdeim.index', compact('perdeim','employee'));
    }

    public function store( Request $request)
    {
    abort_if(Auth::user()->cannot('create perdeim'), 403, 'Access Denied');
    $perdeim = new Perdeim;
    $employee_id = $request->first_name;
    $pendingPerdeimApplication = Perdeim::where('employee_id', $employee_id)
      ->whereNull('status')
      ->orderBy('created_at', 'desc')->first();
   
      $Retire_two =Perdeim::where('employee_id', $employee_id)
      ->where('retire_status', 0)
      ->orderBy('created_at', 'desc')->first();
      $Retire =Perdeim::where('employee_id', $employee_id)
      ->whereNull('retire_status')
      ->orderBy('created_at', 'desc')->first();
    //reject if there is pending leave application
    if ($pendingPerdeimApplication) {
      Alert::warning('warning!', 'You can\'t apply until the previous application is processed!');
      return back();
    }
    if($Retire_two){
        Alert::warning('warning!', 'You can\'t apply until the Retirement is done!');
        return back();
         }
         else if($Retire){
            Alert::warning('warning!', 'You can\'t apply until the Retirement is done!');
            return back();
             }   
    else{
    $perdeim->employee_id = $request->first_name;
    $perdeim->amount = $request->amount;
    $perdeim->reason = $request->reason;
    $perdeim->save();
    Alert::success('Success!', 'application successful added');
    return back();
     }
   }

  public function approve($id)
  {
    abort_if(Auth::user()->cannot('approve perdeim'), 403, 'Access Denied');
    $perdeim = Perdeim::findOrFail($id);
    $perdeim->status = 1; //Approved
    $perdeim->save();
    $perdeim->employee->notify(new PerdeimApplicationApproved($perdeim));
    Alert::success('Approved!', 'application successful approved');
    return redirect()->back(); //Redirect user somewhere
  }

  public function decline($id)
  {
    abort_if(Auth::user()->cannot('reject perdeim'), 403, 'Access Denied');
    $perdeim = Perdeim::findOrFail($id);
    $perdeim ->status = 0; //Declined
    $perdeim->save();
    $perdeim->employee->notify(new PerdeimApplicationRejected($perdeim));
    Alert::info('Rejected!', 'application successful rejected');
    return redirect()->back(); //Redirect user somewhere
  }

  public function show($perdeim_id)
  {
    abort_if(Auth::user()->cannot('view perdeimretires'), 403, 'Access Denied');
    $perdeim = PerdeimRetire::with('perdeim')->where('perdeim_id', $perdeim_id)->get();
    return view('perdeim.perdeimretire.index', compact('perdeim','perdeim_id'));
  }

}
