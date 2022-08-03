<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Book;
use App\Models\Employee;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class EmployeeBookController extends Controller
{
    public function index()
    {
  
      abort_if(Auth::user()->cannot('view deduction'), 403, 'Access Denied');
      $book = Book::all();
      $employee = auth()->user();
      $room= Room::select('id', 'room_no')->get();
      return view('employee_book.room_book.index', compact('book','employee','room'));
     
    }
    public function store(Request $request)
    {
      
      $book = new Book;
      $employee_id = auth()->user()->employee_id;
      $room_id = $request->room_no;
  
      $booked = Book::where('employee_id', $employee_id)
        ->whereNull('status')
        ->orderBy('created_at', 'desc')->first();
        $occupied =Book::where('employee_id', $employee_id)
        ->where('status', 1)
        ->orderBy('created_at', 'desc')->first();
       
  
  
      //reject if there is pending leave application
      if ($booked) {
        Alert::warning('warning!', 'You can\'t book because the room has been booked at this time!');
        return back();
      }
      if($occupied){
          Alert::warning('warning!', 'You can\'t book because the room has been booked at this time!');
          return back();
          
      }
  else{
      $book->employee_id =    $employee_id;
      $book->room_id = $request->room_no;
      $book->reservation_date = $request->reserve_date;
      $book->time_in = $request->time_in;
      $book->time_out= $request->time_out;
      $book->save();
  
      Alert::success('Success!', 'application successful added');
      return back();
}
}
}