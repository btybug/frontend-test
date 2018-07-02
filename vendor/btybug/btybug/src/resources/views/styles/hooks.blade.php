<div class="row modal-data">
    <div class="col-md-9 modal-list-content builder-modalright modal-data-items">
        <ul class="formlisting">
            @foreach($hooks as $key => $item)

                <li class="col-md-3 col-sm-3 col-xs-12">
                    <figure>
                        <a class="text-center item item-unit oooo" data-key="{!! $item->id !!}"
                           data-value="{!! $item->id !!}">
                            <input type="hidden" data-action="hooks" data-value="{!! $item->id !!}"/>
                            <img src="{!! url('public/images/default.jpg') !!}">
                        </a>
                        <p>
                            <a data-key="{!! $item->id !!}"
                               class="btn text-center item item-unit zzzzz custom_color_white"
                               data-value="{!! $item->id !!}">
                                <input type="hidden" data-action="units" data-value="{!! $item->id !!}"/>
                                {!! $item->name?$item->name:"no Name" !!}
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
                                    <a data-key="{!! $item->id !!}"
                                       class="btn text-center item item-unit zzzzz custom_color_white"
                                       data-value="{!! $item->id !!}">
                                        <input type="hidden" data-action="hooks"
                                               data-value="{!! $item->id !!}"/>
                                        {!! $item->name?$item->name:"no title" !!}
                                    </a>
                                </p>
                            </div>
                        </figcaption>
                    </figure>
                </li>

                {{--<li>--}}
                {{--<a class="btn text-center item">--}}
                {{--<input type="hidden" data-action="hooks"--}}
                {{--data-value="{!! $item->id !!}"/><img src="{!! url('images/form-list2.jpg') !!}">--}}
                {{--</a>--}}
                {{--<span>{!! $item->name !!}</span>--}}
                {{--</li>--}}
            @endforeach
        </ul>
    </div>
</div>