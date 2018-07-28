{!! Form::model($settings,['url'=>route('minicms_widgets_settings_save',$id), 'id'=>'add_custome_page','files'=>true]) !!}
    <input name="itemname" type="hidden" data-parentitemname="itemname"/>
    {!! $htmlSettings !!}
{!! Form::close() !!}