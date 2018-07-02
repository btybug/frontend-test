@option('general','f',$data)
<div class="bty-settings-panel">
    <div class="col-md-12">
        <div class="form-group">
            <div class="col-md-4">
                <label for="">Functions</label>
            </div>
            <div class="col-md-8">
                {!! Form::select('main_function',[
                '1'=>'Position',
                '2'=>'Destination'],null,['class'=>'form-control double-select','data-value'=>'main']) !!}
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<div id="position">
    <div class="bty-settings-panel">
        <div class="col-md-12">
            <div class="form-group">
                <div class="col-md-4">
                    <label for="">Position</label>
                </div>
                <div class="col-md-8">
                    <label for="">Longitude</label>
                    {!!Form::number('lng', null, ['class'=>'form-control']);!!}
                    <label for="">Latitude</label>
                    {!!Form::number('lat', null, ['class'=>'form-control']);!!}
                </div>
                <div class="clearfix"></div>
            </div>
        </div>

    </div>
</div>
<div id="destination" style="display:none;">
    <div class="bty-settings-panel">
        <div class="col-md-12">
            <div class="form-group">
                <div class="col-md-4">
                    <label for="">From</label>
                </div>
                <div class="col-md-8">
                    <label for="">Longitude</label>
                    {!!Form::number('from_lng', 'value', ['class'=>'form-control']);!!}
                    <label for="">Latitude</label>
                    {!!Form::number('from_lat', 'value', ['class'=>'form-control']);!!}
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="form-group">
                <div class="col-md-4">
                    <label for="">To</label>
                </div>
                <div class="col-md-8">
                    <label for="">Longitude</label>
                    {!!Form::number('to_lng', 'value',['class'=>'form-control']);!!}
                    <label for="">Latitude</label>
                    {!!Form::number('to_lat', 'value', ['class'=>'form-control']);!!}
                </div>
                <div class="clearfix"></div>
            </div>
        </div>

    </div>
</div>
<script>
    $( ".form-control" ).change(function() {
        if($(this).val() == 2) {
            $("#destination").show();
            $("#position").hide();
        }
        else if($(this).val() == 1){
            $("#position").show();
            $("#destination").hide();
        }
    });

</script>
@endoption
@option('general','s',$data)
<div class="bty-settings-panel">
    <div class="col-md-12">
        <div class="form-group">
            <div class="col-md-4">
                <label for="">Style</label>
            </div>
            <div class="col-md-8">
                {!!Form::select('style', array(
                   '0' => 'Roadmap',
                   '1' => 'Satellite',
                   '2' => 'Hybrid',
                   '3' => 'Terrain',
                ),null,['class'=>'form-control','data-value'=>'main']);!!}
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="form-group">
            <div class="col-md-4">
                <label for="">Width</label>
            </div>
            <div class="col-md-8">
                {!!Form::number('width', 'value', ['class'=>'form-control','data-value'=>'main']);!!}
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="form-group">
            <div class="col-md-4">
                <label for="">Height</label>
            </div>
            <div class="col-md-8">
                {!!Form::number('height', 'value', ['class'=>'form-control','data-value'=>'main']);!!}
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="form-group">
            <div class="col-md-4">
                <label for="">Header</label>
            </div>
            <div class="col-md-8">
                {!!Form::text('header', 'My Google Maps', ['class'=>'form-control']);!!}
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="form-group">
            <div class="col-md-4">
                <label for="">Control Elements</label>
            </div>
            <div class="col-md-8">
                <label for="">Zoom</label>
                {!!Form::checkbox('zoom');!!}<br>
                <label for="">Map Type</label>
                {!!Form::checkbox('mapType')!!}<br>
                <label for="">Scale</label>
                {!!Form::checkbox('scale')!!}<br>
                <label for="">Street</label>
                {!!Form::checkbox('street');!!}<br>
                <label for="">Rotate</label>
                {!!Form::checkbox('rotate');!!}<br>
                <label for="">Fullscreen</label>
                {!!Form::checkbox('fullscreen');!!}<br>
                <label for="">Drawing Manager</label>
                {!!Form::checkbox('drawing_manager');!!}
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
@endoption
@option('position','s',$data)
<div class="bty-settings-panel">
    <div class="col-md-12">
        <div class="form-group">
            <div class="col-md-4">
                <label for="">Icon Url</label>
            </div>
            <div class="col-md-8">
                {!!Form::text('icon', null, ['class'=>'form-control']);!!}
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="form-group">
            <div class="col-md-4">
                <label for="">Icon Size</label>
            </div>
            <div class="col-md-8">
                <label for="">Width</label>
                {!!Form::text('icon_width', null, ['class'=>'form-control']);!!}
                <label for="">Height</label>
                {!!Form::text('icon_height', null, ['class'=>'form-control']);!!}
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
@endoption
{!! BBstyle(public_path('css'.DS.'select2'.DS.'select2.min.css')) !!}
{!! BBstyle($_this->path.DS.'css'.DS.'style.css') !!}
{!! BBscript(public_path('js'.DS.'select2'.DS.'select2.full.min.js')) !!}
{!! BBscript($_this->path.DS.'js'.DS.'settings.js') !!}







