<fieldset class="formgeneral" id="bty-input-id-{!!  (isset($source['field'])) ? $source['field']['id'] : "" !!}">
    <div class="form-group">
        <label class="col-md-12 control-label">{!! issetReturn($settings,'label',null) !!}</label>
        <div class="col-md-12">
            <div class="input-group">
                                    <span class="input-group-addon">
                    <i class="fa {!! issetReturn($settings,'icon',null) !!}"></i>
                </span>

                <input class="form-control1 " placeholder="{!! issetReturn($settings,'placeholder',null) !!}"
                       name="{!! (isset($source['field'])) ? print_field_name($source['field']) : "" !!}" type="password" value="">
                <span class="input-group-addon tooltip1">
                        <i class="fa {!! issetReturn($settings,'tooltip_icon',null) !!}"></i>
                    <span class="tooltiptext">{!! issetReturn($settings,'help',null) !!}</span>
            </span>
            </div>
        </div>
    </div>
</fieldset>

@if(isset($settings['password_confirmation']))
<fieldset class="formgeneral" id="bty-input-id-password-confirmation">
    <div class="form-group">
        <label class="col-md-12 control-label">Password Confirmation</label>
        <div class="col-md-12">
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-user"></i>
                </span>

                <input class="form-control1 " placeholder="Password Confirmation"
                       name="{!! (isset($source['field'])) ? print_field_name($source['field']).'_confirmation' : "password_confirmation" !!}" type="password" />
                <span class="input-group-addon tooltip1">
                        <i class="fa {!! issetReturn($settings,'tooltip_icon',null) !!}"></i>
                    <span class="tooltiptext">{!! issetReturn($settings,'help',null) !!}</span>
            </span>
            </div>
        </div>
    </div>
</fieldset>
@endif