@extends('btybug::layouts.admin')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <h2>Create Membership</h2>
        </div>
        <div class="row">
            {!! Form::open(['class' => 'form-horizontal']) !!}
            <div class="form-group">
                {!! Form::label('name','Name',[])!!}
                {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Enter Name'])!!}
            </div>
            <div class="form-group">
                {!! Form::label('slug','Slug',[])!!}
                {!! Form::text('slug',null,['class'=>'form-control','placeholder'=>'Enter slug'])!!}
            </div>
            <div class="form-group">
                {!! Form::label('description','Description',[])!!}
                {!! Form::textarea('description',null,['class'=>'form-control','placeholder'=>'Enter description'])!!}
            </div>
            <div class="form-group">
                {!! Form::submit('Add Membership',['class' => 'btn btn-primary']) !!}
            </div>

            {!! Form::close() !!}
        </div>
    </div>
@stop