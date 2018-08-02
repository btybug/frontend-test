@extends('mini::layouts.app')
@extends( 'btybug::layouts.admin' )
@section('content')
    <div class="ui-2_col">
        <div class="row">
            <div class="col-md-12 col-xs-12">
                <a href="{{route('mini_account_forms_build')}}">
                    <button type="button" class="btn btn-success creat">Creat New form</button>
                </a>
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
                    @if(count($user_forms))
                        @foreach($user_forms as $key => $val)
                            <tr>
                                <td>{{$val->id}}</td>
                                <td>{{$val->title}}</td>
                                <td>{{$val->description}}</td>
                                <td>
                                    <a class="pull-right btn btn-danger" href="{{route('mini_account_forms_delete',$val->id)}}"><span
                                                class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                                    <a class="pull-right btn btn-warning" href="{{route('mini_account_forms_edit',$val->id)}}"><span
                                                class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                                    <a class="pull-right btn btn-info" href="{{route('mini_account_forms_render',$val->id)}}"><span
                                                class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
                                </td>

                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@stop

@section("JS")
    {!! HTML::script('public/js/tag-it/tag-it.js') !!}
    {!! HTML::script('public/js/select2/select2.full.min.js') !!}
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

@stop

@section('CSS')
    {!! HTML::style('public/css/jquery.tagit.css') !!}
    {!! HTML::style("public/css/select2/select2.min.css") !!}

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
        button.creat{
            float:right;
            margin: 0px 0px 10px 0px;
        }
    </style>

@stop
