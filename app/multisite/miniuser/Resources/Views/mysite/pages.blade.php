@extends('mini::layouts.app')
@section('content')
    <div class="">
        {!! Form::open(['route' => "mini_page_create"]) !!}
        <div class="form-group">
            <div class="row">
                <div class="col-md-3">
                    <div class="d-flex">
                        <input type="text" name="title" class="form-controll account">
                        <div class="button">
                            {{ Form::button('<i class="fa fa-plus" aria-hidden="true"></i> New Page', array('type' => 'submit', 'class' => ' create_new_btn')) }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
    <div>
        <article class="mt-4">
            <div class="row">
                <div class="col-md-3">
                    <div class="my-account-left-col">
                        <div class="bb-menu-container">
                            <div class="bb-menu-group-body">
                                <ul class="bb-menu-area">
                                    {!! hierarchyMiniUserPagesListFull($pages) !!}
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-9 view-box">
                    {{--@include('mini::pages._partials.view')--}}
                </div>
            </div>

        </article>
    </div>

    @include('btybug::_partials.delete_modal')
@stop

@section('css')
    {!! HTML::style('public/css/create_pages.css') !!}
    {!! HTML::style('public/css/tool-css.css?v=0.23') !!}
    {!! HTML::style('public/css/page.css?v=0.15') !!}
    {!! HTML::style('public/css/admin_pages.css') !!}
    {!! HTML::style('public/minicms/main.css?v='.rand(111,999)) !!}
    <style>
        .show-page{
            cursor:pointer;
        }
    </style>
@stop


@section('js')
    {!! HTML::script('public/js/create_pages.js') !!}
    {!! HTML::script('public/js/admin_pages.js') !!}
    {!! HTML::script('public/js/menus.js') !!}
    <script>
        $(document).ready(function () {
            $("body").on('click','.show-page',function () {
                var id = $(this).data('id');
                $.ajax({
                    url: '{!! route('mini_page_show') !!}',
                    dataType: 'json',
                    type: 'POST',
                    data: {id: id},
                    headers: {
                        'X-CSRF-TOKEN': $("input[name='_token']").val()
                    },
                    success: function(data){
                        if(! data.error){
                            console.log(data)
                            $(".view-box").html(data.response.html);
                        }
                    }
                });
            });

            let items = $(".Item")

            $(".bb-menu-area")
                .sortable({
                    cursor: "move",
                    revert: true,
                    stop: function (e, ui) {

                        let sorted = $(".bb-menu-area").sortable("toArray");

                        $.ajax({
                            url: '{!! route('mini_page_sorting') !!}',
                            dataType: 'json',
                            type: 'POST',
                            data: {data: sorted},
                            headers: {
                                'X-CSRF-TOKEN': $("input[name='_token']").val()
                            },
                            success: function(data){

                            },
                            error: function(data){
                                console.log(data);
                            }
                        });
                    }
                })
                .find(".Item[class~=ui-sortable-helper]")
                .on("transitionend", function (e) {
                    $(this).css("transform", "rotate(0deg)");
                });
            $(".bb-menu-area").disableSelection();
        });
    </script>
@stop