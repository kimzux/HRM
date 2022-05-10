<?php

namespace App\Http\Controllers;
use App\Models\Employee;
use App\Models\Bank_info;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class BankController extends Controller
{
    public function index($employee_id)
    {
        $bank= Bank_info::with('employee')->where('employee_id', $employee_id)->get();
        return view('bank.index', compact('bank','employee_id'));
    
    }
    public function store($employee_id , Request $request)
    {
      Bank_info::create($request->all() + ['employee_id' => $employee_id]);
      Alert::success('Success!', 'Successfully added');
      return redirect()->route('employee.bank.index',$employee_id);
    }
    public function edit($employee_id, Bank_info $bank)
    {
        return view('bank.edit', compact('employee_id', 'bank'));
    }
    public function update($employee_id, Request $request, Bank_info $bank)
    {
        $bank->update($request->all());
        Alert::success('Success!', 'Successfully updated');
        return redirect()->route('employee.bank.index', $employee_id);
    }
}
