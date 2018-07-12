@extends('btybug::layouts.admin')
@section('content')
    <div class="container">
        <h2>Forms</h2>

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
            <tr>
                <td>John</td>
                <td>Doe</td>
                <td>john@example.com</td>
                <td>
                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                </td>
            </tr>
            <tr>
                <td>Mary</td>
                <td>Moe</td>
                <td>mary@example.com</td>
                <td>
                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                </td>
            </tr>
            <tr>
                <td>July</td>
                <td>Dooley</td>
                <td>july@example.com</td>
                <td>
                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
@stop

@section('CSS')
    {!! HTML::style('public/css/new-store.css') !!}
@stop