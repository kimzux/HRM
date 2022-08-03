<?php

namespace App\Http\Controllers;
use App\Models\Room;
use App\Models\Book;
use App\Models\Employee;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class BookController extends Controller
{
   
        public function index()
        {
      
          abort_if(Auth::user()->cannot('view deduction'), 403, 'Access Denied');
          $book = Book::all();
          $employee= Employee::select('id', 'first_name')->get();
          $room= Room::select('id', 'room_no')->get();
          return view('book.index', compact('book','employee','room'));
         
        }
        public function store(Request $request)
        {
          
          $book = new Book;
          $employee_id = $request->first_name;
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
          $book->employee_id = $request->employee_id;
          $book->room_id = $request->room_no;
          $book->reservation_date = $request->reserve_date;
          $book->time_in = $request->time_in;
          $book->time_out= $request->time_out;
          $book->save();
      
          Alert::success('Success!', 'application successful added');
          return back();
}
        }
        public function occupied($id)
        {
          abort_if(Auth::user()->cannot('approve leave_application'), 403, 'Access Denied');
          $book = Book::findOrFail($id);
          $book->status = 1; //Approved
          $book->save();
          Alert::success('booked!', 'successful booked');
          return redirect()->back(); //Redirect user somewhere
        }
      
        public function cancelled($id)
        {
          abort_if(Auth::user()->cannot('reject leave_application'), 403, 'Access Denied');
          $book = Book::findOrFail($id);
          $book->status = 0; //Approved
          $book->save();
          Alert::info('cancelled!', 'successful cancelled');
          return redirect()->back(); //Redirect user somewhere
        }
      }
