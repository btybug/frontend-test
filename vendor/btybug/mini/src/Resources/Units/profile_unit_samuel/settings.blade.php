@option('users_settings','f',$data)
<div class="bty-settings-panel">
    <h3>User's Settings</h3>

    <div class="custom-control custom-checkbox">
        {!! Form::checkbox('shoe_name',1,null,['class'=>'custom-control-input','id'=>'defaultChecked2']) !!}
        <label class="custom-control-label" for="defaultChecked2">Show name ("{{Auth::user()->username}}")</label>
    </div>
    <div class="custom-control custom-checkbox">
        {!! Form::checkbox('shoe_avatar',1,null,['class'=>'custom-control-input','id'=>'defaultChecked3']) !!}
        <label class="custom-control-label" for="defaultChecked3">Show Avatar</label>
    </div>
    <div class="custom-control custom-checkbox">
        {!! Form::checkbox('shoe_avatar_on_top',1,null,['class'=>'custom-control-input','id'=>'defaultChecked4']) !!}
        <label class="custom-control-label" for="defaultChecked4">Show Avatar on top</label>
    </div>
    <div class="custom-control custom-checkbox">
        {!! Form::checkbox('shoe_name_on_top',1,null,['class'=>'custom-control-input show_name_on_top','id'=>'defaultChecked5']) !!}
        <label class="custom-control-label" for="defaultChecked5">Show name on top</label>
    </div>
    <div class="col-md-4">
        {!! Form::select('user_fields', BBGetTableColumn('users'), null,['class'=>'form-control columns-user select_fields'])  !!}
    </div>
    <label class="col-md-4 control-label" for="textinput">Profession title</label>
    <div class="col-md-4">
        {!! Form::input('text','profession',null,['class'=>'form-control input-md','id'=>'textinput','placeholder' => 'UI/UX Designer']) !!}
    </div>
</div>
@endoption