<?php
$data_for_select_icon = [
    0 => 'Select class',
    'datepic-icon-cl-blue' => 'blue',
    'datepic-icon-cl-red' => 'red',
    'datepic-icon-cl-black' => 'black',
    'datepic-icon-cl-gold' => 'gold',
];
$data_for_select_input = [
    0 => 'Select class',
    'datepic-inp-cl-aliceblue' => 'aliceblue',
    'datepic-inp-cl-gold' => 'gold',
    'datepic-inp-cl-red' => 'red',
    'datepic-inp-cl-blue' => 'blue',
    'datepic-inp-cl-black' => 'black',
];
$data_for_select_calendar = [
    0 => 'Select class',
    'datepic-table-fs-12' => 'Font 12px',
    'datepic-table-fs-14' => 'Font 14px',
    'datepic-table-fs-16' => 'Font 16px',
    'datepic-table-fs-18' => 'Font 18px',
    'datepic-table-fs-20' => 'Font 20px',
    'datepic-table-fs-22' => 'Font 22px',
    'datepic-table-fs-12-border-th' => 'Font 12px, border-thead',
    'datepic-table-fs-14-border-th' => 'Font 14px, border-thead',
    'datepic-table-fs-16-border-th' => 'Font 16px, border-thead',
    'datepic-table-fs-18-border-th' => 'Font 18px, border-thead',
    'datepic-table-fs-20-border-th' => 'Font 20px, border-thead',
    'datepic-table-fs-22-border-th' => 'Font 22px, border-thead',
    'datepic-hover-cl-black' => 'Hover black',
    'datepic-hover-cl-blue' => 'Hover blue',
    'datepic-hover-cl-red' => 'Hover red',
    'datepic-hover-cl-gold' => 'Hover gold',
];
$languages = [
    'en' => 'en',
    'ar' => 'ar',
    'az' => 'az',
    'bg' => 'bg',
    'bs' => 'bs',
    'ca' => 'ca',
    'cs' => 'cs',
    'cy' => 'cy',
    'da' => 'da',
    'de' => 'de',
    'el' => 'el',
    'en-GB' => 'en-GB',
    'es' => 'es',
    'et' => 'et',
    'eu' => 'eu',
    'fa' => 'fa',
    'fi' => 'fi',
    'fo' => 'fo',
    'fr' => 'fr',
    'gl' => 'gl',
    'he' => 'he',
    'hr' => 'hr',
    'hu' => 'hu',
    'hy' => 'hy',
    'id' => 'id',
    'is' => 'is',
    'it' => 'it',
    'ja' => 'ja',
    'ka' => 'ka',
    'kh' => 'kh',
    'kk' => 'kk',
    'kr' => 'kr',
    'lt' => 'lt',
    'lv' => 'lv',
    'mk' => 'mk',
    'ms' => 'ms',
    'nb' => 'nb',
    'nl' => 'nl',
    'nl-BE' => 'nl-BE',
    'no' => 'no',
    'pl' => 'pl',
    'pt-BR' => 'pt-BR',
    'pt' => 'pt',
    'ro' => 'ro',
    'rs' => 'rs',
    'rs-latin' => 'rs-latin',
    'ru' => 'ru',
    'sk' => 'sk',
    'sl' => 'sl',
    'sq' => 'sq',
    'sr' => 'sr',
    'sr-latin' => 'sr-latin',
    'sv' => 'sv',
    'sw' => 'sw',
    'th' => 'th',
    'tr' => 'tr',
    'uk' => 'uk',
    'vi' => 'vi',
    'zh-CN' => 'zh-CN',
    'zh-TW' => 'zh-TW',
];
$orientation = [
    'auto' => 'auto',
    'top auto' => 'top auto',
    'bottom auto' => 'bottom auto',
    'auto left' => 'auto left',
    'top left' => 'top left',
    'bottom left' => 'bottom left',
    'auto right' => 'auto right',
    'top right' => 'top right',
    'bottom right' => 'bottom right',
];
?>

