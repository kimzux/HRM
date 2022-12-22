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
        abort_if(Auth::user()->cannot('Create Notice'), 403, 'Access Denied');
        $path = Storage::putFile('notices', $request->file('file_url'));
        $notice = new Notice();
        $notice->title = request('title');
        $notice->date = request('date');
        $notice->file_url = $path;
        $notice->save();
        Alert::success('Success!', 'Successfully added');
        return redirect()->route('notice.index');
    }

    public function download($id)
    {
        $notice = Notice::where('id', $id)->firstOrFail();
        return response()->file(storage_path('app') . DIRECTORY_SEPARATOR . $notice->file_url);
    }

    public function destroy($id)
    {

        abort_if(Auth::user()->cannot('delete notice'), 403, 'Access Denied');
        $notice = Notice::findOrFail($id);
        $notice->delete();
        Alert::success('Success!', 'Successfully deleted');
        return back();
    }

    public function edit($id)
    {

       abort_if(Auth::user()->cannot('edit notice'), 403, 'Access Denied');
       $notice = Notice::findOrFail($id);
       return view('notice.edit', compact('notice'));
    }

    public function update(Request $request, $id)
    {
        abort_if(Auth::user()->cannot('update notice'), 403, 'Access Denied');
        $notice = notice::findOrFail($id);
        $path = Storage::putFile('notices', $request->file('file_url'));
        $notice->title = request('title');
        $notice->date = request('date');
        $notice->file_url = $path;
        $notice->update();
        Alert::success('Success!', 'Successfully updates');
        return redirect()->route('notice.index');
  
    }
  

}
