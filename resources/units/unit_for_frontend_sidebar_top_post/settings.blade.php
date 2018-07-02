<?php
$container_styles = getDinamicStyle('containers');
$text_styles = getDinamicStyle('texts');
?>
@option('general','f',$data)
<div class="bty-settings-panel">
    <div class="col-md-12">
        <div class="form-group">
            <div class="col-md-4">
                <label for="">Post</label>
            </div>
            <div class="col-md-8">
                {!! Form::select('post_id',BBgetTable('posts')->pluck('title','id'),null,['class'=>'form-control ']) !!}
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="form-group">
            <div class="col-md-4">
                <label for="">Header</label>
            </div>
            <div class="col-md-8">
                {!! Form::text('header_text', null,['class'=>'form-control ']) !!}
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
@endoption
@option('general','s',$data)
<div class="bty-settings-panel">
    <div class="col-md-12">
        <div class="form-group">
            <div class="col-md-4">
                <label for="">Select</label>
            </div>
            <div class="col-md-8">
                {!! Form::select('ls_style', $container_styles, null, ['class'=>'form-control'])!!}
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
@endoption
@option('header','s',$data)
<div class="bty-settings-panel">
    <div class="col-md-12">
        <div class="form-group">
            <div class="col-md-4">
                <label for="">Header Style</label>
            </div>
            <div class="col-md-8">
                {!! Form::select('header_style', $text_styles, null, ['class'=>'form-control'])!!}
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
@endoption
@option('title','s',$data)
<div class="bty-settings-panel">
    <div class="col-md-12">
        <div class="form-group">
            <div class="col-md-4">
                <label for="">Title Style</label>
            </div>
            <div class="col-md-8">
                {!! Form::select('title_style', $text_styles, null, ['class'=>'form-control'])!!}
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
@endoption
@option('description','s',$data)
<div class="bty-settings-panel">
    <div class="col-md-12">
        <div class="form-group">
            <div class="col-md-4">
                <label for="">Description Style</label>
            </div>
            <div class="col-md-8">
                {!! Form::select('desc_style', $text_styles, null, ['class'=>'form-control'])!!}
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
@endoption






