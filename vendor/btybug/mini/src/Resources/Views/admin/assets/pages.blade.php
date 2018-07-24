@extends('btybug::layouts.mTabs',['index'=>'mini_assets'])
@section('tab')
    <div class="ui-2_col">
        <div class="settings-button">
            <button class="btn btn-md btn-warning create-page">Create Page</button>
        </div>
        <div class="row">
            <div class="col-md-3 col-xs-12">
                <div class="left-menu">
                    <ul>
                        @foreach($pages as $page)
                            <li class="pages-lists" data-id="{!! $page->id !!}">
                                <span>{!! $page->title !!}</span>
                                <div class="button">
                                    <button class="btn btn-sm btn-warning"><i class="fa fa-trash"></i></button>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-md-9 col-xs-12">
                <div class="display-area">

                    <div class="right-iframe">

                    </div>
                </div>
            </div>
        </div>
    </div>
     @include('resources::assests.magicModal')
    <template id="create-page-form-template">
        <form class="form-horizontal" id="create-page-form">
            <div class="form-group">
                <label for="page_title" class="control-label col-xs-4">Title</label>
                <div class="col-xs-8">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-bullhorn"></i>
                        </div>
                        <input id="page_title" name="title" placeholder="About us" type="text" class="form-control">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="page_url" class="control-label col-xs-4">Url</label>
                <div class="col-xs-8">
                    <div class="input-group">
                        <div class="input-group-addon">
                            {username}/
                        </div>
                        <input id="page_url" name="url" placeholder="about-us" type="text" class="form-control">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="page_status" class="control-label col-xs-4">Page Status</label>
                <div class="col-xs-8">
                    <select id="page_status" name="status" class="select form-control">
                        <option value="draft">Draft</option>
                        <option value="published">Published</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="membership" class="control-label col-xs-4">Membership</label>
                <div class="col-xs-8">
                    <select id="membership" name="memberships" class="select form-control">
                        <option value="free">Free</option>
                        <option value="pro">Pro</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="tag_unit_for_page" class="control-label col-xs-4">Tag Unit To Page</label>
                <div class="col-xs-8">
                    {!! Form::select('tags',$tags,null,['class' => 'form-control','id' => 'tagits']) !!}
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label" for="radios">Header</label>
                <div class="col-md-4">
                    <label class="radio-inline" for="radios-0">
                        <input type="radio"  id="radios-0" value="1" checked="checked">
                        Default
                    </label>
                    <label class="radio-inline" for="radios-1">
                        <input type="radio"  id="radios-1" value="2">
                        No Header
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label" for="radios">Layout</label>
                <div class="col-md-4">
                    <label class="radio-inline" for="radios-0">
                        <input type="radio"  id="radios-0" value="1" checked="checked">
                        Default
                    </label>
                    <label class="radio-inline" for="radios-1">
                        <input type="radio"  id="radios-1" value="2">
                        No Layout
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label  class="control-label col-xs-4"></label>
                <div class="col-xs-8">
                    <div class="input-group">
                        {!! BBbutton2('mini_unit','header_unit','header','Select Default Header',['model'=>$header]) !!}
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label  class="control-label col-xs-4"></label>
                <div class="col-xs-8">
                    <div class="input-group">
                        {!! BBbutton2('mini_layouts','page_layout','front_pages_layout','Select Default Layout',['model'=>$layout]) !!}
                    </div>
                </div>
            </div>
            {{--<div class="form-group">--}}
                {{--<label for="page_url" class="control-label col-xs-4"></label>--}}
                {{--<div class="col-xs-8">--}}
                    {{--<div class="input-group">--}}
                        {{--{!! BBmediaButton('icon') !!}--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}

            <div class="form-group row">
                <div class="col-xs-offset-4 col-xs-8">
                    <button id="siteSubmit" type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>

        </form>
    </template>
@stop
@section('CSS')
    {!! HTML::style('public/css/jquery.tagit.css') !!}

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

        .ui-2_col .left-menu li > span {
            align-self: center;
            margin-left: 10px;
            font-size: 16px;
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

        .ui-2_col .settings-button {
            margin-bottom: 10px;
        }
    </style>
@stop

@section("JS")
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" crossorigin="anonymous"></script>
    {!! HTML::script("public/js/UiElements/bb_styles.js?v.".rand(999,99999)) !!}
    {!! HTML::script('public/js/tag-it/tag-it.js') !!}

    <script>

        $(function () {

            function tagitinit(form) {
                {{--form.find('.tagits').tagit({--}}
                    {{--autocomplete: {--}}
                        {{--delay: 0,--}}
                        {{--minLength: 0--}}

                    {{--},--}}
                    {{--tagSource: function () {--}}
                        {{--$.ajax({--}}
                            {{--url: "{!! route('front_site_tag_list') !!}",--}}
                            {{--dataType: "json",--}}
                            {{--method: "post",--}}
                            {{--data: {},--}}
                            {{--headers: {--}}
                                {{--'X-CSRF-TOKEN': $("input[name='_token']").val()--}}
                            {{--},--}}
                            {{--success: function (data) {--}}
                                {{--return data;--}}
                            {{--}--}}

                        {{--});--}}
                    {{--},--}}
                    {{--// This will make Tag-it submit a single form value, as a comma-delimited field.--}}
                    {{--singleField: true,--}}
                    {{--singleFieldNode: $('.tagitext'),--}}
                    {{--beforeTagAdded: function (event, ui) {--}}
                        {{--if (!ui.duringInitialization) {--}}
{{--//                    var exis = getExt.indexOf(ui.tagLabel);--}}
{{--//                    if (exis < 0) {--}}
{{--//                        $('.tagit-new input').val('');--}}
{{--//                        //alert('PLease add allow at tag')--}}
{{--//                        return false;--}}
{{--//                    }--}}
                        {{--}--}}

                    {{--}--}}
                {{--})--}}
            }



            $(".create-page").click(function () {
                let form = $($('#create-page-form-template').html());

                $(".right-iframe").html(form);
                // tagitinit(form)

                $("body").on("click", "#siteSubmit", function (e) {
                    e.preventDefault()
                    let data = $('body').find('form#create-page-form').serialize();
                    $.ajax({
                        type: "post",
                        datatype: "json",
                        url: '/admin/mini/assets/create-page',
                        data: data,
                        headers: {
                            'X-CSRF-TOKEN': $("input[name='_token']").val()
                        },
                        success: function (data) {
                            //   window.location.replace(data.url);
                            location.reload();
                        }
                    });
                });
            });


            $("body").on("click", ".pages-lists", function () {

                let data = {id: $(this).attr('data-id')};
                $.ajax({
                    type: "post",
                    datatype: "json",
                    url: '/admin/mini/assets/get-page-edit-form',
                    data: data,
                    headers: {
                        'X-CSRF-TOKEN': $("input[name='_token']").val()
                    },
                    success: function (data) {
                        if (data.error === false) {
                            $(".right-iframe").html(data.html)
                        }
                    }
                });
            });

        })
    </script>

@stop