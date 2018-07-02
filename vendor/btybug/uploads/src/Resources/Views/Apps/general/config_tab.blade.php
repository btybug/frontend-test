<div class="col-md-12">
    <div class="form-group">
        <label>
            Select Table
        </label>
        {!! Form::select('table',['' => 'Select'] + BBGetTables(),null,['class' => 'form-control select-table']) !!}
    </div>
    <div class="col-md-12">
        <label>Type: </label>
        {!! Form::select('method',[
            'get' => 'GET',
            'insert' => 'Insert',
            'update' => 'update',
            'delete' => 'Delete'
        ],null,['class' => 'form-control']) !!}
    </div>

    @if(isset($product['columns']) && isset($product['table']))
        @php
            $columns = BBGetTableColumn($product['table'])
        @endphp
        <div class="col-md-12 cols-box">
            <label>Select Columns</label>
            <div class="columns">
                @foreach($columns as $col)
                    {{ $col }} {!! Form::checkbox("columns[$col]",null) !!}
                @endforeach
            </div>
        </div>
    @else
        <div class="col-md-12 cols-box hide">
            <label>Select Columns</label>
            <div class="columns">

            </div>
        </div>
    @endif


</div>

{!! BBstyle("public/css/select2/select2.min.css") !!}
{!! BBstyle(modules_path("uploads/src/Resources/Views/Apps/general/assets/cssgeneral_css.css")) !!}

{!! BBscript('public/js/select2/select2.full.min.js') !!}
{!! BBscript(modules_path("uploads/src/Resources/Views/Apps/general/assets/js/general_js.js")) !!}