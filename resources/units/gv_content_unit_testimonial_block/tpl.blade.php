<section class="bty-testimonials">
        <div class="row">
            <h2>Testimonials</h2>
            <div class="col-md-2 col-md-offset-5"></div>
            <div class="col-md-12">
                @if(isset($settings['testamonial']))
                    @foreach($settings['testamonial']  as $key => $value)
                        <div class="col-md-4 col-xs-12 person">
                            <div>
                                <img src="{!! $settings['testamonial'][$key]['image'] !!}" alt="">
                                <h4>{!! $settings['testamonial'][$key]['name'] !!}</h4>
                                <p class="custom_text_break">{!! $settings['testamonial'][$key]['description'] !!}</p>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-md-4 col-xs-12 person">
                        <div>
                            <img src="http://images.amcnetworks.com/amc.com/wp-content/uploads/2015/05/MM_714_JM_0623_1545.jpg"
                                 alt="">
                            <h4>Name</h4>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.typesetting
                                industry</p>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12 person">
                        <div>
                            <img src="http://images.amcnetworks.com/amc.com/wp-content/uploads/2015/05/MM_714_JM_0623_1545.jpg"
                                 alt="">
                            <h4>Name</h4>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.typesetting
                                industry</p>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12 person">
                        <div>
                            <img src="http://images.amcnetworks.com/amc.com/wp-content/uploads/2015/05/MM_714_JM_0623_1545.jpg"
                                 alt="">
                            <h4>Name</h4>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.typesetting
                                industry</p>
                        </div>
                    </div>
                @endif
            </div>
        </div>
</section>
<style>
    .custom_margin_top_8{
        margin-top:8px;
    }
</style>