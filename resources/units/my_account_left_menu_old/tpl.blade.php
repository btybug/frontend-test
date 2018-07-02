@php
    $page = BBgetFrontPage('my-account');
@endphp
<div class="profile-user">
    <div class="profile-img">
        <img src="https://dnatesting.com/wp-content/uploads/2010/01/1-21-2009_IDG-Blog-1000x562.jpg"
             alt="">
    </div>
    <div class="profile-name">
        <h2>{{ Auth::user()->username }}</h2>
        <p>
            <span class="small-info">{{ Auth::user()->email }}</span>
        </p>
    </div>
    <ul class="profile-menu">
        @if(isset($page) && count($page->childs))
            @foreach($page->childs as $child)
                @if(count($child->childs))
                    <li class="item">
                        <a href="javascript:void(0);" class="sublink">{{ $child->title }}<i class="fa fa-chevron-down"></i></a>
                        <ul class="cute">
                            @foreach($child->childs as $value)
                                <li class="subitem"><a href="{{ $value->url }}">{{ $value->title }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                @else
                    <li class="item"><a href="{{ $child->url }}">{{ $child->title }}</a></li>
                @endif

            @endforeach
        @endif
    </ul>
    <ul class="social-btn">
        <li>
            <a href="#">
                <i class="fa fa-facebook" aria-hidden="true"></i>
            </a>
        </li>

        <li>
            <a href="#">
                <i class="fa fa-twitter" aria-hidden="true"></i>
            </a>
        </li>

        <li>
            <a href="#">
                <i class="fa fa-behance" aria-hidden="true"></i>
            </a>
        </li>

        <li>
            <a href="#">
                <i class="fa fa-instagram" aria-hidden="true"></i>
            </a>
        </li>

        <li>
            <a href="#">
                <i class="fa fa-linkedin" aria-hidden="true"></i>
            </a>
        </li>

        <li>
            <a href="#">
                <i class="fa fa-dribbble" aria-hidden="true"></i>
            </a>
        </li>
    </ul>

</div>
{!! BBstyle($_this->path.DS.'css'.DS.'style.css',$_this) !!}
{!! BBscript($_this->path.DS.'js'.DS.'custom.js',$_this) !!}