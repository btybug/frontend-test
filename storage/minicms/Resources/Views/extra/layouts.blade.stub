@extends('mini::layouts.app')
@extends('mini::layouts.mTabs',['index'=>'mini_my_site_extra_units'])
@section('tab')
    {{-- {{$layouts}}--}}
    <div class="ui-2_col">
        <div class="row">
            <div class="col-md-3 col-xs-12">
                <a class="btn"><i class="fa fa-plus"></i> add new layout</a>
                @include('multisite::admin.assets.layouts._partials.sidebar')
            </div>
            <div class="col-md-9 col-xs-12">
                @if($model)
                    <div class="display-area">
                        <div class="col-md-2">
                            {!! Form::select('variation',$variations,$model->slug.'.default',['class'=>'form-control','id'=>'layout-variations']) !!}
                        </div>
                        @include('multisite::admin.assets.layouts._partials.buttons')
                        <div class="right-iframe">
                            <iframe class="unit_preview" data-slug="{{$model->slug}}"
                                    src="{{url('admin/mini/assets/layouts/render/'.$model->slug.'.default')}}"
                                    width="100%" style="min-height: 500px;">

                            </iframe>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <input type="hidden" id="iframle-url" value="{!! url('admin/mini/assets/layouts/render/') !!}">
    <input type="hidden" id="live-preview-url" value="{!! route('mini_admin_assets_layouts_live') !!}">
@stop
@section("JS")
    <script>
        $(document).ready(function () {
            var url = window.location.href + '/';
            /* $('li.unit_rend').on('click',function (e) {
                 e.preventDefault();
                 var slug = $(this).data('slug');
                 var url = window.location.href+'/';
                 var uri = url+slug+'.default';
                 $('iframe.unit_preview').attr('src',uri);
                 $('iframe.unit_preview').data('slug',slug);

             })*/

            $('.preview').on('click', function (e) {
                e.preventDefault();
                var slug = $(this).data('slug');
                var url = window.location.href + '/';
                var uri = url + slug + '.default';
                var setting_url = '/admin/uploads/gears/settings/' + slug + '.default';
                $('a.unit_settings').attr('href', setting_url);
                $('iframe.unit_preview').attr('src', uri);
                $('iframe.unit_preview').attr('data-slug', slug);

            })


            $('a.unit_settings').on('click', function (e) {
                e.preventDefault();
                var url = $(this).attr('href');
                $('iframe.unit_preview').attr('src', url);
            });
            $('#layout-variations').on('change',function () {
                let ifUrl=$('#iframle-url').val()+'/'+$(this).val();
                let livUrl=$('#live-preview-url').val()+'/'+$(this).val();
                $('iframe.unit_preview').attr('src', ifUrl);
                $('#live-preview').attr('href', livUrl);
            });
        })


    </script>
@stop





{{--
public function iframeRander($slug){
return BBRenderlayouts($slug);
}--}}
