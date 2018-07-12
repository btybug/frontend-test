@extends('btybug::layouts.admin')
@section('content')
    <div class="container">
            <h2>Forms</h2>
        @if(isset($editableData))
            <textarea class="hidden" value="{{$editableData}}"></textarea>
        @endif
        <a href="application/form-builder"><button type="button" class="btn btn-success creat">Creat New</button></a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Edit Action</th>
                </tr>
            </thead>
            <tbody>
            @if(isset($allData))
                @foreach($allData as $key => $val)
                <tr>
                    <td>{{$val->id}}</td>
                    <td>{{$val->title}}</td>
                    <td>{{$val->description}}</td>
                    <td>
                        <a href="application/delete/{{$val->id}}"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                        <a href="application/edit/{{$val->id}}"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                    </td>
                </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
@stop

@section('CSS')
    {!! HTML::style('public/css/new-store.css') !!}
@stop