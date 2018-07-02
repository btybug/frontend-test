@if(isset($settings['specificUsers']))
    @foreach($settings['specificUsers'] as $user_id)
        @php
            $user=\Btybug\User\User::find($user_id);
        @endphp
        <div class="bty-user-card-1">
            <div>
                <img src="http://www.imagefully.com/wp-content/uploads/2015/10/Nice-Best-Photography-Alone-Picture.jpg"
                     alt="">
            </div>
            <div>
                <h3>{!! ($settings['name_type']=='dynamic')?$user->username:((isset($settings['names'][$user_id]))?$settings['names'][$user_id]:'') !!}</h3>
                <h4>profession</h4>
                <p><i class="fa fa-map-marker"></i>location</p>
                <h5>Info</h5>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                    industry's standard dummy.</p>
            </div>
            <ul>
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
            </ul>
        </div>
        @endforeach
        @endif

