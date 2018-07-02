<div class="row">
    <div class="form-group my_rows1">
        <label class="col-md-4 control-label" for="loginbutton">Select Classify</label>
        <div class="col-md-8">
            {!! Form::select('classify',['' => 'Select Classify'] + get_classifiers(true),null,['class' => 'form-control']) !!}
        </div>
    </div>
</div>
