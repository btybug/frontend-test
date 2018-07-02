<?php
$data_for_select_input = [
    0 => 'Select class',
    'timepic-inp-w-5' => 'width 5%',
    'timepic-inp-w-10' => 'width 10%',
    'timepic-inp-w-25' => 'width 25%',
    'timepic-inp-w-50' => 'width 50%',
    'timepic-inp-w-75' => 'width 75%',
    'timepic-inp-w-100' => 'width 100%',
    'timepic-inp-cl-aliceblue' => 'aliceblue',
    'timepic-inp-cl-gold' => 'gold',
    'timepic-inp-cl-red' => 'red',
    'timepic-inp-cl-blue' => 'blue',
    'timepic-inp-cl-black' => 'black',
];
$languages = [
    'am' => 'am',
    'pm' => 'pm',
    'AM' => 'AM',
    'PM' => 'PM',
    'decimal' => '.',
    'mins' => 'mins',
    'hr' => 'hr',
    'hrs' => 'hrs',
];
$orientation = [
    'l' => 'left',
    'r' => 'right',
    't' => 'top',
    'b' => 'bottom',
];
$formats=[
    ''=>'select format',
    'H:i'=>'H:i',
    'H:i:s'=>'H:i:s',
    'h:i A'=>'h:i A',
    'h:i'=>'h:i',
    'h:i:s'=>'h:i:s',
];
$hours=[
    '12:00am'=>'12:00am',
    '1:00am'=>'1:00am',
    '2:00am'=>'2:00am',
    '3:00am'=>'3:00am',
    '4:00am'=>'4:00am',
    '5:00am'=>'5:00am',
    '6:00am'=>'6:00am',
    '7:00am'=>'7:00am',
    '8:00am'=>'8:00am',
    '9:00am'=>'9:00am',
    '10:00am'=>'10:00am',
    '11:00am'=>'11:00am',
    '12:00pm'=>'12:00pm',
    '1:00pm'=>'1:00pm',
    '2:00pm'=>'2:00pm',
    '3:00pm'=>'3:00pm',
    '4:00pm'=>'4:00pm',
    '5:00pm'=>'5:00pm',
    '6:00pm'=>'6:00pm',
    '7:00pm'=>'7:00pm',
    '8:00pm'=>'8:00pm',
    '9:00pm'=>'9:00pm',
    '10:00pm'=>'10:00pm',
    '11:00pm'=>'11:00pm',
]
?>

