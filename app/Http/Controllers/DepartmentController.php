<?php

namespace App\Http\Controllers;
use App\Models\Department;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function store(Request $request)
  {
    
      $dep = new Department();
      $dep->dep_name = request('dep_name');
      $dep->save();
      Alert::success('Success!', 'Successfully added');
      return back();

    }
    public function index()
  {

    $dep = Department::all();

    return view('organization.department.index', compact('dep'));
  }

  public function edit($id)
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

  public function destroy($id)
  {

    $dep = Department::findOrFail($id);
    $dep->delete();
    Alert::success('Success!', 'Successfully deleted');
    return back();
    // return redirect('/foodie')->with('success', 'Corona Case Data is successfully deleted');
  }
  public function show(Department $dep)
  {
    return view('organization.department.index', compact('dep'));
  } 

}