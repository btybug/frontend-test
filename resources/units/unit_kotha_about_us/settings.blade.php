<?php
$image_styles = getDinamicStyle('images');
$text_styles = getDinamicStyle('texts');
?>

@option('image','f',$data)
<div class="settings-right-col">
    <div class="col-md-12">
        <div class="form-group">
            <div class="col-md-4">
                <label for="">Image Url</label>
            </div>
            <div class="col-md-8">
                {!! Form::text('image_url', null,['class'=>'form-control ']) !!}
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
@endoption
@option('image','s',$data)
<div class="settings-right-col">
    <div class="col-md-12">

        <div class="form-group">
            <div class="col-md-4">
                <label for="">Image Style</label>
            </div>
            <div class="col-md-8">
                {!! Form::select('image_style', $image_styles, null, ['class'=>'form-control'])!!}
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
@endoption
@option('text','f',$data)
<div class="settings-right-col">
    <div class="col-md-12">
        <div class="form-group">
            <div class="col-md-4">
                <label for="">Text</label>
            </div>
            <div class="col-md-8">
                {!! Form::textarea('about_me', issetReturn($settings, 'about_me'),['class'=>'form-control ']) !!}
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
@endoption
@option('text','s',$data)
<div class="settings-right-col">
    <div class="col-md-12">
        <div class="form-group">
            <div class="col-md-4">
                <label for="">Text Style</label>
            </div>
            <div class="col-md-8">
                {!! Form::select('text_style', $text_styles, null, ['class'=>'form-control'])!!}
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
@endoption

@option('title','f',$data)
<div class="settings-right-col">
    <div class="col-md-12">
        <div class="form-group">
            <div class="col-md-4">
                <label for="">Title</label>
            </div>
            <div class="col-md-8">
                {!! Form::text('title', null,['class'=>'form-control ']) !!}
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
@endoption
@option('title','s',$data)
<div class="settings-right-col">
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




