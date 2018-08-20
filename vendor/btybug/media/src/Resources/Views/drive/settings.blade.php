@extends('btybug::layouts.admin')
@section('content')
{!! BBmediaButton('gus',null,['html'=>'<div class="images-name d-flex mb-4">
    <div class="col-11 pr-0">
        <div class="image">
            <img class="image-main" src="/public/images/girl-cover.jpg" alt="">
            <img class="image-tmp" src="/public/images/girl-cover.jpg" alt="">
            <div class="site-image">
                <button class="btnsettingsModal  media-modal-open">Site Image</button>
            </div>
        </div>

    </div>
    <div class="col-1 p-0">

    </div>
</div>
']) !!}
@stop
