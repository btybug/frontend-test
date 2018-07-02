
<div class="col-md-3 left-column"  style="background: black;">
    @if(isset($settings['placeholders']['left_bar']))
        {!! BBRenderUnits($settings['placeholders']['left_bar']) !!}
    @endif
</div>
<div class="col-md-9">

    @if(Session::has('message'))
        <div style="position: absolute; width: 60%;left: 27%; z-index: 999999999;" class="m-t-10 alert {{ Session::get('alert-class', 'alert-info') }} alert-dismissible"
             role="alert">
            <button type="button" class="close" data-dismiss="alert"
                    aria-label="Close"><span aria-hidden="true">&times;</span>
            </button>
            {!! Session::get('message') !!}
            @php
                Session::forget('message');
                Session::forget('alert-class');
            @endphp
        </div>
    @endif
    @yield('content')
</div>