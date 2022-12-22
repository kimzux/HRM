<?php

namespace App\Http\Controllers;
use App\Models\Logistic;
use App\Models\Project;
use App\Models\Employee;
use App\Models\Task;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogisticController extends Controller
{
    public function index()
    {
      abort_if(Auth::user()->cannot('view logistic'), 403, 'Access Denied');
      $logistic = Logistic::all();
  
      return view('logistic.index', compact('logistic'));
    }
    public function store(Request $request)
  {
    abort_if(Auth::user()->cannot('create logistic'), 403, 'Access Denied');
    
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
      abort_if(Auth::user()->cannot('delete logistic'), 403, 'Access Denied');
  
      $logistic = Logistic::findOrFail($id);
      $logistic->delete();
      Alert::success('Success!', 'Successfully deleted');
      return back();
    }
    public function edit($id)
    {
      abort_if(Auth::user()->cannot('edit logistic'), 403, 'Access Denied');
      $logistic = Logistic::findOrFail($id);
      return view('logistic.edit', compact('logistic'));
    }
    public function update(Request $request, $id)
    {
      abort_if(Auth::user()->cannot('update logistic'), 403, 'Access Denied');
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

