
    <div class="{{(isset($settings['style'])&& $settings['style'] ) ? $settings['style'] : 'demo-column'}}">
        <section id="skills-flato" class="{{(isset($settings['skill_container_style'])&& $settings['skill_container_style'] ) ? $settings['skill_container_style'] : ''}}">
            <div class="container">
                <div class="skills">
                    <div class="heading">
                        <h2 class="title {{(isset($settings['skill_header_style'])&& $settings['skill_header_style']) ? $settings['skill_header_style'] : ''}}">@if(isset($settings['skill_header_name'])){{$settings['skill_header_name']}}@else TECHNICAL SKILLS @endif</h2>
                        <p>I can say i’m quite good at</p>
                    </div>
                    <div class="content-skills">
                        <div class="row">
                            <?php $i = 1 ?>
                            @if(isset($settings['skill']))
                                @foreach($settings['skill'] as $key=>$skill)
                                    <div class="col-md-4 skillsArea @if($i % 3 == 0){{"column_last"}}@elseif($i % 3 == 1){{"column_first"}}@endif">
                                        <div class="skills">
                                            <span class="chart">
                                                <span class="percent {{(isset($settings['skill_percent_style'])&& $settings['skill_percent_style'] ) ? $settings['skill_percent_style'] : ''}}">@if(isset($skill['percent'])){{$skill['percent']}}@else 0 @endif</span>
                                            </span>
                                            <h4 class="{{(isset($settings['skill_style'])&& $settings['skill_style'] ) ? $settings['skill_style'] : ''}}">@if(isset($skill['skill_name'])){{$skill['skill_name']}}@else Skill @endif</h4>
                                            <p class="{{(isset($settings['skill_desc_style'])&& $settings['skill_desc_style'] ) ? $settings['skill_desc_style'] : ''}}">@if(isset($skill['desc'])){{$skill['desc']}}@else Description @endif</p>
                                        </div>
                                    </div>
                                    <?php $i++ ?>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="experience-flato" class="{{(isset($settings['exp_container_style'])&& $settings['exp_container_style'] ) ? $settings['exp_container_style'] : ''}}">
            <div class="container">
                <div class="experience">
                    <div class="heading">
                        <h2 class="title {{(isset($settings['exp_header_style'])&& $settings['exp_header_style'] ) ? $settings['exp_header_style'] : ''}}">@if(isset($settings['exp_header_name'])){{$settings['exp_header_name']}}@else  @endif</h2>
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
                                            <h4 class="{{(isset($settings['exp_company_style'])&& $settings['exp_company_style'] ) ? $settings['exp_company_style'] : ''}}">@if(isset($work['company_name'])){{$work['company_name']}}@else Company Name @endif</h4>
                                            <h5  class="{{(isset($settings['exp_position_style'])&& $settings['exp_position_style'] ) ? $settings['exp_position_style'] : ''}}">@if(isset($work['position'])){{$work['position']}}@else Position @endif</h5>
                                            <p  class="{{(isset($settings['exp_desc_style'])&& $settings['exp_desc_style'] ) ? $settings['exp_desc_style'] : ''}}">@if(isset($work['desc'])){{$work['desc']}}@else Description @endif</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="clearfix"></div>

{!! BBstyle($_this->path.DS.'css'.DS.'style.css',$_this) !!}
{!! BBscript($_this->path.DS.'js'.DS.'custom.js',$_this) !!}
{!! useDinamicStyle('containers') !!}
{!! useDinamicStyle('texts') !!}
{!! useDinamicStyle('images') !!}