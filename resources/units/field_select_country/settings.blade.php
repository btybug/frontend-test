<?php
$countries = DB::table("countries")->get()->pluck(strtolower("name"),"sortname");
$data_for_select_flag = [
    0 => 'Select class',
    'flag-cl-orange' => 'orange',
    'flag-cl-crimson' => 'crimson',
    'flag-cl-fuchsia' => 'fuchsia',
    'flag-cl-deepskyblue' => 'deepskyblue',
    'flag-cl-black' => 'black',
];
$data_for_select_input = [
    0 => 'Select class',
    'inp-cl-orange' => 'orange',
    'inp-cl-crimson' => 'crimson',
    'inp-cl-fuchsia' => 'fuchsia',
    'inp-cl-deepskyblue' => 'deepskyblue',
    'inp-cl-black' => 'black',
];
$data_for_select_list = [
    0 => 'Select class',
    'list-cl-orange' => 'orange',
    'list-cl-crimson' => 'crimson',
    'list-cl-fuchsia' => 'fuchsia',
    'list-cl-deepskyblue' => 'deepskyblue',
    'list-cl-black' => 'black',
];
?>
<div class="col-md-12">
    <div class="row  visibility-box  {!! (1) ? "show" : "hide" !!}">
        <div class="bty-panel-collapse">
            <div>
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#inputsetting"
                   aria-expanded="true">
                    <span class="icon"><i class="fa fa-chevron-down" aria-hidden="true"></i></span>
                    <span class="title">Country Settings</span>
                </a>
            </div>
            <div id="inputsetting" class="collapse in" aria-expanded="true" style="">
                <div class="content bty-settings-panel">
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="col-md-3">
                                <label>Flag style</label>
                            </div>
                            <div class="col-md-9">
                                {{Form::select("flag_style",$data_for_select_flag,isset($settings["flag_style"]) ? $settings["flag_style"] : null,["class"=>"form-control"])}}
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="col-md-3">
                                <label>Input style</label>
                            </div>
                            <div class="col-md-9">
                                {{Form::select("input_style",$data_for_select_input,isset($settings["input_style"]) ? $settings["input_style"] : null,["class"=>"form-control"])}}
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="col-md-3">
                                <label>List style</label>
                            </div>
                            <div class="col-md-9">
                                {{Form::select("list_style",$data_for_select_list,isset($settings["list_style"]) ? $settings["flag_style"] : null,["class"=>"form-control"])}}
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row  visibility-box  {!! (1) ? "show" : "hide" !!}">
        <div class="bty-panel-collapse">
            <div>
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#inputsetting"
                   aria-expanded="true">
                    <span class="icon"><i class="fa fa-chevron-down" aria-hidden="true"></i></span>
                    <span class="title">Excluded countries</span>
                </a>
            </div>
            <div id="inputsetting" class="collapse in" aria-expanded="true" style="">
                <div class="content bty-settings-panel">
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="col-md-3">
                                <label>Select excluded countries</label>
                            </div>
                            <div class="col-md-9">
                                {!! Form::select("excluded_countries[]",$countries,isset($settings["excluded_countries"]) ? $settings["excluded_countries"] : null,["class" => "excl_countries","multiple" => "multiple"]) !!}
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{!! BBstyle($_this->path.DS.'css'.DS.'select2.min.css',$_this) !!}
{!! BBstyle($_this->path.DS.'css'.DS.'settings.css',$_this) !!}

{!! BBscript($_this->path.DS.'js'.DS.'select2.min.js') !!}
<script>
    window.onload = function(){
        $('.excl_countries').select2();
    }
</script>
