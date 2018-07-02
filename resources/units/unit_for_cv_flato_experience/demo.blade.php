<section id="experience-flato" class="{{(isset($settings['style'])&& $settings['style'] ) ? $settings['style'] : 'demo-column'}}">
    <div class="container">
        <div class="experience">
                <div class="heading">
                    <h2 class="title {{(isset($settings['header_style'])&& $settings['header_style'] ) ? $settings['header_style'] : 'demo-column'}}">Work Experience</h2>
                    <p>My previous associations</p>
                </div>
            <div class="content-experience">
                @if(isset($settings['work']))
                    @foreach($settings['work'] as $key=>$work)
                    <div class="row details">
                        <div class="col-xs-12 col-sm-3 col-md-2 col-lg-2">
                            <div class="workYear">@if(isset($work['from'])){{$work['from']}}@else From @endif<br> @if(isset($work['to'])){{$work['to']}}@else To @endif</div>
                        </div>
                        <div class="col-xs-12 col-sm-9 col-md-10 col-lg-10 rightArea">
                            <div class="arrowpart"></div>
                            <div class="exCon">
                                <h4 class="{{(isset($settings['company_style'])&& $settings['company_style'] ) ? $settings['company_style'] : 'demo-column'}}">@if(isset($work['company_name'])){{$work['company_name']}}@else Company Name @endif</h4>
                                <h5  class="{{(isset($settings['position_style'])&& $settings['position_style'] ) ? $settings['position_style'] : 'demo-column'}}">@if(isset($work['position'])){{$work['position']}}@else Position @endif</h5>
                                <p  class="{{(isset($settings['desc_style'])&& $settings['desc_style'] ) ? $settings['desc_style'] : 'demo-column'}}">@if(isset($work['desc'])){{$work['desc']}}@else Description @endif</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>

</section>

{!! BBstyle($_this->path.DS.'css'.DS.'style.css') !!}
{!! useDinamicStyle('containers') !!}
{!! useDinamicStyle('texts') !!}
{!! useDinamicStyle('images') !!}