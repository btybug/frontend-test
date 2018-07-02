@extends('btybug::layouts.admin')
@section('content')
    <div class="row">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="units-tab" data-toggle="tab" href="#units" role="tab"
                   aria-controls="units" aria-selected="true">Units</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pages-tab" data-toggle="tab" href="#pages" role="tab" aria-controls="pages"
                   aria-selected="false">Pages</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="menus-tab" data-toggle="tab" href="#menus" role="tab" aria-controls="menus"
                   aria-selected="false">Menus</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="table-tab" data-toggle="tab" href="#table" role="tab" aria-controls="table"
                   aria-selected="false">Tables</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="units" role="tabpanel" aria-labelledby="units-tab">
                <div class="templates-list">
                    <div class="row">
                        <div class="col-md-12">
                            <h3>Units</h3>
                        </div>
                        <div class="raw tpl-list">
                            @if($units)
                                @foreach($units as $ui)
                                    <div class="col-md-4">
                                        <div class="row templates m-b-10 ">
                                            <div class=" topRow p-l-0 p-r-0">
                                                <img src="{!! url('/images/template-3.png')!!}" class="img-responsive"/>
                                                <div class="tempalte_icon">

                                                    <div>
                                                        <a href="{!! url('/admin/uploads/units/units-variations', $ui->slug) !!}"
                                                           class="m-r-10"><i class="fa fa-puzzle-piece f-s-14"></i> </a>
                                                    </div>

                                                </div>
                                            </div>
                                            {{-- <span>{{ isset($url) ? $url : '' }}</span>--}}
                                            <div class=" templates-header ">
                    <span class=" templates-title text-center"><i class="fa fa-bars f-s-13 m-r-5"
                                                                  aria-hidden="true"></i> {!! $ui->title!!}</span>
                                                <div class=" templates-buttons text-center ">
                        <span class="authorColumn"><i class="fa fa-user author-icon" aria-hidden="true"></i>
                            {!! @$unit->author !!},</span> <span class="dateColumn"><i
                                                                class="fa fa-calendar calendar-icon"
                                                                aria-hidden="true"></i> {!! BBgetDateFormat($ui->created_at) !!}</span>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="col-xs-12 addon-item">
                                    NO Results
                                </div>
                            @endif


                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="pages" role="tabpanel" aria-labelledby="pages-tab">
                <div class="row">
                    <div class="col-md-12">
                        <h3>Pages</h3>
                    </div>
                    <div class="raw tpl-list">
                        @if(count($pages))
                            <article>
                                <div class="col-md-8 col-md-offset-2">
                                    {!! hierarchyAdminPagesListHierarchy($pages,true, true, 0,$plugin->name) !!}
                                </div>
                            </article>
                        @else
                            No Result
                        @endif
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="menus" role="tabpanel" aria-labelledby="menus-tab">
                No Menus
            </div>
            <div class="tab-pane fade" id="table" role="tabpanel" aria-labelledby="table-tab">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Table Name</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tables as $key=>$table)
                        <tr>
                            <td>{!! $key !!}</td>
                            <td>{!! $table !!}</td>
                            <td>
                                <a href="{!! route('modules_datatable_index',$table) !!}" class="btn btn-info"><span
                                            class="fa fa-cog"></span></a>
                                <a href="{!! route('modules_datatable_show_columns',$table) !!}"
                                   class="btn btn-success">Show Columns</a>
                                <a href="{!! route('modules_datatable_settinds_for_frontend',$table) !!}"
                                   class="btn btn-info">Settings For Frontend</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@stop
@section('CSS')
    {!! HTML::style('public/css/new-store.css') !!}
    {!! HTML::style('public/js/bootstrap-select/css/bootstrap-select.min.css') !!}
    {!! HTML::style('public/css/page.css?v=0.15') !!}
    {!! HTML::style('public/css/create_pages.css') !!}

    <style>
        .child-tpl {
            width: 95% !important;
        }

        .img-loader {
            width: 70px;
            height: 70px;
            position: absolute;
            top: 50px;
            left: 40%;
        }

    </style>
@stop
@section('JS')
    {!! HTML::script('public/js/bootstrap-select/js/bootstrap-select.min.js') !!}
    {!! HTML::script('public/js/create_pages.js') !!}
    {!! HTML::script('public/js/admin_pages.js') !!}
    {!! HTML::script('public/js/nestedSortable/jquery.mjs.nestedSortable.js') !!}


    <script>
        $("body").on('click', '[data-collapse]', function () {
            var id = $(this).attr('data-collapse');
            $('li[data-id=' + id + '] ol').slideToggle();
            $(this).toggleClass('fa-minus fa-plus');
        });

        $("body").on('click', 'li[data-id] .listinginfo', function () {
            var item_id = $(this).parent('li[data-id]').attr('data-id');
            $('.pagelisting .listinginfo.active_class').removeClass('active_class');
            $('li[data-id=' + item_id + '] > .listinginfo').addClass('active_class');

        });

        fixbar()

        function fixbar() {
            var targetselector = $('.vertical-text');
            if (targetselector.length > 0) {
                var getwith = targetselector.width()
                var left = 0 - getwith / 2 - 15;
                targetselector.css({'left': left, 'top': getwith / 2})
            }
        }

        function confirm_delete(data) {
            var r = confirm("Are you sure !!!");
            if (r == true) {
                var slug = $(data).data('slug');
                $.ajax({
                    url: '/admin/uploads/gears/units/delete',
                    data: {
                        slug: slug
                    }, headers: {
                        'X-CSRF-TOKEN': $("input[name='_token']").val()
                    },
                    dataType: 'json',
                    success: function (data) {
                        location.reload();
                    },
                    type: 'POST'
                });
            }
        }

        $(document).ready(function () {

            $('body').on("change", ".select-type", function () {
                var val = $(this).val();
                var url = window.location.pathname + "?type=" + val;

                window.location = url;
            });

            $('.rightButtons a').click(function (e) {
                e.preventDefault();
                $(this).addClass('active').siblings().removeClass('active');
            });

            $('.btnListView').click(function (e) {
                e.preventDefault();
                $('#viewType').addClass('listView');
            });

            $('.btnGridView').click(function (e) {
                e.preventDefault();
                $('#viewType').removeClass('listView');
            });


            $('.selectpicker').selectpicker();

            var p = "{!! $_GET['p'] or null !!}";

            if (p.length) {
                $("a[main-type=" + p + "]").click();
            }

        });

    </script>
@stop
