<?php

namespace App\Http\Controllers;
use App\Models\Designation;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DesignationController extends Controller
{
    public function store(Request $request)
    {
      abort_if(Auth::user()->cannot('Create Designation'), 403, 'Access Denied');
        $des = new Designation();
        $des->des_name = request('des_name');
        $des->save();
        Alert::success('Success!', 'Successfully added');
        return back();
  
      }
    public function index()
    {
      abort_if(Auth::user()->cannot('View Designation'), 403, 'Access Denied');
      $des = Designation::all();
      return view('organization.designation.index', compact('des'));
    }
  
    public function edit($id)
    {
      abort_if(Auth::user()->cannot('Edit Designation'), 403, 'Access Denied');
      $des = Designation::findOrFail($id);
      return view('organization.designation.edit', compact('des'));
    }

    public function update(Request $request, $id)
    {
      abort_if(Auth::user()->cannot('Update Designation'), 403, 'Access Denied');
      $validatedData =  $request->validate(['des_name' => 'required', ]);
      Designation::whereId($id)->update($validatedData);
      Alert::success('Success!', 'Successfully updated');
      return redirect('/designation');
    }
  
    public function destroy($id)
    {
      abort_if(Auth::user()->cannot('Delete Designation'), 403, 'Access Denied');
      $des = Designation::findOrFail($id);
      $des->delete();
      Alert::success('Success!', 'Successfully deleted');
      return back();
    }
    
    public function show(Designation $des)
    {
      abort_if(Auth::user()->cannot('Show Designation'), 403, 'Access Denied');
      return view('organization.designation.index', compact('des'));
    } 
  
}
