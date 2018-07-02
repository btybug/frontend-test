{!! Form::model($model,['id'=>'add_custome_page','url' => route('uploads_layouts_settings_post',$variation)]) !!}
<h3 id="main-box-title"></h3>
<div>
    {!! $preview !!}
</div>
{!! Form::close() !!}