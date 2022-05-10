<?php

namespace App\Http\Controllers;
use App\Models\Employee;
use App\Models\Education;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
class EducationController extends Controller
{
    public function store($employee_id , Request $request)
    {
      // Education::create($request->all() + ['employee_id' => $employee_id]);
      // Alert::success('Success!', 'Successfully added');
      // return redirect()->route('employee.education.index',$employee_id);
        $education = new Education();
        $education-> employee_id=$employee_id=request('employee_id');
        $education->education_type = request('education_type');
        $education->institute = request('institute');
        $education->result = request('result');
        $education->year= request('year');
        $education->save();
        Alert::success('Success!', 'Successfully added');
        return redirect()->route('employee.education.index',$employee_id);
    
  
      }
      public function index($employee_id)
    {
        $education = Education::with('employee')->where('employee_id', $employee_id)->get();
        return view('education.index', compact('education','employee_id'));
    
    }
  
   
    public function show($employee_id, Education $education)
    {
        return view('employee.education.index', compact('employee_id', 'education'));
    }

    public function edit($employee_id, Education $education)
    {
        return view('education.edit', compact('employee_id', 'education'));
    }

    public function update($employee_id, Request $request, Education $education)
    {
        $education->update($request->all());
        Alert::success('Success!', 'Successfully updated');
        return redirect()->route('employee.education.index', $employee_id);
    }
    public function show_exp($employee_id)
    {
        $experience= Experience::with('employee')->where('employee_id', $employee_id)->get();
        return view('experience.index', compact('experience','employee_id'));
    
    }
}
