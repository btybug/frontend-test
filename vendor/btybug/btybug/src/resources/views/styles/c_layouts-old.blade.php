<div class="row modal-data">
    <div class="col-md-9 modal-list-content builder-modalright modal-data-items">
        <ul class="formlisting">
            @foreach($layouts as $key => $item)
                @if($selected)
                    @if($selected->slug != $item->slug)
                        <li class="col-md-3 col-sm-3 col-xs-12">
                            <figure>
                                <a class="btn text-center item item-unit" data-key="{!! $key !!}"
                                   data-value="{!! $item->slug !!}">
                                    <input type="hidden" data-action="layouts" data-value="{!! $item->slug !!}"/>
                                    <img src="{!! url('public/images/default.jpg') !!}">
                                </a>
                                <p>
                                    <a data-key="{!! $key !!}"
                                       data-action="layouts"
                                       class="btn text-center item item-unit custom_color_white"
                                       data-value="{!! $item->slug !!}">
                                        <input type="hidden" data-action="layouts" data-value="{!! $item->slug !!}"/>
                                        {!! $item->title?$item->title:"no title" !!}
                                    </a>
                                </p>

                                <figcaption>
                                    <div>
                                        <a href="{!! url('admin/resources/layouts/live-settings',$item->slug) !!}"
                                           target="_blank">
                                            <i class="fa fa-pencil" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                    <div>
                                        <p>
                                            <a data-key="{!! $data['structure'] !!}"
                                                    data-action="layouts"
                                                    class="btn text-center customize-item custom_color_white"
                                                    data-value="{!! $item->slug !!}" >
                                                <input type="hidden" data-action="layouts"
                                                       data-value="{!! $item->slug !!}"/>
                                                {!! $item->title?$item->title:"no title" !!}
                                            </a>
                                        </p>
                                    </div>
                                </figcaption>
                            </figure>
                        </li>
                    @endif
                @else
                    <li class="col-md-3 col-sm-3 col-xs-12">
                        <figure>
                            <a class="btn text-center item item-unit" data-key="{!! $key !!}"
                               data-action="layouts" data-value="{!! $item->slug !!}">

                                <input type="hidden" data-action="layouts" data-value="{!! $item->slug !!}"/>
                                <img src="{!! url('public/images/default.jpg') !!}">
                            </a>
                            <p>
                                <a data-key="{!! $key !!}"
                                   class="btn text-center item item-unit custom_color_white"
                                   data-action="layouts" data-value="{!! $item->slug !!}">
                                    <input type="hidden" data-action="layouts" data-value="{!! $item->slug !!}"/>
                                    {!! $item->title?$item->title:"no title" !!}
                                </a>
                            </p>

                            <figcaption>
                                <div>
                                    <a href="{!! url('admin/resources/layouts/live-settings',$item->slug) !!}"
                                       target="_blank">
                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                    </a>
                                </div>
                                <div>
                                    <p>
                                        <a
                                                data-key="{!! $data['structure'] !!}"
                                                data-action="layouts"
                                                class="btn text-center customize-item custom_color_white"
                                                data-value="{!! $item->slug !!}">
                                            <input type="hidden" data-action="layouts"
                                                   data-value="{!! $item->slug !!}"/>
                                            {!! $item->title?$item->title:"no title" !!}
                                        </a>
                                    </p>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                @endif


            @endforeach
        </ul>
    </div>
</div>