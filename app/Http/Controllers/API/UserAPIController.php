<?php


namespace App\Http\Controllers\API;


use Illuminate\Http\Request;

use App\Http\Controllers\API\APIBaseController as APIBaseController;

use App\User;

use Validator;


class UserAPIController extends APIBaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $user = User::all();

        return $this->sendResponse($user->toArray(), 'Users retrieved successfully.');
    }

    /**

     * Store a newly created resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response

     */

    public function store(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [

          'name' => ['required', 'string', 'max:255'],
          'last_name' => ['required', 'string', 'max:255'],
          'dob' => ['required', 'date'],
          'sex' => ['required', 'string', 'max:255'],
          'maritial_status' => ['required', 'string'],
          'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
          'organization_id' => 'required',
          'password' => ['required', 'string', 'min:6', 'confirmed'],

        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $user = User::create($input);

        return $this->sendResponse($user->toArray(), 'User created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {

        $user = User::find($id);

        if (is_null($user)) {
            return $this->sendError('User not found.');
        }

        return $this->sendResponse($user->toArray(), 'User retrieved successfully.');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
          'name'=>'string|max:255',
          'last_name'=> 'string|max:255',
          'dob' => 'date',
          'maritial_status' => 'string|max:255',
          'is_active' => 'integer',
          'date_joined' => ['date'],
          'position' => ['string', 'max:255'],
          'annual_salary' => ['string', 'max:255'],
        ]);

        if($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $user = User::find($id);

        if (is_null($user)) {
            return $this->sendError('Post not found.');
        }

        $user->name = $input['name'];
        $user->last_name = $input['last_name'];
        $user->dob = $input['dob'];
        $user->maritial_status = $input['maritial_status'];
        $user->is_active = $input['is_active'];
        $user->date_joined = $input['date_joined'];
        $user->position = $input['position'];
        $user->annual_salary = $input['annual_salary'];

        $user->save();


        return $this->sendResponse($user->toArray(), 'User updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $user = User::find($id);

        if (is_null($user)) {
            return $this->sendError('User not found.');
        }

        $user->delete();
        return $this->sendResponse($id, 'User deleted successfully.');

    }

}
