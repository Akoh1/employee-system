<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Admin;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    //
    public function index(){
      $test = User::all();
        return view('regular.index', compact('test'));
    }

    public function create()
    {
        //

        return view('regular.regularform', compact('organization'));
    }

    // protected function validator(array $data)
    // {
    //     $organization_id = User::all()->pluck('organization', 'id');
    //     return Validator::make($data, [
    //         'name' => ['required', 'string', 'max:255'],
    //         'email' => ['required', 'string', 'email', 'max:255', 'unique:regular_users'],
    //         'organization_id'=> 'required',
    //         'password' => ['required', 'string', 'min:6', 'confirmed'],
    //     ]);
    // }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function store(Request $request)
    {

        $request->validate([
          'name' => 'required',
        'email'=>'required',
        'organization'=> 'required',
        'password' => 'required|confirmed|min:6',
      ]);
      $user = new Admin([
        'name' => $request->get('name'),
        'email'=> $request->get('email'),
        'organization'=> $request->get('organization'),
        'password'=> Hash::make($request->get('password')),
      ]);
      $user->save();

           return redirect(route('admin.login'));
    }
}
