<?php

namespace App\Http\Controllers;
use App\Models\Department;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DepartmentController extends Controller
{
    public function store(Request $request)
  {
    abort_if(Auth::user()->cannot('Create Department'), 403, 'Access Denied');
    
      $dep = new Department();
      $dep->dep_name = request('dep_name');
      $dep->save();
      Alert::success('Success!', 'Successfully added');
      return back();

    }
    public function index()
  {
    abort_if(Auth::user()->cannot('View Department'), 403, 'Access Denied');
    $dep = Department::all();

    return view('organization.department.index', compact('dep'));
  }

  public function edit($id)
  {
    abort_if(Auth::user()->cannot('Edit Department'), 403, 'Access Denied');
    $dep = Department::findOrFail($id);

    return view('organization.department.edit_dep', compact('dep'));
  }
  public function update(Request $request, $id)
  {
    abort_if(Auth::user()->cannot('Update Department'), 403, 'Access Denied');
$validatedData =  $request->validate([
    'dep_name' => 'required',
    
]);

Department::whereId($id)->update($validatedData);
Alert::success('Success!', 'Successfully updated');
return redirect('/department');
  }

  public function destroy($id)
  {

    abort_if(Auth::user()->cannot('Delete Department'), 403, 'Access Denied');
    $dep = Department::findOrFail($id);
    $dep->delete();
    Alert::success('Success!', 'Successfully deleted');
    return back();
    // return redirect('/foodie')->with('success', 'Corona Case Data is successfully deleted');
  }
  public function show(Department $dep)
  {
    abort_if(Auth::user()->cannot('Show Department'), 403, 'Access Denied');
    return view('organization.department.index', compact('dep'));
  } 

}