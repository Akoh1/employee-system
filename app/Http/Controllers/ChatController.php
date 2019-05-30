<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Message;
use Auth;
use App\Events\ChatMessage;

class ChatController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function sendMessage(Request $request)
    {
        // $message = $request->user()->messages()->create([
        //     'body' => $request->body
        // ]);
        // $message = Message::create([
        //     "id" => $request->userid,
        //     "sourceuserid" => Auth::user()->id,
        //     "name" => Auth::user()->name,
        //     "message" => $request->message
        // ]);
        $message = [
            "id" => $request->userid,
            "sourceuserid" => Auth::user()->id,
            "name" => Auth::user()->name,
            "message" => $request->message
        ];
        event(new ChatMessage($message));
        // return "true";
        return $message;
    }

    public function chatPage()
    {
        // $users = User::take(10)->get();
        $user = User::all();
        $users = User::where('organization_id', Auth::user()->organization_id)->get();
        return view('chat',['users'=> $users]);
    }
}
