<?php

namespace App\Http\Controllers;
use App\Models\Deduction;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class DeductionController extends Controller
{
    public function index()
    {
  
      $deduction = Deduction::all();
  
      return view('payrol.deduction.index', compact('deduction'));
    }
    public function store(Request $request)
    {
      // Education::create($request->all() + ['employee_id' => $employee_id]);
      // Alert::success('Success!', 'Successfully added');
      // return redirect()->route('employee.education.index',$employee_id);
        $deduction = new Deduction();
        $deduction->name = request('name');
        $deduction->amount= request('amount');
        $deduction->save();
        Alert::success('Success!', 'Successfully added');
        return back();
  
      }
      public function destroy($id)
      {
    
        $deduction= Deduction::findOrFail($id);
        $deduction->delete();
        Alert::success('Success!', 'Successfully deleted');
        return back();
        // return redirect('/foodie')->with('success', 'Corona Case Data is successfully deleted');
      }
      public function edit($id)
      {
        $deduction =Deduction::findOrFail($id);
        return view('payrol.deduction.edit', compact('deduction'));
      }
      public function update(Request $request, Deduction $deduction)

      {
    
          $request->validate([
    
              'name' => 'required',
    
              'amount' => 'required',
    
          ]);
      
    
          $deduction->update($request->all());
          Alert::success('Success!', 'Successfully updated');
          return redirect()->route('deduction.index');
         
    
      }
    
}
