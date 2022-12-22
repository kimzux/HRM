<?php

namespace App\Http\Controllers;
use App\Models\Deduction;
use App\Models\Employee;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DeductionController extends Controller
{
    public function index()
    {
      abort_if(Auth::user()->cannot('view deduction'), 403, 'Access Denied');
      $deduction = Deduction::all();
      return view('payrol.deduction.index', compact('deduction'));
    }

    public function store(Request $request)
    { 
      abort_if(Auth::user()->cannot('create deduction'), 403, 'Access Denied');
      $deduction = new Deduction();
      $deduction->name = request('name');
      $deduction->description= request('description');
      $deduction->save();
      Alert::success('Success!', 'Successfully added');
      return back();
    }
      
    public function destroy($id)
    {
      abort_if(Auth::user()->cannot('delete deduction'), 403, 'Access Denied');
      $deduction= Deduction::findOrFail($id);
      $deduction->delete();
      Alert::success('Success!', 'Successfully deleted');
      return back();
    }

   public function edit($id)
   {   
      abort_if(Auth::user()->cannot('edit deduction'), 403, 'Access Denied');
      $deduction =Deduction::findOrFail($id);
      return view('payrol.deduction.edit', compact('deduction'));
   }

   public function update(Request $request, $id)
   {
      abort_if(Auth::user()->cannot('update deduction'), 403, 'Access Denied');
      $deduction= Deduction::findOrFail($id);
      $deduction->name=request('name');
      $deduction->description=request('description');
      Alert::success('Success!', 'Successfully updated');
      return redirect()->route('deduction.index');
      
  }
    
}
