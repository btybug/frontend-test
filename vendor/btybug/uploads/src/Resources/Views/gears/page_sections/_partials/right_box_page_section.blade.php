{!! Form::model($settings,['id'=>'add_custome_page','url' => route('uploads_page_layouts_settings_post',[$page_id,$variation])]) !!}
{!! Form::hidden('live_preview_action',true) !!}
<h3 id="main-box-title"></h3>
<div>
    {!! $preview !!}
</div>
{!! Form::close() !!}