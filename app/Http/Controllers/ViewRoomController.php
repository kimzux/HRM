<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use Illuminate\Support\Facades\Auth;
class ViewRoomController extends Controller
{
    public function index()
        {
      
          abort_if(Auth::user()->cannot('view deduction'), 403, 'Access Denied');
         
          $room = room::all();
         
          return view('employee_book.index', compact('room'));
         
        }
       
}
