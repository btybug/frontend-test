<section id="skills-flato">
    <div class="container">
        <div class="skills">
            <div class="heading">
                <h2 class="title {{(isset($settings['header_style'])&& $settings['header_style'] ) ? $settings['header_style'] : 'demo-column'}}">TECHNICAL SKILLS</h2>
                <p>I can say i’m quite good at</p>
            </div>
            <div class="content-skills">
                <div class="row">
                    <?php $i = 1 ?>
                    @if(isset($settings['work']))
                        @foreach($settings['work'] as $key=>$work)
                            <div class="col-md-4 skillsArea @if($i % 3 == 0){{"column_last"}}@elseif($i % 3 == 1){{"column_first"}}@endif">
                                <div class="skills">

                                <span class="chart">
                                    <span class="percent {{(isset($settings['percent_style'])&& $settings['percent_style'] ) ? $settings['percent_style'] : 'demo-column'}}">@if(isset($work['percent'])){{$work['percent']}}@else 0 @endif</span>
                                </span>

                                    <h4 class="{{(isset($settings['skill_style'])&& $settings['skill_style'] ) ? $settings['skill_style'] : 'demo-column'}}">@if(isset($work['skill_name'])){{$work['skill_name']}}@else Skill @endif</h4>
                                    <p class="{{(isset($settings['desc_style'])&& $settings['desc_style'] ) ? $settings['desc_style'] : 'demo-column'}}">@if(isset($work['desc'])){{$work['desc']}}@else Description @endif</p>
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

{!! BBstyle($_this->path.DS.'css'.DS.'style.css') !!}
{!! useDinamicStyle('containers') !!}
{!! useDinamicStyle('texts') !!}
{!! useDinamicStyle('images') !!}