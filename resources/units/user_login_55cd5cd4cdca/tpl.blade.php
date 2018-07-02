@php
    $login = BBCheckLoginEnabled();
@endphp

<ul id="nav-user-menu" class="nav navbar-nav navbar-right">
    <li class="dropdown">
        @if(\Auth::check())
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Account
                <b class="caret"></b>
            </a>
        @else
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Log In
                <b class="caret"></b>
            </a>
        @endif

        <ul class="dropdown-menu">
            <li>
                @if(\Auth::check())
                    <div class="navbar-content">
                        <div class="row">
                            <div class="col-md-5">
                                <img src="{!! BBGetUserAvatar() !!}" alt="Alternate Text" class="img-responsive"/>
                            </div>
                            <div class="col-md-7">
                                <span>{!! BBGetUser() !!}</span>
                                <p class="text-muted small">
                                    {!! BBGetUser(null,'email') !!}</p>
                                <div class="divider">
                                </div>
                                <a href="#" class="btn btn-primary btn-sm active">View Profile</a>
                            </div>
                        </div>
                    </div>
                    <div class="navbar-footer">
                        <div class="navbar-footer-content">
                            <div class="row">
                                <div class="col-md-6">
                                    <a href="{!! url('/') !!}" class="btn btn-default btn-sm">Home</a>
                                </div>
                                <div class="col-md-6">
                                    <a href="{!! url('/logout') !!}" class="btn btn-default btn-sm pull-right">Sign Out</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="navbar-content">
                        <div class="row" style="padding: 10px;">
                            {!! Form::open(['url' => '/login','id' => 'login-form']) !!}
                            <div class="form-group">
                                {!! Form::text('usernameOremail',null,['class' => 'form-control','id' => 'username','tabindex' => '1']) !!}
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" id="password" tabindex="2"
                                       class="form-control" placeholder="Password">
                            </div>
                            <div class="form-group text-center">
                                <input type="checkbox" tabindex="3" class="" name="remember"
                                       id="remember">
                                <label for="remember"> Remember Me</label>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-6 col-sm-offset-3">
                                        <input type="submit" name="login-submit" id="login-submit"
                                               tabindex="4"
                                               class="form-control btn btn-login" value="Log In">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="text-center">
                                            <a href="#" tabindex="5" class="forgot-password">Forgot
                                                Password?</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                @endif
            </li>
        </ul>
    </li>
</ul>


    {!! BBstyle($_this->path.DS.'/css/styles.css') !!}
@section("js")
    {{--{!! BBscript($_this->path.DS.'/js/boostrap.min.js',$_this) !!}--}}
    {!! BBscript($_this->path.DS.'/js/script.js',$_this) !!}
@stop
