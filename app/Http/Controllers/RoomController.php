<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use App\Models\Room;
use Illuminate\Support\Facades\Auth;

class RoomController extends Controller
{
  
    public function index()
    {
  
      abort_if(Auth::user()->cannot('view room'), 403, 'Access Denied');
      $room = room::all();
      return view('room.index', compact('room'));
    }
    public function store(Request $request)
    {
      
    abort_if(Auth::user()->cannot('create room'), 403, 'Access Denied');
      // Education::create($request->all() + ['employee_id' => $employee_id]);
      // Alert::success('Success!', 'Successfully added');
      // return redirect()->route('employee.education.index',$employee_id);
        $room = new Room();
        $room->room_no = request('room_no');
        $room->size= request('size');
        $room->save();
        Alert::success('Success!', 'Successfully added');
        return back();
  
      }
      public function destroy($id)
      {
    
        abort_if(Auth::user()->cannot('delete benefits'), 403, 'Access Denied');
        $room= Room::findOrFail($id);
        $room->delete();
        Alert::success('Success!', 'Successfully deleted');
        return back();
        // return redirect('/foodie')->with('success', 'Corona Case Data is successfully deleted');
      }
      public function edit($id)
      {
        
    abort_if(Auth::user()->cannot('edit benefits'), 403, 'Access Denied');
        $room = Room::findOrFail($id);
        return view('room.edit', compact('room'));
      }
      public function update(Request $request, Room $room)

      {
        
    abort_if(Auth::user()->cannot('update benefits'), 403, 'Access Denied');
    
          $request->validate([
    
          
              'room_no' => 'required',
    
              'size' => 'required',
    
          ]);
      
    
          $room->update($request->all());
          Alert::success('Success!', 'Successfully updated');
          return redirect()->route('room.index');
         
    
      }

}
