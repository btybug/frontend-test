<?php
$container_styles = getDinamicStyle('containers');
$text_styles = getDinamicStyle('texts');
?>
@option('general','s',$data)
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
@endoption
@option('text','s',$data)
<div class="bty-settings-panel">
    <div class="col-md-12">
        <div class="form-group">
            <div class="col-md-4">
                <label for="">Header Text Style</label>
            </div>
            <div class="col-md-8">
                {!! Form::select('header_style', $text_styles, null, ['class'=>'form-control'])!!}
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="form-group">
            <div class="col-md-4">
                <label for="">Description Text Style</label>
            </div>
            <div class="col-md-8">
                {!! Form::select('desc_style', $text_styles, null, ['class'=>'form-control'])!!}
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="form-group">
            <div class="col-md-4">
                <label for="">Professional Skills Text Style</label>
            </div>
            <div class="col-md-8">
                {!! Form::select('pr_skills_style', $text_styles, null, ['class'=>'form-control'])!!}
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="form-group">
            <div class="col-md-4">
                <label for="">Professional Skills Name Text Style</label>
            </div>
            <div class="col-md-8">
                {!! Form::select('pr_skill_name_style', $text_styles, null, ['class'=>'form-control'])!!}
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
@endoption






