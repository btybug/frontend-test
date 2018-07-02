{!! BBstyle($_this->path.DS.'css/main.css') !!}

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
                if(isset($settings['json_data']['manual']) && $settings['json_data']['manual']){
                    $arr = (count(explode(',',$settings['json_data']['manual']))) ? explode(',',$settings['json_data']['manual']) : [];
                }
                break;
        }
    }
@endphp


<div class="form-group">
    <div class="{!! issetReturn($settings,'radio_inp',null) !!}">
        <h4>
            @if(has_setting($settings, 'icon'))
                <i class="fa {!! issetReturn($settings,'icon',null) !!}"></i>
            @endif
            {!! issetReturn($settings,'label',null) !!}
            @if(has_setting($settings, 'tooltip_icon'))
                <span title="{!! issetReturn($settings,'help',null) !!}">
                <i class="fa {!! issetReturn($settings,'tooltip_icon',null) !!}"></i>
            </span>
            @endif
        </h4>
        <div class="input-group">
            @if(count($arr))
                @foreach($arr as $key => $item)
                    @if($item != "")
                        <div class="radio-input">
                            <input name="{!! (isset($source['field'])) ? print_field_name($source['field']) : "" !!}"
                                   type="radio" name="optionsRadios" id="optionsRadios-{{ $key }}" value="{{ $key }}">
                            <label for="optionsRadios-{{ $key }}">
                                {{$item}}
                            </label>
                        </div>
                    @endif
                @endforeach
            @endif
        </div>
    </div>
</div>






@if(isset($settings['manual_item']) && count($settings['manual_item']))
    <div class="form-group">
        <div class="{!! issetReturn($settings,'radio_inp',null) !!}">
            <div class="input-group">
                @foreach($settings['manual_item'] as $key => $item)
                    @if($item != "")
                        <div class="radio-input">
                            <input type="radio" name="optionsRadios" id="optionsRadios-{{ $key }}" value="{{ $key }}">
                            <label for="optionsRadios-{{ $key }}">
                                {{$item}}
                            </label>
                        </div>
                    @endif
                @endforeach

            </div>
         </div>
    </div>

@endif
