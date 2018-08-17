<div class="registration_forms">
    <div class="container">
        <h2>Register</h2>
        <form>
            <div class="form-group container-fluid">
                <div class="row">
                    <label for="firstName" class="col-sm-2 col-form-label">First name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="firstName" placeholder="first Name">
                    </div>
                </div>

            </div>
            <div class="form-group container-fluid">
                <div class="row">
                    <label for="lastName" class="col-sm-2 col-form-label">Last name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="lastName" placeholder="last Name">
                    </div>
                </div>
            </div>
            <div class="form-group container-fluid">
                <div class="row">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="email" placeholder="email">
                    </div>
                </div>
            </div>

            <div class="form-group container-fluid">
                <div class="row">
                    <label for="confirmemail" class="col-sm-2 col-form-label">Confirm Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="confirmemail" placeholder="confirm email">
                    </div>
                </div>
            </div>

            <div class="form-group container-fluid">
                <div class="row">
                    <label for="passwrod" class="col-sm-2 col-form-label">Passwrod</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="passwrod" placeholder="passwrod">
                    </div>
                </div>
            </div>
            <div class="form-group container-fluid">
                <div class="row">
                    <label for="confirmpassword" class="col-sm-2 col-form-label">Confirm Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="confirmpassword" placeholder="confirm password">
                    </div>
                </div>
            </div>

            <div class="form-group container-fluid">
                <div class="row">
                    <label for="siteurl" class="col-sm-2 col-form-label">Site Url </label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="siteurl" placeholder="confirm password">
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