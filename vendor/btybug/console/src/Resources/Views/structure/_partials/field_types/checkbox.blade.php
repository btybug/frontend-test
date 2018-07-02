<fieldset class="bty-form-checkbox formgeneral" id="bty-input-id-{!! $field['id'] !!}">
    <div class="form-group">
        <label class="col-sm-12 control-label">
            {!! $field['label'] !!}
        </label>
        <div class="col-sm-12">
            @if(count(get_field_data($field)))
                @foreach(get_field_data($field) as $key => $item)
                    <div class="checkbox-inline1">
                        <label>
                            <input name="{!! $field['table_name']."_".$field['column_name'] !!}" value="{{ $key }}" type="checkbox" id="bty-cbox-{{ $key }}">
                            {{ $item }}
                        </label>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</fieldset>