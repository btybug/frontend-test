<?php

namespace App\Events;

use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;

class ChatMessageWasReceived implements ShouldBroadcastNow
{
    use  SerializesModels;


    public $message;

    public function __construct($chatMessage, $user)
    {

        $this->message = $chatMessage;


    }

    public function broadcastOn()
    {

//        return new PresenceChannel('socket.io' . $this->survey->id);
//        return dd(new PresenceChannel('socket.io'));


        return [
            "chat"
        ];
    }

    public function broadcastAs()
    {
        return 'message';
    }
}
