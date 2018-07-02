<?php
$container_styles = getDinamicStyle('containers');
$text_styles = getDinamicStyle('texts');
?>
@option('general', 's', $data)
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
@option('general', 'f', $data)
<div class="bty-settings-panel">
    <div class="col-md-12">
        <div class="form-group">
            <div class="col-md-4">
                <label for="">Skills Header Name</label>
            </div>
            <div class="col-md-8">
                {!! Form::text('skill_header_name', issetReturn($settings,'skill_header_name'),['class'=>'form-control ']) !!}
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="form-group">
            <div class="col-md-4">
                <label for="">Experience Header Name</label>
            </div>
            <div class="col-md-8">
                {!! Form::text('exp_header_name', issetReturn($settings,'exp_header_name'),['class'=>'form-control ']) !!}
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
@endoption
@option('skills', 'f', $data)
<div class="skill-panel">
    @if(isset($settings['skill']))
        @foreach($settings['skill'] as $key=>$skill)
            <div class="bty-panel-collapse skill{{$key}}">
                <div>
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne-skill{{$key}}" aria-expanded="true">
                        <span class="icon"><i class="fa fa-chevron-down" aria-hidden="true"></i></span>
                        <span class="title">Skill Section</span>
                    </a>
                    <a href="#" id="skill{{$key}}" data-setting-delete="" class="btn btn-sm btn-danger delete click-action"><i class="fa fa-minus"></i></a>
                </div>
                <div id="collapseOne-skill{{$key}}" class="collapse" aria-expanded="true" style="">
                    <div class="content-panel">
                        <div>
                            <div class="form-group">
                                <div class="col-md-4">
                                    <label for="">Skill Name</label>
                                </div>
                                <div class="col-md-8">
                                    {!! Form::text('skill['.$key.'][skill_name]', issetReturn($skill,'skill_name'),['class'=>'form-control ']) !!}
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4">
                                    <label for="">Skill Description</label>
                                </div>
                                <div class="col-md-8">
                                    {!! Form::textarea('skill['.$key.'][desc]', issetReturn($skill,'desc'), ['class'=>'form-control ']) !!}
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4">
                                    <label for="">Level in Percents</label>
                                </div>
                                <div class="col-md-8">
                                    {!! Form::text('skill['.$key.'][percent]', issetReturn($skill,'percent'),['class'=>'form-control ']) !!}
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
<input type="text" name="skill_count" id="skill_count" value="@if(isset($settings['skill_count'])){{$settings['skill_count']}}@else {{0}} @endif" style="display: none" />
<div class="text-right">
    <button id="plus_skill" class="btn btn-info"><i class="fa fa-plus"></i></button>
</div>
@endoption
@option('skills', 's', $data)
<div class="bty-settings-panel">
    <div class="col-md-12">
        <div class="form-group">
            <div class="col-md-4">
                <label for="">Select Container Style</label>
            </div>
            <div class="col-md-8">
                {!! Form::select('skill_container_style', $container_styles, null, ['class'=>'form-control'])!!}
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="form-group">
            <div class="col-md-4">
                <label for="">Select Header Style</label>
            </div>
            <div class="col-md-8">
                {!! Form::select('skill_header_style', $text_styles, null, ['class'=>'form-control'])!!}
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="form-group">
            <div class="col-md-4">
                <label for="">Select Skill Text Style</label>
            </div>
            <div class="col-md-8">
                {!! Form::select('skill_style', $text_styles, null, ['class'=>'form-control'])!!}
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="form-group">
            <div class="col-md-4">
                <label for="">Select Description Text Style</label>
            </div>
            <div class="col-md-8">
                {!! Form::select('skill_desc_style', $text_styles, null, ['class'=>'form-control'])!!}
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="form-group">
            <div class="col-md-4">
                <label for="">Select Percent Text Style</label>
            </div>
            <div class="col-md-8">
                {!! Form::select('skill_percent_style', $text_styles, null, ['class'=>'form-control'])!!}
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
@endoption
@option('experience', 'f', $data)
<div class="exp-panel">
    @if(isset($settings['work']))
        @foreach($settings['work'] as $key=>$work)
            <div class="bty-panel-collapse exp{{$key}}">
                <div>
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne-exp{{$key}}" aria-expanded="true">
                        <span class="icon"><i class="fa fa-chevron-down" aria-hidden="true"></i></span>
                        <span class="title">Work Section</span>
                    </a>
                    <a href="#" id="exp{{$key}}" data-setting-delete="" class="btn btn-sm btn-danger delete click-action"><i class="fa fa-minus"></i></a>
                </div>
                <div id="collapseOne-exp{{$key}}" class="collapse" aria-expanded="true" style="">
                    <div class="content-panel">
                        <div>
                            <div class="form-group">
                                <div class="col-md-4">
                                    <label for="">Company Name</label>
                                </div>
                                <div class="col-md-8">
                                    {!! Form::text('work['.$key.'][company_name]', issetReturn($work,'company_name'),['class'=>'form-control ']) !!}
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4">
                                    <label for="">Position</label>
                                </div>
                                <div class="col-md-8">
                                    {!! Form::text('work['.$key.'][position]', issetReturn($work,'position'),['class'=>'form-control ']) !!}
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4">
                                    <label for="">Description</label>
                                </div>
                                <div class="col-md-8">
                                    {!! Form::textarea('work['.$key.'][desc]', issetReturn($work,'desc'), ['class'=>'form-control ']) !!}
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <h4>Period</h4>
                            <div class="form-group">
                                <div class="col-md-6">
                                    <div class="col-md-4 text-right">
                                        <label for="">From</label>
                                    </div>
                                    <div class="col-md-8">
                                        {!! Form::text('work['.$key.'][from]', issetReturn($work,'from'), ['class'=>'form-control ']) !!}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="col-md-4 text-right">
                                        <label for="">To</label>
                                    </div>
                                    <div class="col-md-8">
                                        {!! Form::text('work['.$key.'][to]', issetReturn($work,'to'), ['class'=>'form-control ']) !!}
                                    </div>
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
    <button id="plus_exp" class="btn btn-info"><i class="fa fa-plus"></i></button>
