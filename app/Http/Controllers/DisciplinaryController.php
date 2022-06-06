<?php

namespace App\Http\Controllers;
use App\Models\Employee;
use App\Models\Disciplinary;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DisciplinaryController extends Controller
{
    public function index()
    {
        {
            abort_if(Auth::user()->cannot('view displinary'), 403, 'Access Denied');
    
            $disciplinary= Disciplinary::with('employee')->get();
            $disci = Employee::select('id', 'first_name')->get();
            return view('disciplinary.index', ['disci'=> $disci,'disciplinary'=> $disciplinary]);
        }
    
    }
    public function store(Request $request)
    {
        abort_if(Auth::user()->cannot('create displinary'), 403, 'Access Denied');
    
        $disc = new Disciplinary();
        $disc->employee_id = request('first_name');
        $disc->disciplinary_action = request('disciplinary_action');
        $disc->title= request('title');
        $disc->details= request('details');
        $disc->save();
        Alert::success('Success!', 'Successfully added');
        return back();
    }
    public function edit($id)
    {
        abort_if(Auth::user()->cannot('edit displinary'), 403, 'Access Denied');
        $disciplinary = Disciplinary::findOrFail($id);
        $disci = Employee::select('id', 'first_name')->get();
        return view('disciplinary.edit', ['disciplinary'=> $disciplinary,'disci'=> $disci]);
    }
    public function destroy($id)
  {
    abort_if(Auth::user()->cannot('delete displinary'), 403, 'Access Denied');
    $disc = Disciplinary::findOrFail($id);
    $disc->delete();
    Alert::success('Success!', 'Successfully deleted');
    return back();
    // return redirect('/foodie')->with('success', 'Corona Case Data is successfully deleted');
  }
 
  public function update(Request $request, Disciplinary $disciplinary)

  {
    abort_if(Auth::user()->cannot('update displinary'), 403, 'Access Denied');

      $request->validate([

          'first_name' => 'required',
          'disciplinary_action' => 'required',
          'title' => 'required',
          'details' => 'required',


      ]);

  

      $disciplinary->update($request->all());

  
      Alert::success('Success!', 'Successfully updated');
      return redirect()->route('disciplinary.index');
     

  }
}
