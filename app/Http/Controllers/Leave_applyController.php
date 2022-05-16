<?php

namespace App\Http\Controllers;
use App\Models\Leave_type;
use App\Models\Leave_application;
use App\Models\Employee;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class Leave_applyController extends Controller
{
    public function index()
    {
  
      $leave_apply = Leave_application::all();
      $employee = Employee::select('id', 'first_name')->get();
      $leave_type = Leave_type::select('id', 'leavename')->get();
      return view('leave.leave_application.index',  ['employee'=> $employee,'leave_apply'=> $leave_apply, 'leave_type'=>$leave_type]);
    }
    public function store(Request $request)
    {
        $leave = new Leave_application();
        $leave->employee_id=request('first_name');
        $leave->leave_id=request('leavename');
        $leave->start_date=request('startdate');
        $leave->end_date=request('enddate');
        $leave->reason=request('reason');
        $dt = Carbon::parse(request('startdate'));
        $dt2 = Carbon::parse(request('enddate'));
        $leave->total_day=$interval = $dt->diffInDays($dt2 );
        $leave->status=0;
        if($interval>($leave->leave_type->day_no)){
          Alert::Warning('warning!', 'its exceed the total leave day');
          return back();
        }
         else{
        $leave->save();
        Alert::success('Success!', 'application successful');
      return back();
         }
 }
 public function edit($id)
  {
    
    $leave_apply = Leave_application::findOrFail($id);
    $employee = Employee::select('id', 'first_name')->get();
    $leave_type = Leave_type::select('id', 'leavename')->get();
    return view('leave.leave_application.edit',  ['employee'=> $employee,'leave_type'=> $leave_type,'leave_apply'=> $leave_apply,$id]);
  }
  public function update(Request $request, $id)
  {
   
      $leave= Leave_application::findOrFail($id);
      $leave->employee_id=request('first_name');
      $leave->leave_id=request('leavename');
      $leave->start_date=request('startdate');
      $leave->end_date=request('enddate');
      $leave->reason=request('reason');
      $dt = Carbon::parse(request('startdate'));
      $dt2 = Carbon::parse(request('enddate'));
      $leave->total_day=$interval = $dt->diffInDays($dt2 );
      $leave->status=0;
      if($interval>($leave->leave_type->day_no)){
        Alert::Warning('warning!', 'its exceed the total leave day');
        return back();
      }
       else{
      $leave->update();
      Alert::success('Success!', 'application successful updated');
      return back();
       }
      }

       public function approve($id){
        $leave = Leave_application::findOrFail($id);
        $leave->status = 1; //Approved
        $leave->save();
        return redirect()->back(); //Redirect user somewhere
     }
     
     public function decline($id){
        $leave = Leave_application::findOrFail($id);
        $leave->status = 0; //Declined
        $leave->save();
        return redirect()->back(); //Redirect user somewhere
     }

}