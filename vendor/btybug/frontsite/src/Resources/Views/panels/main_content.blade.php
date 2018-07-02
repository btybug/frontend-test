<div class="pull-right">
    Editor{!! Form::radio('content_type','editor',null,['data-role'=>'editor']) !!}
    Template{!! Form::radio('content_type','template',null,['data-role'=>'template']) !!}
</div>
<div class="panel-body editor_body @if($page->content_type!='editor') hide @endif">
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