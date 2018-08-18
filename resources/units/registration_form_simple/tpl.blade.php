<div class="registration_forms">
    <div class="container">
        <h2>Register</h2>
        <form class="form-horizontal" method="POST" action="{{ route('register') }}">
            {{ csrf_field() }}
            <div class="form-group container-fluid">
                <div class="row">
                    <label for="username" class="col-sm-2 col-form-label">Username</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="username" name="username" value="{{ old('username') }}" placeholder="Username">
                        @if ($errors->has('username'))
                            <span class="help-block">
                                <strong>{{ $errors->first('username') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="form-group container-fluid">
                <div class="row">
                    <label for="firstName" class="col-sm-2 col-form-label">First name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="firstName" name="f_name" value="{{ old('f_name') }}" placeholder="first Name">
                        @if ($errors->has('f_name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('f_name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="form-group container-fluid">
                <div class="row">
                    <label for="lastName" class="col-sm-2 col-form-label">Last name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="lastName" name="l_name" value="{{ old('l_name') }}" placeholder="last Name">
                        @if ($errors->has('l_name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('l_name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="form-group container-fluid">
                <div class="row">
                    <label for="email" class="col-sm-2 col-form-label">E-Mail Address</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="email">
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>

            <div class="form-group container-fluid">
                <div class="row">
                    <label for="confirmemail" class="col-sm-2 col-form-label">Confirm Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="confirmemail" value="{{ old('email_confirmation') }}"  name="email_confirmation" required placeholder="confirm email">
                    </div>
                </div>
            </div>

            <div class="form-group container-fluid">
                <div class="row">
                    <label for="passwrod" class="col-sm-2 col-form-label">Passwrod</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="passwrod" name="password" placeholder="passwrod">
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="form-group container-fluid">
                <div class="row">
                    <label for="confirmpassword" class="col-sm-2 col-form-label">Confirm Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="confirmpassword" name="password_confirmation" required placeholder="confirm password">
                    </div>
                </div>
            </div>

            <div class="form-group container-fluid">
                <div class="row">
                    <label for="siteurl" class="col-sm-2 col-form-label">Site Url </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="siteurl" name="site_url" value="{{ old('site_url') }}" placeholder="Site Url">
                        @if ($errors->has('site_url'))
                            <span class="help-block">
                                <strong>{{ $errors->first('site_url') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="form-group container-fluid">
                <div class="submit-button text-right">
                    <button type="submit" class="btn btn-outline-dark">Submit</button>
                </div>
            </div>
        </form>
    </div>

</div>


{!! BBstyle($_this->path.DS.'css'.DS.'style.css',$_this) !!}