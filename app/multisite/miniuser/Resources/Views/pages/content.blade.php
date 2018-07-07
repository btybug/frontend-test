@extends('btybug::layouts.mTabs',['index'=>'mini_user_page_edit'])
@section('tab')
    {!! Form::model($page,['url' => route('frontsite_settings',$id), 'id' => 'page_settings_form','files' => true]) !!}

    <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 col-xl-9 p-20">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 page-data p-20">
            <div class="panel panel-default custompanel m-t-20">
                <div class="panel-heading">Main Content</div>
                <div class="panel-body">
                    <div class="pull-right">
                        Editor{!! Form::radio('content_type','editor',null,['data-role'=>'editor','class'=>'content_type']) !!}
                        Template{!! Form::radio('content_type','template',null,['data-role'=>'template','class'=>'content_type']) !!}
                    </div>
                    <div class="panel-body html_body @if($page->content_type!='editor') hide @endif">
                        {!! Form::textarea('main_content',null,['id' => 'main_content']) !!}
                    </div>

                    <div class="panel-body template_body @if($page->content_type!='template') hide @endif">

                        <div class="col-sm-5 p-l-0 p-r-10">
                            <input name="selcteunit" data-key="title" readonly="readonly" data-id="template"
                                   class="page-layout-title form-control"
                                   value="{!! BBgetUnitAttr(($page->template)??null,'title') !!}"
                            >
                        </div>
                        {!! BBbutton2('unit','template','front_page_content',"Change",['class'=>'btn btn-default change-layout','data-action'=>'main_content','model'=>($page->content_type=='editor')?null:$page]) !!}
                    </div>
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

    <script>
        $(function () {
            $('body').on('change', '.content_type', function () {
                var value = $(this).val();
                if (value == 'html') {
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

