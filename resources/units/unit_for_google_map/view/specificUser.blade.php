<div class="bty-user-card-1">
    <div>
        <img src="http://www.imagefully.com/wp-content/uploads/2015/10/Nice-Best-Photography-Alone-Picture.jpg"
             alt="">
    </div>
    <div>
        @if(issetReturn($settings,'main_function') =='specificUser')
            @if(isset($settings['specificUser']) && \Btybug\User\User::find($settings['specificUser']))

                @if(isset($settings['name_type']) && $settings['name_type']=='static')
                    <h3>@if(isset($settings['specificUser']) && isset($settings['specificUserName'])) {!! $settings['specificUserName'] !!}@endif</h3>
                @endif

                @if(isset($settings['name_type']) && $settings['name_type']=='dynamic')
                    <h3>@if(isset($settings['specificUser'])) {!! \Btybug\User\User::find($settings['specificUser'])->username !!}@endif</h3>
                @endif
            @endif
        @endif
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
