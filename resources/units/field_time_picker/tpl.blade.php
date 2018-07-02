{!! BBstyle($_this->path.DS.'css/main.css',$_this) !!}
{!! BBstyle($_this->path.DS.'css/bootstrap-datepicker.min.css',$_this) !!}
{!! BBstyle($_this->path.DS.'css/jquery.timepicker.min.css',$_this) !!}
    <div>
        <input  id="basicExample" type="text" class="timepic {{isset($settings["input_style"])?$settings["input_style"]:""}}">
    </div>

{!! BBscript($_this->path.DS.'js/bootstrap-datepicker.min.js',$_this) !!}
{!! BBscript($_this->path.DS.'js/jquery.timepicker.min.js',$_this) !!}

<script>
    $(function() {
        $('#basicExample').timepicker({
            // 'disableTextInput': true,
        });
    });

    $( document ).ready(function() {
        var js_array = [<?php echo '"'.implode('","', isset($settings['datepicker_setting']['ds_time_ranges'])?$settings['datepicker_setting']['ds_time_ranges']:[]).'"' ?>];
        // console.log(js_array);
        function chunkArray(arr, chunk) {
            var i, j, tmp = [];
            for (i = 0, j = arr.length; i < j; i += chunk) {
                tmp.push(arr.slice(i, i + chunk));
            }
            return tmp;
        }
        // console.log(chunkArray(js_array, 2));

        $('#basicExample').timepicker({
            'timeFormat':'{{isset($settings["datepicker_setting"]["custom_format"])?$settings["datepicker_setting"]["custom_format"]:"g:ia"}}',
            'minTime': '{{isset($settings["datepicker_setting"]["min_time"])?$settings["datepicker_setting"]["min_time"]:"12:00am"}}',
            'maxTime': '{{isset($settings["datepicker_setting"]["max_time"])?$settings["datepicker_setting"]["max_time"]:""}}',
            'step': '{{isset($settings["datepicker_setting"]["step"])?$settings["datepicker_setting"]["step"]:"30"}}',
            'orientation':'{{isset($settings["datepicker_setting"]["orientation"])?$settings["datepicker_setting"]["orientation"]:"l"}}',
            'lang':'{{isset($settings["datepicker_setting"]["language"])?$settings["datepicker_setting"]["language"]:""}}',
            'closeOnWindowScroll':'{{isset($settings["datepicker_setting"]["closeOnWindowScroll"])?$settings["datepicker_setting"]["closeOnWindowScroll"]:false}}',
            'disableTextInput':'{{isset($settings["datepicker_setting"]["disableTextInput"])?$settings["datepicker_setting"]["disableTextInput"]:false}}',
            'forceRoundTime':'{{isset($settings["datepicker_setting"]["forceRoundTime"])?$settings["datepicker_setting"]["forceRoundTime"]:false}}',
            'selectOnBlur':'{{isset($settings["datepicker_setting"]["selectOnBlur"])?$settings["datepicker_setting"]["selectOnBlur"]:false}}',
            'show2400':'{{isset($settings["datepicker_setting"]["show2400"])?$settings["datepicker_setting"]["show2400"]:false}}',
            'showDuration':'{{isset($settings["datepicker_setting"]["showDuration"])?$settings["datepicker_setting"]["showDuration"]:false}}',
            'disableTimeRanges':chunkArray(js_array, 2)!=null?chunkArray(js_array, 2):[]
                });
    });
</script>