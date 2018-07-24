
{!! Form::model($model,['url'=>route('minicms_edit_page'),'class'=>'form-horizontal']) !!}
{!! Form::hidden('id') !!}
<div class="form-group">
    <label for="page_title" class="control-label col-xs-4">Title</label>
    <div class="col-xs-8">
        <div class="input-group">
            <div class="input-group-addon">
                <i class="fa fa-bullhorn"></i>
            </div>
            {!! Form::text('title',null,['class'=>'form-control','id'=>'page_title']) !!}
        </div>
    </div>
</div>
<div class="form-group">
    <label for="page_url" class="control-label col-xs-4">Url</label>
    <div class="col-xs-8">
        <div class="input-group">
            <div class="input-group-addon">
                {username}/
            </div>
            {!! Form::text('url',null,['class'=>'form-control','id'=>'page_url']) !!}
        </div>
    </div>
</div>
<div class="form-group">
    <label for="page_status" class="control-label col-xs-4">Page Status</label>
    <div class="col-xs-8">
        {!! Form::select('status',['draft'=>'Draft','published'=>'Published'],null,['class'=>'form-control','id'=>'page_status']) !!}
    </div>
</div>
<div class="form-group">
    <label for="membership" class="control-label col-xs-4">Membership</label>
    <div class="col-xs-8">
        {!! Form::select('memberships',['free'=>'Free','pro'=>'Pro'],null,['class'=>'form-control','id'=>'membership']) !!}
    </div>
</div>
<div class="form-group">
    <label for="tag_unit_for_page" class="control-label col-xs-4">Tag Unit To Page</label>
    <div class="col-xs-8">
        {!! Form::select('tags',$tags,null,['class' => 'form-control','id' => 'tagits']) !!}
    </div>
</div>
<!-- Multiple Radios (inline) -->
<div class="form-group">
    <label class="col-md-4 control-label" for="radios">Header</label>
    <div class="col-md-8">
        <label class="radio-inline">
            {!! Form::radio('header',0,1) !!}
            Default
        </label>
        <label class="radio-inline" for="radios-1">
            {!! Form::radio('header',1) !!}
            No Header
        </label>
        <label class="radio-inline" for="radios-1">
            {!! Form::radio('header',2) !!}
            Special
        </label>
    </div>
</div>
<div class="form-group">
    <label class="col-md-4 control-label" for="radios">Layout</label>
    <div class="col-md-4">
        <label class="radio-inline" for="radios-0">
            {!! Form::radio('layout',0,1) !!}
            Default
        </label>
        <label class="radio-inline" for="radios-1">
            {!! Form::radio('layout',1) !!}
            Special
        </label>
    </div>
</div>
<div class="form-group header-bbbutton @if($model->header!=2) hide @endif">
    <label class="control-label col-xs-4"></label>
    <div class="col-xs-8">
        <div class="input-group">
            {!! BBbutton2('mini_unit','header_unit','header','Select Default Header',['model'=>$model]) !!}
        </div>
    </div>
</div>
<div class="form-group layout-bbbutton @if($model->layout!=1) hide @endif">
    <label  class="control-label col-xs-4"></label>
    <div class="col-xs-8">
        <div class="input-group">
            {!! BBbutton2('mini_layouts','page_layout','front_pages_layout','Select Default Layout',['model'=>$model]) !!}
        </div>
    </div>
</div>
{{--<div class="form-group">--}}
    {{--<label for="page_url" class="control-label col-xs-4"></label>--}}
    {{--<div class="col-xs-8">--}}
        {{--<div class="input-group">--}}
            {{--{!! BBmediaButton('icon',$model) !!}--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}

<div class="form-group row">
    <div class="col-xs-offset-4 col-xs-8">
        <button id="save-page" type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>

{!! Form::close() !!}