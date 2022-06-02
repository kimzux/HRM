<?php

namespace App\Http\Controllers;
use App\Models\Leave_type;
use App\Models\Leave_application;
use App\Models\Employee;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

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

        $employee_id = $request->first_name;
        $lastLeave = Leave_application::where('employee_id', $employee_id)->orderBy('created_at', 'desc')->first();
        return dd($lastLeave);

        // if($employee != NULL) {



        // }




        $leave = new Leave_application();
        $leave->employee_id=request('first_name');
        $leave->leave_id=request('leavename');
        $leave->start_date=request('startdate');
        $leave->end_date=request('enddate');
        $leave->reason=request('reason');
        $dt = Carbon::parse($leave->start_date);
        $dt2 = Carbon::parse($leave->end_date);
        $leave->total_day=$interval = $dt->diffInDays($dt2 );
        $leave->day_remain=$days=($leave->leave_type->day_no)-$interval;
        if($interval>($leave->leave_type->day_no)){
          Alert::Warning('warning!', 'its exceed the total leave day');
          return back();
        }
        if($days< 0){
          Alert::Warning('warning!', 'you cant apply since your leave day finish');
          return back();
        }
         else{
        $leave->save();
        Alert::success('Success!', 'application successful added');
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
      $leave->day_remain=$days=($leave->leave_type->day_no)-$interval;
      if($interval>($leave->leave_type->day_no)){
        Alert::Warning('warning!', 'its exceed the total leave day');
        return back();
      }
      if($days< 0){
        Alert::Warning('warning!', 'you cant apply since your leave day finish');
        return back();
      }
       else{
      $leave->update();
      Alert::success('Success!', 'application successful updated');
      return redirect()->route('leave_apply.index');
       }
      }

       public function approve($id){
        $leave = Leave_application::findOrFail($id);
        $leave->status = 1; //Approved
        $leave->save();
        Alert::success('Approved!', 'application successful approved');
        return redirect()->back(); //Redirect user somewhere
     }
     
     public function decline($id){
        $leave = Leave_application::findOrFail($id);
        $leave->status = 0; //Declined
        $leave->save();
        Alert::info('Rejected!', 'application successful rejected');
        return redirect()->back(); //Redirect user somewhere
       
     }
   
 
    

}