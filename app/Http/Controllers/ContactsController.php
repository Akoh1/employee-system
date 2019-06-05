<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Message;
use App\Events\NewMessage;


class ContactsController extends Controller
{
    //
    public function get()
    {
        # code...
        $contacts = User::where('organization_id', Auth::user()->organization_id)->where('is_active', 1)->where('id', '!=',auth()->id())->get();;

        return response()->json($contacts);
    }
    
    public function getMessagesFor($id)
    {
        # code...
        $messages = Message::where('from', $id)->orWhere('to', $id)->get();

        return response()->json($messages);
    }

    public function send(Request $request)
    {
        # code...
        $message = Message::create([
            'from' => auth()->id(),
            'to' => $request->contact_id,
            'text' => $request->text
        ]);

        broadcast(new NewMessage($message));

        return response()->json($message);
    }
}
