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

      $admins = Auth::guard('regularuser')->user()->id;
        return view('regular.index', compact('test','admin', 'admins'));
    }

    public function create()
    {
        return view('regular.regularform');
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

    public function edit($id)
    {
        //
        $user = User::find($id);
        return view('regular.edit', compact('user'));
    }
    public function update(Request $request, $id)
    {
        //
        $request->validate([
        'name'=>'string|max:255',
        'last_name'=> 'string|max:255',
        'dob' => 'date',
        'maritial_status' => 'string|max:255',
        // 'email' => 'string|email|max:255|unique:users',
        'is_active' => 'integer',
        'date_joined' => ['date'],
        'position' => ['string', 'max:255'],
        'annual_salary' => ['string', 'max:255'],
      ]);

      $user = User::find($id);
      $user->name = $request->get('name');
      $user->last_name = $request->get('last_name');
      $user->dob = $request->get('dob');
      $user->maritial_status = $request->get('maritial_status');
      // $user->email = $request->get('email');
      $user->is_active = $request->get('is_active');
      $user->date_joined = $request->get('date_joined');
      $user->position = $request->get('position');
      $user->annual_salary = $request->get('annual_salary');
      $user->save();

      return redirect(route('admins.index'))->with('success', 'Employee data has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $user = User::find($id);
        $user->delete();

        return redirect(route('admins.index'))->with('success', 'Stock has been deleted Successfully');
    }

}
