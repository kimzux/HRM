<?php

namespace App\Http\Controllers;
use App\Models\Users;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;
use App\Models\User; 
use Hash;
use Illuminate\Http\Request;

class Password_ResetController extends Controller
{
  public function ResetPassword()
 {

return view('auth.change-password');
  }

  public function changePasswordPost(Request $request) {
      
    $validatedData = $request->validate([
        'current-password' => 'required',
    'password'=> ['required', 'string', 'min:8', 'confirmed']
    ]);

    if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
        // The passwords matches
        Alert::Warning('error',"Your current password does not matches with the password.");
        return back();
    }

    if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){ 
        // Current password and new password same
        Alert::Warning('error',"New Password cannot be same as your current password.");
        return back();
    }

    //Change Password
    $user = Auth::user();
    $user->password = Hash::make($request->get('password'));
    $user->password_reset = 0;
    $user->save();

    return redirect()->back()->with("success","Password successfully changed!");
}

}


