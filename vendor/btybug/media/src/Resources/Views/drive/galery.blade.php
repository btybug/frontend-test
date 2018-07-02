<div style='height: 60px;display: flex;align-items: center;'><span
            style='width: 60px;height: 100%;display: flex;border: 4px solid #fff;'><img
                style='width: 100%;height: 100%;object-fit: cover;'
                class="tmp_{!!$name.'-'.$a !!}"
                src='http://www.tourisme.fr/images/otf_offices/857/172313-203553606325436-5429368-o.jpg' alt=''></span>
    <button type='button'
            style='background-color: rgb(101, 101, 101); width: 210px;height: 100%;outline: none;border: none;'
            class='btnsettingsModal  media-modal-open' data-id='{!! $name.'-'.$a !!}'><img
                style='width: 100%;height: 100%;object-fit: contain;'

                src='http://dpskurukshetra.com/wp-content/uploads/2018/01/Camara-GALLERY-Icon.png' alt=''></button>
</div>
<input type='hidden' {!! $value !!} id='{!! $name.'-'.$a!!}' name='{!!$name!!}'>
<input type='hidden' {!! $value_tmp !!} id='tmp_{!!$name.'-'.$a !!}' name='tmp_{!!$name!!}'>