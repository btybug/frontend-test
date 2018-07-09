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
                <div class="col-md-9">
                    <div class="my-account-right-col">
                        <div class="heading">
                            <ol class="breadcrumb pull-right">
                                <li class="breadcrumb-item"><a href="javascript:;">Edit</a></li>
                                <li class="breadcrumb-item active">settings</li>
                                <li class="breadcrumb-item active">preview</li>
                            </ol>
                            <div class="clearfix"></div>
                        </div>
                        <div class="status mb-5 mt-5">
                            <div class="row">
                                <div class="col-md-3">
                                    <label>Status</label>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="access">
                            <div class="row">
                                <div class="col-md-3">
                                    <label>Access</label>
                                </div>
                                <div class="col-md-4">
                                    <div class="checkaccess">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-check form-check-inline">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="checkbox"
                                                               id="inlineCheckbox1"
                                                               value="option1">Public
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-6 text-right">
                                                <div class="form-check form-check-inline">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="checkbox"
                                                               id="inlineCheckbox2"
                                                               value="option2">Members
                                                    </label>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="area-preview">
                            preview area
                        </div>
                        <div>

                        </div>
                    </div>
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

@stop


@section('js')
    {!! HTML::script('public/js/create_pages.js') !!}
    {!! HTML::script('public/js/admin_pages.js') !!}
    {!! HTML::script('public/js/menus.js') !!}
    <script>
        $(document).ready(function () {
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