@extends('btybug::layouts.mTabs',['index'=>'mini_assets'])
@section('tab')
    <div class="ui-2_col">
        <div class="row">
            <div class="col-md-12 col-xs-12">
                <a href="{{route('mini_admin_assets_form_build')}}">
                    <button type="button" class="btn btn-success creat" title="Creat New amazing form">Creat New form</button>
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
                    @foreach($user_forms as $key => $val)
                        <tr>
                            <td>{{$val->id}}</td>
                            <td>{{$val->title}}</td>
                            <td>{{$val->description}}</td>
                            <td>
                                @if(!$val->is_published)
                                    <a class="pull-right btn btn-danger"
                                       href="{{route('mini_admin_assets_form_delete',$val->id)}}" title="Delete the Form"><span
                                                class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                                    <a class="pull-right btn btn-success"
                                       href="{{route('mini_admin_assets_form_publish',$val->id)}}" title="Publish the Form"><span
                                                class="glyphicon glyphicon-share" aria-hidden="true"></span></a>
                                @else
                                    <a class="pull-right btn btn-danger"
                                       href="{{route('mini_admin_assets_form_unpublish',$val->id)}}" title="Unpublish the Form"><span
                                                class="glyphicon glyphicon-share" aria-hidden="true"></span></a>
                                @endif


                                <a class="pull-right btn btn-warning" href="{{route('mini_admin_assets_form_edit',$val->id)}}" title="Edit the Form"><span
                                            class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                                <a class="pull-right btn btn-success" href="{{route('mini_admin_assets_form_result_input',$val->id)}}" title="Show result inputs"><span
                                            class="glyphicon glyphicon-flash" aria-hidden="true"></span></a>
                                <a class="pull-right btn btn-default" href="{{route('mini_admin_assets_form_clone',$val->id)}}" title="Clobne the Form"><span
                                            class="glyphicon glyphicon-duplicate" aria-hidden="true"></span></a>
                                <a class="pull-right btn btn-info" href="{{route('mini_admin_assets_form_render',$val->id)}}" title="Render the Form View"><span
                                            class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>

                            </td>

                        </tr>
                    @endforeach
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

        button.creat {
            float: right;
            margin: 0px 0px 10px 0px;
        }
    </style>

@stop
