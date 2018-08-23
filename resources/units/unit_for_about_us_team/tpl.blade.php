@php
    $socialRepository = new \Btybug\FrontSite\Repository\SocialProfileRepository();
    $profiles = $socialRepository->getAll();
@endphp
<div class="about-us-team">
    <h2>MEET THE TEAM</h2>
    <p>We are a team of dedicated professionals, ready to do what ever it takes to make your business grow.</p>
    <div class="row">
        @foreach($profiles as $profile)
            <div class="col-sm-4 col-xs-12">
                <div class="member">
                    <div class="team-img-container">
                        @if($profile->site_image)
                            <img class="image-team" src="{!! url($profile->site_image) !!}"
                                 alt="Frank Furious">
                        @else
                            <img class="image-team" src="https://kriesi.at/themes/enfold/files/2013/04/team-2-300x300.jpg"
                                 alt="Frank Furious">
                        @endif

                        <div class="team-social">
                            <div class="team-social-inner">
                                <a href="{!! url($profile->user->site_url) !!}">GO to site</a>
                            </div>
                        </div>
                    </div>
                    <h3 class="name" itemprop="name">{!! $profile->display_name or $profile->user->username !!}</h3>
                    <div class="job-title">{!! $profile->proffesion or 'no Profession' !!}</div>
                    <div class="description">
                        <p>Cum sociis natoque penatibus et
                            magnis dis parturient montes, nascetur ridiculus mus. <strong>Lorem ipsum dolor</strong>
                            sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

{!! BBstyle($_this->path.DS.'css'.DS.'style.css',$_this) !!}