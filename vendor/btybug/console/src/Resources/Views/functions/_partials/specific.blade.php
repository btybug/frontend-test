<div class="form-group form-horizontal">
    <div class="col-md-12">
        <label class="col-md-2 control-label">Select Data</label>
        <div class="col-md-10">
            {!! Form::select("in[]",$data,(isset($model['in'])) ? $model['in'] : null,['class' => 'form-control specific-select','multiple' => true]) !!}
        </div>
    </div>
    <div class="clearfix"></div>
</div>