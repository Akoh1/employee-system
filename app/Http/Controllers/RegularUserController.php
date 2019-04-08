<?php

namespace App\Http\Controllers;

use App\RegularUser;
use Illuminate\Http\Request;


class RegularUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         return view('regular.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('regular.regularform');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function store(Request $request)
    {
        //
        $request->validate([
          'name' => 'required',
        'email'=>'required',
        'organization'=> 'required',
        'password' => 'required|confirmed|min:6',
      ]);
      $user = new RegularUser([
        'name' => $request->get('name'),
        'email'=> $request->get('email'),
        'organization'=> $request->get('organization'),
        'password'=> $request->get('password'),
      ]);
      $user->save();

           return redirect('/user');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RegularUser  $regularUser
     * @return \Illuminate\Http\Response
     */


    public function show(RegularUser $regularUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RegularUser  $regularUser
     * @return \Illuminate\Http\Response
     */
    public function edit(RegularUser $regularUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RegularUser  $regularUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RegularUser $regularUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RegularUser  $regularUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(RegularUser $regularUser)
    {
        //
    }
}
