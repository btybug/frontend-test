@php
    $pages = $page->author->frontPages()->where('status','published')->orderBy('sorting')->get();
    $currentUrl=\Request::server('REQUEST_URI');
    $user = $page->author;
    $social_profile = $user->socialProfile;
@endphp
<div id="top-navigation" class="container-fluid nopadding profile">
    <div class="row nopadding ident ui-bg-color01">
        <div class="col-md-3 vc-photo photo nopadding">
            <div class="h-100">
                <div class="d-block d-md-none social-photo">
                    <div class=" social-icons d-flex  align-items-center flex-column-reverse">
                        <a class="secret" href="javascript:void(0);"><i class="fas fa-user-secret"></i></a>
                        <a class="twitter" href="javascript:void(0);"><i class="fab fa-twitter"></i></a>
                        <a class="facebook" href="javascript:void(0);"><i class="fab fa-facebook-f"></i></a>

                    </div>
                </div>
                @if($social_profile->site_image)
                    <img src="{!! url($social_profile->site_image) !!}" alt="{{ $social_profile->display_name }}">
                @else
                    <img src="/public/images/girl-cover.jpg" alt="{{ $social_profile->display_name }}">
                @endif
            </div>

        </div>

        <div class="col-md-9 main nopadding">
            <div class="h-100 d-flex flex-column">
                <div class="profile-top d-flex justify-content-between align-items-center flex-wrap">
                    <div class="title-profesion">
                        <div class="title d-flex align-items-center">
                            <h2>{{ $social_profile->display_name or $user->f_name . ' '. $user->l_name }}</h2>
                            <div class="circle d-flex align-items-center justify-content-center">
                                <span></span>
                            </div>
                        </div>

                        <p class="profesion">{{ $social_profile->proffesion }}</p>
                    </div>

                    <div class="icons d-flex flex-wrap align-items-center">
                        @if(Auth::check() && Auth::user()->id == $social_profile->user_id)
                            <a class="reply" href="{{route('front_page_account_profiles_save')}}">
                                <span><i class="fas fa-edit"></i></span>
                                <span class="count">207</span>
                            </a>
                        @else
                        <a class="reply" href="javascript:void(0);">
                            <span><i class="fas fa-share"></i></span>
                            <span class="count">207</span>
                        </a>
                        <a class="comment" href="javascript:void(0);"><span><i
                                        class="far fa-comment-alt"></i></span></a>
                        <a class="heart" href="javascript:void(0);"><span><i class="far fa-heart"></i></span></a>
                        <a class="ellipsis" href="javascript:void(0);">
                            <span class="d-none d-md-block"><i class="fas fa-ellipsis-v"></i></span>
                            <span class="caret-down d-block d-md-none"><i class="fas fa-caret-down"></i></span>
                        </a>
                `       @endif
                    </div>
                </div>
                <div class="profile-bottom d-flex justify-content-between align-items-center ">
                    <div class="info">
                        <div class="desc d-flex">
                            <q class="quote"></q>
                            <p>Don’T Walk Behind Me; I May Not Lead. Don’T Walk In Front Of Me; I May Not Follow. Just
                                Walk Beside Me And Be My Friend.</p>
                        </div>
                    </div>
                    <div class="d-none d-md-block">
                        <div class=" social-icons d-flex  align-items-center ">
                            <a class="secret" href="javascript:void(0);"><i class="fas fa-user-secret"></i></a>
                            <a class="twitter" href="javascript:void(0);"><i class="fab fa-twitter"></i></a>
                            <a class="facebook" href="javascript:void(0);"><i class="fab fa-facebook-f"></i></a>

                        </div>
                    </div>

                </div>
                <div class="ux-tabs">

                    <div class="row nopadding">
                        <div class="col-10 nopadding ">
                            <div class="stick-flex">
                                <div class="sticky-user d-none">
                                    <div class="img">
                                        @if($social_profile->site_image)
                                            <img src="{!! url($social_profile->site_image) !!}" alt="{{ $social_profile->display_name }}">
                                        @else
                                            <img src="/public/images/girl-cover.jpg" alt="{{ $social_profile->display_name }}">
                                        @endif
                                    </div>
                                    <div class="info d-flex align-items-center">
                                        <h2>Rania Dewell</h2>
                                        <a href="#">
                                            <span class="share"><i class="fas fa-share"></i></span>
                                        </a>
                                        <a class="reply" href="javascript:void(0);" id="dropdownMenuLink"
                                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <span class="caret-down"><i class="fas fa-caret-down"></i></span>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                            <a class="dropdown-item d-flex align-items-center" href="#"><i
                                                        class="far fa-heart"></i>Add to Favorite</a>
                                            <a class="dropdown-item d-flex align-items-center" href="#"><i
                                                        class="far fa-comment-alt"></i> Message</a>
                                            <a class="dropdown-item d-flex align-items-center" href="#"><i
                                                        class="far fa-flag"></i> Report</a>
                                        </div>
                                    </div>


                                </div>
                                <ul class="ux-tabs__headers">
                                    @foreach($pages as $page)
                                        <li class="ux-tabs__header @if($currentUrl==$page->url) active @endif">
                                            <a href="{!! url($page->url) !!}"
                                               class="hvr-sweep-to-bottom d-flex justify-content-center align-items-center w-100">
                                                <i class="{{ $page->icon }}"></i>
                                                <span>{!! $page->title !!}</span>
                                            </a>
                                        </li>
                                    @endforeach

                                </ul>
                            </div>

                        </div>
                        <div class="col-2 nopadding">
                            <div class="ux-tabs__dropdown">
                                <span class="icon"><i class="far fa-clone"></i></span>
                                <span class="more">More</span>
                                <i class="fas fa-angle-down"></i>

                                <ul class="ux-tabs__dropdown-items">
                                    <li class="ux-tabs__dropdown-item">Item 1</li>
                                </ul>
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
