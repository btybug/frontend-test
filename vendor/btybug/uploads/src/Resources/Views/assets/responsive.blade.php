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

    {!! $html !!}

    <input name="token" type="hidden" value="{{ csrf_token() }}" id="token"/>

</body>
{!! HTML::script("public/js/jquery-ui/jquery-ui.min.js") !!}
{!! HTML::script('public-x/custom/js/'.uniqid().'.js') !!}

@yield('JS')
@stack('javascript')
</html>

