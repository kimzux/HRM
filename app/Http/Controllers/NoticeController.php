<?php

namespace App\Http\Controllers;
use App\Models\Notice;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $path = $request->file('file_url')->storeAs('public',  $file);
        
     
 
 
        $notice = new Notice;
        $notice->title= request('title');
        $notice-> date=request('date');
        $notice->file_url = request('file_url');
        $notice->save();
        Alert::success('Success!', 'Successfully added');
        return redirect()->route('notice.index');
       
      
    }
    public function download($id)
    {
        $notice = Notice::where('id', $id)->firstOrFail();
        $path = Storage::path('public' . $notice->file_url);
        return Storage::disk('public')->download($path);
       
    }
   

}
