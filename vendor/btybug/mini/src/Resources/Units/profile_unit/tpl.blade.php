@php
    $pages = $page->author->frontPages()->where('status','published')->orderBy('sorting')->get();
@endphp
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
                <div class="row nopadding name position">
                    <div class="col-md-10" >
                        <div class="name-title">
                            <h1 class="font-accident-two-extralight">Samuel Anderson</h1>
                        </div>
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
                    </div>
                    <div class="col-md-2 nopadding name-pdf">
                        <div class="d-flex flex-column justify-content-around">
                            <div class="name-pdf d-flex">
                                <a href="#" class="hvr-sweep-to-right d-flex justify-content-center align-items-center w-100 ">
                                    <i class="fas fa-user-plus"></i></i>
                                </a>

                                <a href="#" class="hvr-sweep-to-right d-flex justify-content-center align-items-center w-100 ">
                                    <i class="fas fa-envelope"></i>
                                </a>
                            </div>
                            <div class="pdf d-flex">
                                <a href="#" class="hvr-sweep-to-right d-flex justify-content-center align-items-center w-100 ">
                                    <i class="fas fa-user-friends"></i>
                                </a>
                                <a href="#" class="hvr-sweep-to-right d-flex justify-content-center align-items-center w-100 ">
                                    <i class="fas fa-chart-line"></i>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="ux-tabs">
                    <div class="row nopadding">
                        <div class="col-10 nopadding">
                            <ul class="ux-tabs__headers">
                                @if(count($pages))
                                    @php $color = 1; @endphp
                                    @foreach($pages as $k => $p)
                                        @if($color > 6)
                                            @php $color = 1; @endphp
                                        @endif

                                        <li class="ux-tabs__header ui-menu-color0{{ $color }}">
                                            <a href="{!! url($p->url) !!}" class="hvr-sweep-to-bottom d-flex justify-content-center align-items-center w-100 flex-column">
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
                            </ul>
                        </div>
                        <div class="col-2 nopadding">
                            <div class="ux-tabs__dropdown">
                                <span class="more">More tabs</span> <i class="fas fa-caret-down"></i><strong>(<span class="ux-tabs__dropdown-count"></span>)</strong>
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
</section>

{!! BBstyle($_this->path.DS.'css'.DS.'style.css',$_this) !!}
{!! BBscript($_this->path.DS.'js'.DS.'headlines.min.js',$_this) !!}
{!! BBscript($_this->path.DS.'js'.DS.'custom.js',$_this) !!}