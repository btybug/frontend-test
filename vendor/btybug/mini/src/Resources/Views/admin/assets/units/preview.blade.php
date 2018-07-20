@extends('btybug::layouts.mTabs',['index'=>'mini_assets'])
@section('tab')
    {{-- {{$units}}--}}
    <div class="ui-2_col">
        <div class="row">
            <div class="col-md-3 col-xs-12">
                @include('multisite::admin.assets.units._partials.sidebar')
            </div>
            <div class="col-md-9 col-xs-12">
                @if($model)
                    <div class="display-area">
                        @include('multisite::admin.assets.units._partials.buttons')

                        <div class="right-iframe">
                            <div class="col-md-12">
                                <iframe class="unit_preview" data-slug="{{$model->slug}}"
                                        src="{{url('admin/mini/assets/units/render/'.$model->slug.'.default')}}"
                                        width="100%" style="min-height: 500px;">

                                </iframe>
                            </div>

                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    @include('multisite::admin.assets.units._partials.previewModal')

@stop
@section("JS")
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function () {
            $('body').on('click','.preview-modal',function () {
                $("#preview-modal").modal()
            });

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
            })
        })


    </script>
@stop





{{--
public function iframeRander($slug){
return BBRenderUnits($slug);
}--}}
