<div id="settings_div111">
    <div class="form-group my_rows1">
        <label for="newcontainer" class="col-sm-4 labelTitle">Area 1</label>
        <div class="col-sm-8">
            {{--{!! BBbutton('units','area1','Select Unit',['class'=>'form-control input-md','data-sub' => 'general','data-type'=>'backend','model'=>$settings]) !!}--}}
            {!! BBbutton2('unit',"area1","footer_units","Change",['class'=>'btn btn-default change-layout','data-type'=>'frontend_sidebar','model'=>$settings]) !!}
        </div>
    </div>

    <div class="form-group my_rows1">
        <label for="newcontainer" class="col-sm-4 labelTitle">Area 2</label>
        <div class="col-sm-8">
            {{--{!! BBbutton2('unit',"area2","footer_menu","Change",['class'=>'btn btn-default change-layout','data-type'=>'frontend_sidebar','model'=>$settings]) !!}--}}
            {!! BBbutton2('menus','menu_area','frontend','Select Main Menu',['class'=>'form-control input-md','model'=>$settings]) !!}
        </div>
    </div>

    <div class="form-group my_rows1">
        <label for="newcontainer" class="col-sm-4 labelTitle">Area 3</label>
        <div class="col-sm-8">
            {!! BBbutton2('unit',"area3","footer_units","Change",['class'=>'btn btn-default change-layout','data-type'=>'frontend_sidebar','model'=>$settings]) !!}
        </div>
    </div>

    <div class="form-group my_rows1">
        <label for="newcontainer" class="col-sm-4 labelTitle">Area 4</label>
        <div class="col-sm-8">
            {!! BBbutton2('unit',"area4","footer_units","Change",['class'=>'btn btn-default change-layout','data-type'=>'frontend_sidebar','model'=>$settings]) !!}
        </div>
    </div>

    <div class="form-group my_rows1">
        <label for="newcontainer" class="col-sm-4 labelTitle">Area 5</label>
        <div class="col-sm-8">
            {!! BBbutton2('unit',"area5","sub_footer","Change",['class'=>'btn btn-default change-layout','data-type'=>'frontend_sidebar','model'=>$settings]) !!}
        </div>
    </div>
</div>





