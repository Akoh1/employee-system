<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Message;


class ContactsController extends Controller
{
    //
    public function get()
    {
        # code...
        $contacts = User::where('organization_id', Auth::user()->organization_id)->get();

        return response()->json($contacts);
    }
    
    public function getMessagesFor($id)
    {
        # code...
        $messages = Message::where('from', $id)->orWhere('to', $id)->get();

        return response()->json($messages);
    }
}
