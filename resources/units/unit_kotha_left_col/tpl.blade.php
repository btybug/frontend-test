@php
    $postRepository = new \BtyBugHook\Blog\Repository\PostsRepository();
    $posts = $postRepository->getAllByCount();
@endphp
<aside class="sidebar-left-col">
    <div class="about-me-widget">
        <div class="bg-img">
            <img src="https://res.cloudinary.com/sagacity/image/upload/c_crop,h_1068,w_1600,x_0,y_438/c_limit,dpr_1.0,f_auto,fl_lossy,q_80,w_1100/0615_COVER_MNTNS_KICH000884_cmyk_iqrrxg_xkeo8p.jpg"
                 alt="">
        </div>
        <div class="widget text-center">

            <div class="about-me-content">
                <div class="about-me-img">
                    <img src="{{ BBGetUserAvatar(issetReturn($settings,'selected_user',null)) }}" alt="" class="img-me img-circle">
                    <h2 class="text-uppercase">
                        {!! BBGetUser(issetReturn($settings,'selected_user',SUPERADMIN_ID),issetReturn($settings,'selected_user_col','username')) !!}
                    </h2>
                    <p>
                        {!! issetReturn($settings,'user_info','no info') !!}
                    </p>
                </div>
            </div>
            <div class="social-share">
                <ul class="list-inline">
                    @if(isset($settings['socials']))
                        @foreach($settings['socials'] as $key => $val)
                            <li class="{{$settings['socials'][$key]['style']}}"><a
                                        href="{{$settings['socials'][$key]['url']}}"><i
                                            class="fa {{$settings['socials'][$key]['icon']}}"></i></a></li>
                        @endforeach
                    @endif
                </ul>
            </div>
        </div>
    </div>
    <div class="widget news-letter-widget">
        <h2 class="widget-title text-uppercase text-center">Get Newsletter</h2>
        <form action="#">
            <input type="email" placeholder="Your email address" required="">
            <input type="submit" value="Subscribe Now" class="text-uppercase text-center btn btn-subscribe">
        </form>
    </div>

    <div class="widget widget-popular-post">
        <h3 class="widget-title text-uppercase text-center">Latest Posts</h3>
        <ul>
            @if(count($posts))
                @foreach($posts as $post)
                    <li>
                        <a href="{!! get_post_url($post->id) !!}" class="popular-img"><img
                                    src="{!! url($post->image) !!}"
                                    alt="">
                        </a>
                        <div class="p-content">
                            <h4><a href="{!! get_post_url($post->id) !!}" class="text-uppercase">{{ $post->title }}</a></h4>
                            <span class="p-date">{{ BBgetDateFormat($post->created_at) }}</span>
                        </div>
                    </li>
                @endforeach
            @endif
        </ul>
    </div>
    <div class="widget insta-widget">
        <h2 class="widget-title text-uppercase text-center">INSTAGRAM FEED</h2>
        <div class="all-photo">
            <ul id="rudr_instafeed" class="instagram-feed"></ul>
        </div>
    </div>
</aside>


{!! BBstyle($_this->path.DS.'css'.DS.'style.css') !!}
{!! BBscript($_this->path.DS.'js'.DS.'custom.js',$_this) !!}
{!! useDinamicStyle('texts') !!}