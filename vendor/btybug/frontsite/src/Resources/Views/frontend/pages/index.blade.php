@extends('btybug::layouts.mTabs',['index'=>'frontend_manage'])
@section('tab')
    <div class="row m-t-15">
        <div class="col-md-6">
            {!! Form::text('search',null,['class' => 'form-control search-pages','placeholder' => 'Search page ...']) !!}
        </div>
        <div class="col-md-6">
            {!! Form::open(['url' => "/admin/front-site/structure/front-pages/new"]) !!}
                {!! Form::hidden('type','custom') !!}
                {{ Form::button('<i class="fa fa-plus" aria-hidden="true"></i> New Page', array('type' => 'submit', 'class' => 'pull-right create_new_btn m-l-20')) }}
            {!! Form::close() !!}

        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <article>
            <div class="bb-menu-container">
                <div class="col-md-8 col-md-offset-2 bb-menu-group-body">
                    <ol class="bb-menu-area">
                        <li data-id="#" data-type="core" class="">
                            <div class="listinginfo bb-menu-item">
                                <div class="lsitingbutton bb-menu-item-title" style="background: #0f4de0;  !important">
                                    <span class="listingtitle">My Sites</span>
                                </div>
                            </div>
                            <div class="listinginfo bb-menu-item">
                                <div class="lsitingbutton bb-menu-item-title" style="background: #0f4de0;  !important">
                                    <span class="listingtitle">Create</span>
                                </div>
                            </div>
                            <ol>
                                <li data-id="#" data-type="plugin" class="">
                                    <div class="listinginfo bb-menu-item">
                                        <div class="lsitingbutton bb-menu-item-title" style="background: #e0090b;  !important">
                                            <span class="listingtitle">Social</span>
                                        </div>
                                    </div>
                                </li>
                            </ol>
                        </li>
                        <li data-id="#" data-type="core" class="">
                            <div class="listinginfo bb-menu-item">
                                <div class="lsitingbutton bb-menu-item-title" style="background: #0f4de0;  !important">
                                    <span class="listingtitle">Profiles</span>
                                </div>
                            </div>
                            <ol>
                                <li data-id="#" data-type="plugin" class="">
                                    <div class="listinginfo bb-menu-item">
                                        <div class="lsitingbutton bb-menu-item-title" style="background: #0f4de0;  !important">
                                            <span class="listingtitle">Social profile</span>
                                        </div>
                                    </div>
                                </li>
                            </ol>
                        </li>
                        <li data-id="#" data-type="core" class="">
                            <div class="listinginfo bb-menu-item">
                                <div class="lsitingbutton bb-menu-item-title" style="background: #0f4de0;  !important">
                                    <span class="listingtitle">Contacts</span>
                                </div>
                            </div>
                            <ol>
                                <li data-id="#" data-type="plugin" class="">
                                    <div class="listinginfo bb-menu-item">
                                        <div class="lsitingbutton bb-menu-item-title" style="background: #0f4de0;  !important">
                                            <span class="listingtitle">Following</span>
                                        </div>
                                    </div>
                                </li>
                                <li data-id="#" data-type="plugin" class="">
                                    <div class="listinginfo bb-menu-item">
                                        <div class="lsitingbutton bb-menu-item-title" style="background: #0f4de0;  !important">
                                            <span class="listingtitle">Followers</span>
                                        </div>
                                    </div>
                                </li>
                                <li data-id="#" data-type="plugin" class="">
                                    <div class="listinginfo bb-menu-item">
                                        <div class="lsitingbutton bb-menu-item-title" style="background: #0f4de0;  !important">
                                            <span class="listingtitle">Networks</span>
                                        </div>
                                    </div>
                                </li>
                            </ol>
                        </li>
                        <li data-id="#" data-type="core" class="">
                            <div class="listinginfo bb-menu-item">
                                <div class="lsitingbutton bb-menu-item-title" style="background: #0f4de0;  !important">
                                    <span class="listingtitle">Media</span>
                                </div>
                            </div>
                            <ol>
                                <li data-id="#" data-type="plugin" class="">
                                    <div class="listinginfo bb-menu-item">
                                        <div class="lsitingbutton bb-menu-item-title" style="background: #0f4de0;  !important">
                                            <span class="listingtitle">Drive</span>
                                        </div>
                                    </div>
                                </li>
                                <li data-id="#" data-type="plugin" class="">
                                    <div class="listinginfo bb-menu-item">
                                        <div class="lsitingbutton bb-menu-item-title" style="background: #0f4de0;  !important">
                                            <span class="listingtitle">Settings</span>
                                        </div>
                                    </div>
                                </li>
                            </ol>
                        </li>
                        {!! hierarchyAdminPagesListFull($pages) !!}
                        <li data-id="#" data-type="plugin" class="">
                            <div class="listinginfo bb-menu-item">
                                <div class="lsitingbutton bb-menu-item-title" style="background: #0f4de0;  !important">
                                    <span class="listingtitle">Account</span>
                                </div>
                            </div>
                            <ol>
                                <li data-id="#" data-type="plugin" class="">
                                    <div class="listinginfo bb-menu-item">
                                        <div class="lsitingbutton bb-menu-item-title" style="background: #0f4de0;  !important">
                                            <span class="listingtitle">General</span>
                                        </div>
                                    </div>
                                </li>
                            </ol>
                        </li>
                        <li data-id="#" data-type="plugin" class="">
                            <div class="listinginfo bb-menu-item">
                                <div class="lsitingbutton bb-menu-item-title" style="background: #0f4de0;  !important">
                                    <span class="listingtitle">Favorites</span>
                                </div>
                            </div>
                        </li>
                        <li data-id="#" data-type="plugin" class="">
                            <div class="listinginfo bb-menu-item">
                                <div class="lsitingbutton bb-menu-item-title" style="background: #0f4de0;  !important">
                                    <span class="listingtitle">Dashboard</span>
                                </div>
                            </div>
                            <ol>
                                <li data-id="#" data-type="plugin" class="">
                                    <div class="listinginfo bb-menu-item">
                                        <div class="lsitingbutton bb-menu-item-title" style="background: #0f4de0;  !important">
                                            <span class="listingtitle">Main</span>
                                        </div>
                                    </div>
                                </li>
                            </ol>
                        </li>
                        <li data-id="#" data-type="plugin" class="">
                            <div class="listinginfo bb-menu-item">
                                <div class="lsitingbutton bb-menu-item-title" style="background: #0f4de0;  !important">
                                    <span class="listingtitle">Communications</span>
                                </div>
                            </div>
                            <ol>
                                <li data-id="#" data-type="plugin" class="">
                                    <div class="listinginfo bb-menu-item">
                                        <div class="lsitingbutton bb-menu-item-title" style="background: #0f4de0;  !important">
                                            <span class="listingtitle">Notifications</span>
                                        </div>
                                    </div>
                                </li>
                                <li data-id="#" data-type="plugin" class="">
                                    <div class="listinginfo bb-menu-item">
                                        <div class="lsitingbutton bb-menu-item-title" style="background: #0f4de0;  !important">
                                            <span class="listingtitle">Messages</span>
                                        </div>
                                    </div>
                                </li>
                                <li data-id="#" data-type="plugin" class="">
                                    <div class="listinginfo bb-menu-item">
                                        <div class="lsitingbutton bb-menu-item-title" style="background: #0f4de0;  !important">
                                            <span class="listingtitle">Subscribers</span>
                                        </div>
                                    </div>
                                </li>
                            </ol>
                        </li>
                    </ol>
                    <h3>Plugin Pages</h3>
                    <ol class="bb-menu-area">
                        <li data-id="#" data-type="plugin" class="">
                            <div class="listinginfo bb-menu-item">
                                <div class="lsitingbutton bb-menu-item-title" style="background: #e0090b;  !important">
                                    <span class="listingtitle">Home</span>
                                </div>
                            </div>
                        </li>

                        {!! hierarchyAdminPagesListFull($pluginPages) !!}
                    </ol>
                </div>
            </div>
        </article>
    </div>

    @include('btybug::_partials.delete_modal')
