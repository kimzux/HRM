<?php

namespace App\Http\Controllers;
use App\Models\Performance;
use App\Models\Rate;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class RateController extends Controller
{
    public function store(Request $request)
    {
      abort_if(Auth::user()->cannot('create rate'), 403, 'Access Denied');
        $rate = new Rate();
        $rate->performance_id= request('performance_id');
        $rate->name= request('name');
        $rate->rate= request('rate');
        $rate->comment = request('comment');
        $rate->save();
        Alert::success('Success!', 'Successfully added');
        return back();
  
      }
    
}
