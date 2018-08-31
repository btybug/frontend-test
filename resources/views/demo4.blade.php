<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Profile user 3</title>
    {!! Html::style('public/css/app.css') !!}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .red{
            background-color: red;
        }
        .post{
            height: 50px;
            border: 1px solid;
        }
        .active{
            height: 50px;
            border: 1px solid red;
            background-color: rgba(14, 15, 213, 0.35);
        }
    </style>
</head>
<body id ='app'>
<div class="row">
    @foreach($messages as $message)
        <div class="col-md-3 post" data-id="{!! $message->id !!}">
            <div class="col-md-12">{!! $message->message !!}</div>
        </div>
    @endforeach
</div>

{!! Form::open() !!}
<input type="hidden" id="post-id" name="post_id" value="">
<textarea name="message" id="" cols="30" rows="10"></textarea>
<button type="submit" id="send">Send</button>
{!! Form::close() !!}
{!! Html::script('public/js/app.js') !!}
<script>
    $(function () {
        $('.post').on('click',function () {
            $('.post').removeClass('active')
            $(this).addClass('active')
            $('#post-id').val($(this).data('id'))
        })
    })
</script>
</body>
</html>
