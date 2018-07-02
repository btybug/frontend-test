<fieldset class="bty-form-textarea formgeneral" id="bty-input-id-{!! $field['id'] !!}">
    <div class="form-group">
        <label class="col-sm-12 control-label">{{$field['label']}}</label>
        <div class="col-sm-12">
            {!! Form::textarea($field['table_name']."_".$field['column_name'],
            (isset($form_model[$field["table_name"].'_'.$field["column_name"]]) ? $form_model[$field["table_name"].'_'.$field["column_name"]] : $field['default_value']),
            ['cols' => '50','rows' => '4','class' => 'form-control1','title' => $field['help'],'placeholder' => $field['placeholder']]) !!}
        </div>
    </div>
</fieldset>