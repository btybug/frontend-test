<div id="media-main-box">
    @if($html)
        {!! $html !!}
    @else
        <div style='height: 60px;display: flex;align-items: center;'>
    <span style='width: 60px;height: 100%;display: flex;border: 4px solid #fff;'>
        <img style='width: 100%;height: 100%;object-fit: cover;' class="tmp_{!!$name.'-'.$a !!}"
             src='http://www.tourisme.fr/images/otf_offices/857/172313-203553606325436-5429368-o.jpg' alt=''></span>
            <button type='button'
                    style='background-color: rgb(101, 101, 101); width: 210px;height: 100%;outline: none;border: none;'
                    class='btnsettingsModal  media-modal-open '><img
                        style='width: 100%;height: 100%;object-fit: contain;'

                        src='{!! url('public/images/icons/media.png') !!}' alt=''></button>
        </div>
    @endif
    <input type='hidden' class="bb-media-data-id"  data-id='{!! $name.'-'.$a !!}'>
    <input type='hidden' class="bb-media-main-image" {!! $value !!} id='{!! $name.'-'.$a!!}' name='{!!$name!!}'>
    @if(isset($attributes['tmp']) && $attributes['tmp'] == true)
        <input type='hidden' class="bb-media-tmp-image image-tmp" {!! $value_tmp !!} id='tmp_{!!$name.'-'.$a !!}' name='tmp_{!!$name!!}'>
    @endif
    <input type="hidden" id="user-media-url" value="{!! url('public/files/'.Auth::user()->username) !!}">
    <input type="hidden" id="user-media-url-relative" value="{!! url('public/files/') !!}">
</div>
