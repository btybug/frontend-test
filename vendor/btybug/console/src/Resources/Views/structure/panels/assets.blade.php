<div class="col-md-12">
    <div class="panel-heading">Css
        <div class="pull-right">
            External {!! Form::radio('css_type','external',null,['data-role'=>'css_external','class' => 'content_type_css']) !!}
            Profiles {!! Form::radio('css_type','cms',null,['data-role'=>'css_cms','class' => 'content_type_css']) !!}
            Default {!! Form::radio('css_type','default',true,['data-role'=>'default','class' => 'content_type_css']) !!}
        </div>
    </div>
    <div class="panel-body css_external {!! ($page->css_type != 'external') ? 'hide' : ''  !!}">
        <div class="col-md-12">
            <a href="javascript:void(0)" class="btn btn-primary add-new-css pull-right"><i
                        class="fa fa-plus"></i></a>
        </div>
        <div class="column">
            @if(is_array($page->css) && count($page->css))
                @foreach($page->css as $css)
                    <div class="col-md-12 portlet">
                        <div class="col-md-2 portlet-handle">
                            <label class="lbl"> Add Link </label>
                        </div>
                        <div class="col-md-6">
                            {!! Form::text('css[]',($css)?$css:'',['class' => 'form-control']) !!}
                        </div>
                        <div class="col-md-4">
                            <a href="javascript:void(0)" class="external_delete btn btn-danger"><i
                                        class="fa fa-trash"></i></a>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>

    <div class="panel-body css_cms {!! ($page->css_type != 'cms') ? 'hide' : ''  !!}">
        {!! Form::select('css_cms[]',$page->cssData,null,
                   ['class' => 'form-control select-dropdowns pull-right','multiple' => 'multiple']) !!}
    </div>
</div>

<div class="col-md-12">
    <div class="panel-heading">JS
        <div class="pull-right">
            External {!! Form::radio('js_type','external',null,['data-role'=>'external','class' => 'content_type_js']) !!}
            Profiles {!! Form::radio('js_type','cms',null,['data-role'=>'cms','class' => 'content_type_js']) !!}
            Default {!! Form::radio('js_type','default',true,['data-role'=>'default','class' => 'content_type_js']) !!}</div>
    </div>
    <div class="panel-body js_external {!! ($page->js_type != 'external') ? 'hide' : ''  !!}">
        <div class="col-md-12">
            <a href="javascript:void(0)" class="btn btn-primary add-new-js pull-right"><i
                        class="fa fa-plus"></i></a>
        </div>
        <div class="column-js">
        @if(is_array($page->js) && count($page->js))
                @foreach($page->js as $js)
                    <div class="col-md-12 portlet-js">
                        <div class="col-md-2 portlet-handle-js">
                            <label class="lbl"> Add Link </label>
                        </div>
                        <div class="col-md-6">
                            {!! Form::text('js[]',($js)?$js:'',['class' => 'form-control']) !!}
                        </div>
                        <div class="col-md-4">
                            <a href="javascript:void(0)" class="external_delete btn btn-danger"><i
                                        class="fa fa-trash"></i></a>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>

    </div>
    <div class="panel-body js_cms {!! ($page->js_type != 'cms') ? 'hide' : ''  !!}">
        {!! Form::select('js_cms[]',$page->jsData,null,
                    ['class' => 'form-control pull-right select-dropdowns','multiple' => 'multiple']) !!}
    </div>
</div>

<div class="col-md-12">
    <div class="panel-heading">Fonts
        <div class="pull-right">
            {{--External {!! Form::radio('js_type','external',null,['data-role'=>'external','class' => 'content_type_js']) !!}--}}
            {{--Profiles {!! Form::radio('js_type','cms',null,['data-role'=>'cms','class' => 'content_type_js']) !!}--}}
            {{--Default {!! Form::radio('js_type','default',true,['data-role'=>'default','class' => 'content_type_js']) !!}--}}
        </div>
    </div>
    <div class="panel-body">
        {{--<div class="col-md-12">--}}
        {{--<a href="javascript:void(0)" class="btn btn-primary add-new-js pull-right"><i--}}
        {{--class="fa fa-plus"></i></a>--}}
        {{--</div>--}}
        {{--<div class="column-js">--}}
        {{--@if(count($page->js))--}}
        {{--@foreach($page->js as $js)--}}
        {{--<div class="col-md-12 portlet-js">--}}
        {{--<div class="col-md-2 portlet-handle-js">--}}
        {{--<label class="lbl"> Add Link </label>--}}
        {{--</div>--}}
        {{--<div class="col-md-6">--}}
        {{--{!! Form::text('js[]',($js)?$js:'',['class' => 'form-control']) !!}--}}
        {{--</div>--}}
        {{--<div class="col-md-4">--}}
        {{--<a href="javascript:void(0)" class="external_delete btn btn-danger"><i--}}
        {{--class="fa fa-trash"></i></a>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--@endforeach--}}
        {{--@endif--}}
        {{--</div>--}}

        {{--</div>--}}
        {{--<div class="panel-body js_cms {!! ($page->js_type != 'cms') ? 'hide' : ''  !!}">--}}
        {{--{!! Form::select('js_cms[]',$jsData,null,--}}
        {{--['class' => 'form-control pull-right select-dropdowns','multiple' => 'multiple']) !!}--}}
        {{--</div>--}}
    </div>
</div>