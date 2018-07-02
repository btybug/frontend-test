<div class="col-md-6">
    <h3>Change Password</h3>
    <div class="chang_password">
        {!! Form::open(['url'=>route('user_change_password'),'class'=>'form-horizontal change_password_form']) !!}
        <div class="form-group">
            <label class="col-md-2 control-label">Old</label>
            <div class="col-md-8">
                <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-key"></i>
                        </span>
                    <input type="password" class="form-control1 icon" name="old_pass" placeholder="Old Password">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label">New</label>
            <div class="col-md-8">
                <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-key"></i>
                        </span>
                    <input type="password" class="form-control1 icon new_pass" name="new_pass" placeholder="New Password">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label">Confirm Password</label>
            <div class="col-md-8">
                <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-key"></i>
                        </span>
                    <input type="password" class="form-control1 icon confirm_pass" name="confirm_pass" placeholder="Confirm Password">
                </div>
            </div>
        </div>
        <div class="form-group button">
            <a href="/my-account">Back</a>
            <button type="submit" class="change_password_button">Save</button>
        </div>
        {!! Form::close() !!}
    </div>
</div>

{!! BBstyle($_this->path.DS.'css'.DS.'style.css') !!}
{!! BBscript($_this->path.DS.'js'.DS.'custom.js',$_this) !!}