</div>
@endoption
@option('experience', 's', $data)
<div class="bty-settings-panel">
    <div class="col-md-12">
        <div class="form-group">
            <div class="col-md-4">
                <label for="">Select Container Style</label>
            </div>
            <div class="col-md-8">
                {!! Form::select('exp_container_style', $container_styles, null, ['class'=>'form-control'])!!}
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="form-group">
            <div class="col-md-4">
                <label for="">Select Header Style</label>
            </div>
            <div class="col-md-8">
                {!! Form::select('exp_header_style', $text_styles, null, ['class'=>'form-control'])!!}
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="form-group">
            <div class="col-md-4">
                <label for="">Select Company Name Text Style</label>
            </div>
            <div class="col-md-8">
                {!! Form::select('exp_company_style', $text_styles, null, ['class'=>'form-control'])!!}
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="form-group">
            <div class="col-md-4">
                <label for="">Select Position Text Style</label>
            </div>
            <div class="col-md-8">
                {!! Form::select('exp_position_style', $text_styles, null, ['class'=>'form-control'])!!}
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="form-group">
            <div class="col-md-4">
                <label for="">Select Description Text Style</label>
            </div>
            <div class="col-md-8">
                {!! Form::select('exp_desc_style', $text_styles, null, ['class'=>'form-control'])!!}
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
@endoption
{!! BBstyle($_this->path.DS.'css'.DS.'settings.css') !!}
<script>
    $('body').on('click','a.delete',function(){
        $("div."+$(this).attr('id')).remove();
    })
    $('#plus_exp').click(function(){
        var exp_index = Number($('input#exp_count').val())+1;
        $('input#exp_count').val( Number($('input#exp_count').val())+1);

        $('.exp-panel').append("<div class=\"bty-panel-collapse exp"+exp_index+"\">\n" +
            "                    <div>\n" +
            "                        <a class=\"accordion-toggle\" data-toggle=\"collapse\" data-parent=\"#accordion\" href=\"#collapseOne-exp"+exp_index+"\" aria-expanded=\"true\">\n" +
            "                            <span class=\"icon\"><i class=\"fa fa-chevron-down\" aria-hidden=\"true\"></i></span>\n" +
            "                            <span class=\"title\">Work Section</span>\n" +
            "                        </a>\n" +
            "                        <a href=\"#\" data-setting-delete=\"\" id=\"exp"+exp_index+"\" class=\"btn btn-sm btn-danger delete click-action\"><i class=\"fa fa-minus\"></i></a>\n" +
            "                    </div>\n" +
            "                    <div id=\"collapseOne-exp"+exp_index+"\" class=\"collapse\" aria-expanded=\"true\" style=\"\">\n" +
            "                        <div class=\"content-panel\">\n" +
            "                            <div>\n" +
            "                                <div class=\"form-group\">\n" +
            "                                    <div class=\"col-md-4\">\n" +
            "                                        <label for=\"\">Company Name</label>\n" +
            "                                    </div>\n" +
            "                                    <div class=\"col-md-8\">\n" +
            "                                        <input type='text' name='work["+exp_index+"][company_name]' class='form-control' />\n" +
            "                                    </div>\n" +
            "                                    <div class=\"clearfix\"></div>\n" +
            "                                </div>\n" +
            "                                <div class=\"form-group\">\n" +
            "                                    <div class=\"col-md-4\">\n" +
            "                                        <label for=\"\">Position</label>\n" +
            "                                    </div>\n" +
            "                                    <div class=\"col-md-8\">\n" +
            "                                        <input type='text' name='work["+exp_index+"][position]' class='form-control' />\n" +
            "                                    </div>\n" +
            "                                    <div class=\"clearfix\"></div>\n" +
            "                                </div>\n" +
            "                                <div class=\"form-group\">\n" +
            "                                    <div class=\"col-md-4\">\n" +
            "                                        <label for=\"\">Description</label>\n" +
            "                                    </div>\n" +
            "                                    <div class=\"col-md-8\">\n" +
            "                                        <textarea style='height: 200px' name='work["+exp_index+"][desc]' class='form-control'></textarea>\n" +
            "                                    </div>\n" +
            "                                    <div class=\"clearfix\"></div>\n" +
            "                                </div>\n" +
            "                                <h4>Period</h4>\n" +
            "                                <div class=\"form-group\">\n" +
            "                                    <div class=\"col-md-6\">\n" +
            "                                        <div class=\"col-md-4 text-right\">\n" +
            "                                            <label for=\"\">From</label>\n" +
            "                                        </div>\n" +
            "                                        <div class=\"col-md-8\">\n" +
            "                                            <input type='text' name='work["+exp_index+"][from]' class='form-control' />\n" +
            "                                        </div>\n" +
            "                                    </div>\n" +
            "                                    <div class=\"col-md-6\">\n" +
            "                                        <div class=\"col-md-4 text-right\">\n" +
            "                                            <label for=\"\">To</label>\n" +
            "                                        </div>\n" +
            "                                        <div class=\"col-md-8\">\n" +
            "                                            <input type='text' name='work["+exp_index+"][to]' class='form-control' />\n" +
            "                                        </div>\n" +
            "                                    </div>\n" +
            "                                    <div class=\"clearfix\"></div>\n" +
            "                                </div>\n" +
            "                            </div>\n" +
            "                        </div>\n" +
            "                    </div>\n" +
            "                </div>");
        $("#right-settings-main-box-bty").animate({ scrollTop: $('#right-settings-main-box-bty').prop("scrollHeight")}, 1000);
    })
