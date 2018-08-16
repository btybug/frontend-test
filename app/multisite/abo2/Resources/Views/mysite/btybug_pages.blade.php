@extends('mini::layouts.app',['index'=>'mini_my_site_btybug'])
@php
    $title = 'Social';
@endphp
@section('tab')
    <div class="tab-pane fade show active" id="nav-pages" role="tabpanel" aria-labelledby="nav-pages-tab">
        <div class="head-content">
            <ul class="list-inline bb-menu-area" style="display: inline-block">

                @foreach ($pages as $item)
                    <li class="show-page list-inline-item " data-id="{!! $item->id !!}" id="{!! $item->id !!}"
                        data-type="{!! $item->type !!}" data-title="{!! $item->title !!}">
                        <a href="#">
                            <span class="left-icon"><i class="fas fa-caret-left"></i></span>
                            <span class="icon"><i class="fas fa-clipboard-list"></i></span>
                            <span class="name">{!! $item->title !!}</span>
                            @if ($item->type == 'custom')
                                <span class="del"><i class="fas fa-times delete_page"
                                                     data-id="{!! $item->id !!}"></i></span>
                            @endif
                            <span class="right-icon"><i class="fas fa-caret-right"></i></span></a>
                @endforeach

            </ul>
            <ul class="list-inline " style="display: inline-block">
                <li class="list-inline-item add" id="add-new-page"><a>
                        <span class="icon"><i class="fas fa-plus"></i></span>
                        <span class="name">New Page</span></a>
                </li>
            </ul>
        </div>
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="content-pages container-fluid">
            <div class="row">
                <div class="col-md-2 pl-0">
                    <div class="menu">
                        <ul>
                            <li class="active"><a href=""><span><i class="far fa-file-image"></i></span>Content</a>
                            </li>
                            <li><a href="javascript::void(0)" class="page-settings-button" data-id=""><span><i
                                                class="fas fa-cog"></i></span>Settings</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-10">
                    <div class="right-content">
                        <div class="top-pages d-flex row align-items-center">
                            <div class="col-lg-8 top-head-left d-flex align-items-center ">
                                        <span class="name ">
                                            <i class="far fa-sticky-note"></i>
                                            <span contenteditable="true" class="page-name">Page 1</span>
                                        </span>
                                <div class="d-flex flex-wrap">
                                    <a href="" class="btn active unit-name">Unit Name</a>
                                    <a href="" class="btn unit-variation">Variation</a>
                                </div>

                            </div>
                            <div class="col-lg-4 top-head-right text-right">
                                <a class="btn edit">Edit</a>
                                <a class="btn save">Save</a>
                            </div>
                        </div>
                        <div class="content-preview d-flex justify-content-center align-items-center">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="hide" id="page-settings-hidden"></div>
@stop
@section('js')
    <script>
        $('.delete_page').on('click', function (e) {
            e.preventDefault();
            var id = $(this).data('id');
            var token = $("input[name='_token']").val();
            $.ajax({
                url: '{!! route('mini_my_site_btybug_pages_delete') !!}',
                dataType: 'json',
                type: 'POST',
                data: {id: id},
                headers: {
                    'X-CSRF-TOKEN': token
                },
                success: function (data) {
                    if (!data.error) {
                    }
                }
            });
            location.reload();
        });
    </script>
    {{-- {!! HTML::script('public/js/create_pages.js') !!}
     {!! HTML::script('public/js/admin_pages.js') !!}
     {!! HTML::script('public/js/menus.js') !!}--}}
    <script>
        $(document).ready(function () {
            $("body").on('click', '.show-page', function () {
                var id = $(this).data('id');
                var title = $(this).data('title');
                $('.page-name').text(title);
                $('.page-name').attr("data-id", id);
                $.ajax({
                    url: '{!! route('mini_page_show') !!}',
                    dataType: 'json',
                    type: 'POST',
                    data: {id: id},
                    headers: {
                        'X-CSRF-TOKEN': $("input[name='_token']").val()
                    },
                    success: function (data) {
                        if (!data.error) {
                            var iframe = $('<iframe/>', {
                                width: '100%',
                                height: '100%',
                                src: '/my-account/extra/gear/settings-iframe/' + data.response.page.template
                            });
                            $(".content-preview").html(iframe);
                            $("#page-settings-hidden").html(data.response.html);
                            var unit = data.response.page.template.split(".");
                            $(".unit-variation").text(unit[1]);
                            $(".unit-name").text(unit[0]);

                        }
                    }
                });
            });
            
            $('body').on('click', '.page-settings-button', function () {
                let html = $("#page-settings-hidden").html();
                $(".content-preview").html(html);
            });

            $("body").on("blur keyup paste input", ".page-name", function (e) {
                let id = $(this).attr("data-id")
                console.log(id)
                $(`[data-id='${id}']`).find(".name").text($(this).text())
                console.log()
                // $(`[id]`).text()
            })


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
                            success: function (data) {

                            },
                            error: function (data) {
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

            $("#add-new-page").click(function (e) {
                e.preventDefault()
                $.ajax({
                    url: '{!! route('mini_page_create') !!}',
                    dataType: 'json',
                    type: 'POST',
                    data: {title: 'New'},
                    headers: {
                        'X-CSRF-TOKEN': $("input[name='_token']").val()
                    },
                    success: function (data) {
                        console.log(data);
                        if (!data.error) {
                            let html = ` <li data-id="${data.id}" id="${data.id}" data-title="${data.title}" class="show-page list-inline-item"><a href="#">
                        <span class="icon"><i class="far fa-clipboard"></i></span>
                        <span class="name">${data.title}</span></a>
                            </li>`;
                            $(".bb-menu-area").append(html)
                        }
                    }
                });

            })
        });
    </script>
    <script>
        $('#nav-pages-tab').addClass('active');
    </script>
@stop
