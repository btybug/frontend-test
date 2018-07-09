@extends('btybug::layouts.mTabs',['index'=>'mini_user_page_edit'])
@section('tab')
    {!! Form::model($page,['url' => route('mini_user_page_edit',$id), 'id' => 'page_settings_form','files' => true]) !!}

    <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 col-xl-9 p-20">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 page-data p-20">
            <div class="panel panel-default custompanel m-t-20">
                <div class="panel-heading">Main Content</div>
                <div class="panel-body">

                    <div class="form-group">
                        <label for="text" class="control-label col-xs-4">Text Field</label>
                        <div class="col-xs-8">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-address-card"></i>
                                </div>
                                {!! Form::text('url',null,['class'=>'form-control','readonly']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="radio" class="control-label col-xs-4">Page access</label>
                        <div class="col-xs-8">
                            <label class="radio-inline">
                                {!! Form::radio('page_access',0) !!}
                                Public
                            </label>
                            <label class="radio-inline">
                                {!! Form::radio('page_access',1) !!}
                                page_access
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="select" class="control-label col-xs-4">Status</label>
                        <div class="col-xs-8">
                            {!! Form::select('status',['draft'=>'Draft','published'=>'Published'],old('status'),['class'=>'select form-control']) !!}

                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-xs-offset-4 col-xs-8">
                            <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                    {{--<div class="pull-right">--}}
                        {{--Editor{!! Form::radio('content_type','editor',null,['data-role'=>'editor','class'=>'content_type']) !!}--}}
                        {{--Template{!! Form::radio('content_type','template',null,['data-role'=>'template','class'=>'content_type']) !!}--}}
                    {{--</div>--}}
                    {{--<div class="panel-body html_body @if($page->content_type!='editor') hide @endif">--}}
                        {{--{!! Form::textarea('main_content',null,['id' => 'main_content']) !!}--}}
                    {{--</div>--}}

                    {{--<div class="panel-body template_body @if($page->content_type!='template') hide @endif">--}}
                        {{--{!! BBbutton2('unit','template','my_account',"Change",['class'=>'btn btn-default change-layout','data-action'=>'main_content','model'=>$page]) !!}--}}
                    {{--</div>--}}
                </div>
            </div>
        </div>


    </div>
    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 p-20">
        <div class="panel panel-default custompanel m-t-20">
            <div class="panel-heading">General</div>
            <div class="panel-body">
                <a href="javascript:void(0)" class="btn btn-info btn-block full-page-view m-b-5">Full Preview</a>
                {{ Form::submit('Save', array('class' => 'save_btn m-b-5 btn-block','style' => "width:100%;")) }}
            </div>
        </div>
    </div>


    {!! Form::close() !!}

    <input type="hidden" id="page" value="{!! $page->id !!}">
@stop
@section('js')
    {!! HTML::script("public/js/UiElements/bb_styles.js?v=".rand(999,9999)) !!}
    {!! HTML::script('public/js/tinymice/tinymce.min.js') !!}

    <script>
        tinymce.init({
            selector: '#main_content', // change this value according to your HTML
            height: 200,
            theme: 'modern',
            plugins: [
                'advlist anchor autolink autoresize autosave bbcode charmap code codesample colorpicker contextmenu directionality emoticons fullscreen hr image imagetools importcss insertdatetime legacyoutput link lists media nonbreaking noneditable pagebreak paste preview print save searchreplace spellchecker tabfocus table template textcolor textpattern visualblocks visualchars wordcount shortcodes',
            ],
            toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
            toolbar2: 'print preview media | forecolor backcolor emoticons | codesample help shortcodes',
            image_advtab: true
        });
        $(function () {
            $('body').on('change', '.content_type', function () {
                var value = $(this).attr('data-role');
                console.log(value);
                if (value == 'editor') {
                    $('.html_body').removeClass('hide').addClass('show');
                    $('.template_body').removeClass('show').addClass('hide');
                } else {
                    $('.template_body').removeClass('hide').addClass('show');
                    $('.html_body').removeClass('show').addClass('hide');
                }

            });
        })
    </script>
    @endsection

