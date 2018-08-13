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
                                    <a href="{{route('mini_admin_assets_page_delete',$page->id)}}"><button class="btn btn-sm btn-warning"><i class="fa fa-trash"></i></button></a>
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
            $('body').on('change','input[name=header]',function () {
               if($(this).val()==2){
                   $('body').find('.header-bbbutton').removeClass('hide')
               }else{
                   $('body').find('.header-bbbutton').addClass('hide')
               }
            });
            $('body').on('change','input[name=layout]',function () {
               if($(this).val()==1){
                   $('body').find('.layout-bbbutton').removeClass('hide')
               }else{
                   $('body').find('.layout-bbbutton').addClass('hide')
               }
            });
               $('body').on('change','#page_status',function () {
                   console.log($(this).val())
               if($(this).val()=='published'){
                   $('body').find('.to-membership').removeClass('hide')
               }else{
                   $('body').find('.to-membership').addClass('hide')
               }
            });

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
                            $('.tagits').tagit({
                                autocomplete: {
                                    delay: 0,
                                    minLength: 0
                                }
                                });
                        }
                    }
                });
            });

        });
    </script>

@stop