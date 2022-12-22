<?php

namespace App\Http\Controllers;
use App\Models\Deduction;
use App\Models\Employee;
use App\Models\EmployeeDeduction;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class EmployeeDeductionController extends Controller
{
    public function index()
    {
  
      abort_if(Auth::user()->cannot('view deduction'), 403, 'Access Denied');
      $deduction_employee = EmployeeDeduction::all();
      $employee= Employee::select('id', 'first_name')->get();
      $deduction= Deduction::select('id', 'name')->get();
      return view('payrol.employee-deduction.index', compact('deduction_employee','employee','deduction'));
    }
    public function store(Request $request)
    {
      
        abort_if(Auth::user()->cannot('create deduction'), 403, 'Access Denied');
        $deduction = new EmployeeDeduction();
        $deduction->employee_id = request('employee_id');
        $deduction->deduction_id = request('deduction_id');
        $deduction->effective_date = request('effective_date');
        $deduction->amount= request('amount');
        $deduction->save();
        Alert::success('Success!', 'Successfully added');
        return back();
  
      }
      
      public function destroy($id)
      {
    
        abort_if(Auth::user()->cannot('delete deduction'), 403, 'Access Denied');
        $deduction= EmployeeDeduction::findOrFail($id);
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
