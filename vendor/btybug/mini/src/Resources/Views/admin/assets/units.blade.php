@extends('btybug::layouts.mTabs',['index'=>'mini_assets'])
@section('tab')
   {{-- {{$units}}--}}
    <div class="ui-2_col">
        <div class="row">
            <div class="col-md-3 col-xs-12">
                <div class="left-menu">
                    <ul>
                        @if(count($units))
                            @foreach($units as $key => $val)
                                <li data-slug="{{ $val->slug }}" class="unit_rend">
                                    <span>{{ $val->title }}</span>
                                    <div class="button">
                                        <button class="btn btn-sm btn-success">Form</button>
                                        <button class="btn btn-sm btn-info preview" data-slug="{{ $val->slug }}">Preview</button>
                                    </div>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>
            <div class="col-md-9 col-xs-12">
                <div class="display-area">
                    <div class="settings text-right">
                        <a href="{{url('/admin/uploads/gears/settings/'.array_first($units)->slug.'.default')}}" class="btn btn-md btn-warning unit_settings">Settings</a>
                    </div>
                    <div class="right-iframe">

                        <iframe class="unit_preview" data-slug="{{array_first($units)->slug}}"  src="{{url('admin/mini/assets/'.array_first($units)->slug.'.default')}}" width="100%" style="min-height: 500px;">

                        </iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section("JS")
    <script>
        $(document).ready(function () {
            var url = window.location.href+'/';
           /* $('li.unit_rend').on('click',function (e) {
                e.preventDefault();
                var slug = $(this).data('slug');
                var url = window.location.href+'/';
                var uri = url+slug+'.default';
                $('iframe.unit_preview').attr('src',uri);
                $('iframe.unit_preview').data('slug',slug);

            })*/

            $('.preview').on('click',function (e) {
                e.preventDefault();
                var slug = $(this).data('slug');
                var url = window.location.href+'/';
                var uri = url+slug+'.default';
                var setting_url = '/admin/uploads/gears/settings/'+slug+'.default';
                $('a.unit_settings').attr('href',setting_url);
                $('iframe.unit_preview').attr('src',uri);
                $('iframe.unit_preview').attr('data-slug',slug);

            })


            $('a.unit_settings').on('click',function (e) {
                e.preventDefault();
                var url = $(this).attr('href');
                $('iframe.unit_preview').attr('src',url);
            })
        })


    </script>
@stop

<style>
    .ui-2_col {
        margin-top: 30px;
    }

    .ui-2_col .left-menu ul {
        border-right: 1px solid #c5c5c5;
        background-color: #3e81a5;
        padding-top: 20px !important;
        height: calc(100vh - 154px);
        overflow-x: auto;
    }

    .ui-2_col .left-menu li {
        background: #0000004f;
        width: 95%;
        height: 60px;
        margin-bottom: 11px;
        box-shadow: -4px 4px 5px 0 #00000073;
        margin-left: 11px;
        cursor: pointer;
        color: white;
        display: flex;
        justify-content: space-between;
        transition: 0.5s ease;
    }

    .ui-2_col .left-menu li > span {
        align-self: center;
        margin-left: 10px;
        font-size: 16px;
    }

    .ui-2_col .left-menu .button {
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: flex-end;
    }

    .ui-2_col .left-menu .button button {
        margin-right: 5px;
    }

    .ui-2_col .left-menu li:hover {
        background: rgba(0, 0, 0, 0.48);
    }
</style>



{{--
public function iframeRander($slug){
return BBRenderUnits($slug);
}--}}
