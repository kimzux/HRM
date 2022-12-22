<?php

namespace App\Http\Controllers;
use App\Models\Perdeim;
use App\Models\PerdeimRetire;
use App\Models\Employee;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PerdeimViewController extends Controller
{
    public function index()
     {
        abort_if(Auth::user()->cannot('view perdeim-employee'), 403, 'Access Denied');
        $employee = auth()->user();
        $perdeim = Perdeim::where('employee_id',auth()->user()->employee_id )->orderBy('created_at', 'desc')->get();
        return view('perdeimemployee.index',  ['employee' => $employee,'perdeim' => $perdeim]);
     }

    public function store( Request $request)
    {
        abort_if(Auth::user()->cannot('create perdeim-employee'), 403, 'Access Denied');
        $perdeim = new Perdeim;
        $employee_id =  auth()->user()->employee_id;
        $pendingPerdeimApplication = Perdeim::where('employee_id', $employee_id)->whereNull('status')->orderBy('created_at', 'desc')->first();
        $Retire_two =Perdeim::where('employee_id', $employee_id)->where('retire_status', 0)->orderBy('created_at', 'desc')->first();
        $Retire =Perdeim::where('employee_id', $employee_id)->whereNull('retire_status')->orderBy('created_at', 'desc')->first();
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
        $perdeim->employee_id = $employee_id;
        $perdeim->amount = $request->amount;
        $perdeim->reason = $request->reason;
        $perdeim->save();
        Alert::success('Success!', 'application successful added');
        return back();
              }
    }

    public function show($perdeim_id)
    {
       abort_if(Auth::user()->cannot('View perdeim-retires-view'), 403, 'Access Denied');
       $perdeim = PerdeimRetire::with('perdeim')->where('perdeim_id', $perdeim_id)->get();
      return view('perdeimemployee.retire.index', compact('perdeim','perdeim_id'));
  }
}
