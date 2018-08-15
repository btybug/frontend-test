@extends('mini::layouts.tabsApp')
@extends('mini::layouts.newTabs',['index'=>'mini_my_site_btybug'])
@section('tab')
    <div class="tab-pane fade show active" id="nav-pages" role="tabpanel" aria-labelledby="nav-pages-tab">
        <div class="head-content">
            <ul class="list-inline">
                <li class="list-inline-item"><a href="">
                        <span class="icon"><i class="fas fa-home"></i></span>
                        <span class="name">Profile</span></a>
                </li>
                <li class="list-inline-item"><a href="">
                        <span class="icon"><i class="far fa-clipboard"></i></span>
                        <span class="name">Board</span></a>
                </li>
                {{--{{dd($pages)}}--}}
                @foreach($pages as $item)
                <li class="list-inline-item active">
                    <span class="left-icon"><i class="fas fa-caret-left"></i></span>
                    <a href="">
                        <span class="icon"><i class="fas fa-clipboard-list"></i></span>
                        <span class="name">{!! $item->title !!}</span>
                        @if($item->type != 'core')
                            <a href="{{route('mini_my_site_btybug_pages_delete',$item->title)}}"><span class="del"><i class="fas fa-times"></i></span></a>
                        @endif
                    </a>
                    <span class="right-icon"><i class="fas fa-caret-right"></i></span>

                </li>
                @endforeach
                <li class="list-inline-item add"><a href="">
                        <span class="icon"><i class="fas fa-plus"></i></span>
                        <span class="name">New Page</span></a>
                </li>
            </ul>
        </div>
        <div class="content-pages container-fluid">
            <div class="row">
                <div class="col-md-2 pl-0">
                    <div class="menu">
                        <ul>
                            <li class="active"><a href=""><span><i class="far fa-file-image"></i></span>Content</a>
                            </li>
                            <li><a href=""><span><i class="fas fa-cog"></i></span>Settings</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-10">
                    <div class="right-content">
                        <div class="top-pages d-flex row align-items-center">
                            <div class="col-lg-8 top-head-left d-flex align-items-center ">
                                        <span class="name">
                                            <i class="far fa-sticky-note"></i>
                                            Page 1
                                        </span>
                                <div class="d-flex flex-wrap">
                                    <a href="" class="btn active">Unit Name</a>
                                    <a href="" class="btn">Variation</a>
                                </div>

                            </div>
                            <div class="col-lg-4 top-head-right text-right">
                                <a class="btn edit">Edit</a>
                                <a class="btn save">Save</a>
                            </div>
                        </div>
                        <div class="content-preview d-flex justify-content-center align-items-center">
                            <div>
                                Select Content
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('btybug::_partials.delete_modal')
@stop

@section('css')
    {{--{!! HTML::style('public/css/create_pages.css') !!}
    {!! HTML::style('public/css/tool-css.css?v=0.23') !!}
    {!! HTML::style('public/css/page.css?v=0.15') !!}
    {!! HTML::style('public/css/admin_pages.css') !!}
    {!! HTML::style('public/minicms/main.css?v='.rand(111,999)) !!}
    <style>
        .show-page{
            cursor:pointer;
        }
    </style>--}}
@stop


@section('js')
   {{-- {!! HTML::script('public/js/create_pages.js') !!}
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
    </script>--}}
    <script>
        $('#nav-pages-tab').addClass('active');
    </script>
@stop
