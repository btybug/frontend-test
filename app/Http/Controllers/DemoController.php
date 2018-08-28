<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DemoController extends Controller
{
    public function demo()
    {
        return view("demo");
    }

    public function demo1()
    {
        return view("demo1");
    }

    public function demo2()
    {
        return view("demo2");
    }

    public function demo3()
    {
        return view("demo3");
    }

    public function demo4()
    {
        return view("demo4");
    }

    public function socket(Request $request)
    {
        $query=http_build_query($request->all());
        return \Redirect::to('http://multisite.loc:6001/socket.io/?'.$query);
    }

    public function message(Request $request)
    {
        $user = \App\User::first();
        $message = \App\ChatMessage::create([
            'user_id' => $user->id,
            'message' => $request->get('message')
        ]);

        event(new \App\Events\ChatMessageWasReceived($message, $user));
    }
}
