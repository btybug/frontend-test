<div class="row modal-data">
    <div class="col-md-8 builder-modalright modal-data-items">
        @if(count($menus))
            <script type="template" id="magic-menu-otions" class="formlisting">
                @foreach($menus as $key=> $item)
                <option value="{{$item->id}}">{!! $item->name !!}</option>
                @endforeach
            </script>
        @endif
    </div>
</div>
<iframe class="magic-modal-iframe"  style="width: 100%; height: 100%;" src="javascript:void(0)"></iframe>
<input type="hidden" id="iframe-url" value="/admin/front-site/structure/menus/iframe-preview/">