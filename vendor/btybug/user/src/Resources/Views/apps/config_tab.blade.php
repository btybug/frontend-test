<div class="col-md-12">
    <h3>Type: </h3>
    {!! Form::select('method',[
        'get' => 'GET',
        'insert' => 'Insert',
        'update' => 'update',
        'delete' => 'Delete'
    ],null,['class' => 'form-control']) !!}
</div>
@php
    $columns = BBGetTableColumn('users')
@endphp
<div class="col-md-12">
    <h3>Select User Columns</h3>
    @foreach($columns as $col)
        {{ $col }} {!! Form::checkbox("columns[$col]",null) !!}
    @endforeach
</div>