@stop
{{--@include('tools::common_inc')--}}
@section('CSS')
    {!! HTML::style('public/css/create_pages.css') !!}
    {!! HTML::style('public/css/tool-css.css?v=0.23') !!}
    {!! HTML::style('public/css/page.css?v=0.15') !!}
    {!! HTML::style('public/css/admin_pages.css') !!}
    {!! HTML::style('public/css/jquery.tagit.css') !!}
    {!! HTML::style('public/css/select2/select2.min.css') !!}
    {!! HTML::style('public/css/bootstrap/css/bootstrap-switch.min.css') !!}
    {!! HTML::style('public/css/font-awesome/css/fontawesome-iconpicker.min.css') !!}
    {!! HTML::style('public/css/menus.css?v='.rand(1111,9999)) !!}

@stop

@section('JS')
    {!! HTML::script('public/js/jquery-ui/jquery-ui.js') !!}
    {!! HTML::script('public/js/create_pages.js') !!}
    {!! HTML::script("public/js/UiElements/bb_styles.js?v.5") !!}
    {!! HTML::script('public/js/admin_pages.js') !!}
    {!! HTML::script('public/js/bootbox/bootbox.min.js') !!}
    {!! HTML::script('public/js/select2/select2.full.min.js') !!}
    {!! HTML::script('public/js/jquery.mjs.nestedSortable.js') !!}
    {!! HTML::script('public/css/bootstrap/js/bootstrap-switch.min.js') !!}
    {!! HTML::script('public/css/font-awesome/js/fontawesome-iconpicker.min.js') !!}
    {!! HTML::script('public/js/menus.js') !!}
    <script>

        $(document).ready(function () {
            $('ol.bb-menu-area').nestedSortable({
                items: 'li',
                isTree: true,
                stop: function(event, ui) {
                    var item = $(ui.item).attr("data-id");
                    var type = $(ui.item).attr("data-type");
                    var parent = $(ui.item).closest('ol').parent('li').attr("data-id");

                    if(type == 'custom'){
                        $.ajax({
                            url: '/admin/front-site/structure/front-pages/sorting',
                            data: {
                                item: item,
                                parent: parent
                            },
                            type: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': $("input[name='_token']").val()
                            },
                            dataType: 'json',
                            beforeSend : function () {

                            },
                            success: function (data) {
                                if (! data.error) {

                                }
                            }
                        });
                    }else{
                        $("ol.bb-menu-area").sortable("cancel");
                    }
                }
            });

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
            $("body").on('change', '.select-type', function () {
                var value = $(this).val();
                window.location.href = "/admin/front-site/structure/front-pages";
            });


            $("body").on('change', '.classify', function () {
                var id = $(this).val();
                if (typeof id != undefined && $(".data-cl[data-cl='" + id + "']").length === 0) {
                    var optionType = $('option:selected', this).attr('data-type');
                    $.ajax({
                        url: '/admin/manage/structure/front-pages/classify',
                        data: {
                            id: id,
                            type: optionType
                        },
                        type: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': $("input[name='_token']").val()
                        },
                        dataType: 'json',
                        success: function (data) {
                            if (!data.error) {
                                $(".classify-box").append(data.html);
                                $('.classify-options').select2({
                                    allowClear: false,
                                    placeholder: 'Select an option'
                                });
                            }
                        }
                    });
                }
            });

            $("body").on('click', '.delete-classify', function () {
                var id = $(this).data('id');
                $("[data-cl='" + id + "']").remove();
            });

            $("body").on('change', '[name="user_id"]', function () {
                var id = $(this).val();
                $.ajax({
                    url: '/admin/front-site/structure/front-pages/user-avatar',
                    data: {id: id},
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $("input[name='_token']").val()
                    },
                    dataType: 'json',
                    success: function (data) {
                        $(".user_photo").html('<img src="' + data.url + '" alt="avatar" class="thumb-md-blue">');
                    },

                });

            });

            if ($('#tagits').length > 0) {
                var getExt = $('#tagits').data('allwotag').split(',')

                $('#tagits').tagit({
                    availableTags: getExt,
                    // This will make Tag-it submit a single form value, as a comma-delimited field.
                    autocomplete: {delay: 0, minLength: 0},
                    singleField: true,
                    singleFieldNode: $('.tagitext'),
                    beforeTagAdded: function (event, ui) {
                        if (!ui.duringInitialization) {
                            var exis = getExt.indexOf(ui.tagLabel);
                            if (exis < 0) {
                                $('.tagit-new input').val('');
                                //alert('PLease add allow at tag')
                                return false;
                            }
                        }

                    }
                })
            }
            fixbar()

            function fixbar() {
                var targetselector = $('.vertical-text');
                if (targetselector.length > 0) {
                    var getwith = targetselector.width()
                    var left = 0 - getwith / 2 - 15;
                    targetselector.css({'left': left, 'top': getwith / 2})
                }
            }

            var id;
            $("body").on('click', '[data-pagecolid]', function () {
                id = $(this).data('pagecolid');
                $.ajax({
                    url: '/admin/manage/structure/front-pages/get-data',
                    data: {id: id},
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $("input[name='_token']").val()
                    },
                    dataType: 'json',
                    success: function (data) {
                        if (!data.error) {
                            $('.page-data').html(data.html);
//                            $('.page_layout').val(data.value);
//                            $('.page_name').val(data.page_name);
//                            $('.page_address').html(data.page_url);
//                            $('.page-date').html(data.page_date);
//                            //apply content
//                            var applyC = $(".apply_contents").attr('href');
//                            var res = applyC.split('/');
//
//                            res[res.length - 1] = data.page_id + "?pl=" + data.value;
//                            res = res.join('/');
//
//                            $(".apply_contents").attr('href', res);
                        }
                    },

                });
            });

            $("body").on('change', '.page_layout', function () {
                var layoutID = $(this).val();
                var applyC = $(".apply_contents").attr('href');
                var res = applyC.split('/');
                var last = res[res.length - 1];

                var page = last.substring(-1, last.indexOf('?'));

                res[res.length - 1] = page + "?pl=" + layoutID;
                res = res.join('/');

                $(".apply_contents").attr('href', res);
            });

            $("body").on('click', '.add-new-adminpage', function () {
                $('#adminpage').modal();
            });

            $("body").on('click', '.module-info', function () {
                var id = $(this).attr('data-module');
                var item = $(this).find("i");
                $.ajax({
                    url: '/admin/backend/build/admin-pages/module-data',
                    data: {id: id},
                    headers: {
                        'X-CSRF-TOKEN': $("input[name='_token']").val()
                    },
                    dataType: 'json',
                    beforeSend: function () {
                        $('.module-info-panel').html('');
                        item.removeClass('fa-info-circle');
                        item.addClass('fa-refresh');
                        item.addClass('fa-spin');
                    },
                    success: function (data) {
                        item.removeClass('fa-refresh');
                        item.removeClass('fa-spin');
                        item.addClass('fa-info-circle');
                        if (!data.error) {
                            $('.module-info-panel').html(data.html);
                        }
                    },
                    type: 'POST'
                });
            });

            $("body").on('click', '.view-url', function () {
                var id = $(this).attr('data-id');
                $.ajax({
                    url: '/admin/backend/build/admin-pages/pages-data',
                    data: {
                        id: id
                    },
                    headers: {
                        'X-CSRF-TOKEN': $("input[name='_token']").val()
                    },
                    dataType: 'json',
                    beforeSend: function () {
                        $('.module-info-panel').html('');
                    },
                    success: function (data) {
                        if (!data.error) {
                            $('.module-info-panel').html(data.html);
                        }
                    },
                    type: 'POST'
                });
            });
        });
    </script>
@stop