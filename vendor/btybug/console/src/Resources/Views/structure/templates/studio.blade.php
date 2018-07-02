{!! Html::style("public/css-studio/css-studio.css") !!}
{!! Html::style("public/libs/easyui/easyui.css") !!}
{!! HTML::style("public/libs/minicolors/jquery.minicolors.css") !!}
{!! HTML::style("public/libs/toggle/jquery.toggleinput.css") !!}
{!! HTML::style("public/libs/tagsinput/bootstrap-tagsinput.css") !!}

{!! HTML::script("public/libs/easyui/easyloader.js") !!}
<script>
    var ajaxLinks = {
        baseUrl: "{!! url('/') !!}"
    };

    easyloader.base = '<?php echo url("public/libs/easyui/") ?>/';
    easyloader.css = false;
</script>

{!! HTML::script("public/libs/tagsinput/bootstrap-tagsinput.min.js") !!}
{!! HTML::script("public/libs/toggle/jquery.toggleinput.js") !!}
{!! HTML::script("public/libs/minicolors/jquery.minicolors.min.js") !!}
{!! Html::script("public/css-studio/css-studio.js") !!}
{!! Html::script("public/js/form-builder/handlebars.js?m=m") !!}

@include('console::structure.templates.templates')