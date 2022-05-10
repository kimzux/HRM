<?php

namespace App\Http\Controllers;
use Hash;
use App\Models\Employee;
use App\Models\Designation;
use App\Models\Department;
use App\Models\User;
use App\Models\Education;
use App\Models\Experience;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function store(Request $request)
  {
    
      $employee = new Employee();
      $employee->first_name=request('first_name');
      $employee->last_name=request('last_name');
      $employee->email=request('email');
      $employee->em_address=request('em_address');
      $employee->em_code=request('em_code');
      $employee->department_id = request('dep_name');
      $employee->designation_id = request('des_name');
      $employee->em_gender=request('gender');
      $employee->em_phone=request('em_phone');
      $employee->em_birthday=request('dob');
      $employee->em_joining_date=request('joindate');
      $employee->em_contract_end=request('leavedate');
      $employee->em_nid=request('em_nid');
      $employee->save();
      $employee_user= new User();
      $employee_user->email = request('email');
      $employee_user->employee_id=$employee->id;
      $employee_user->name = request('first_name');
      $employee_user->password = Hash::make( request('email'));
      $employee_user->save();
      // $education = new Education();
      // $education->employee_id = $request->employee_id;
      // $education->education_type = request('education_level');
      // $education->institute = request('institute');
      // $education->result = request('result');
      // $education->year= request('year');

      // $education->save();
     
      Alert::success('Success!', 'Successfully added');
      return back();

    }
    public function index()
  {

    $employee = Employee::all();

    return view('employee.index', compact('employee'));
  }
  public function create()
    {
        // abort_if(Auth::user()->cannot('View stock'), 403, 'Access Denied');
        $employees = Department::select('id', 'dep_name')->get();
        $value = Designation::select('id', 'des_name')->get();
        return view('employee.create', ['employees' => $employees, 'value' => $value]);
    }

  public function edit($id)
  {
    
    $employee = Employee::findOrFail($id);
    $employees = Department::select('id', 'dep_name')->get();
    $value = Designation::select('id', 'des_name')->get();
    return view('employee.edit', ['employee'=> $employee,'employees'=> $employees,'value'=> $value,$id]);
  }
  public function update(Request $request, $id)
  {
   
      $employee= Employee::findOrFail($id);
      $employee->first_name=request('first_name');
      $employee->last_name=request('last_name');
      $employee->email=request('email');
      $employee->em_address=request('em_address');
      $employee->em_code=request('em_code');
      $employee->department_id = request('dep_name');
      $employee->designation_id = request('des_name');
      $employee->em_gender=request('gender');
      $employee->em_phone=request('em_phone');
      $employee->em_birthday=request('dob');
      $employee->em_joining_date=request('joindate');
      $employee->em_contract_end=request('leavedate');
      $employee->em_nid=request('em_nid');
      $employee->update();
      $employee_user= User::findOrFail($id);
      $employee_user->email = request('email');
      $employee_user->name = request('first_name');
      $employee_user->save();
      

      Alert::success('Success!', 'Successfully updated');
      return view('employee.edit');
  }

  public function destroy($id)
  {

    $employee = Employee::findOrFail($id);
    $employee->delete();
    Alert::success('Success!', 'Successfully deleted');
    return back();
    // return redirect('/foodie')->with('success', 'Corona Case Data is successfully deleted');
  }
  public function show($employee_id)
    {
        $education = Education::with('employee')->where('employee_id', $employee_id)->get();
        return view('education.index', compact('education','employee_id'));
    
    }
    public function show_exp($employee_id)
    {
        $experience= Experience::with('employee')->where('employee_id', $employee_id)->get();
        return view('experience.index', compact('experience','employee_id'));
    
    }
}