</script>
<script>
    $('body').on('click','a.delete',function(){
        $("div."+$(this).attr('id')).remove();
    })
    $('#plus_skill').click(function(){
        var skill_index = Number($('input#skill_count').val())+1;
        $('input#skill_count').val( Number($('input#skill_count').val())+1);

        $('.skill-panel').append("<div class=\"bty-panel-collapse skill"+skill_index+"\">\n" +
            "                    <div>\n" +
            "                        <a class=\"accordion-toggle\" data-toggle=\"collapse\" data-parent=\"#accordion\" href=\"#collapseOne-skill"+skill_index+"\" aria-expanded=\"true\">\n" +
            "                            <span class=\"icon\"><i class=\"fa fa-chevron-down\" aria-hidden=\"true\"></i></span>\n" +
            "                            <span class=\"title\">Skill Section</span>\n" +
            "                        </a>\n" +
            "                        <a href=\"#\" data-setting-delete=\"\" id=\"skill"+skill_index+"\" class=\"btn btn-sm btn-danger delete click-action\"><i class=\"fa fa-minus\"></i></a>\n" +
            "                    </div>\n" +
            "                    <div id=\"collapseOne-skill"+skill_index+"\" class=\"collapse\" aria-expanded=\"true\" style=\"\">\n" +
            "                        <div class=\"content-panel\">\n" +
            "                            <div>\n" +
            "                                <div class=\"form-group\">\n" +
            "                                    <div class=\"col-md-4\">\n" +
            "                                        <label for=\"\">Skill Name</label>\n" +
            "                                    </div>\n" +
            "                                    <div class=\"col-md-8\">\n" +
            "                                        <input type='text' name='skill["+skill_index+"][skill_name]' class='form-control' />\n" +
            "                                    </div>\n" +
            "                                    <div class=\"clearfix\"></div>\n" +
            "                                </div>\n" +
            "                                <div class=\"form-group\">\n" +
            "                                    <div class=\"col-md-4\">\n" +
            "                                        <label for=\"\">Skill Description</label>\n" +
            "                                    </div>\n" +
            "                                    <div class=\"col-md-8\">\n" +
            "                                        <textarea style='height: 200px' name='skill["+skill_index+"][desc]' class='form-control'></textarea>\n" +
            "                                    </div>\n" +
            "                                    <div class=\"clearfix\"></div>\n" +
            "                                </div>\n" +
            "                                <div class=\"form-group\">\n" +
            "                                    <div class=\"col-md-4\">\n" +
            "                                        <label for=\"\">Level in Percents</label>\n" +
            "                                    </div>\n" +
            "                                    <div class=\"col-md-8\">\n" +
            "                                        <input style='height: 200px' name='skill["+skill_index+"][percent]' class='form-control'/>\n" +
            "                                    </div>\n" +
            "                                    <div class=\"clearfix\"></div>\n" +
            "                                </div>\n" +
            "                            </div>\n" +
            "                        </div>\n" +
            "                    </div>\n" +
            "                </div>");
        $("#right-settings-main-box-bty").animate({ scrollTop: $('#right-settings-main-box-bty').prop("scrollHeight")}, 1000);
    })
</script>

