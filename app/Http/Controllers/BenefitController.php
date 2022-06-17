<?php

namespace App\Http\Controllers;

use App\Models\Benefit;
use App\Models\Employee;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class BenefitController extends Controller
{
    public function index()
    {
  
      abort_if(Auth::user()->cannot('view benefits'), 403, 'Access Denied');
      $benefit =Benefit::all();
      $employee= Employee::select('id', 'first_name')->get();
  
      return view('payrol.benefit.index', compact('benefit','employee'));
    }
    public function store(Request $request)
    {
      
    abort_if(Auth::user()->cannot('create benefits'), 403, 'Access Denied');
      // Education::create($request->all() + ['employee_id' => $employee_id]);
      // Alert::success('Success!', 'Successfully added');
      // return redirect()->route('employee.education.index',$employee_id);
        $deduction = new Benefit();
        $deduction->employee_id = request('employee_id');
        $deduction->name = request('name');
        $deduction->amount= request('amount');
        $deduction->save();
        Alert::success('Success!', 'Successfully added');
        return back();
  
      }
      public function destroy($id)
      {
    
        abort_if(Auth::user()->cannot('delete benefits'), 403, 'Access Denied');
        $benefit= Benefit::findOrFail($id);
        $benefit->delete();
        Alert::success('Success!', 'Successfully deleted');
        return back();
        // return redirect('/foodie')->with('success', 'Corona Case Data is successfully deleted');
      }
      public function edit($id)
      {
        
    abort_if(Auth::user()->cannot('edit benefits'), 403, 'Access Denied');
        $benefit = Benefit::findOrFail($id);
        $employee= Employee::select('id', 'first_name')->get();
        return view('payrol.benefit.edit', compact('benefit','employee'));
      }
      public function update(Request $request, Benefit $benefit)

      {
        
    abort_if(Auth::user()->cannot('update benefits'), 403, 'Access Denied');
    
          $request->validate([
    
            'employee_id' => 'required',
              'name' => 'required',
    
              'amount' => 'required',
    
          ]);
      
    
          $benefit->update($request->all());
          Alert::success('Success!', 'Successfully updated');
          return redirect()->route('benefit.index');
         
    
      }
    
      
}
