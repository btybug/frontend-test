<div class="profile-skills {{(isset($settings['style'])&& $settings['style'] ) ? $settings['style'] : 'demo-column'}}">
    <div class="skill-head">
        <h3 class="@if(isset($settings['header_style'])&& $settings['header_style'])) {{$settings['header_style']}}@endif">
            <i class="fa fa-lightbulb-o" aria-hidden="true"></i>
            My Skills
        </h3>
        <p class="@if(isset($settings['desc_style'])&& $settings['desc_style'])) {{$settings['desc_style']}}@endif">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet, consequuntur dolore
            eligendi ex excepturi fuga in iusto laboriosam molestiae molestias natus numquam
            obcaecati optio sapiente sequi similique tempora tenetur veniam! Lorem ipsum dolor sit
            amet, consectetur adipisicing elit?
        </p>
    </div>
    <div class="skill-bottom">
        <ul class="skill-tag">
            <li class="tag-item tag-icon">
                <i class="fa fa-tags" aria-hidden="true"></i>
            </li>
            <li class="tag-item"><a href="#">#lorem</a></li>
            <li class="tag-item"><a href="#" class="active">#lorem</a></li>
            <li class="tag-item"><a href="#">#lorem</a></li>
            <li class="tag-item"><a href="#">#lorem ipsum</a></li>
            <li class="tag-item"><a href="#">#lorem</a></li>
            <li class="tag-item"><a href="#">#lorem lorem</a></li>
        </ul>
        <div class="clearfix"></div>
        <div class="prof-skills">
            <h3 class="@if(isset($settings['pr_skills_style'])&& $settings['pr_skills_style'])) {{$settings['pr_skills_style']}}@endif">professional skills</h3>
            <div class="skill_progress">
                <div class="row">
                    <div class="col-md-6 col-xs-12">
                        <div class="single">
                            <div class="skilled-tittle @if(isset($settings['pr_skill_name_style'])&& $settings['pr_skill_name_style'])) {{$settings['pr_skill_name_style']}}@endif">Lorem</div>
                            <div class="progress">
                                <div class="progress-bar bar-blue">
                                    <span class="percent">90%</span>
                                </div>
                            </div>
                        </div>
                        <div class="single">
                            <div class="skilled-tittle @if(isset($settings['pr_skill_name_style'])&& $settings['pr_skill_name_style'])) {{$settings['pr_skill_name_style']}}@endif">Lorem</div>
                            <div class="progress">
                                <div class="progress-bar bar-green">
                                    <span class="percent">60%</span>
                                </div>
                            </div>
                        </div>

                        <div class="single">
                            <div class="skilled-tittle @if(isset($settings['pr_skill_name_style'])&& $settings['pr_skill_name_style'])) {{$settings['pr_skill_name_style']}}@endif">Lorem</div>
                            <div class="progress">
                                <div class="progress-bar bar-red">
                                    <span class="percent">75%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <div class="single">
                            <div class="skilled-tittle @if(isset($settings['pr_skill_name_style'])&& $settings['pr_skill_name_style'])) {{$settings['pr_skill_name_style']}}@endif">Lorem</div>
                            <div class="progress">
                                <div class="progress-bar bar-black">
                                    <span class="percent">80%</span>
                                </div>
                            </div>
                        </div>
                        <div class="single">
                            <div class="skilled-tittle @if(isset($settings['pr_skill_name_style'])&& $settings['pr_skill_name_style'])) {{$settings['pr_skill_name_style']}}@endif">Lorem</div>
                            <div class="progress">
                                <div class="progress-bar bar-orange">
                                    <span class="percent">35%</span>
                                </div>
                            </div>
                        </div>

                        <div class="single">
                            <div class="skilled-tittle @if(isset($settings['pr_skill_name_style'])&& $settings['pr_skill_name_style'])) {{$settings['pr_skill_name_style']}}@endif">Lorem</div>
                            <div class="progress">
                                <div class="progress-bar bar-brown">
                                    <span class="percent">18%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>

{!! BBstyle($_this->path.DS.'css'.DS.'style.css',$_this) !!}
{!! BBscript($_this->path.DS.'js'.DS.'custom.js',$_this) !!}
{!! useDinamicStyle('containers') !!}
{!! useDinamicStyle('texts') !!}