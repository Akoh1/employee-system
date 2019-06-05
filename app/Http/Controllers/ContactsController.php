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
        // get all users except the authenticated ones
        $contacts = User::where('organization_id', Auth::user()->organization_id)->where('is_active', 1)->where('id', '!=',auth()->id())->get();

        $unreadIds = Message::select(\DB::raw('`from` as sender_id, count(`from`) as messages_count'))
                ->where('to', auth()->id())
                ->where('read', false)
                ->groupBy('from')
                ->get();

        $contacts = $contacts->map(function($contact) use ($unreadIds) {
            $contactUnread = $unreadIds->where('sender_id', $contact->id)->first();

            $contact->unread = $contactUnread ? $contactUnread->messages_count : 0;

            return $contact;
        });        

        return response()->json($contacts);
    }
    
    public function getMessagesFor($id)
    {
        # code...
        // $messages = Message::where('from', $id)->orWhere('to', $id)->get();
        Message::where('from', $id)->where('to', auth()->id())->update(['read' => true]);

        $messages = Message::where(function ($q) use ($id)
        {
            $q->where('from', auth()->id());
            $q->where('to', $id);
        })->orWhere(function($q) use ($id) {
            $q->where('from', $id);
            $q->where('to', auth()->id());
        })->get();

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
