<div class="col-md-8">
        <div class="about-us-page">
            <div class="about-img">
                <img src="@if(isset($settings['image_url'])){{$settings['image_url']}}@else{{"http://www.realprohealthmassager.com/images/aboutuspic.jpg"}}@endif" alt="" class="{{(isset($settings['image_style'])&& $settings['image_style'] ) ? $settings['image_style'] : 'demo-img'}}">
            </div>
            <div class="about-us-content">
                <div class="entry-header text-center text-uppercase">
                    <h2 class="text-left {{(isset($settings['title_style'])&& $settings['title_style'] ) ? $settings['title_style'] : 'demo-text'}}">@if(isset($settings['title'])){{$settings['title']}}@else About us @endif</h2>
                </div>
                <div class="about-me">
                    <div class="about-me-text">
                        <p class="{{(isset($settings['text_style'])&& $settings['text_style'] ) ? $settings['text_style'] : 'demo-text'}}">@if(isset($settings['about_me'])){{$settings['about_me']}}@else{{"About You"}}@endif</p>
                    </div>
                </div>
            </div>
        </div>
</div>


{!! BBstyle($_this->path.DS.'css'.DS.'style.css') !!}

{!! useDinamicStyle('texts') !!}
{!! useDinamicStyle('images') !!}