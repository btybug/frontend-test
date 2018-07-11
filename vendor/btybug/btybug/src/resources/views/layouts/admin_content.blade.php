<!DOCTYPE html>
<!--[if IE 8]>
<html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]>
<html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<head>
@include('btybug::layouts._partials.head')
@yield('CSS')
@stack('css')
<!-- ================== BEGIN PAGE LEVEL JS ================== -->
{!! getHeaderJs() !!}
@yield('HeaderJS')
<!-- ================== END PAGE LEVEL JS ================== -->
</head>
<body>

@yield('main_content')

@include('modal')

{{ csrf_field() }}

<script src="https://npmcdn.com/tether@1.2.4/dist/js/tether.min.js"></script>
{!! BBJs("backend") !!}
{!! HTML::script("public/js/admin.js?v=6.0") !!}
{!! HTML::script("public/js/BB.js") !!}
{!! HTML::script("public/js/DataTables/datatables.js") !!}
{!! HTML::script("public/js/DataTables/Buttons-1.5.1/js/buttons.bootstrap.js") !!}

<script>
    $(function () {
        if ($('[data-role="browseMedia"]').length > 0) {
            $('[data-role="browseMedia"]').media();
        }
    })
</script>

<!-- ================== BEGIN FOOTER PAGE LEVEL JS ================== -->
{!! getFooterJs() !!}
@yield('JS')
{!! BBscriptsHook() !!}
@stack('javascript')
<!-- ================== END FOOTER PAGE LEVEL JS ================== -->


@yield('Footer')
</body>
</html>

