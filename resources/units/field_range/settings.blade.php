<div class="col-md-12">
    <div class="form-group col-md-12">
        <div class="col-md-2">
            <label>Field style</label>
        </div>
        <div class="col-md-9">
            <select name="range_inp" id="" class="form-control">
                <option value="">Select rating</option>
                <option value="bty-input-range-1">Style 1</option>
                <option value="bty-input-range-3">Style 2</option>
                <option value="bty-input-range-4">Style 3</option>
                <option value="bty-input-range-5">Style 4</option>
                <option value="bty-input-range-6">Style 5</option>
                <option value="bty-input-range-8">Style 6</option>
            </select>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="form-group">
        <div class="col-md-6">
            <label for="fieldicon" class="col-sm-3 p-l-0 control-label m-0 text-left">Range min</label>
            <div class="col-sm-8">
                {!!Form::number('range_min',null,['min' => 0,'class' => 'form-control icp'])  !!}
            </div>
        </div>
        <div class="col-md-6">
            <label for="tooltip-icon" class="col-sm-3 m-0 control-label text-left">Range max</label>
            <div class="col-sm-8">
                {!!Form::number('range_max',null,['min' => 0,'class' => 'form-control icp','id'=>'tooltip-icon'])  !!}

            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="form-group">
        <div class="col-md-6">
            <label for="fieldicon" class="col-sm-3 p-l-0 control-label m-0 text-left">Start</label>
            <div class="col-sm-8">
                {!!Form::number('range_start',null,['min' => 0,'class' => 'form-control icp'])  !!}
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
{!! BBstyle($_this->path.DS.'css'.DS.'settings.css') !!}