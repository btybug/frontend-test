@extends('btybug::layouts.mTabs',['index'=>'manage_settings'])
@section('tab')

    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 panels_wrapper ">
            <!-- begin panel -->
            <div class="panel panel-default panels accordion_panels">
                <div class="panel-heading bg-black-darker text-white" role="tab" id="headingLink">
                    <span class="panel_title">Login Configuration</span>
                    <a role="button" class="panelcollapsed collapsed" data-toggle="collapse"
                       data-parent="#accordion" href="#collapseLink1" aria-expanded="true"
                       aria-controls="collapseLink1">
                        <i class="fa fa-chevron-down" aria-hidden="true"></i>
                    </a>
                    <ul class="list-inline panel-actions">
                        <li><a href="#" panel-fullscreen="true" role="button" title="Toggle fullscreen"><i
                                        class="glyphicon glyphicon-resize-full"></i></a></li>
                    </ul>
                </div>
                <div id="collapseLink1" class="panel-collapse collapse in" role="tabpanel"
                     aria-labelledby="headingLink">
                    <div class="panel-body panel_body panel_1 show">
                        {{--'route' => 'system.store',--}}
                        {!! Form::open(['role' => 'form', 'class'=>'config-form ']) !!}
                        @include('manage::system._login_form')
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 panels_wrapper ">
            <div class="panel panel-default panels accordion_panels">
                <div class="panel-heading bg-black-darker text-white" role="tab" id="headingLink">
                    <span class="panel_title">System</span>
                    <a role="button" class="panelcollapsed collapsed" data-toggle="collapse"
                       data-parent="#accordion" href="#collapseLink2" aria-expanded="true"
                       aria-controls="collapseLink1">
                        <i class="fa fa-chevron-down" aria-hidden="true"></i>
                    </a>
                    <ul class="list-inline panel-actions">
                        <li><a href="#" panel-fullscreen="true" role="button" title="Toggle fullscreen"><i
                                        class="glyphicon glyphicon-resize-full"></i></a></li>
                    </ul>
                </div>
                <div id="collapseLink2" class="panel-collapse collapse in" role="tabpanel"
                     aria-labelledby="headingLink">
                    <div class="panel-body panel_body panel_1 show">
                        {{--'role' => 'form',--}}
                        {!! Form::open(['class'=>'config-form ']) !!}
                        @include('manage::system._system_form')
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-6 panels_wrapper settings_panel">
            <div class="panel panel-default panels accordion_panels" id="my-accordion">
                <div class="panel-heading bg-black-darker text-white" role="tab" id="headingLink">
                    <span class="panel_title">Settings</span>
                    <a role="button" class="panelcollapsed collapsed" data-toggle="collapse"
                       data-parent="#accordion" href="#collapseLink3" aria-expanded="true"
                       aria-controls="collapseLink3">
                        <i class="fa fa-chevron-down" aria-hidden="true"></i>
                    </a>
                    <ul class="list-inline panel-actions">
                        <li><a href="#" panel-fullscreen="true" role="button" title="Toggle fullscreen"><i
                                        class="glyphicon glyphicon-resize-full"></i></a></li>
                    </ul>
                </div>
                <div id="collapseLink3" class="panel-collapse collapse in" role="tabpanel"
                     aria-labelledby="headingLink">
                    <div class="panel-body panel_body panel_1 show">
                        <div>
                            {!! Form::model($system,['class' => 'form-horizontal','files' => true]) !!}
                            <fieldset>
                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="control-label col-xs-12 col-sm-12 col-md-12 col-lg-3" for="site_name">Site
                                        Name</label>
                                    <div class="first_1  col-xs-12 col-sm-12 col-md-12 col-lg-9">
                                        {!! Form::text('site_name',null,['form-control input-md']) !!}
                                    </div>
                                </div>

                                <!-- FILE -->
                                <div class="form-group">
                                    <label class="control-label col-xs-12 col-sm-12 col-md-12 col-lg-3" for="textarea">Site
                                        Logo</label>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-9">
                                        {!! Form::file('site_logo',['class' => 'form-control input-md form_controls']) !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-xs-12 col-sm-12 col-md-12 col-lg-3" for="textarea">Site
                                        Description</label>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-9">
                                        {!! Form::textarea('site_desc',null,['class' => 'form-control input-md form_controls']) !!}
                                    </div>
                                </div>
                                <!-- Button -->
                                <div class="form-group">
                                    {{--<div class="col-md-12 for_save_btn">--}}
                                    {!! Form::submit('Save',['class' => 'btn btn-primary']) !!}
                                    {{--</div>--}}
                                </div>
                            </fieldset>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div role="tabpanel" class="m-t-10" id="main">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 main_container_11">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 panels_wrapper settings_panel">
                        <div class="panel panel-default panels accordion_panels" id="my-accordion">
                            <div class="panel-heading bg-black-darker text-white" role="tab" id="headingLinkSettings">
                                <span class="panel_title">General Settings</span>
                                <a role="button" class="panelcollapsed collapsed" data-toggle="collapse"
                                   data-parent="#accordion" href="#collapseLink3" aria-expanded="true"
                                   aria-controls="collapseLink3">
                                    <i class="fa fa-chevron-down" aria-hidden="true"></i>
                                </a>
                                <ul class="list-inline panel-actions">
                                    <li><a href="#" panel-fullscreen="true" role="button" title="Toggle fullscreen"><i
                                                    class="glyphicon glyphicon-resize-full"></i></a></li>
                                </ul>
                            </div>
                            <div id="collapseLink3" class="panel-collapse collapse in" role="tabpanel"
                                 aria-labelledby="headingLinkSettings">
                                <div class="panel-body panel_body panel_1 show">
                                    <div>
                                        {!! Form::model($system,['class' => 'form-horizontal','files' => true,'url'=>route('front_pages_general_settings')]) !!}
                                        <fieldset>
                                            <div class="col-md-12">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <div class="for_button_1 col-xs-12 col-sm-12 col-md-12 col-lg-9">
                                                            {!! BBbutton2('unit','header_tpl','frontend_header','Select Header',['class' => 'form-control input-md btn-info','data-type' => 'header','model' =>$system]) !!}
                                                        </div>
                                                        <div class="for_button_1 col-xs-6 col-sm-6 col-md-2 col-lg-3">
                                                            <input type="hidden" name="header_enabled" value="0">
                                                            {!! Form::checkbox('header_enabled', 1, null, ['id' => 'page_header_active', ]) !!}
                                                            <label for="page_header_active">Enabled</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="for_button_1 col-xs-12 col-sm-12 col-md-12 col-lg-9">
                                                            {!! BBbutton2('unit','footer_tpl','frontend_footer','Select Footer',['class' => 'form-control input-md btn-info','data-type' => 'footer','model' =>$system]) !!}
                                                        </div>
                                                        <div class="for_button_1 col-xs-6 col-sm-6 col-md-6 col-lg-3">
                                                            <input type="hidden" name="footer_enabled" value="0">
                                                            {!! Form::checkbox('footer_enabled', 1, null, ['id' => 'page_footer_active']) !!}
                                                            <label for="page_footer_active">Enabled</label>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">

                                                        <div class="for_button_1 col-xs-12 col-sm-12 col-md-12 col-lg-9">
                                                            {!! BBbutton('units','default_field_html','Select Field Html',[
                                                                'class' => 'form-control input-md btn-success',
                                                                "data-type" => 'frontend',
                                                                'data-sub' => "component",
                                                                'model' => $system
                                                            ]) !!}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        {!!Btybug\btybug\Models\ContentLayouts\ContentLayouts::getDefaultLayoutPlaceholders($system) !!}
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Button -->
                                            <div class="form-group">
                                                {{--<div class="col-md-12 for_save_btn">--}}
                                                {!! Form::submit('Save',['class' => 'btn btn-primary']) !!}
                                                {{--</div>--}}
                                            </div>
                                        </fieldset>
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('resources::assests.magicModal')

@stop

@section('CSS')
    {!! HTML::style('public/css/admin_pages.css') !!}
    {!! HTML::style('public/css/menu.css?v=0.16') !!}
    {!! HTML::style('public/css/tool-css.css?v=0.23') !!}
    {!! HTML::style('public/css/page.css?v=0.15') !!}
@stop
@section('JS')
    {!! HTML::script('public/js/admin_pages.js') !!}
    {!! HTML::script("/public/js/UiElements/bb_styles.js?v.5") !!}
    {!! HTML::script('public/js/nestedSortable/jquery.mjs.nestedSortable.js') !!}
    {!! HTML::script('public/js/bootbox/js/bootbox.min.js') !!}
    {!! HTML::script('public/js/icon-plugin.js?v=0.4') !!}
    <script>
        $(document).ready(function () {

            $('body').on('change', '.enable_registration', function () {
                if ($(this).val() == "1") {
                    $('.show-member-access').removeClass('hide').addClass('show');
                    $('.email-activation-div').removeClass('hidden');
                } else {
                    $('.show-member-access').removeClass('show').addClass('hide');
                    $('.email-activation-div').addClass('hidden');
                }
            });
        });
    </script>
@stop
