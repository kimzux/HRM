<?php

namespace App\Http\Controllers;
use App\Models\Setting;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        abort_if(Auth::user()->cannot('View Setting'), 403, 'Access Denied');
        $settings = Setting::first();
        return view('setting.index', compact('settings'));
    }

    public function store(Request $request)
    {
        abort_if(Auth::user()->cannot('Create Setting'), 403, 'Access Denied');
        $setting = new Setting();
        $setting->description = request('description');
        $setting->email_system = request('email');
        $setting->phone_number = request('phone');
        $setting->link = request('link');
        $setting->save();
        Alert::success('Success!', 'Successfully added');
        return redirect()->route('setting.index');
    }

    public function show(Setting $set)
    {
        abort_if(Auth::user()->cannot('Show Setting'), 403, 'Access Denied');
        return view('setting.create', compact('set'));
    }
}
