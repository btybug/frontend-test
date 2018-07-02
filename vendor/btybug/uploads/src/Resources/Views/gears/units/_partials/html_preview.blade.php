<!DOCTYPE html>
<html lang="en">
<head>
    {!! HTML::script("public/js/jquery-2.1.4.min.js") !!}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    {!! HTML::style('public-x/custom/css/'.str_replace(' ','-',$ui->slug).'.css') !!}

    <script src="//cdn.jsdelivr.net/npm/medium-editor@latest/dist/js/medium-editor.min.js"></script>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/medium-editor@latest/dist/css/medium-editor.min.css"
          type="text/css" media="screen" charset="utf-8">
    <link rel="stylesheet"
          href="https://yabwe.github.io/medium-editor/bower_components/medium-editor/dist/css/themes/beagle.min.css"
          type="text/css" media="screen" charset="utf-8">

    {!! HTML::script("public/libs/medium_editor/medium-button.min.js") !!}
</head>

<body>
{!! csrf_field() !!}
<div class="container-fluid">
    <div class="body_ui corepreviewSetting previewcontent activeprevew">
        {!! $htmlBody !!}
    </div>
</div>
{!! BBMainFrontJS() !!}
{!! HTML::script("public/js/UiElements/bb_styles.js?v.5") !!}
{!! HTML::script("public/js/UiElements/ui-preview-setting.js?v=".rand('1111','9999')) !!}
{!! HTML::script("public/js/UiElements/ui-settings.js?v=".rand('1111','9999')) !!}
@if(isset($ui))
    {!! HTML::script('public-x/custom/js/'.str_replace(' ','-',$ui->slug).'.js') !!}
@endif

<script>
    function initEditor() {
        new MediumEditor('.editable', {
            toolbar: {
                buttons: ['bold', 'italic', 'underline', 'link', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'done'],
                sticky: true,
                static: true,
                align: 'center'
            },
            extensions: {
                'done': new MediumButton({
                    label: 'Done',
                    action: function () {
                        destroyEditor();
                        return '';
                    }
                })
            }
        });

        $('.medium-editor-toolbar').css({
            visibility: 'visible',
            left: 'calc(50% - ' + ($('.medium-editor-toolbar').width() / 2) + 'px)'
        });
    }

    function destroyEditor() {
        var editor = window._mediumEditors.filter(function (ele, index) {
            return (ele && ele.origElements === '.editable')
        })[0];
        editor.destroy();
        window.parent.disableActiveHoverNode(false);
        $('.editable').removeClass("editable");
    }
</script>
</body>
</html>