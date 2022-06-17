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
      $employee= Employee::select('id', 'first_name')->get();
  
      return view('payrol.deduction.index', compact('deduction','employee'));
    }
    public function store(Request $request)
    {
      
    abort_if(Auth::user()->cannot('create deduction'), 403, 'Access Denied');
      // Education::create($request->all() + ['employee_id' => $employee_id]);
      // Alert::success('Success!', 'Successfully added');
      // return redirect()->route('employee.education.index',$employee_id);
        $deduction = new Deduction();
        $deduction->employee_id = request('employee_id');
        $deduction->name = request('name');
        $deduction->amount= request('amount');
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
        // return redirect('/foodie')->with('success', 'Corona Case Data is successfully deleted');
      }
      public function edit($id)
      {
        
    abort_if(Auth::user()->cannot('edit deduction'), 403, 'Access Denied');
        $deduction =Deduction::findOrFail($id);
        $employee= Employee::select('id', 'first_name')->get();
        return view('payrol.deduction.edit', compact('deduction','employee'));
      }
      public function update(Request $request, Deduction $deduction)

      {
        
    abort_if(Auth::user()->cannot('update deduction'), 403, 'Access Denied');
    
          $request->validate([
            'employee_id'=> 'required',
              'name' => 'required',
    
              'amount' => 'required',
    
          ]);
      
    
          $deduction->update($request->all());
          Alert::success('Success!', 'Successfully updated');
          return redirect()->route('deduction.index');
         
    
      }
    
}
