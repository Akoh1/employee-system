<?php

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('App.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel('chat', function ($user) {
    // if (Auth::user()->organization_id == $user->organization_id) {
    //     # code...
    //     return [
    //         'id' => $user->id,
    //         'name' => $user->name
    //     ];
    // }
    return [
        'id' => $user->id,
        'name' => $user->name
    ];
});
