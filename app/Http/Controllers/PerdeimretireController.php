<?php

namespace App\Http\Controllers;

use App\Models\Perdeim;
use App\Models\PerdeimRetire;
use App\Models\Employee;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class PerdeimretireController extends Controller
{
    public function store(Request $request)
    {
      abort_if(Auth::user()->cannot('create perdeimretires'), 403, 'Access Denied');
        $perdeimretire = new PerdeimRetire();
        $perdeimretire->perdeim_id= request('perdeim_id');
        $perdeimretire->amount_used= request('amount_used');
        $path=Storage::putFile('proof',$request->file('file_url'));
        $perdeimretire->file_title= request('title');
        $perdeimretire->file_url = $path;
        $perdeimretire->save();
        Alert::success('Success!', 'Successfully added');
        return back();
  
      }
      public function approved($id)
      {
        abort_if(Auth::user()->cannot('approve perdeim-retire'), 403, 'Access Denied');
        $perdeim = PerdeimRetire::findOrFail($id);
        $perdeim->status = 1; //Approved
        $perdeim->perdeim->retire_status = 1; //Approved
        
        $perdeim->push();
        
        Alert::success('Approved!', 'application successful approved');
        return redirect()->back(); //Redirect user somewhere
      }
    
      public function declined($id)
      {
        abort_if(Auth::user()->cannot('reject perdeim-retire'), 403, 'Access Denied');
        $perdeim = PerdeimRetire::findOrFail($id);
        $perdeim ->status = 0; //Declined
        $perdeim->save();
        Alert::info('Rejected!', 'application successful rejected');
        return redirect()->back(); //Redirect user somewhere
    
      }
      public function download($id)
    {
      abort_if(Auth::user()->cannot('download perdeim-retire'), 403, 'Access Denied');
        $perdeims = PerdeimRetire::where('id', $id)->firstOrFail();
    
        return response()->file(storage_path('app') . DIRECTORY_SEPARATOR .$perdeims->file_url);
       
    }
}
