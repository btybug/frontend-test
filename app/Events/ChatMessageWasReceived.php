<?php

namespace App\Events;

use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;

class ChatMessageWasReceived  implements ShouldBroadcastNow
{
    use Dispatchable,InteractsWithSockets, SerializesModels;

    public $chatMessage;
    public $user;

    public function __construct($chatMessage, $user)
    {

        echo 456;
        $this->chatMessage = $chatMessage;
        $this->user = $user;

        event(new MessagePushed('ewqererqwe'));

    }

    public function broadcastOn()
    {

       // return new PresenceChannel('socket.io' . $this->survey->id);
//        return dd(new PresenceChannel('socket.io'));

        echo 789;
        return [
            "socket.io"
        ];
    }
}
