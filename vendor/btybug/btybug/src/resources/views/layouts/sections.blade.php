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
    {!! HTML::script("public/css/bootstrap/3.3.7/js/bootstrap.min.js") !!}

    {!! HTML::style('public/css/bootstrap/3.3.7/css/bootstrap.min.css') !!}
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
    <div class="row">
        <div class="col-xs-4 p-t-10">
            <div class="form-group">
                <label class="sr-only" for="itemname">itemname</label>
                @if(isset($variation))
                    <input type="hidden" id="itemname" value="{!! $variation->title !!}">
                    <div class="form-control">{!! $variation->title !!}</div>
                    @php
                        $current = [$variation->id => 'Current variation is the default selected'];
                    @endphp
                @else
                    <input type="text" class="form-control" id="itemname" placeholder="itemname"
                           value="">
                    @php
                        $current = ['' => 'Select Variation, there is no default'];
                    @endphp
                @endif
            </div>
        </div>
        <div class="col-xs-4  p-t-10">
            {{--{!! Form::select('copy_data',--}}
                {{--$current--}}
            {{--+ BBgetContentLayoutVariationsPluck($model),null,['class' => 'form-control','id' => 'copy_data']) !!}--}}
        </div>
        <div class="col-xs-4 text-right  p-t-10">
            <button class="btn btn-info" data-openresponsiveview="modal" data-viewtoolbar="reponsive" data-settingaction="responsive">Responsive</button>
            <button class="btn btn-danger" data-settingaction="console">Console</button>
            <button class="btn btn-info" data-settingaction="setting"> Setting</button>
            <button class="btn btn-success" data-settingaction="save"> Save</button>
            @if($variation && ! $variation->used_in)
                <button class="btn btn-primary" id="save-us" data-settingaction="save-as"> Save as</button>
            @endif
            @if($model->self_type == "page_sections")
                <a href="{!! url("/admin/uploads/gears/page-sections/variations/$model->slug") !!}" class="btn btn-warning">Close</a>
            @else
                <a href="{!! url("/admin/uploads/units/units-variations/$model->slug") !!}" class="btn btn-warning">Close</a>
            @endif
        </div>
    </div>
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
{!! HTML::script("public/js/jquery-ui/jquery-ui.min.js") !!}
{!! HTML::script('public-x/custom/js/'.uniqid().'.js') !!}

@yield('JS')
@stack('javascript')
</html>