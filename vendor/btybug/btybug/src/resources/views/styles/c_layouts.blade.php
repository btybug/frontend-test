<div class="row modal-data">
    {{--<div class="col-md-9 modal-list-content builder-modalright modal-data-items">--}}
        {{--<ul class="formlisting">--}}
            {{--@foreach($layouts as $key => $item)--}}
                {{--@if($selected)--}}
                    {{--@if($selected->slug != $item->slug)--}}
                        {{--<li class="col-md-3 col-sm-3 col-xs-12">--}}
                            {{--<figure>--}}
                                {{--<a class="btn text-center item item-unit" data-key="{!! $key !!}"--}}
                                   {{--data-value="{!! $item->slug !!}">--}}
                                    {{--<input type="hidden" data-action="layouts" data-value="{!! $item->slug !!}"/>--}}
                                    {{--<img src="{!! url('public/images/default.jpg') !!}">--}}
                                {{--</a>--}}
                                {{--<p>--}}
                                    {{--<a data-key="{!! $key !!}"--}}
                                       {{--data-action="layouts"--}}
                                       {{--class="btn text-center item item-unit custom_color_white"--}}
                                       {{--data-value="{!! $item->slug !!}">--}}
                                        {{--<input type="hidden" data-action="layouts" data-value="{!! $item->slug !!}"/>--}}
                                        {{--{!! $item->title?$item->title:"no title" !!}--}}
                                    {{--</a>--}}
                                {{--</p>--}}

                                {{--<figcaption>--}}
                                    {{--<div>--}}
                                        {{--<a href="{!! url('admin/resources/layouts/live-settings',$item->slug) !!}"--}}
                                           {{--target="_blank">--}}
                                            {{--<i class="fa fa-pencil" aria-hidden="true"></i>--}}
                                        {{--</a>--}}
                                    {{--</div>--}}
                                    {{--<div>--}}
                                        {{--<p>--}}
                                            {{--<a data-key="{!! $data['structure'] !!}"--}}
                                               {{--data-action="layouts"--}}
                                               {{--class="btn text-center customize-item custom_color_white"--}}
                                               {{--data-value="{!! $item->slug !!}">--}}
                                                {{--<input type="hidden" data-action="layouts"--}}
                                                       {{--data-value="{!! $item->slug !!}"/>--}}
                                                {{--{!! $item->title?$item->title:"no title" !!}--}}
                                            {{--</a>--}}
                                        {{--</p>--}}
                                    {{--</div>--}}
                                {{--</figcaption>--}}
                            {{--</figure>--}}
                        {{--</li>--}}
                    {{--@endif--}}
                {{--@else--}}
                    {{--<li class="col-md-3 col-sm-3 col-xs-12">--}}
                        {{--<figure>--}}
                            {{--<a class="btn text-center item item-unit" data-key="{!! $key !!}"--}}
                               {{--data-action="layouts" data-value="{!! $item->slug !!}">--}}

                                {{--<input type="hidden" data-action="layouts" data-value="{!! $item->slug !!}"/>--}}
                                {{--<img src="{!! url('public/images/default.jpg') !!}">--}}
                            {{--</a>--}}
                            {{--<p>--}}
                                {{--<a data-key="{!! $key !!}"--}}
                                   {{--class="btn text-center item item-unit custom_color_white"--}}
                                   {{--data-action="layouts" data-value="{!! $item->slug !!}">--}}
                                    {{--<input type="hidden" data-action="layouts" data-value="{!! $item->slug !!}"/>--}}
                                    {{--{!! $item->title?$item->title:"no title" !!}--}}
                                {{--</a>--}}
                            {{--</p>--}}

                            {{--<figcaption>--}}
                                {{--<div>--}}
                                    {{--<a href="{!! url('admin/resources/layouts/live-settings',$item->slug) !!}"--}}
                                       {{--target="_blank">--}}
                                        {{--<i class="fa fa-pencil" aria-hidden="true"></i>--}}
                                    {{--</a>--}}
                                {{--</div>--}}
                                {{--<div>--}}
                                    {{--<p>--}}
                                        {{--<a--}}
                                                {{--data-key="{!! $data['structure'] !!}"--}}
                                                {{--data-action="layouts"--}}
                                                {{--class="btn text-center customize-item custom_color_white"--}}
                                                {{--data-value="{!! $item->slug !!}">--}}
                                            {{--<input type="hidden" data-action="layouts"--}}
                                                   {{--data-value="{!! $item->slug !!}"/>--}}
                                            {{--{!! $item->title?$item->title:"no title" !!}--}}
                                        {{--</a>--}}
                                    {{--</p>--}}
                                {{--</div>--}}
                            {{--</figcaption>--}}
                        {{--</figure>--}}
                    {{--</li>--}}
                {{--@endif--}}


            {{--@endforeach--}}
        {{--</ul>--}}
    {{--</div>--}}

    <div class="col-md-3 modal-list-menu builder-modalleft">
        <ul class="filedcolumntype list-group listdatagroup" role="tablist">
            @foreach($layouts as $key => $item)
                @if($selected)
                    @if($selected->slug != $item->slug)
            <li class="menu-nav">
                <div class="nav-bg"></div>
                <div class="title">
                    <div class=icon>
                        <i class="fa fa-server" aria-hidden="true"></i>
                    </div>
                    <a href="javascript:void(0)" type="button" class="page-section-item" data-key="{!! $key !!}" data-action="page_sections" data-id="{!! $item->slug !!}">
                        <span>  {!! $item->title?$item->title:"no title" !!}</span></a>
                </div>
            </li>
                @endif
                @else
                    <li class="menu-nav">
                        <div class="nav-bg"></div>
                        <div class="title">
                            <div class=icon>
                                <i class="fa fa-server" aria-hidden="true"></i>
                            </div>
                            <a href="javascript:void(0)" type="button" data-id="{!! $item->slug !!}" class="">
                                <input type="hidden" data-action="layouts" data-value="{!! $item->slug !!}"/>
                                <span>  {!! $item->title?$item->title:"no title" !!}</span></a>
                        </div>
                    </li>

                    @endif
                @endforeach

        </ul>
    </div>


    <div class="col-md-9 modal-list-content builder-modalright modal-data-items">
        <iframe id="iframepreview" class="magic-modal-iframe"  style="width: 100%; height: 100%;" src="{!!'javascript:void(0)'!!}"></iframe>
    </div>
</div>