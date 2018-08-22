@php
    $userRepository = new \Btybug\User\Repository\UserRepository();
    $users = $userRepository->getBy('role_id',0);
@endphp
<div class="about-us-team">
    <h2>MEET THE TEAM</h2>
    <p>We are a team of dedicated professionals, ready to do what ever it takes to make your business grow.</p>
    <div class="row">
        @if(count($users))
            @foreach($users as $user)
                @if(isset($user->socialProfile))

                <div class="col-sm-4 col-xs-12">
                    <div class="member">
                        <div class="team-img-container">
                            @if($user->socialProfile->site_image)
                                <img class="image-team" src="{!! url($user->socialProfile->site_image) !!}"
                                     alt="Frank Furious">
                            @else
                                <img class="image-team" src="https://kriesi.at/themes/enfold/files/2013/04/team-2-300x300.jpg"
                                     alt="Frank Furious">
                            @endif

                            <div class="team-social">
                                <div class="team-social-inner">
                                    <a href="{!! url($user->username) !!}">GO to site</a>
                                </div>
                            </div>
                        </div>
                        <h3 class="name" itemprop="name">{!! $user->socialProfile->display_name !!}</h3>
                        <div class="job-title">{!! $user->socialProfile->proffesion or 'no Profession' !!}</div>
                        <div class="description">
                            <p>Cum sociis natoque penatibus et
                                magnis dis parturient montes, nascetur ridiculus mus. <strong>Lorem ipsum dolor</strong>
                                sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.
                            </p>
                        </div>
                    </div>
                </div>
                @endif
            @endforeach
        @endif
    </div>
</div>

{!! BBstyle($_this->path.DS.'css'.DS.'style.css',$_this) !!}