@if(!isset($ajax))
    <div class="row modal-data">
        <div class="col-md-3 modal-list-menu builder-modalleft">
            <ul class="filedcolumntype list-group listdatagroup" role="tablist">
                @foreach($units as $tpl)
                    <li class="menu-nav">
                        <div class="nav-bg"></div>
                        <div class="title">
                            <div class=icon>
                                <i class="fa fa-server" aria-hidden="true"></i>
                            </div>
                            <a href="javascript:void(0)" type="button" data-id="{!! $tpl->slug !!}"
                               data-action="units" data-key="{!! $data['key'] !!}" class="styles">
                                {{--<img src="{!! url('images/form-list.jpg') !!}">--}}
                                <span>{!! $tpl->title !!}</span></a>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="col-md-9 modal-list-content builder-modalright modal-data-items">
            <h5>Select Variation</h5>
            @if(!isset($items))
                <ul class="formlisting">
                    @foreach($tpl->variations()->all() as $item)
                        <li class="col-md-3 col-sm-3 col-xs-12">
                            <figure>
                                <a href="javascript:void(0)" data-key="{!! $data['key'] !!}"
                                   class="text-center item item-unit zzzzz" data-value="{!! $item->id !!}">
                                    <input type="hidden" data-action="units" data-input-type="{!! $tpl->input_type !!}"
                                           data-value="{!! $item->id !!}"/>
                                    <img src="{!! asset('public/images/default.jpg') !!}">
                                </a>
                                <p>
                                    <a href="javascript:void(0)"
                                       class="btn text-center item item-unit zzzzz custom_color_white"
                                       data-key="{!! $data['key'] !!}" data-value="{!! $item->id !!}">
                                        <input type="hidden" data-action="units"
                                               data-input-type="{!! $tpl->input_type !!}"
                                               data-value="{!! $item->id !!}"/>
                                        {!! $item->title?$item->title:"no title" !!}
                                    </a>
                                </p>
                                <figcaption>
                                    <div>
                                        <a href="{!! url('admin/resources/units/live-settings',$item->id) !!}"
                                           target="_blank">
                                            <i class="fa fa-pencil" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                    <div>
                                        <p>
                                            <a href="javascript:void(0)" data-key="{!! $data['key'] !!}"
                                               class="btn text-center item item-unit zzzzz custom_color_white"
                                               data-value="{!! $item->id !!}">
                                                <input type="hidden" data-action="units"
                                                       data-input-type="{!! $tpl->input_type !!}"
                                                       data-value="{!! $item->id !!}"/>
                                                {!! $item->title?$item->title:"no title" !!}
                                            </a>
                                        </p>
                                    </div>

                                </figcaption>
                            </figure>
                        </li>
                    @endforeach
                </ul>
            @else
                <ul class="formlisting">
                    @foreach($items as $item)
                        <li class="col-md-3 col-sm-3 col-xs-12">
                            <figure>
                                <a class="text-center item item-unit oooo" data-key="{!! $key !!}"
                                   data-value="{!! $item->id !!}">
                                    <input type="hidden" data-action="units" data-value="{!! $item->id !!}"/>
                                    <img src="{!! url('public/images/default.jpg') !!}">
                                </a>
                                <p>
                                    <a data-key="{!! $key !!}"
                                       class="btn text-center item item-unit zzzzz custom_color_white"
                                       data-value="{!! $item->id !!}">
                                        <input type="hidden" data-action="units" data-value="{!! $item->id !!}"/>
                                        {!! $item->title?$item->title:"no title" !!}
                                    </a>
                                </p>

                                <figcaption>
                                    <div>
                                        <a href="{!! url('admin/resources/units/live-settings',$item->id) !!}"
                                           target="_blank">
                                            <i class="fa fa-pencil" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                    <div>
                                        <p>
                                            <a data-key="{!! $key !!}"
                                               class="btn text-center item item-unit zzzzz custom_color_white"
                                               data-value="{!! $item->id !!}">
                                                <input type="hidden" data-action="units"
                                                       data-value="{!! $item->id !!}"/>
                                                {!! $item->title?$item->title:"no title" !!}
                                            </a>
                                        </p>
                                    </div>
                                </figcaption>
                            </figure>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
        @if(!isset($ajax))
    </div>
@endif