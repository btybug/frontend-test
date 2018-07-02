<div id="settings_div111">
    <div class="form-group my_rows1">
        <label for="newcontainer" class="col-sm-4 labelTitle show_border" data-area="home">Section main content</label>
        <div class="col-sm-8">
            {!! BBbutton2('unit',"area1","unit_for_content","Change",['class'=>'btn btn-default change-layout','data-type'=>'frontend_sidebar','model'=>$settings]) !!}
        </div>
    </div>

    <div class="form-group my_rows1">
        <label for="newcontainer" class="col-sm-4 labelTitle show_border" data-area="cont">Section content</label>
        <div class="col-sm-8">
            {!! BBbutton2('unit',"area2","unit_for_content","Change",['class'=>'btn btn-default change-layout','data-type'=>'frontend_sidebar','model'=>$settings]) !!}
        </div>
    </div>

    <div class="form-group my_rows1">
        <label for="newcontainer" class="col-sm-4 labelTitle show_border" data-area="cont">Section content</label>
        <div class="col-sm-8">
            {!! BBbutton2('unit',"area3","unit_for_content","Change",['class'=>'btn btn-default change-layout','data-type'=>'frontend_sidebar','model'=>$settings]) !!}
        </div>
    </div>


    <div class="form-group my_rows1">
        <label for="newcontainer" class="col-sm-4 labelTitle show_border" data-area="cont">Section content</label>
        <div class="col-sm-8">
            {!! BBbutton2('unit',"area4","unit_for_content","Change",['class'=>'btn btn-default change-layout','data-type'=>'frontend_sidebar','model'=>$settings]) !!}
        </div>
    </div>
</div>
<script>
    $( ".show_border" ).mouseenter( function(){
        var area = $(this).data("area");
        $('html, body').animate({
            scrollTop: $("#"+area).offset().top
        }, 500);
        $("#"+area).addClass("custom_border_for_show");
    }).mouseleave(function(){
        var area = $(this).data("area");
        $("#"+area).removeClass("custom_border_for_show");
    });
</script>





