<?php
$data_for_select_container = [
    0 => 'Select class',
    'cnt-w-25' => 'width 25%',
    'cnt-w-50' => 'width 50%',
    'cnt-w-75' => 'width 75%',
    'cnt-w-100' => 'width 100%',
    'cnt-border-gold' => 'border-gold',
    'cnt-border-chocolate' => 'border-chocolate',
    'cnt-border-skyblue' => 'border-skyblue',
    'cnt-border-limegreen' => 'border-limegreen',
    'cnt-m-t-6' => 'margin-top 6px',
    'cnt-m-t-8' => 'margin-top 8px',
    'cnt-m-t-10' => 'margin-top 10px',
    'cnt-m-t-12' => 'margin-top 12px',
    'cnt-m-t-14' => 'margin-top 14px',
    'cnt-m-t-16' => 'margin-top 16px',
    'cnt-m-t-18' => 'margin-top 18px',
    'cnt-m-t-20' => 'margin-top 20px',
    'cnt-m-b-6' => 'margin-bottom 6px',
    'cnt-m-b-8' => 'margin-bottom 8px',
    'cnt-m-b-10' => 'margin-bottom 10px',
    'cnt-m-b-12' => 'margin-bottom 12px',
    'cnt-m-b-14' => 'margin-bottom 14px',
    'cnt-m-b-16' => 'margin-bottom 16px',
    'cnt-m-b-18' => 'margin-bottom 18px',
    'cnt-m-b-20' => 'margin-bottom 20px',
    'cnt-m-t-b-6' => 'margin-top-bottom 6px',
    'cnt-m-t-b-8' => 'margin-top-bottom 8px',
    'cnt-m-t-b-10' => 'margin-top-bottom 10px',
    'cnt-m-t-b-12' => 'margin-top-bottom 12px',
    'cnt-m-t-b-14' => 'margin-top-bottom 14px',
    'cnt-m-t-b-16' => 'margin-top-bottom 16px',
    'cnt-m-t-b-18' => 'margin-top-bottom 18px',
    'cnt-m-t-b-20' => 'margin-top-bottom 20px',

];
$data_for_select_label = [
    0 => 'Select class',
    'lab-cl-teal' => 'bg-color - teal',
    'lab-cl-chocolate' => 'bg-color - chocolate',
    'lab-cl-skyblue' => 'bg-color - skyblue',
    'lab-cl-limegreen' => 'bg-color - limegreen',
];
?>

<div class="col-md-12">
    <div class="row">
        <div class="bty-panel-collapse">
            <div>
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#addresssetting"
                   aria-expanded="true">
                    <span class="icon"><i class="fa fa-chevron-down" aria-hidden="true"></i></span>
                    <span class="title">Setting</span>
                </a>
            </div>
            <div id="addresssetting" class="collapse in" aria-expanded="true" style="">
                <div class="content bty-settings-panel">
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="col-md-3">
                                <label>Container style</label>
                            </div>
                            <div class="col-md-9">
                                {{Form::select("container_style",$data_for_select_container,isset($settings["container_style"]) ? $settings["container_style"] : null,["class"=>"form-control"])}}
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="col-md-3">
                                <label>Label style</label>
                            </div>
                            <div class="col-md-9">
                                {{Form::select("label_style",$data_for_select_label,isset($settings["label_style"]) ? $settings["label_style"] : null,["class"=>"form-control"])}}
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{!! BBstyle($_this->path.DS.'css'.DS.'settings.css') !!}
