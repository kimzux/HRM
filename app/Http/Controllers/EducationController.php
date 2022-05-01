<?php

namespace App\Http\Controllers;
use App\Models\Employee;
use App\Models\Education;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
class EducationController extends Controller
{
    public function store(Request $request)
    {
      
        $education = new Education();
        $education->employee_id=request('employee_id');
        $education->education_type = request('education_level');
        $education->institute = request('institute');
        $education->result = request('result');
        $education->year= request('year');
        $education->save();
        Alert::success('Success!', 'Successfully added');
       return back();
  
      }
      public function index($id)
    {
        $value  = Education::with('employee')->where('employee_id', $id)->get();
  
    //   $value = Education::all();
  
  
      return view('employee.education.index', compact('value'));
    
    }
  
    public function edit($id, $employee_id)
    {
      
      $dep = Department::findOrFail($id);
  
      return view('organization.department.edit_dep', compact('dep'));
    }
    public function update(Request $request, $id)
    {
  $validatedData =  $request->validate([
      'dep_name' => 'required',
      
  ]);
  
  Department::whereId($id)->update($validatedData);
  Alert::success('Success!', 'Successfully updated');
  return redirect('/department');
    }
    public function show(Education $education)
    {
      return view('employee.education.index', compact('education'));
    } 
  
}
