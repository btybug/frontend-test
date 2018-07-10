@php
    $pages = $page->author->frontPages()->orderBy('sorting')->get();
@endphp

<header>
    <section id="top-navigation" class="container-fluid nopadding">
            <div class="row nopadding ident ui-bg-color01">
                <div class="col-md-4 vc-photo photo nopadding">
                    <div>
                        <a href="index.html">
                            <img src="https://neuethemes.net/preview/html/gridus/html/assets/custom/2.2.2/images/layouts/samuel/userpics/userpic01.jpg" alt="">
                        </a>
                    </div>

                </div>

                <div class="col-md-8 vc-name nopadding">
                    <div>
                        <div class="row nopadding name">
                            <div class="col-md-10 name-title"><h1 class="font-accident-two-extralight">Samuel Anderson</h1></div>
                            <div class="col-md-2 nopadding name-pdf">
                                <a href="#" class="hvr-sweep-to-right d-flex justify-content-center align-items-center w-100 h-100">
                                    <i class="fas fa-download" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                        <div class="row nopadding position">
                            <div class="col-md-10 position-title">

                                <section class="cd-intro">
                                    <h2 class="cd-headline clip is-full-width font-accident-two-light d-flex align-items-center">
                                        <span>The experienced </span>
                                        <span class="cd-words-wrapper">
                           <b class="is-visible">UI/UX Designer</b>
                           <b>Web Designer</b>
                           <b>Photographer</b>
                        </span>
                                    </h2>
                                </section>

                            </div>
                            <div class="col-md-2 nopadding pdf">
                                <a href="#" class="hvr-sweep-to-right d-flex justify-content-center align-items-center w-100 h-100">
                                    <i class="fa fa-behance" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                        <div class="profile-responsive-tab">
                            <button>
                                <div></div>
                            </button>
                            <div class="custom_div">
                                <ul id="nav" class="row nopadding cd-side-navigation">
                                    @if(count($pages))
                                        @php $color = 1; @endphp
                                        @foreach($pages as $k => $p)
                                            @if($k > 6)
                                                @php $color = 1; @endphp
                                            @endif

                                            <li class=" nopadding menuitem ui-menu-color0{{ $color }}">
                                                <a href="{!! url($p->url) !!}" class="hvr-sweep-to-bottom d-flex justify-content-center align-items-center w-100 h-100 flex-column">
                                                    @if($p->icon)
                                                        <i class="{{ $p->icon }}" aria-hidden="true"></i>
                                                    @else
                                                        <i class="fas fa-align-justify" aria-hidden="true"></i>
                                                    @endif
                                                    <span>{{ $p->title }}</span>
                                                </a>
                                            </li>
                                                @php $color++; @endphp
                                        @endforeach
                                    @endif

                                    {{--<li class=" nopadding menuitem ui-menu-color02">--}}
                                        {{--<a href="#" class="hvr-sweep-to-bottom d-flex justify-content-center align-items-center w-100 h-100 flex-column">--}}
                                            {{--<i class="fas fa-user-graduate" aria-hidden="true"></i>--}}
                                            {{--<span>resume</span></a>--}}
                                    {{--</li>--}}
                                    {{--<li class="nopadding menuitem ui-menu-color03">--}}
                                        {{--<a href="#" class="hvr-sweep-to-bottom d-flex justify-content-center align-items-center w-100 h-100 flex-column">--}}
                                            {{--<i class="fas fa-user-graduate" aria-hidden="true"></i>--}}
                                            {{--<span>portfolio</span></a>--}}
                                    {{--</li>--}}
                                    {{--<li class=" nopadding menuitem ui-menu-color04" >--}}
                                        {{--<a href="#" class="hvr-sweep-to-bottom d-flex justify-content-center align-items-center w-100 h-100 flex-column">--}}
                                            {{--<i class="fas fa-user-graduate" aria-hidden="true"></i>--}}
                                            {{--<span>contacts</span></a>--}}
                                    {{--</li>--}}
                                    {{--<li class=" nopadding menuitem ui-menu-color05" >--}}
                                        {{--<a href="#" class="hvr-sweep-to-bottom d-flex justify-content-center align-items-center w-100 h-100 flex-column">--}}
                                            {{--<i class="fas fa-user-graduate" aria-hidden="true"></i>--}}
                                            {{--<span>feedback</span></a>--}}
                                    {{--</li>--}}
                                    {{--<li class="nopadding menuitem ui-menu-color06" >--}}
                                        {{--<a href="#" class="hvr-sweep-to-bottom d-flex justify-content-center align-items-center w-100 h-100 flex-column">--}}
                                            {{--<i class="fas fa-user-graduate" aria-hidden="true"></i>--}}
                                            {{--<span>blog</span></a>--}}
                                    {{--</li>--}}
                                    {{--<li class=" nopadding menuitem ui-menu-color01">--}}
                                        {{--<a href="index.html" class="hvr-sweep-to-bottom d-flex justify-content-center align-items-center w-100 h-100 flex-column">--}}
                                            {{--<i class="fas fa-user-graduate" aria-hidden="true"></i>--}}
                                            {{--<span>home</span>--}}
                                        {{--</a>--}}
                                    {{--</li>--}}
                                </ul>
                                <ul class='hidden custom_ul'></ul>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </section>
</header>

{!! BBstyle($_this->path.DS.'css'.DS.'style.css',$_this) !!}
{!! BBscript($_this->path.DS.'js'.DS.'headlines.min.js',$_this) !!}
{!! BBscript($_this->path.DS.'js'.DS.'custom.js',$_this) !!}