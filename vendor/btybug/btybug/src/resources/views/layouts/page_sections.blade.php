<!DOCTYPE html>
<!--[if IE 8]>
<html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]>
<html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js" xmlns="http://www.w3.org/1999/html">
<!--<![endif]-->

<head>

    <meta charset="utf-8"/>
    <title>BB Admin Framework</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta content="" name="description"/>
    <meta content="" name="author"/>
    {!! BBCss() !!}
    {!! HTML::script("public/js/jquery-2.1.4.min.js") !!}
    {!! HTML::style('public/js/jquery-ui/jquery-ui.min.css') !!}
    {!! HTML::style("public/css/font-awesome/css/font-awesome.min.css") !!}
    {!! HTML::style('public/css/cms.css?v=1') !!}


    {!! HTML::style('public-x/custom/css/'.uniqid().'.css') !!}
{!! BBJs() !!}
    {!! HTML::script("public/js/tinymice/tinymce.min.js") !!}
    @yield('CSS')
    @stack('css')
</head>
<body>
<div class="container-fluid coreheadersetting m-b-10">
    {!! Form::open(['id'=>'page-section-layout-form','method'=>'GET']) !!}
    <div class="row">
        <div class="col-xs-3 p-t-10">
            <div class="col-xs-6">
                <div class="form-group">
                    <label class="form-control" for="itemname">{{ $page->title }} layout</label>
                </div>
            </div>
            <div class="col-xs-6">
                <div class="form-group">
                    @if($page->parent_id == ZERO)
                        {!! Form::hidden('inherit',0) !!}
                        <label class="form-control" for="itemname"> No Parent</label>
                    @else
                        {!! Form::select('inherit',
                            [0=>'Custom',1 => "Inherit"]
                        ,$page->page_layout_inheritance,['class'=>'form-control','id' => 'bb-select-inheritance']) !!}
                    @endif
                    <button class="btn btn-primary change-button {{ ($page->page_layout_inheritance) ? 'hide' : '' }}"> Change</button>
                </div>
            </div>
        </div>
        <div class="col-xs-3 p-t-10">
            <div class="form-group">
                {!! Form::select('layout',
                    [null=>'Select Layout']+\Btybug\btybug\Models\ContentLayouts\ContentLayouts::all()->get()->pluck('title','slug')->toArray()
                ,null,['class'=>'form-control bb-layout hide','id' => 'bb-select-layout']) !!}
            </div>
        </div>
        <div class="col-xs-2  p-t-10">
            {!! Form::select('variations',
                [null=>'Select Variation']+$variations->pluck('title','id')->toArray(),null,
            ['class'=>'form-control bb-layout hide','id' => 'bb-select-variation']) !!}
        </div>
        <div class="col-xs-4 text-right  p-t-10">
            <button class="btn btn-info" data-openresponsiveview="modal" data-viewtoolbar="reponsive" data-settingaction="responsive">Responsive</button>
            <button class="btn btn-danger" data-settingaction="console">Console</button>
            <button class="btn btn-info" data-settingaction="setting"> Setting</button>
            <button class="btn btn-success" data-settingaction="save"> Save</button>
            @if($model->self_type == "page_sections")
                <a href="{!! url("/admin/uploads/gears/page-sections/variations/$model->slug") !!}" class="btn btn-warning">Close</a>
            @else
                <a href="{!! url("/admin/uploads/units/units-variations/$model->slug") !!}" class="btn btn-warning">Close</a>
            @endif
        </div>
    </div>
    {!! Form::close() !!}
</div>
<header class="hide">
    @include('btybug::header')
</header>

@include('resources::assests.stylesModal')
@include('resources::assests.magicModal')
@include('resources::assests.responsiveModal')
<div class="modal fade" id="save-as-variation" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Save as</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <div class="col-md-4">
                        <label for="">Enter Name</label>
                    </div>
                    <div class="col-md-8">
                        <input name="new_name" class="form-control" id="new_name">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary save-as-submit">Save changes</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<div class="previewlivesetting">
    <div id="page-preview-settings-area" data-loadifram="preview">

        @yield('content')
    </div>
    <div id="page-sections-settings-area">
        @yield('settings')
    </div>
</div>

<input name="token" type="hidden" value="{{ csrf_token() }}" id="token"/>

</body>
{!! HTML::script("public/css/bootstrap/3.3.7/js/bootstrap.min.js") !!}

{!! HTML::script("public/js/jquery-ui/jquery-ui.min.js") !!}
{!! HTML::script('public/js/UiElements/page-sections.js') !!}
{!! HTML::script('public-x/custom/js/'.uniqid().'.js') !!}

@yield('JS')
@stack('javascript')
</html>