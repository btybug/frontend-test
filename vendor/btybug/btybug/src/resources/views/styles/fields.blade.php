<div class="row modal-data">
    <div class="col-md-8 builder-modalright modal-data-items">
        @if(count($fields))
            <ul class="formlisting">
                @foreach($fields as $key=> $item)
                    <li>
                        <a class="btn item" data-key="{!! $type !!}" href="javascript:void(0)">
                            <input type="hidden" data-action="fields" data-value="{!! $item->id !!}"/>
                            <img src="{!! url('public/images/form-list2.jpg') !!}"></a>
                        <span>{!! $item->name !!}</span>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
</div>