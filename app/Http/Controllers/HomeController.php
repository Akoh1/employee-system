<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use App\User;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      // $test = User::all();
      $user = Auth::user();
        return view('home', compact('user'));
    }
    public function create()
    {
        //
        $organization = Admin::pluck('organization','id');
        return view('auth.register', compact('organization'));
    }

    public function edit($id)
    {
        //
        // $user = User::find($id);
        $admin = Admin::plucK('organization', 'id');

        return view('edit', compact('admin'));
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
        // 'is_active' => 'integer',
        // 'date_joined' => ['date'],
        // 'position' => ['string', 'max:255'],
        // 'annual_salary' => ['string', 'max:255'],
      ]);

      $user = User::find($id);
      $user->name = $request->get('name');
      $user->last_name = $request->get('last_name');
      $user->dob = $request->get('dob');
      $user->maritial_status = $request->get('maritial_status');
      // $user->email = $request->get('email');
      // $user->is_active = $request->get('is_active');
      // $user->date_joined = $request->get('date_joined');
      // $user->position = $request->get('position');
      // $user->annual_salary = $request->get('annual_salary');
      $user->save();

      return redirect(route('home.index'))->with('success', 'Employee data has been updated');
    }

}
