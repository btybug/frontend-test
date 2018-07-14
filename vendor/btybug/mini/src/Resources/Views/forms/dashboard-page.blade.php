<div class="form-group">
    <label for="text" class="control-label col-xs-4">Url</label>
    <div class="col-xs-8">
        <div class="input-group">
            <div class="input-group-addon">
                <i class="fa fa-address-card"></i>
            </div>
            {!! Form::text('url',null,['class'=>'form-control','readonly']) !!}
        </div>
    </div>
</div>
<div class="form-group">
    <label for="radio" class="control-label col-xs-4">Page access</label>
    <div class="col-xs-8">
        <label class="radio-inline">
            {!! Form::radio('page_access',0) !!}
            Public
        </label>
        <label class="radio-inline">
            {!! Form::radio('page_access',1) !!}
            page_access
        </label>
    </div>
</div>
<div class="form-group row">
    <div class="col-xs-offset-4 col-xs-8">
        <button name="submit" type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>