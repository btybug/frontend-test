@extends('btybug::layouts.mTabs',['index'=>'edit_users'])
@section('tab')
    <div class="container-fluid">
        <div class="row">
            <h2>Edit User</h2>
        </div>
        <div class="col-md-8">
            {!! Form::model($user,['url'=>route('user_change_details'),'class'=>'form-horizontal']) !!}
            {!! Form::hidden('id',null) !!}
            <div class="form-group">
                <label class="col-md-2 control-label">Username</label>
                <div class="col-md-8">
                    {!! Form::text('username',null,['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">Email</label>
                <div class="col-md-8">
                    {!! Form::text('email',null,['class' => 'form-control']) !!}

                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">First Name</label>
                <div class="col-md-8">
                    {!! Form::text('f_name',null,['class' => 'form-control']) !!}

                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">Last Name</label>
                <div class="col-md-8">
                    {!! Form::text('l_name',null,['class' => 'form-control']) !!}

                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">Address</label>
                <div class="col-md-8">
                    {!! Form::text('address',null,['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">Phone Number</label>
                <div class="col-md-8">
                    {!! Form::text('phone_number',null,['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">Website</label>
                <div class="col-md-8">
                    {!! Form::text('website',null,['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">About</label>
                <div class="col-sm-8">
                    {!! Form::textarea('about',null,['class' => 'form-contro1']) !!}
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Avatar</label>
                <div class="col-sm-8">
                    {!! BBmediaButton('avatar',$user) !!}
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

