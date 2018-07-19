@extends('uploads::layouts.mTabs',['index'=>'mini_assets'])
@section('tab')
    {{-- {{$units}}--}}
@if(isset($html))
    <h1>sdfgadfgadg</h1>
    @endif

    <div class="ui-2_col">
        <div class="row">
            <div class="col-md-3 col-xs-12">
                <div class="left-menu">
                    <ul>
                        @if($studiosData)
                            @foreach($studiosData as $key => $val)
                                <li class="unit_rend ">
                                    <a href="{{route('application_index',$val->slug)}}">
                                        {{$val->name}}
                                    </a>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>
            @if(isset($allData))
                <div class="col-md-9">
                    {{--@include('uploads::applications.buttons')--}}
                    <h2>Forms</h2>
                        <a href="{{route('application_form')}}"><button type="button" class="btn btn-success creat">Creat New</button></a>
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

                                    @foreach($allData as $key => $val)
                                        <tr>
                                            <td>{{$val->id}}</td>
                                            <td>{{$val->title}}</td>
                                            <td>{{$val->description}}</td>
                                            <td>
                                                <a class="pull-right btn btn-danger" href="{{route('application_form_delete',$val->id)}}"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                                                <a class="pull-right btn btn-warning" href="{{route('application_form_edit',$val->id)}}"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                                                <a class="pull-right btn btn-info" href="{{route('application_form_view',$val->id)}}"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
                                            </td>

                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                            {{--<iframe class="unit_preview" data-slug=""
                                    src=""
                                    width="100%" style="min-height: 500px;">

                            </iframe>--}}
                </div>
            @endif
        </div>
    </div>
@stop


@section('CSS')


    <style>
        .ui-2_col {
            margin-top: 30px;
        }

        .ui-2_col .left-menu ul {
            border-right: 1px solid #c5c5c5;
            background-color: #3e81a5;
            padding-top: 20px !important;
            height: calc(100vh - 154px);
            overflow-x: auto;
        }

        .ui-2_col .left-menu li {
            background: #0000004f;
            width: 95%;
            height: 60px;
            margin-bottom: 11px;
            box-shadow: -4px 4px 5px 0 #00000073;
            margin-left: 11px;
            cursor: pointer;
            color: white;
            display: flex;
            justify-content: space-between;
            transition: 0.5s ease;
        }

        .ui-2_col .left-menu li > a {
            align-self: center;
            margin-left: 10px;
            font-size: 16px;
            color: white;
            text-decoration: none;
            height: 60px;
            width: 95%;
            display: flex;
            align-items: center;
        }

        .ui-2_col .left-menu li.active {
            background: rgba(0, 0, 0, 0.48);
        }

        .ui-2_col .left-menu .button {
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: flex-end;
        }

        .ui-2_col .left-menu .button button {
            margin-right: 5px;
        }

        .ui-2_col .left-menu li:hover {
            background: rgba(0, 0, 0, 0.48);
        }

        .unit_preview {
            border: none;
            margin-top: 15px;
            height: calc(100vh - 180px);
        }
        button.creat{
            float:right;
            margin: 0px 0px 10px 0px;
        }

    </style>
@stop
