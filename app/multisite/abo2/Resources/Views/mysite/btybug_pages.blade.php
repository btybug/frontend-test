
@extends('mini::layouts.newTabs',['index'=>'mini_my_site_btybug'])
@section('tab')
    <div class="tab-pane fade show active" id="nav-pages" role="tabpanel" aria-labelledby="nav-pages-tab">
        <div class="head-content">
            <ul class="list-inline bb-menu-area">
                <li class="list-inline-item"><a href="">
                        <span class="icon"><i class="fas fa-home"></i></span>
                        <span class="name">Profile</span></a>
                </li>
                <li class="list-inline-item"><a href="">
                        <span class="icon"><i class="far fa-clipboard"></i></span>
                        <span class="name">Board</span></a>
                </li>
                {!! hierarchyMiniUserPagesListFull($pages) !!}
                <li class="list-inline-item add"><a href="">
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

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('js')
    <script>
        $('.delete_page').on('click',function (e) {
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
                success: function(data){
                    if(! data.error){
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
            $("body").on('click','.show-page',function () {
                var id = $(this).data('id');
                alert(id);
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
                            $(".content-preview").html(data.response.html);
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
    <script>
        $('#nav-pages-tab').addClass('active');
    </script>
@stop
