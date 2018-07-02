<section class="bty-welcome">
    <div class="container">
        <div class="row">

            @if(isset($settings["content_site_title"]))
                <h2>{!! $settings["content_site_title"] !!}</h2>
            @else
                <h2>Welcome To our Site!</h2>
            @endif
            <div class="col-md-2 col-md-offset-5"></div>
            <div class="clearfix"></div>
            @if(isset($settings["content_site_desc"]))
                <p class="desc">{!! $settings["content_site_desc"] !!}</p>
            @else
                <p class="desc">Many desktop publishing packages and web page editors now use Lorem Ipsum as their default
                    model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various
                    versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and
                    the like).
                </p>
            @endif

            <div class="our-site col-md-12 col-xs-12">
                @if(isset($settings['content_site_blocks']))
                    @foreach($settings['content_site_blocks']  as $key => $value)
                        <div class="col-md-4 col-xs-12 our-about">
                            <div>
                                <div>
                                    <i class="fa fa-line-chart" aria-hidden="true"></i>
                                </div>
                                <h4>{!! $value['title'] !!}</h4>
                                <p>{!! $value['description'] !!}</p>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-md-4 col-xs-12 our-about">
                        <div>
                            <h4>Experience</h4>
                            <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of
                                classical Latin literature from 45 BC, making it over 2000 years old.</p>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12 our-about">
                        <div>
                            <h4>Experience</h4>
                            <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of
                                classical Latin literature from 45 BC, making it over 2000 years old.</p>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12 our-about">
                        <div>
                            <h4>Experience</h4>
                            <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of
                                classical Latin literature from 45 BC, making it over 2000 years old.</p>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>
<style>
    .custom_margin_top_8{
        margin-top:8px;
    }
</style>