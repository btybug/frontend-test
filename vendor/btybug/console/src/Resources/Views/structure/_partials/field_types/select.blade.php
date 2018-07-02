<fieldset class="bty-form-select formgeneral" id="bty-input-id-{!! $field['id'] !!}">
    @php
        $fieldData = get_field_data($field);
    @endphp
    <div class="form-group">
        <label class="col-sm-12 control-label">{{$field['label']}}</label>
        <div class="col-sm-12">
            <div class="input-group">
                @if($field['icon'])
                    <span class="input-group-addon">
                    <i class="fa {{$field['icon']}}"></i>
                </span>
                @endif
                {!! Form::select($field['table_name']."_".$field['column_name'],($fieldData && count($fieldData))? $fieldData :[],
                    (isset($form_model[$field["table_name"].'_'.$field["column_name"]]) ? $form_model[$field["table_name"].'_'.$field["column_name"]] : null),
                ['placeholder' => $field['placeholder'],'class' => 'form-control1 input-md']) !!}
                @if($field['help'])
                    <span class="input-group-addon tooltip1">
                    <i class="fa {{isset($field['tooltip_icon']) ? $field['tooltip_icon'] : 'fa-question'}}"></i>
                    <span class="tooltiptext">{{$field['help']}}</span>
                </span>
                @endif
            </div>
        </div>
    </div>
</fieldset>