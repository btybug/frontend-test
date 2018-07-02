@php
    $indentificator=uniqid();
        if($value){
            switch ($type){
                case 'layouts':
                $obj=Btybug\btybug\Models\ContentLayouts\ContentLayouts::findByVariation($value);
                $variation=Btybug\btybug\Models\ContentLayouts\ContentLayouts::findVariation($value);
                break;
                case 'unit':
                $obj=\Btybug\btybug\Models\Painter\Painter::findByVariation($value);
                if($obj){
                $variation = $obj->variations(false)->find($value);
                }
                break;
            }
        }

@endphp
<div class="input-group">
    <div class="input-group-addon">{!! $text !!}</div>
    <input type="text"
           data-key="title"
           data-toggle="popover"
           readonly="readonly"
           data-id="{!! $indentificator !!}"
           class="page-layout-title form-control"
           title="info"
           style="width: 100%; background: #fff;"
           @if(isset($obj) && isset($variation)&& is_object($obj) && is_object($variation))
           value="{!! $obj->title !!}"
           data-content="
                   Type:{!! $type !!}
                   Name:{!! $obj->title !!}
                   Author:{!! $obj->author !!}
                   Uploaded:{!! BBgetDateFormat($obj->created_at) !!}
                   Variation:{!! $variation->title !!}
           @if(isset($variation->updated_at))
                   Last Modification:{!!BBgetDateFormat($variation->updated_at) !!}
           @endif
                   "
           @else
           value="Nothing Selected!!!"
            @endif
    >
    <div class="input-group-addon">
        <button type="button" data-action={!! $type !!}  data-key="{!! $indentificator !!}" {!! $atributes !!} >Change
        </button>
    </div>
    <div class="input-group-addon">
        <button class="clean-bb-button" data-id="{!! $indentificator !!}" type="button" >Clean</button>
    </div>
    <input
            class="bb-button-realted-hidden-input"
            type="hidden" {!! $array !!}
            value="{!! $value !!}"
            data-name="{!! $indentificator !!}"
            name="{!! $hiddenName !!}"/>
</div>

@foreach($getData as $attribute)
    <div class="form-group">
        <label class="col-md-10 control-label" for="textarea">{!! $attribute !!} data from {!! $value !!} variation</label>
        <div class="col-md-4">
            <textarea  readonly rows="1"  cols="70" name="{!! $hiddenName.'_'.$attribute !!}">@if(isset($variation)) @php $data=$variation->toArray(); @endphp {!! isset($data['settings'][$attribute])? $data['settings'][$attribute] :null !!} @endif </textarea>
        </div>
    </div>
@endforeach