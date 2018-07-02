

@include($_this->slug.'::functions',compact('_this'))
{!! include_forms($settings,$_this) !!}


{!! BBstyle($_this->path.DS.'css'.DS.'custom.css') !!}
{!! BBstyle($_this->path.DS.'css'.DS.'owl.theme.default.css') !!}
{!! BBstyle($_this->path.DS.'css'.DS.'owl.carousel.min.css') !!}
{!! BBstyle($_this->path.DS.'css'.DS.'main.css') !!}
{!! BBscript($_this->path.DS.'js'.DS.'main.js') !!}
{!! BBscript($_this->path.DS.'js'.DS.'owl.carousel.min.js') !!}




