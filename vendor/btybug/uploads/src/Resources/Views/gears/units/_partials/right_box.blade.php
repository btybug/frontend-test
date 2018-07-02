{!! Form::model($settings,['url'=>'/admin/uploads/gears/settings/'.$id, 'id'=>'add_custome_page','files'=>true]) !!}
    <input name="itemname" type="hidden" data-parentitemname="itemname"/>
    {!! $htmlSettings !!}
{!! Form::close() !!}