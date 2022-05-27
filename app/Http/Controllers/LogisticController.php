<?php

namespace App\Http\Controllers;
use App\Models\Logistic;
use App\Models\Project;
use App\Models\Employee;
use App\Models\Task;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class LogisticController extends Controller
{
    public function index()
    {
  
      $logistic = Logistic::all();
  
      return view('logistic.index', compact('logistic'));
    }
    public function store(Request $request)
  {
    
      $logistic = new Logistic();
      $logistic->logistic_name= request('logistic_name');
      $logistic->description = request('details');
      $logistic->quantity = request('qty');
      $logistic->entry_date = request('date');
      $logistic->logistic_sup= request('type');
      $logistic->save();
      Alert::success('Success!', 'Successfully added');
      return back();

    }
    public function destroy($id)
    {
  
      $logistic = Logistic::findOrFail($id);
      $logistic->delete();
      Alert::success('Success!', 'Successfully deleted');
      return back();
      // return redirect('/foodie')->with('success', 'Corona Case Data is successfully deleted');
    }
    public function edit($id)
    {
      
      $logistic = Logistic::findOrFail($id);
   
      return view('logistic.edit', compact('logistic'));
    }
    public function update(Request $request, $id)
    {
      
        $logistic = Logistic::findOrFail($id);
        $logistic->logistic_name= request('logistic_name');
        $logistic->description = request('description');
        $logistic->quantity = request('quantity');
        $logistic->entry_date = request('entry_date');
        $logistic->logistic_sup= request('logistic_sup');
        $logistic->update();
        Alert::success('Success!', 'Successfully updades');
        return redirect()->route('logistic.index');
  
      }
  
}

