{!! Form::model($settings,['url'=>$ui->getSaveUrl(), 'id'=>'add_custome_page','files'=>true]) !!}
    <input name="itemname" type="hidden" data-parentitemname="itemname"/>
    {!! $htmlSettings !!}
{!! Form::close() !!}