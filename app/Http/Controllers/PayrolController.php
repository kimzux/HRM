<?php

namespace App\Http\Controllers;
use App\Models\Payrol;
use Illuminate\Http\Request;

class PayrolController extends Controller
{
    public function index()
    {
  
      $salary = Payrol::all();
  
      return view('payrol.salary.index', compact('salary'));
    }
}
