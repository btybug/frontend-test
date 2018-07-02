<div class="form-group lets_each" data-id="{{$repl}}">
    <div class="col-md-7">
        {!! BBbutton2('unit','menu_area['.$repl.'][variation]','frontend','Select Menu',['class'=>'form-control input-md ic','model'=>null]) !!}
    </div>
    <div class="col-md-4">
        <label for="" class="col-sm-3">Grid</label>
        <div class="col-md-9">
            <select name="menu_area[{{ $repl }}][style]" id="" class="form-control style custom_change_grid" data-parent="{{$repl}}">
                <option value="0">select grid</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
            </select>
        </div>
    </div>
    <div class="col-md-1">
        <button class="btn btn-danger pull-right remove_this"><i class="fa fa-minus"></i></button>
    </div>
</div>
<div class="clearfix"></div>