<div class="col-md-12">
    <div class="row  visibility-box  {!! (1) ? "show" : "hide" !!}">
        <div class="bty-panel-collapse">
            <div>
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#timepickersetting"
                   aria-expanded="true">
                    <span class="icon"><i class="fa fa-chevron-down" aria-hidden="true"></i></span>
                    <span class="title">Setting</span>
                </a>
            </div>
            <div id="timepickersetting" class="collapse in" aria-expanded="true" style="">
                <div class="content bty-settings-panel">
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
                    <div class="form-group">
                        <div class="col-md-6">
                            <label class="col-sm-3 control-label text-left">Format</label>
                            <div class="col-sm-8">
                                {!! Form::select("datepicker_setting[custom_format]",$formats,isset($settings["datepicker_setting"]["custom_format"]) ? $settings["datepicker_setting"]["custom_format"] : null,["class" => "form-control"]) !!}
                            </div>
                        </div>
                        {{--<div class="col-md-6">--}}
                            {{--<label class="col-sm-3 control-label text-left" for="format">Format</label>--}}
                            {{--<div class="col-sm-8">--}}
                                {{--<input class="form-control" name="datepicker_setting[custom_format]" id="format" type="text" value="{{isset($settings['datepicker_setting']['custom_format'])?$settings['datepicker_setting']['custom_format']:''}}">--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        <div class="col-md-6">
                            <label class="col-sm-3 control-label text-left" for="timeStep">Step</label>
                            <div class="col-sm-8">
                                <input class="form-control" name="datepicker_setting[step]" id="timeStep" type="number" value="{{isset($settings['datepicker_setting']['step'])?$settings['datepicker_setting']['step']:''}}">
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6">
                            <label class="col-sm-3 control-label text-left">Min Time</label>
                            <div class="col-sm-8">
                                <input class="form-control" name="datepicker_setting[min_time]" type="text" value="{{isset($settings['datepicker_setting']['min_time'])?$settings['datepicker_setting']['min_time']:''}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="col-sm-3 control-label text-left">Max Time</label>
                            <div class="col-sm-8">
                                <input class="form-control" name="datepicker_setting[max_time]" type="text" value="{{isset($settings['datepicker_setting']['max_time'])?$settings['datepicker_setting']['max_time']:''}}">
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <label class="col-sm-3 control-label text-left">Disable Time Ranges</label>
                            <div class="col-sm-9" id="ranges">
                                <select id="disableTimeRanges" class="disableTimeRanges" name="datepicker_setting[ds_time_ranges][]" multiple="multiple">
                                    @foreach($hours as $key=>$value)
                                        <option value="{{$value}}">{{$value}}</option>
                                        @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6">
                            <label class="col-sm-3 control-label text-left">Lang</label>
                            <div class="col-sm-8">
                                {!! Form::select("datepicker_setting[language]",$languages,isset($settings["datepicker_setting"]["language"]) ? $settings["datepicker_setting"]["language"] : null,["class" => "form-control"]) !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="col-sm-3 control-label text-left">Orientation</label>
                            <div class="col-sm-8">
                                {!! Form::select("datepicker_setting[orientation]",$orientation,isset($settings["datepicker_setting"]["orientation"]) ? $settings["datepicker_setting"]["orientation"] : null,["class" => "form-control"]) !!}
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="col-md-4">
                                <div class="customcheck">
                                    <input type="hidden" name="" value="false">
                                    <input type="checkbox" id="closeOnWindowScroll" name="datepicker_setting[closeOnWindowScroll]" value="true"
                                            {{(isset($settings["datepicker_setting"]["closeOnWindowScroll"]))&&$settings["datepicker_setting"]["closeOnWindowScroll"]==true?"checked":''}}>
                                    <label for="closeOnWindowScroll">Close On Window Scroll</label>
                                </div>

                            </div>
                            <div class="col-md-4">
                                <div class="customcheck">
                                    <input type="hidden" name="" value="false">
                                    <input type="checkbox" id="disableTextInput" name="datepicker_setting[disableTextInput]" value="true"
                                            {{(isset($settings["datepicker_setting"]["disableTextInput"]))&&$settings["datepicker_setting"]["disableTextInput"]==true?"checked":''}}>
                                    <label for="disableTextInput">Disable Text Input</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="customcheck">
                                    <input type="hidden" name="" value="false">
                                    <input type="checkbox" id="forceRoundTime" name="datepicker_setting[forceRoundTime]" value="true"
                                            {{(isset($settings["datepicker_setting"]["forceRoundTime"]))&&$settings["datepicker_setting"]["forceRoundTime"]==true?"checked":''}}>
                                    <label for="forceRoundTime">Force Round Time</label>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="col-md-4">
                                <div class="customcheck">
                                    <input type="hidden" name="" value="false">
                                    <input type="checkbox" id="selectOnBlur" name="datepicker_setting[selectOnBlur]" value="true"
                                            {{(isset($settings["datepicker_setting"]["selectOnBlur"]))&&$settings["datepicker_setting"]["selectOnBlur"]==true?"checked":''}}>
                                    <label for="selectOnBlur">Select OnBlur</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="customcheck">
                                    <input type="hidden" name="" value="false">
                                    <input type="checkbox" id="show2400" name="datepicker_setting[show2400]" value="true"
                                            {{(isset($settings["datepicker_setting"]["show2400"]))&&$settings["datepicker_setting"]["show2400"]==true?"checked":''}}>
                                    <label for="show2400">Show 2400</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="customcheck">
                                    <input type="hidden" name="" value="false">
                                    <input type="checkbox" id="showDuration" name="datepicker_setting[showDuration]" value="true"
                                            {{(isset($settings["datepicker_setting"]["showDuration"]))&&$settings["datepicker_setting"]["showDuration"]==true?"checked":''}}>
                                    <label for="showDuration">Show Duration</label>
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
<script>
    var selectValues=[];
    $(document).ready(function() {
        $('.disableTimeRanges').select2();
        $('.disableTimeRanges').on('change', function() {
                $("ul.select2-selection__rendered li").each(function() {
                    selectValues.push($(this).text())
                });
            // console.log(selectValues);
            $('#disableTimeRanges').attr('value',selectValues);
        });
    });


</script>