<?php

namespace App\Http\Controllers;
use App\Models\Notice;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class NoticeController extends Controller
{
    public function index()
    {
        abort_if(Auth::user()->cannot('View Notice'), 403, 'Access Denied');
        $notice = Notice::all();
        return view('notice', compact('notice'));
    
    }
    
    public function store(Request $request)
    {
        
        // $validatedData = $request->validate([
        //  'file' => 'required|csv,txt,xlx,xls,pdf|max:2048',
        
        // ]);
        abort_if(Auth::user()->cannot('Create Notice'), 403, 'Access Denied');
      
        $file = $request->file('file_url')->getClientOriginalName();
        $file_url= $request->file('file_url')->store('public/files');
        
 
 
        $notice = new Notice;
        $notice->title= request('title');
        $notice-> date=request('date');
        $notice->file_url = request('file_url');
        $notice->save();
        Alert::success('Success!', 'Successfully added');
        return redirect()->route('notice.index');
       
      
    }

}
