@php
$users = \Btybug\User\User::pluck('username','id')->toArray();
$columns = BBGetTableColumn('users');
@endphp
<div class="col-md-12">
    <div class="form-group">
        <label>Select User</label>
        {!! Form::select('id',['null' => 'Authenticated User'] + $users,null,['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        <label>Select Column</label>
        {!! Form::select('column',['null' => 'Select'] + $columns,null,['class' => 'form-control']) !!}
    </div>
</div>