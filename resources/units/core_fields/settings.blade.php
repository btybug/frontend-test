<div id="settings_div111">
    <div class="form-group my_rows1">
        <label for="newcontainer" class="col-sm-4 labelTitle">Select Input Type</label>
        <div class="col-sm-8">
            {!! Form::select('input_type',
                [
                    '' => 'Select',
                    'text' => 'Text input',
                    'textarea' => 'Textarea',
                    'select' => 'Select',
                    'checkbox' => 'Checkbox',
                    'radio' => 'Radio'
                ],
                 null,['class' => 'form-control']) !!}
        </div>
    </div>
</div>





