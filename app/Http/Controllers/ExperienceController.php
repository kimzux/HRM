<?php

namespace App\Http\Controllers;
use App\Models\Employee;
use App\Models\Experience;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    public function index($employee_id)
    {
        $experience= Experience::with('employee')->where('employee_id', $employee_id)->get();
        return view('experience.index', compact('experience','employee_id'));
    
    }
    public function store($employee_id , Request $request)
    {
      // Education::create($request->all() + ['employee_id' => $employee_id]);
      // Alert::success('Success!', 'Successfully added');
      // return redirect()->route('employee.education.index',$employee_id);
        $experience = new Experience();
        $experience-> employee_id=$employee_id=request('employee_id');
        $experience->exp_company = request('company_name');
        $experience->exp_com_position = request('position_name');
        $experience->comp_address = request('address');
        $experience->work_duration= request('work_duration');
        $experience->save();
        Alert::success('Success!', 'Successfully added');
        return redirect()->route('employee.experience.index',$employee_id);
    
  
      }
      public function edit($employee_id, Experience $experience)
      {
          return view('experience.edit', compact('employee_id', 'experience'));
      }
      public function update($employee_id, Request $request, Experience $experience)
    {
        $experience->update($request->all());
        Alert::success('Success!', 'Successfully updated');
        return redirect()->route('employee.experience.index', $employee_id);
    }
}
