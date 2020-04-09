<?php

use Illuminate\Support\Facades\Broadcast;

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

Broadcast::channel('comment.{id}', function ($user, $id) {
    return ['id' => $user->id, 'name' => $user->name];
});

Broadcast::channel('notification.{id}', function ($user, $id) {
    // if($user->id == auth()->user()->id){
    //     return ['id' => $user->id, 'name' => $user->name];
    // }

    return ['id' => $user->id, 'name' => $user->name];
   
});
