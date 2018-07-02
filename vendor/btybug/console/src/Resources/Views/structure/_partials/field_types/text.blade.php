<fieldset class="bty-form-text formgeneral" id="bty-input-id-{!! $field['id'] !!}">
    <div class="form-group">
        <label class="col-md-12 control-label">{!! $field['label'] !!}</label>
        <div class="col-md-12">
            <div class="input-group">
                @if($field['icon'])
                    <span class="input-group-addon">
                    <i class="fa {{$field['icon']}}"></i>
                </span>
                @endif
                    {!! Form::text($field['table_name']."_".$field['column_name'],
                        (isset($form_model[$field["table_name"].'_'.$field["column_name"]]) ? $form_model[$field["table_name"].'_'.$field["column_name"]] : $field['default_value']),
                        ['class' => 'form-control1 icon','placeholder' => $field['placeholder']]) !!}
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

