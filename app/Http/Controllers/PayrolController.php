<?php

namespace App\Http\Controllers;
use App\Models\Payrol;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PayrolController extends Controller
{
  
  
    public function index()
    {
      
      abort_if(Auth::user()->cannot('view payrol'), 403, 'Access Denied');
  
      $salary = Payrol::all();
  
      return view('payrol.salary.index', compact('salary'));
    }
}
