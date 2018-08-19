@php
    $title = 'Social';
@endphp
@extends('mini::layouts.app',['index'=>'mini_my_site_btybug'])
@section('outTab')
    <div class="head-content">
        <ul class="list-inline admin-pages" style="display: inline-block">
            @foreach ($pages as $val)
                @if ($val->type == 'plugin')
                    <li class="show-page list-inline-item " data-id="{!! $val->id !!}" id="{!! $val->id !!}"
                        data-type="{!! $val->type !!}" data-title="{!! $val->title !!}">
                        <a href="#">
                            <span class="icon"><i class="fas fa-clipboard-list"></i></span>
                            <span class="name">{!! $val->title !!}</span>
                        </a>
                @endif
            @endforeach

        </ul>
        <ul class="list-inline bb-menu-area user-pages" style="display: inline-block">

            @foreach ($pages as $item)
                @if ($item->type !== 'plugin')
                    <li class="show-page list-inline-item " data-id="{!! $item->id !!}" id="{!! $item->id !!}"
                        data-type="{!! $item->type !!}" data-title="{!! $item->title !!}">
                        <a href="#">
                            <span class="icon"><i class="fas fa-clipboard-list"></i></span>
                            <span class="name">{!! $item->title !!}</span>
                            {{--@if ($item->type == 'custom')--}}
                                {{--<span class="del"><i class="fas fa-times delete_page"--}}
                                                     {{--data-id="{!! $item->id !!}"></i></span>--}}
                            {{--@endif--}}
                        </a>
                @endif
            @endforeach

        </ul>
        <ul class="list-inline " style="display: inline-block">
            <li class="list-inline-item add" id="add-new-page"><a>
                    <span class="icon"><i class="fas fa-plus"></i></span>
                    <span class="name">New Page</span></a>
            </li>
        </ul>
    </div>
@stop
@section('left')

    <div class="col-md-2 pl-0">
        <div class="menu">
            <ul>
                <li class="active"><a href="javascript:void(0)" class="page-content-button"><span><i
                                    class="far fa-file-image"></i></span>Content</a>
                </li>
                <li><a href="javascript:void(0)" class="page-settings-button" data-id=""><span><i
                                    class="fas fa-cog"></i></span>Settings</a></li>
            </ul>
        </div>
    </div>
@stop

