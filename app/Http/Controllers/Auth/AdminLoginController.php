<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class AdminLoginController extends Controller
{
    //
    public function __construct()
    {
        // $this->middleware('guest:regularuser', ['except'=>['logout']]);
        $this->middleware('guest:regularuser')->except('logout');
    }

    public function showLoginForm()
    {
        return view('regular.login');
    }

    public function login(Request $request)
    {
      // code...
      // Validate the form data
      $this->validate($request, [
        'email' => 'required|email',
        'password' => 'required'
      ]);

      // Attempt to log the user in
      if (Auth::guard('regularuser')->attempt(
        ['email' => $request->email, 'password'=> $request->password],
         $request->remember)) {
        // code...
          // If successful, then redirect to their intended route
          return redirect()->intended(route('admins.index'));
      }
      return redirect()->back()->withInput($request->only('email','remember'));
      // If unsuccessful then redirect back to the login with the form data
    }
    public function logout()
    {
        Auth::guard('regularuser')->logout();

        // $request->session()->invalidate();

        return redirect('/');
    }
}
