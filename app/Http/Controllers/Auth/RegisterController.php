<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }



    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
      $organization_id = Admin::all()->pluck('organization', 'id');
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'dob' => ['required', 'date'],
            'sex' => ['required', 'string', 'max:255'],
            'maritial_status' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'organization_id' => 'required',

            'password' => ['required', 'string', 'min:6', 'confirmed'],
            // 'is_active' => 'integer',
            // 'date_joined',
            // 'position' => ['string', 'max:255'],
            // 'annual_salary' => ['string', 'max:255'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
      $organization_id = Admin::all()->pluck('organization', 'id');
        return User::create([
            'name' => $data['name'],
            'last_name' => $data['last_name'],
            'dob' => $data['dob'],
            'sex' => $data['sex'],
            'maritial_status' => $data['maritial_status'],
            'email' => $data['email'],
            'organization_id' => $data['organization_id'],
            // 'is_active' => $data['is_active'],
            // 'date_joined' => $data['date_joined'],
            // 'position' => $data['position'],
            // 'annual_salary' => $data['annual_salary'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
