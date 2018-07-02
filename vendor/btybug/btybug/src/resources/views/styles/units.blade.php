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
            @if(!isset($items))
                @php
                    $default=$tpl->variations()->default();
                @endphp

            @else
                @php
                    $default=$items->default();
                @endphp

            @endif
            <input type="hidden" class="tpl-default-variation" value="{!! ($default)?$default->id:null !!}">
            <iframe class="magic-modal-iframe" style="width: 100%; height: 100%;"
                    src="{!! ($default)?url('/admin/uploads/gears/settings-iframe',$default->id):'javascript:void(0)'!!}"></iframe>
            <script type="template" id="magic-modal-options">
                @if(!isset($items))
                @foreach($tpl->variations()->all() as $item)
                <option value="{!! $item->id !!}"> {!! $item->title?$item->title:"no title" !!}</option>
                @endforeach
                @else
                @foreach($items as $item)
                <option value="{!! $item->id !!}"> {!! $item->title?$item->title:"no title" !!}</option>
                @endforeach
                @endif
            </script>
        </div>

        @if(!isset($ajax))
    </div>
@endif
<input type="hidden" id="iframe-url" value="/admin/uploads/gears/settings-iframe/">