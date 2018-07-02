<div class="container">
    <div class="contact-us-page">
        <div class="post-thumb">
            <img src="@if(isset($settings['image_url'])){{$settings['image_url']}}@else{{"http://www.pawstexarkana.org/images/about.jpg"}}@endif" alt="" class="{{(isset($settings['image_style'])&& $settings['image_style'] ) ? $settings['image_style'] : 'demo-img'}}">
        </div>
        <div class="post-content">
            <div class="entry-header text-center text-uppercase">

                <h2 class="text-left {{(isset($settings['title_style'])&& $settings['title_style'] ) ? $settings['title_style'] : 'demo-text'}}">@if(isset($settings['title'])){{$settings['title']}}@else Contact us @endif</h2>
            </div>
            <div class="entry-content">
                <p class="{{(isset($settings['text_style'])&& $settings['text_style'] ) ? $settings['text_style'] : 'demo-text'}}">@if(isset($settings['contact_us'])){{$settings['contact_us']}}@else{{"Contact Text"}}@endif
                </p>

            </div>

            <div class="leave-comment">
                <h4>SEND MASSAGE</h4>
                <form class="form-horizontal contact-form" method="post" action="">
                    <div class="form-group">
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Name" required="">
                        </div>
                        <div class="col-md-6">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <textarea class="form-control" rows="6" name="message" placeholder="Write Massage"></textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn send-btn"> SEND MASSAGE</button>
                </form>
            </div>
        </div>
    </div>
</div>


{!! BBstyle($_this->path.DS.'css'.DS.'style.css') !!}
{!! useDinamicStyle('texts') !!}
{!! useDinamicStyle('images') !!}