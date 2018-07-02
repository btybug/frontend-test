@extends('btybug::layouts.admin')
@section('content')

    <script id="item-template" type="template">
        <div class="bb-menu-item">
            <div class="bb-menu-item-title">
                <a href="javascript:" data-action="show-children"><i class="fa fa-plus"></i></a>
                <span>{title}</span>

                <div class="bb-menu-actions pull-right">
                    <a href="javascript:" class="bb-menu-collapse">
                        <i class="fa fa-caret-down"></i>
                    </a>
                </div>
            </div>
            <div class="bb-menu-item-body">
                <div class="bb-menu-form">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Icon</label>
                                <input type="text" data-placement="right" class="form-control input-sm" value="{icon}"
                                       readonly>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label>Item Title</label>
                                <input type="text" class="form-control input-sm" value="{title}" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Item URL</label>
                        <input type="text" class="form-control input-sm" value="{custom-link}" readonly>
                    </div>
                </div>
            </div>
        </div>
    </script>


    <div class="bb-menu-container">
        <div class="container-fluid">
            <!-- Menu -->
            <div class="row">
                <div class="col-md-4">
                    <ol class="bb-sortable-static"></ol>
                </div>
            </div>
        </div>
    </div>
@stop
{{--@include('tools::common_inc')--}}
@section('CSS')
    {{--{!! HTML::style('public/css/bootstrap/css/bootstrap-switch.min.css') !!}--}}
    {!! HTML::style('public/css/font-awesome/css/fontawesome-iconpicker.min.css') !!}
    {!! BBstyle(modules_path('console/src/Resources/assets/menu.css')) !!}

@stop

@section('JS')
    {{--{!! HTML::script('public/js/jquery.mjs.nestedSortable.js') !!}--}}
    {{--{!! HTML::script('public/css/bootstrap/js/bootstrap-switch.min.js') !!}--}}
    {!! HTML::script('public/css/font-awesome/js/fontawesome-iconpicker.min.js') !!}
    {!! BBscript(modules_path('console/src/Resources/assets/jquery.menuRenderer.js')) !!}
    {{--{!! HTML::script('public/js/menus.js') !!}--}}
    <script>
        jQuery(function ($) {

            $('.bb-sortable-static').menuRenderer({
                JSONString: '{!! json_encode($menu,true) !!}',
                itemTemplateSelector: '#item-template'
            });

            $('body')
                .on('click', '.bb-menu-collapse', function () {
                    var $this = $(this);
                    var body = $this.closest('.bb-menu-item').find('.bb-menu-item-body');
                    var bodyGroup = $this.closest('li').find('.bb-menu-group-body');
                    var icon = $this.find('i');

                    if ($this.hasClass("expand")) {
                        body.slideUp();
                        bodyGroup.slideUp();
                        $this.removeClass("expand");
                        icon.addClass("fa-caret-down");
                        icon.removeClass('fa-caret-up');
                    } else {
                        body.slideDown();
                        bodyGroup.slideDown();
                        $this.addClass("expand");
                        icon.removeClass("fa-caret-down");
                        icon.addClass('fa-caret-up');
                    }
                })
                .on('click', '[data-action=show-children]', function () {
                    var $this = $(this);
                    var icon = $this.find('i');
                    var parentItem = $this.closest('.parent').find('ol').first();

                    if ($this.hasClass("expand")) {
                        parentItem.slideUp();
                        $this.removeClass("expand");
                        icon.removeClass("fa-minus");
                        icon.addClass('fa-plus');
                    } else {
                        parentItem.slideDown();
                        $this.addClass("expand");
                        icon.addClass("fa-minus");
                        icon.removeClass('fa-plus');
                    }
                });
        });
    </script>
@stop