<div class="col-md-12">
    <div class="row  visibility-box  {!! (1) ? "show" : "hide" !!}">
        <div class="bty-panel-collapse">
            <div>
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#datepickersetting"
                   aria-expanded="true">
                    <span class="icon"><i class="fa fa-chevron-down" aria-hidden="true"></i></span>
                    <span class="title">Setting</span>
                </a>
            </div>
            <div id="datepickersetting" class="collapse in" aria-expanded="true" style="">
                <div class="content bty-settings-panel">
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="col-md-2">
                                <label>Icon style</label>
                            </div>
                            <div class="col-md-10">
                                {{Form::select("icon_style",$data_for_select_icon,isset($settings["icon_style"]) ? $settings["icon_style"] : null,["class"=>"form-control"])}}
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="col-md-2">
                                <label>Input style</label>
                            </div>
                            <div class="col-md-10">
                                {{Form::select("input_style",$data_for_select_input,isset($settings["input_style"]) ? $settings["input_style"] : null,["class"=>"form-control"])}}
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                   {{-- <div class="form-group">
                        <div class="col-md-12">
                            <div class="col-md-2">
                                <label>Calendar style</label>
                            </div>
                            <div class="col-md-10">
                                {{Form::select("calendar_style",$data_for_select_calendar,isset($settings["calendar_style"]) ? $settings["calendar_style"] : null,["class"=>"form-control"])}}
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>--}}
                    <div class="form-group">
                        <div class="col-md-12">
                            <label class="col-sm-2 control-label text-left">Type:</label>
                            <div class="col-sm-10">
                                <div class="week-day-check">
                                    <div class="col-md-3">
                                        <div class="customcheck type-radio">
                                            <input type="radio" id="typeinput" name="datepicker_setting[type]"
                                                   value="input" {{isset($settings["datepicker_setting"]["type"]) && $settings["datepicker_setting"]["type"] == "input" ? "checked" : ''}}>
                                            <label for="typeinput">Text input</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="customcheck type-radio">
                                            <input type="radio" id="typecomponent" name="datepicker_setting[type]"
                                                   value="component" {{isset($settings["datepicker_setting"]["type"]) && $settings["datepicker_setting"]["type"] == "component" ? "checked" : ''}}>
                                            <label for="typecomponent">Component</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="customcheck type-radio">
                                            <input type="radio" id="typeinline" name="datepicker_setting[type]"
                                                   value="embedded" {{isset($settings["datepicker_setting"]["type"]) && $settings["datepicker_setting"]["type"] == "embedded" ? "checked" : ''}}>
                                            <label for="typeinline">Embedded / inline</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="customcheck type-radio">
                                            <input type="radio" id="typerange" name="datepicker_setting[type]"
                                                   value="range" {{isset($settings["datepicker_setting"]["type"]) && $settings["datepicker_setting"]["type"] == "range" ? "checked" : ''}}>
                                            <label for="typerange">Range</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6">
                            <label class="col-sm-3 control-label text-left" for="format">Format</label>
                            <div class="col-sm-8">
                                <input class="form-control" name="datepicker_setting[custom_format]" id="format"
                                       type="text"
                                       value="{{isset($settings["datepicker_setting"]["custom_format"]) ? $settings["datepicker_setting"]["custom_format"] : ''}}"
                                       placeholder="mm/dd/yyyy">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="col-sm-3 control-label text-left" for="weekStart">Week start</label>
                            <div class="col-sm-8">
                                <input class="form-control" name="datepicker_setting[weekStart]" id="weekStart"
                                       type="text"
                                       value="{{isset($settings["datepicker_setting"]["weekStart"]) ? $settings["datepicker_setting"]["weekStart"] : ''}}">
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6">
                            <label class="col-sm-3 control-label text-left">Start date</label>
                            <div class="col-sm-8">
                                <input class="form-control" placeholder="03-18-2018"
                                       name="datepicker_setting[startDate]" type="text"
                                       value="{{isset($settings["datepicker_setting"]["startDate"]) ? $settings["datepicker_setting"]["startDate"] : ''}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="col-sm-3 control-label text-left">End date</label>
                            <div class="col-sm-8">
                                <input class="form-control" placeholder="03-18-2018" name="datepicker_setting[endDate]"
                                       type="text"
                                       value="{{isset($settings["datepicker_setting"]["endDate"]) ? $settings["datepicker_setting"]["endDate"] : ''}}">
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6">
                            <label class="col-sm-3 control-label text-left">Start view</label>
                            <div class="col-sm-8">
                                {!! Form::select("datepicker_setting[startView]",[0=>"0 / days",1=>"1 / months",2=>"2 / years",3=>"3 / decades",4=>"4 / centuries"],isset($settings["datepicker_setting"]["startView"]) ? $settings["datepicker_setting"]["startView"] : null,["class" => "form-control"]) !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="col-sm-3 control-label text-left">Min view mode</label>
                            <div class="col-sm-8">
                                {!! Form::select("datepicker_setting[minViewMode]",[0=>"0 / days",1=>"1 / months",2=>"2 / years",3=>"3 / decades",4=>"4 / centuries"],isset($settings["datepicker_setting"]["minViewMode"]) ? $settings["datepicker_setting"]["minViewMode"] : null,["class" => "form-control"]) !!}
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6">
                            <label class="col-sm-3 control-label text-left">Max view mode</label>
                            <div class="col-sm-8">
                                {!! Form::select("datepicker_setting[maxViewMode]",[0=>"0 / days",1=>"1 / months",2=>"2 / years",3=>"3 / decades",4=>"4 / centuries"],isset($settings["datepicker_setting"]["maxViewMode"]) ? $settings["datepicker_setting"]["maxViewMode"] : null,["class" => "form-control"]) !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="col-sm-3 control-label text-left">Today button</label>
                            <div class="col-sm-8">
                                {!! Form::select("datepicker_setting[todayBtn]",[false=>"disabled",true=>"enabled (unlinked)","linked"=>"linked"],isset($settings["datepicker_setting"]["todayBtn"]) ? $settings["datepicker_setting"]["todayBtn"] : null,["class" => "form-control"]) !!}
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6">
                            <label class="col-sm-3 control-label text-left">Clear button</label>
                            <div class="col-sm-8">
                                {!! Form::select("datepicker_setting[clearBtn]",[false=>"disabled",true=>"enabled"],isset($settings["datepicker_setting"]["clearBtn"]) ? $settings["datepicker_setting"]["clearBtn"] : null,["class" => "form-control"]) !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="col-sm-3 control-label text-left">Language</label>
                            <div class="col-sm-8">
                                {!! Form::select("datepicker_setting[language]",$languages,isset($settings["datepicker_setting"]["language"]) ? $settings["datepicker_setting"]["language"] : null,["class" => "form-control"]) !!}
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6">
                            <label class="col-sm-3 control-label text-left">Orientation</label>
                            <div class="col-sm-8">
                                {!! Form::select("datepicker_setting[orientation]",$orientation,isset($settings["datepicker_setting"]["orientation"]) ? $settings["datepicker_setting"]["orientation"] : null,["class" => "form-control"]) !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="col-sm-3 control-label text-left">Multidate</label>
                            <div class="col-sm-8">
                                <input class="form-control" placeholder="false" name="datepicker_setting[multidate]"
                                       value="{{isset($settings["datepicker_setting"]["multidate"]) ? $settings["datepicker_setting"]["multidate"] : 'false'}}"
                                       type="text">
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6">
                            <label class="col-sm-3 control-label text-left">Multidate separator</label>
                            <div class="col-sm-8">
                                <input class="form-control" placeholder=","
                                       name="datepicker_setting[multidateSeparator]" type="text"
                                       value="{{isset($settings["datepicker_setting"]["multidateSeparator"]) ? $settings["datepicker_setting"]["multidateSeparator"] : ''}}">
                            </div>
                        </div>

                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <label class="col-sm-4 control-label text-left">Days of week disabled:</label>
                            <div class="col-sm-8">
                                <div class="week-day-check">
                                    <div class="customcheck">
                                        <input type="checkbox" id="week00"
                                               name="datepicker_setting[daysOfWeekDisabled][]"
                                               value="0" {{isset($settings["datepicker_setting"]["daysOfWeekDisabled"]) && in_array(0,$settings["datepicker_setting"]["daysOfWeekDisabled"]) ? 'checked' : ''}}>
                                        <label for="week00">0</label>
                                    </div>
                                    <div class="customcheck">
                                        <input type="checkbox" id="week11"
                                               name="datepicker_setting[daysOfWeekDisabled][]"
                                               value="1" {{isset($settings["datepicker_setting"]["daysOfWeekDisabled"]) && in_array(1,$settings["datepicker_setting"]["daysOfWeekDisabled"]) ? 'checked' : ''}}>
                                        <label for="week11">1</label>
                                    </div>
                                    <div class="customcheck">
                                        <input type="checkbox" id="week22"
                                               name="datepicker_setting[daysOfWeekDisabled][]"
                                               value="2" {{isset($settings["datepicker_setting"]["daysOfWeekDisabled"]) && in_array(2,$settings["datepicker_setting"]["daysOfWeekDisabled"]) ? 'checked' : ''}}>
                                        <label for="week22">2</label>
                                    </div>
                                    <div class="customcheck">
                                        <input type="checkbox" id="week33"
                                               name="datepicker_setting[daysOfWeekDisabled][]"
                                               value="3" {{isset($settings["datepicker_setting"]["daysOfWeekDisabled"]) && in_array(3,$settings["datepicker_setting"]["daysOfWeekDisabled"]) ? 'checked' : ''}}>
                                        <label for="week33">3</label>
                                    </div>
                                    <div class="customcheck">
                                        <input type="checkbox" id="week44"
                                               name="datepicker_setting[daysOfWeekDisabled][]"
                                               value="4" {{isset($settings["datepicker_setting"]["daysOfWeekDisabled"]) && in_array(4,$settings["datepicker_setting"]["daysOfWeekDisabled"]) ? 'checked' : ''}}>
                                        <label for="week44">4</label>
                                    </div>
                                    <div class="customcheck">
                                        <input type="checkbox" id="week55"
                                               name="datepicker_setting[daysOfWeekDisabled][]"
                                               value="5" {{isset($settings["datepicker_setting"]["daysOfWeekDisabled"]) && in_array(5,$settings["datepicker_setting"]["daysOfWeekDisabled"]) ? 'checked' : ''}}>
                                        <label for="week55">5</label>
                                    </div>
                                    <div class="customcheck">
                                        <input type="checkbox" id="week66"
                                               name="datepicker_setting[daysOfWeekDisabled][]"
                                               value="6" {{isset($settings["datepicker_setting"]["daysOfWeekDisabled"]) && in_array(6,$settings["datepicker_setting"]["daysOfWeekDisabled"]) ? 'checked' : ''}}>
                                        <label for="week66">6</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <label class="col-sm-4 control-label text-left">Days of week highlighted:</label>
                            <div class="col-sm-8">
                                <div class="week-day-check">
                                    <div class="customcheck">
                                        <input type="checkbox" id="day00"
                                               name="datepicker_setting[daysOfWeekHighlighted][]"
                                               value="0" {{isset($settings["datepicker_setting"]["daysOfWeekHighlighted"]) && in_array(0,$settings["datepicker_setting"]["daysOfWeekHighlighted"]) ? 'checked' : ''}}>
                                        <label for="day00">0</label>
                                    </div>
                                    <div class="customcheck">
                                        <input type="checkbox" id="day11"
                                               name="datepicker_setting[daysOfWeekHighlighted][]"
                                               value="1" {{isset($settings["datepicker_setting"]["daysOfWeekHighlighted"]) && in_array(1,$settings["datepicker_setting"]["daysOfWeekHighlighted"]) ? 'checked' : ''}}>
                                        <label for="day11">1</label>
                                    </div>
                                    <div class="customcheck">
                                        <input type="checkbox" id="day22"
                                               name="datepicker_setting[daysOfWeekHighlighted][]"
                                               value="2" {{isset($settings["datepicker_setting"]["daysOfWeekHighlighted"]) && in_array(2,$settings["datepicker_setting"]["daysOfWeekHighlighted"]) ? 'checked' : ''}}>
                                        <label for="day22">2</label>
                                    </div>
                                    <div class="customcheck">
                                        <input type="checkbox" id="day33"
                                               name="datepicker_setting[daysOfWeekHighlighted][]"
                                               value="3" {{isset($settings["datepicker_setting"]["daysOfWeekHighlighted"]) && in_array(3,$settings["datepicker_setting"]["daysOfWeekHighlighted"]) ? 'checked' : ''}}>
                                        <label for="day33">3</label>
                                    </div>
                                    <div class="customcheck">
                                        <input type="checkbox" id="day44"
                                               name="datepicker_setting[daysOfWeekHighlighted][]"
                                               value="4" {{isset($settings["datepicker_setting"]["daysOfWeekHighlighted"]) && in_array(4,$settings["datepicker_setting"]["daysOfWeekHighlighted"]) ? 'checked' : ''}}>
                                        <label for="day44">4</label>
                                    </div>
                                    <div class="customcheck">
                                        <input type="checkbox" id="day55"
                                               name="datepicker_setting[daysOfWeekHighlighted][]"
                                               value="5" {{isset($settings["datepicker_setting"]["daysOfWeekHighlighted"]) && in_array(5,$settings["datepicker_setting"]["daysOfWeekHighlighted"]) ? 'checked' : ''}}>
                                        <label for="day55">5</label>
                                    </div>
                                    <div class="customcheck">
                                        <input type="checkbox" id="day66"
                                               name="datepicker_setting[daysOfWeekHighlighted][]"
                                               value="6" {{isset($settings["datepicker_setting"]["daysOfWeekHighlighted"]) && in_array(6,$settings["datepicker_setting"]["daysOfWeekHighlighted"]) ? 'checked' : ''}}>
                                        <label for="day66">6</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="col-md-4">
                                <div class="customcheck">
                                    <input type="hidden" name="datepicker_setting[calendarWeeks]" value="false">
                                    <input type="checkbox" id="calendarweeks" name="datepicker_setting[calendarWeeks]"
                                           value="true" {{isset($settings["datepicker_setting"]["calendarWeeks"]) && $settings["datepicker_setting"]["calendarWeeks"] == "true" ? "checked" : ''}}>
                                    <label for="calendarweeks">Calendar weeks</label>
                                </div>

                            </div>
                            <div class="col-md-4">
                                <div class="customcheck">
                                    <input type="hidden" name="datepicker_setting[autoclose]" value="false">
                                    <input type="checkbox" id="autoclose" name="datepicker_setting[autoclose]"
                                           value="true" {{isset($settings["datepicker_setting"]["autoclose"]) && $settings["datepicker_setting"]["autoclose"] == "true" ? "checked" : ''}}>
                                    <label for="autoclose">Autoclose</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="customcheck">
                                    <input type="hidden" name="datepicker_setting[todayHighlight]" value="false">
                                    <input type="checkbox" id="todayhighlight" name="datepicker_setting[todayHighlight]"
                                           value="true" {{isset($settings["datepicker_setting"]["todayHighlight"]) && $settings["datepicker_setting"]["todayHighlight"] == "true" ? "checked" : ''}}>
                                    <label for="todayhighlight">Today highlight</label>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="col-md-4">
                                <div class="customcheck">
                                    <input type="hidden" name="datepicker_setting[keyboardNavigation]" value="false">
                                    <input type="checkbox" id="keyboardnavigation"
                                           name="datepicker_setting[keyboardNavigation]"
                                           value="true" {{isset($settings["datepicker_setting"]["keyboardNavigation"]) && $settings["datepicker_setting"]["keyboardNavigation"] == "true" ? "checked" : ''}}>
                                    <label for="keyboardnavigation">Keyboard navigation</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="customcheck">
                                    <input type="hidden" name="datepicker_setting[forceParse]" value="false">
                                    <input type="checkbox" id="forceparse" name="datepicker_setting[forceParse]"
                                           value="true" {{isset($settings["datepicker_setting"]["forceParse"]) && $settings["datepicker_setting"]["forceParse"] == "true" ? "checked" : ''}}>
                                    <label for="forceparse">Force parse</label>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{!! BBstyle($_this->path.DS.'css'.DS.'settings.css',$_this) !!}
{!! BBstyle($_this->path.DS.'css'.DS.'select2.min.css',$_this) !!}

{!! BBscript($_this->path.DS.'js'.DS.'select2.min.js',$_this) !!}
