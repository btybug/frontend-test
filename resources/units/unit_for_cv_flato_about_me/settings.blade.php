<?php
    $container_styles = getDinamicStyle('containers');
    $image_styles = getDinamicStyle('images');
    $text_styles = getDinamicStyle('texts');

?>
@option('general','f',$data)
<div class="bty-settings-panel">
    <div class="col-md-12">
        <div class="form-group">
            <div class="col-md-4">
                <label for="">Name</label>
            </div>
            <div class="col-md-8">
                {!! Form::text('name', null,['class'=>'form-control ']) !!}
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="form-group">
            <div class="col-md-4">
                <label for="">Speciality</label>
            </div>
            <div class="col-md-8">
                {!! Form::text('spec', null,['class'=>'form-control ']) !!}
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="form-group">
            <div class="col-md-4">
                <label for="">City</label>
            </div>
            <div class="col-md-8">
                {!! Form::text('city', null,['class'=>'form-control ']) !!}
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="form-group">
            <div class="col-md-4">
                <label for="">About Me</label>
            </div>
            <div class="col-md-8">
                {!! Form::textarea('about_me', issetReturn($settings, 'about_me'),['class'=>'form-control ']) !!}
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
@option('image','f',$data)
<div class="bty-settings-panel">
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
<div class="bty-settings-panel">
    <div class="col-md-12">
        <div class="form-group">
            <div class="col-md-4">
                <label for="">Image Size</label>
            </div>
            <div class="col-md-8">
                {!! Form::number('image_width', null,['class'=>'form-control ']) !!}
            </div>
            <div class="clearfix"></div>
        </div>
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
                <label for="">Name Text Style</label>
            </div>
            <div class="col-md-8">
                {!! Form::select('name_style', $text_styles, null, ['class'=>'form-control'])!!}
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="form-group">
            <div class="col-md-4">
                <label for="">Speciality Text Style</label>
            </div>
            <div class="col-md-8">
                {!! Form::select('spec_style', $text_styles, null, ['class'=>'form-control'])!!}
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="form-group">
            <div class="col-md-4">
                <label for="">About Me Text Style</label>
            </div>
            <div class="col-md-8">
                {!! Form::select('about_style', $text_styles, null, ['class'=>'form-control'])!!}
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
@endoption




