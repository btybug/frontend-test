@extends('mini::layouts.app')
@section('content')
    <div class="col-md-12">
        <h2>Unit List</h2>

        <div class="row">
            <ul class="list-unit">
                <li>
                    <div class="col-md-8">Unit 1</div>
                    <div class="col-md-4"> <a>activate</a><a>remove</a><a>settings</a></div>
                </li>
                <li>
                    <div class="col-md-8">Unit 2</div>
                    <div class="col-md-4"> <a>deactivate</a><a>remove</a><a>settings</a></div>
                </li>
            </ul>
        </div>
    </div>
@endsection

@section("css")
    <style>
        .list-unit{
            width: 100%;
            background: darkslategray;
            color: white;
            list-style: none;
        }

        .list-unit > li{
            margin: 5px;
            padding: 10px;
            background: #00acac;
            display: flex;
            margin-right: 5px;
        }

        .list-unit > li a{
            display: inline-block;
            margin-left: 3px;
            float: right;
        }
    </style>
@stop
