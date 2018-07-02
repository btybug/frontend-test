@if(isset($settings['input_type']))
    @if($settings['input_type'] == 'text')
        <input class="bty-input-label-7" type="text" placeholder="{!! issetReturn($settings,'placeholder') !!}">
        <label>
            {!! issetReturn($settings,'label',' ') !!}
        </label>
        <label><i class="fa fa-question" aria-hidden="true"></i></label>
        <p>Lorem ipsum Lorem</p>
    @elseif($settings['input_type'] == 'textarea')
        <textarea placeholder="This is an placeholder box" class="bty-textarea-1"></textarea>
    @elseif($settings['input_type'] == 'select')
        <div class="bty-input-select-3">
            <select>
                <option>Choose Option</option>
                <option>Option 1</option>
                <option>Option 2</option>
                <option>Option 3</option>
                <option>Option 4</option>
            </select>
        </div>
    @elseif($settings['input_type'] == 'radio')
        <input type="radio" class="bty-input-radio-5" id="bty-radio-5">
        <label for="bty-radio-5"><i class="fa fa-check" aria-hidden="true"></i></label>
    @elseif($settings['input_type'] == 'checkbox')
        <input type="checkbox" class="bty-input-checkbox-2" id="bty-checkbox-2">
        <label for="bty-checkbox-2">checkbox</label>
    @else
        No Html
    @endif
@endif



{!! BBstyle($_this->path.DS.'css'.DS.'styles.css') !!}
{!! BBscript($_this->path.DS.'js'.DS.'script.js',$_this) !!}
