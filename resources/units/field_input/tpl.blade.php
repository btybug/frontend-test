<div class="form-horizontal">
    <fieldset>
        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="textinput">{!! issetReturn($settings,'label') !!}</label>
            <div class="col-md-4">
                <div class="input-group">
                    @if(isset($settings['icon']))
                        <span class="input-group-addon "><i class="fa {!! issetReturn($settings,'icon') !!}"></i></span>
                    @endif
                    <input id="textinput"
                           name="{!! (isset($source['field'])) ? print_field_name($source['field']) : "" !!}"
                           type="text" placeholder="{!! issetReturn($settings,'placeholder') !!}"
                           class="form-control input-md">
                    <span class="help-block">{!! issetReturn($settings,'help') !!}</span>
                </div>
            </div>
        </div>

    </fieldset>
</div>

