<?php
$container_styles = getDinamicStyle('containers');
$image_styles = getDinamicStyle('images');
$text_styles = getDinamicStyle('texts');
?>
@option('general','f',$data)
<div class="bty-settings-panel">
    <h3>CV Sections</h3>
    <div class="exp-panel">
        @if(isset($settings['sections']))
            @foreach($settings['sections'] as $key=>$work)
                <div class="bty-panel-collapse {{$key}}">
                    <div>
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne-{{$key}}" aria-expanded="true">
                            <span class="icon"><i class="fa fa-chevron-down" aria-hidden="true"></i></span>
                            <span class="title">CV Section</span>
                        </a>
                        <a href="#" id="{{$key}}" class="btn btn-sm btn-danger delete"><i class="fa fa-minus"></i></a>
                    </div>
                    <div id="collapseOne-{{$key}}" class="collapse" aria-expanded="true" style="">
                        <div class="content-panel">
                            <div>
                                <div class="form-group">
                                    <div class="col-md-4">
                                        <label for="">Select Unit</label>
                                    </div>
                                    <div class="col-md-8">
                                        {!! BBbutton2('unit',"sections[]","cv","Change",['class'=>'btn btn-default change-layout','data-type'=>'frontend_sidebar','model'=>$work]) !!}
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
    <input type="text" name="exp_count" id="exp_count" value="@if(isset($settings['exp_count'])){{$settings['exp_count']}}@else {{0}} @endif" style="display: none" />

    <div class="text-right">
        <button id="plus" class="btn btn-info"><i class="fa fa-plus"></i></button>
    </div>
</div>
@endoption
@option('general','s',$data)
<div class="bty-settings-panel">
    <div class="col-md-12">
        <div class="form-group">
            <div class="col-md-4">
                <label for="">Select Style</label>
            </div>
            <div class="col-md-8">
                {!! Form::select('style', $container_styles, null, ['class'=>'form-control'])!!}
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
@endoption
{!! BBstyle($_this->path.DS.'css'.DS.'settings.css') !!}
<script type="template" id="template">
    <div class="bty-panel-collapse {key}">
        <div>
            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne-{key}" aria-expanded="true">
                <span class="icon"><i class="fa fa-chevron-down" aria-hidden="true"></i></span>
                <span class="title">CV Section</span>
            </a>
            <a href="#" id="{key}" class="btn btn-sm btn-danger delete"><i class="fa fa-minus"></i></a>
        </div>
        <div id="collapseOne-{key}" class="collapse" aria-expanded="true" style="">
            <div class="content-panel">
                <div>
                    <div class="form-group">
                        <div class="col-md-4">
                            <label for="">Skill Name</label>
                        </div>
                        <div class="col-md-8">
                            <div class="input-group">
                                <div class="input-group-addon">Change</div>
                                <input type="text" data-key="title" data-toggle="popover" readonly="readonly" data-id="{id}" class="page-layout-title form-control" title="info" style="width: 100%; background: #fff;" value="Nothing Selected!!!">
                                <div class="input-group-addon">
                                    <button type="button" data-action="unit" data-key="{id}" class="BBbuttons" data-type="cv">Change
                                    </button>
                                </div>
                                <div class="input-group-addon">
                                    <button class="clean-bb-button" data-id="{id}" type="button">Clean</button>
                                </div>
                                <input class="bb-button-realted-hidden-input" type="hidden" value="" data-name="{id}" name="sections[]">
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</script>
<script>
    $('a.delete').click(function(){
        console.log($("div."+$(this).attr('id')));
        $("div."+$(this).attr('id')).remove();
    })
    $('#plus').click(function(){
        var exp_index = Number($('input#exp_count').val())+1;

        $('input#exp_count').val( Number($('input#exp_count').val())+1);

        var uniqid = Math.floor(Math.random()*1000000);
        var listItem = $('#template').html().replace("{id}", uniqid).replace("{id}",uniqid).replace("{id}",uniqid).replace("{id}",uniqid).replace("{key}", exp_index).replace("{key}", exp_index).replace("{key}", exp_index).replace("{key}", exp_index);
        $('.exp-panel').append(listItem);
    })
</script>






