<div class="col-md-12">
    @php
        $columns = BBGetTableColumn('users')
    @endphp
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                Select Columns For Return
            </h4>
        </div>
        <div class="panel-body">
            <div class="columns">
                @foreach($columns as $col)
                    {{ $col }} {!! Form::checkbox("columns[$col]",null) !!}
                @endforeach
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                Modal settings
            </h4>
        </div>
        <div class="panel-body">
            <div class="col-md-12">
                <label>Site Name</label>
                {!! Form::text("site_name",null,['class' => 'form-control']) !!}
            </div>
            <div class="col-md-12">
                <label>Site logo</label>
                {!! Form::text("site_logo",null,['class' => 'form-control','placeholder' => 'Enter URL']) !!}
            </div>
        </div>
    </div>


</div>

{!! BBstyle("public/css/select2/select2.min.css") !!}
{!! BBstyle(modules_path("uploads/src/Resources/Views/Apps/general/assets/cssgeneral_css.css")) !!}

{!! BBscript('public/js/select2/select2.full.min.js') !!}
{!! BBscript(modules_path("uploads/src/Resources/Views/Apps/general/assets/js/general_js.js")) !!}