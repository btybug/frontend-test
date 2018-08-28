<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Profile user 3</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .red{
            background-color: red;
        }
    </style>
</head>
<body>
{!! Form::open() !!}
    <ul id="chat">
        @foreach($messages as $message)
        <li>{!! $message->message !!}</li>
            @endforeach
    </ul>
    <textarea name="message" id="" cols="30" rows="10"></textarea>
    <button type="submit" id="send">Send</button>
{!! Form::close() !!}
<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.1.1/socket.io.js"></script>
<script src="https://code.jquery.com/jquery-1.11.1.js"></script>
<script>
    var socket = io(':6001');
    function addMessage(msg) {
        $('#chat').append('<li class="red">'+msg.message+'</li>')
    }
    socket.on('chat:message', function(msg){
       addMessage(msg);
    });
</script>
</body>
</html>