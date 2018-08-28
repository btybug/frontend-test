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

Broadcast::channel('survey.{survey_id}', function ($user, $survey_id) {
    return [
        'id' => $user->id,
        'image' => $user->image(),
        'full_name' => $user->full_name
    ];
});

Broadcast::channel('socket.io', function ($user, $chatroomId) {
    if (true) { // Replace with real ACL
        return true;
    }
});