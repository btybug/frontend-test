<div class="col-md-12">
    <div class="form-group">
        <label for="welcome">Left side text</label>
        <input type="text" id="welcome" class="form-control" value="{{isset($settings['left_text']) ? $settings['left_text'] : ''}}" name="left_text">
    </div>
    <div class="form-group my_rows1">
        <label for="newcontainer" class="col-sm-4 labelTitle">Left bar menu</label>
        <div class="col-sm-8">
            {!! BBbutton2('menus','top_menu','frontend','Select Menu',['class'=>'form-control input-md','model'=>$settings]) !!}
        </div>
    </div>
</div>





