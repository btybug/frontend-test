@extends('mini::layouts.app')
@extends('mini::layouts.newTabs',['index'=>'mini_my_site_btybug'])
@section('tab')
    <div class="tab-pane fade" id="nav-settings" role="tabpanel" aria-labelledby="nav-settings-tab">
        <div class="content-pages">
            <p>sgbsfbsfgnsfgnsfgnsfnsfgn</p>
        </div>
    </div>
@endsection

@section('css')
 {{--   {!! HTML::style('public/css/create_pages.css') !!}
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
    </script>
    <script>
        $('#tab').addClass('active');
    </script>--}}
@stop