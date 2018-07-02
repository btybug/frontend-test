@php
    $arr = [];
    if(isset($settings['json_data']) && count($settings['json_data'])){
        switch ($settings['data_source']){
            case "related" :
                if(isset($settings['json_data']['data_source_table_name']) && isset($settings['json_data']['data_source_columns'])){
                    $table = $settings['json_data']['data_source_table_name'];
                    $column = $settings['json_data']['data_source_columns'];
                    if (\Schema::hasColumn($table, $column)) {
                        $result = \DB::table($table)->pluck($column,'id');
                        $arr =  (count($result)) ? $result->toArray() : [];
                    }
                }
                break;
            case "manual" :
                if(isset($settings['json_data']['manual'])){
                    $arr = $settings['json_data']['manual'];
                }
                break;
        }
    }
@endphp
<fieldset class="bty-form-radio formgeneral" id="bty-input-id-0">
    <div class="form-group">
        <label class="col-sm-12 control-label">{!! issetReturn($settings,'label',null) !!}</label>
        <div class="{!! issetReturn($settings,'select_inp',null) !!}">
            <select name="{!! (isset($source['field'])) ? print_field_name($source['field']) : "" !!}" class="form-control s2" multiple="multiple">
                <option value="{!! issetReturn($settings,'default_key',null) !!}">{!! issetReturn($settings,'default_text',null) !!}</option>
                @if(count($arr))
                    @foreach($arr as $key => $item)
                        <option   value="{{ $key }}" type="radio" id="bty-gender-form-{{ $key }}">  {{$item}}</option>
                    @endforeach
                @endif
            </select>
        </div>
        <div class="clearfix"></div>
    </div>
</fieldset>
{!! BBstyle('public/css/select2.min.css',$_this) !!}
{!! BBscript('public/js/select2.min.js') !!}
<script>
    window.frameElement.contentWindow.targetFunction(1);

    function targetFunction(is_called){
        if (is_called){
            if(typeof window.onload === 'function'){
                $('.s2').select2().trigger("change");
               return $('.s2').off('select2:select').select2();
            }else{
                window.onload = function(){
                   return  $('.s2').select2({
                        placeholder: 'Select an option'
                    });
                };
            }
        }
    }
</script>



