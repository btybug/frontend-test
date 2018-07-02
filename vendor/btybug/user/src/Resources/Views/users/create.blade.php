@extends('btybug::layouts.admin')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <h2>Create User</h2>
        </div>
        @if (isset($errors) && count($errors) > 0)
            <div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert"
                        aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{!! $error !!}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row">
            {!! Form::open(['class' => 'form-horizontal']) !!}
                <div class="form-group">
                    <label for="name">Username:</label>
                    {!! Form::text('username',null,['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    {!! Form::email('email',null,['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    <label for="password">Password:</label>
                    {!! Form::password('password',['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    <label for="password">Password Confirmation:</label>
                    {!! Form::password('password_confirmation',['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    <label for="email">Membership:</label>
                    {!! Form::select('membership_id',$membership,null,['class' => 'form-control']) !!}
                </div>


                <div class="form-group">
                    <button style="cursor:pointer" type="submit" class="btn btn-primary">Submit</button>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@stop
@section('JS')

@stop