@section('tab')
    <div class="col-md-10" id="nav-pages">

        <input type="hidden" name="_token" value="{{csrf_token()}}">

            <div class="right-content">
                <div class="top-pages d-flex row align-items-center ">
                    <div class="col-lg-8 top-head-left d-flex align-items-center ">
                                        <span class="name ">
                                            <i class="far fa-sticky-note"></i>
                                            <span contenteditable="true" class="page-name">Page 1</span>
                                        </span>

                        <div class="d-flex flex-wrap page-info">
                            <a href="#" class="btn active unit-name">Unit Name</a>
                            <a href="#" class="btn unit-variation">Variation</a>
                            <a href="#" class="btn unit-variation bb-modal-units new-page-unit-select BBbuttons"
                               data-action="unit" data-key="5b76af328134f" data-type="form_layout"
                               style="display: none">Select unit</a>
                        </div>
                        <div class="d-flex flex-wrap new-page-info" style="display: none !important">
                            <div class="form-check">
                                <input class="form-check-input unit-editor" type="radio" name="exampleRadios"
                                       id="exampleRadios1" value="Editor" checked>
                                <label class="form-check-label" for="exampleRadios1">
                                    Editor
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input " type="radio" name="exampleRadios" id="exampleRadios2"
                                       value="Unit">
                                <label class="form-check-label" for="exampleRadios2">
                                    Unit
                                </label>
                            </div>
                        </div>
                        <!-- <input type="radio" class=" unit-editor" name="select-page-attr" value="Editor">
                        <input type="radio" class=" new-page-unit-select BBbuttons" name="select-page-attr" value="Unit" data-action="unit" data-key="5b76af328134f" data-type="form_layout"> -->
                    </div>
                    <div class="col-lg-4 top-head-right text-right page-info">
                        <a class="btn edit">Edit</a>
                        <a class="btn save">Save</a>
                    </div>
                </div>

            </div>
            <div class="content-preview d-flex justify-content-center align-items-center">

            </div>

        <div class="hide" id="page-settings-hidden"></div>
        @stop
        @section('js')
            {!! HTML::script('public/js/bb_styles.js') !!}
            <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
            <script>
               
            </script>
            {{-- {!! HTML::script('public/js/create_pages.js') !!}
             {!! HTML::script('public/js/admin_pages.js') !!}
             {!! HTML::script('public/js/menus.js') !!}--}}
            <script>
                $(document).ready(function () {
                    $("body").on('click', '.show-page', function () {
                        var that = $(this)
                        $(".content-preview").empty();
                        var id = $(this).data('id');
                        var title = $(this).data('title');
                        $('.page-name').text(title);
                        $('.page-name').attr("data-id", id);
                        $(".page-info").attr("style", "display: block !important");
                        $(".new-page-info").attr("style", "display: none !important");
                        if ($(this).parent().hasClass("admin-pages")) {
                            $(".edit").hide()
                        } else {
                            $(".edit").show()

                        }
                    

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
                                            height: '500px',
                                            src: '/my-account/extra/gear/settings-iframe/' + data.response.page.template
                                        });
                                        //page_settings_form
                                        if (data.response.page.template) {
                                            $(".content-preview").html(iframe);
                                            var unit = data.response.page.template.split(".");
                                            $(".unit-variation").text(unit[1]);
                                            $(".unit-name").text(unit[0]);

                                        } else {
                                            $(".unit-variation").text('No Variation');
                                            $(".unit-name").text('No unit');
                                        }
                                        console.log($(that).text().trim().indexOf("New page"));
                                        if ($(that).text().trim().indexOf("New page") === -1) {
                                            console.log(1);
                                            console.log(data.response.html)
                                            $(".content-preview").append(data.response.html);
                                            
                                        }else  {
                                            console.log(2);
                                            $(".page-info").attr("style", "display: none !important");
                            $(".new-page-info").attr("style", "display: block !important");
                    
                            let html = `<div class="unit-editor-tab" style="width: 100%"> <textarea class="editor-html"  id="editor-html">Next, use our Get Started docs to setup Tiny!</textarea> </div>
                    <div class="form-group new-page-unit-select-tab" style="display: none !important">
                            <label for="exampleFormControlSelect1">Example select</label>
                            <select class="form-control" id="exampleFormControlSelect1">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            </select>
                        </div>
                    `
                    
                            html += data.response.html
                            $(".content-preview").append(html);
                            tinymce.init({selector: '.editor-html'});
                                        }


                                    }
                                }
                            });
                      
                         
                        

                    });

                    $('body').on('click', '.page-settings-button', function () {
                        $(".content-preview").find('iframe').addClass('hide');
                        $("body").find(".unit-editor-tab").addClass('hide');
                        $(".content-preview").find("#page_settings_form").removeClass('hide');
                        
                    });
                    $('body').on('click', '.page-content-button', function () {
                        $(".content-preview").find('iframe').removeClass('hide');
                        $(".content-preview").find("#page_settings_form").addClass('hide');
                        $("body").find(".unit-editor-tab").removeClass('hide');

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
                // $("body").on("click",".unit-editor", function(){
                //     $(".unit-editor-tab").attr("style", "display: block !important; width: 100%");
                //     $(".new-page-unit-select-tab").attr("style", "display: none !important");

                // })
                // $("body").on("click",".new-page-unit-select", function(){
                //     $(".new-page-unit-select-tab").attr("style", "display: block !important");
                //     $(".unit-editor-tab").attr("style", "display: none !important");
                // })

                $("body").on("click", "input[name=exampleRadios]", function () {
                    console.log();
                    if ($(this).val() == "Unit") {
                        $(".page-info").attr("style", "display: block !important");
                        $(".new-page-unit-select").attr("style", "display: block !important");
                        $(".unit-editor-tab").attr("style", "display: none !important");

                    } else {
                        $(".page-info").attr("style", "display: none !important");
                        $(".new-page-unit-select").attr("style", "display: none !important");
                        $(".unit-editor-tab").attr("style", "display: block !important; width: 100%");

                    }

                });
            
                $("body").on("click",  ".delete_page", function(e) {
                    e.preventDefault();

                    let result = confirm("You want delete this page?")
                    if (result) {
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
                            console.log(data)
                            if (!data.error) {

                            }
                        }
                    });
                    location.reload();
                    }
                    
                    
                })


            </script>
            <script>
                $('#nav-pages-tab').addClass('active');
            </script>
@stop
