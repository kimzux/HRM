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
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    public function store(Request $request)
    {
        abort_if(Auth::user()->cannot('create employee'), 403, 'Access Denied');
        $employee = new Employee();
        $employee->first_name = request('first_name');
        $employee->last_name = request('last_name');
        $employee->email = request('email');
        $employee->em_address = request('em_address');
        $employee->em_code = request('em_code');
        $employee->department_id = request('dep_name');
        $employee->designation_id = request('des_name');
        $employee->em_gender = request('gender');
        $employee->em_phone = request('em_phone');
        $employee->status = 1;
        $employee->em_birthday = request('dob');
        $employee->em_joining_date = request('joindate');
        $employee->em_contract_end = request('leavedate');
        $employee->em_nid = request('em_nid');
        $employee->save();
        $employee_user = new User();
        $employee_user->email = request('email');
        $employee_user->employee_id = $employee->id;
        $employee_user->password_reset = 1;
        $employee_user->name = request('first_name').' '.request('last_name');
        $employee_user->password = Hash::make(request('email'));
        $employee_user->save();

        Alert::success('Success!', 'Successfully added');
        return back();
    }
    public function index()
    {
        abort_if(Auth::user()->cannot('view employee'), 403, 'Access Denied');

        $employee = Employee::all();

        return view('employee.index', compact('employee'));
    }
    public function create()
    {
        abort_if(Auth::user()->cannot('show employee'), 403, 'Access Denied');
        // abort_if(Auth::user()->cannot('View stock'), 403, 'Access Denied');
        $employees = Department::select('id', 'dep_name')->get();
        $value = Designation::select('id', 'des_name')->get();
        return view('employee.create', [
            'employees' => $employees,
            'value' => $value,
        ]);
    }

    public function edit($id)
    {
        abort_if(Auth::user()->cannot('edit employee'), 403, 'Access Denied');

        $employee = Employee::findOrFail($id);
        $employees = Department::select('id', 'dep_name')->get();
        $value = Designation::select('id', 'des_name')->get();
        return view('employee.edit', [
            'employee' => $employee,
            'employees' => $employees,
            'value' => $value,
            $id,
        ]);
    }
    public function update(Request $request, $id)
    {
        abort_if(Auth::user()->cannot('update employee'), 403, 'Access Denied');
        $employee = Employee::findOrFail($id);
        $employee->first_name = request('first_name');
        $employee->last_name = request('last_name');
        $employee->email = request('email');
        $employee->em_address = request('em_address');
        $employee->em_code = request('em_code');
        $employee->department_id = request('dep_name');
        $employee->designation_id = request('des_name');
        $employee->em_gender = request('gender');
        $employee->em_phone = request('em_phone');
        $employee->em_birthday = request('dob');
        $employee->em_joining_date = request('joindate');
        if ($employee->em_contract_end = request('leavedate')) {
            $employee->status = 0;
        }
        $employee->em_contract_end = request('leavedate');
        $employee->em_nid = request('em_nid');
        $employee->update();
        $employee_user = User::where('employee_id', $id)->firstOrFail();
        $employee_user->email = request('email');
        $employee_user->name = request('first_name');
        $employee_user->password_reset = 1;
        $employee_user->save();

        Alert::success('Success!', 'Successfully updated');
        return redirect(route('employee.index'));
    }

    public function destroy($id)
    {
        abort_if(Auth::user()->cannot('delete employee'), 403, 'Access Denied');

        $employee = Employee::findOrFail($id);
        $employee->delete();
        Alert::success('Success!', 'Successfully deleted');
        return back();
        // return redirect('/foodie')->with('success', 'Corona Case Data is successfully deleted');
    }
    public function show($employee_id)
    {
        abort_if(Auth::user()->cannot('see employee'), 403, 'Access Denied');
        $education = Education::with('employee')
            ->where('employee_id', $employee_id)
            ->get();
        return view('education.index', compact('education', 'employee_id'));
    }
}
