<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee_file;
use RealRashid\SweetAlert\Facades\Alert;

class FileController extends Controller
{
   
    public function index($employee_id)
    {
        $file = Employee_file::with('employee')->where('employee_id', $employee_id)->get();
        return view('document.index', compact('file','employee_id'));
    
    } 
    public function store($employee_id ,Request $request)
    {
        $file_url = $request->file('file_url')->getClientOriginalName();
        $file_url= $request->file('file_url')->store('public/files');
        $save = new Employee_file;
        $save->file_title= request('file_title');
        $save-> employee_id=$employee_id=request('employee_id');
        $save->file_url = request('file_url');
        $save->save();
        Alert::success('Success!', 'Successfully added');
        return redirect()->route('employee.document.index',$employee_id);
    }

}
