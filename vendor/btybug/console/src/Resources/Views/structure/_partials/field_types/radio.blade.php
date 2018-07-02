<fieldset class="bty-form-radio formgeneral" id="bty-input-id-{!! $field['id'] !!}">
    <div class="form-group">
        <label class="col-sm-12 control-label">{!! $field['label'] !!}</label>
        <div class="col-sm-12">
            @if(count(get_field_data($field)))
                @foreach(get_field_data($field) as $key => $item)
                    <div class="radio block">
                        <label>
                            <input name="{!! $field['table_name']."_".$field['column_name'] !!}"  value="{{ $key }}" type="radio" id="bty-gender-form-{{ $key }}">
                            {{$item}}
                        </label>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</fieldset>