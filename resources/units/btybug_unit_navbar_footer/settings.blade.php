
<?php
$container_styles = getDinamicStyle('containers');
$image_styles = getDinamicStyle('images');
$text_styles = getDinamicStyle('texts');
?>

{{--@option('general','s',$data)
<div class="bty-settings-panel">
    <div class="col-md-12">
        <div class="form-group">
            <div class="col-md-4">
                <label for="">Select Style</label>
            </div>
            <div class="col-md-8">
                {!! Form::select('style', $container_styles, null, ['class'=>'form-control'])!!}
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
@endoption--}}
{{--////////////////////////////////////////////////// User's Settings ////////////////////////////////////////////////////////////////////--}}

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
@endoption

    {!! BBstyle($_this->path.DS.'css'.DS.'settings.css',$_this) !!}

</div>

<script>
    $('.show_name_on_top').on('click',function () {
        if ($(this).is(':checked')){
            $('.select_fields').attr('style','display:block;');
        }else{
            $('.select_fields').attr('style','display:none;');
        }
    })


</script>