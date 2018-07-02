@extends('btybug::layouts.mTabs',['index'=>'edit_users'])
@section('tab')
    <div class="container-fluid">
        <div class="row">
            <h2>Change Password</h2>
        </div>
        <div class="col-md-8">
            {!! Form::model($user,['url'=>route('user_change_password'),'class'=>'form-horizontal']) !!}
            {!! Form::hidden('id',null) !!}
            <div class="form-group">
                <label class="col-md-2 control-label">Old Password</label>
                <div class="col-md-8">
                    <input type="password" class="form-control" name="old_pass" placeholder="Old Password">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">New Password</label>
                <div class="col-md-8">
                    <input type="password" class="form-control new_pass" name="new_pass" placeholder="New Password">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">Confirm Password</label>
                <div class="col-md-8">
                    <input type="password" class="form-control confirm_pass" name="confirm_pass"
                           placeholder="Confirm Password">
                </div>
            </div>

            <div class="form-group button">
                <button class="btn btn-info pull-right" type="submit">Save</button>
                <a class="btn pull-right" href="/admin/users">Back</a>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@stop

