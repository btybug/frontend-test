@if($page)
    {!! Form::model($page,['id' => 'page_settings_form']) !!}
    <div class="row">
        <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 col-xl-9 p-20">
            {!! BBgetFrontPagesPanels($page,'backend') !!}
        </div>
        <div class="col-xs-12 col-sm-3 create connected" data-bbsortable="source">
            <div class="panel panel-default custompanel m-t-20">
                <div class="panel-heading">General</div>
                <div class="panel-body">
                    {{ Form::submit('Save', array('class' => 'save_btn m-b-5 btn-block','style' => "width:100%;")) }}
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
    @include('resources::assests.magicModal')
@else
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 design_panel">
        <div class="published_1">
            NO Page
        </div>
    </div>
@endif

@section('CSS')
    {!! HTML::style('public/css/fontawesome-iconpicker.min.css') !!}
    {!! HTML::style('public/css/create_pages.css') !!}

    <style>
        #main-wrapper {
            min-height: 1000px;
            display: inline-block;
        }

        @media (min-width: 1787px) {
            .header_image, .block {
                height: 398px;
            }
        }

        .live-preview-btn {
            background: #499bc7;
            color: #fff;
            width: 96px;
            height: 38px;
            border-radius: 3px;
            padding: 8px;
            font-size: 17px;
            margin-right: 10px;
            box-shadow: 2px 1px 6px #888888;
            cursor: pointer;
        }

        .col-lg-1, .col-lg-10, .col-lg-11, .col-lg-12, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-md-1, .col-md-10, .col-md-11, .col-md-12, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-sm-1, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-xs-1, .col-xs-10, .col-xs-11, .col-xs-12, .col-xs-2, .col-xs-3, .col-xs-4, .col-xs-5, .col-xs-6, .col-xs-7, .col-xs-8, .col-xs-9 {
            padding-right: 15px;
            padding-left: 15px;
        }

        .m-t-20 {
            margin-top: 20px;
        }
        .page-icon .popover-title input{
            float: none;
            width: 100%;
        }
        .page-url .page_labels{
            margin: 0;
        }
        .right{
            background: transparent;
        }
        .page-name input{
            float: none;
            width:100%;
        }
        .left i{
            margin-left:0;
            color: #499bc7;
            margin-right:10px;
        }
        .m-r-15{
            margin-right: 15px;
        }
        .page-icon .icp-auto{
            border-radius: 0;
        }
    </style>
@stop
@section('JS')
    {!! HTML::script("public/js/jquery-ui/jquery-ui.js?v.5") !!}
    {!! HTML::script("public/js/UiElements/bb_styles.js?v.5") !!}
    {!! HTML::script("public/js/jquery.mjs.nestedSortable.js?v.4") !!}
    {!! HTML::script('public/js/page-setting.js') !!}

    {!! HTML::script("public/js/UiElements/bb_div.js?v.5") !!}
    {!! HTML::script('public/js/tinymice/tinymce.min.js') !!}
    {!! HTML::script('public/js/fontawesome-iconpicker.min.js') !!}

    <script>

        $(function () {

            $('.icp-auto').iconpicker();

            $('.icp').on('iconpickerSelected', function (e) {
                $(this).attr("value", e.iconpickerValue);
            });
        });
        $(document).ready(function () {
            tinymce.init({
                selector: '#main_content', // change this value according to your HTML
                height: 200,
                theme: 'modern',
                plugins: [
                    'advlist anchor autolink autoresize autosave bbcode charmap code codesample colorpicker contextmenu directionality emoticons fullpage fullscreen hr image imagetools importcss insertdatetime legacyoutput link lists media nonbreaking noneditable pagebreak paste preview print save searchreplace spellchecker tabfocus table template textcolor textpattern visualblocks visualchars wordcount shortcodes',
                ],
                toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
                toolbar2: 'print preview media | forecolor backcolor emoticons | codesample help shortcodes',
                image_advtab: true
            });

            $('body').on('change', '.content_type', function () {
                var value = $(this).val();

                if (value == 1) {
                    $('.iframe-page-content').removeClass('show').addClass('hide');
                    $('.editor-page-content').removeClass('hide').addClass('show');
                } else {
                    $('.editor-page-content').removeClass('show').addClass('hide');
                    $('.iframe-page-content').removeClass('hide').addClass('show');
                }

            });

            $('body').on('click', '.live-preview-btn', function () {
                if (!$(this).next().hasClass('redirect-type')) {
                    var typeInput = $('<input/>', {
                        type: 'hidden',
                        name: 'redirect_type',
                        value: 'view',
                        class: 'redirect-type'
                    });
                    $(this).after(typeInput);
                    $('#page_settings_form').submit();
                }

            });
        });

    </script>
@stop