{!! BBstyle($_this->path.DS.'css/main.css',$_this) !!}
{!! BBstyle($_this->path.DS.'css/bootstrap-datepicker.min.css',$_this) !!}
<div>
    <div id="event_period" class="{{isset($settings["icon_style"]) ? $settings["icon_style"] : ''}} {{isset($settings["input_style"]) ? $settings["input_style"] : ''}}">
        @if(isset($settings["datepicker_setting"]["type"]) && $settings["datepicker_setting"]["type"] == "component")
            <div class="input-group date">
                <input type="text" class="form-control"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
            </div>
        @elseif(isset($settings["datepicker_setting"]["type"]) && $settings["datepicker_setting"]["type"] == "embedded")
            <div></div>
        @elseif(isset($settings["datepicker_setting"]["type"]) && $settings["datepicker_setting"]["type"] == "range")
            <div class="input-daterange input-group" id="datepicker">
                <input type="text" class="input-sm form-control" name="start" />
                <span class="input-group-addon">to</span>
                <input type="text" class="input-sm form-control" name="end" />
            </div>
        @else
            <input type="text" class="actual_range" id="custom_datepicker">
        @endif
    </div>
</div>
<textarea id="datepicker_setting" class="hidden">{{isset($settings["datepicker_setting"]) ? json_encode($settings["datepicker_setting"],true) : ''}}</textarea>
{!! BBscript($_this->path.DS.'js/bootstrap-datepicker.min.js',$_this) !!}

<script>

    window.frameElement.contentWindow.targetFunction(1);

    function targetFunction(is_called){
        if(is_called) {
            var hidden_data = $('#datepicker_setting').val();
            if(hidden_data){
                hidden_data = JSON.parse(hidden_data);
            }
            var data = {};
            data.datepicker_setting = hidden_data;
            getSettings(data);
        }
    }
    function getSettings(data){
        var obj = $("#event_period");
        if(typeof window.onload === 'function'){
            data.datepicker_setting.autoclose = data.datepicker_setting.autoclose && data.datepicker_setting.autoclose == 'true' ? true : false;
            data.datepicker_setting.calendarWeeks = data.datepicker_setting.calendarWeeks && data.datepicker_setting.calendarWeeks == 'true' ? true : false;
            data.datepicker_setting.clearBtn = data.datepicker_setting.clearBtn && data.datepicker_setting.clearBtn == 1 ? true : false;
            data.datepicker_setting.format = data.datepicker_setting.custom_format ? data.datepicker_setting.custom_format : "mm/dd/yyyy";
            data.datepicker_setting.endDate = data.datepicker_setting.endDate ? data.datepicker_setting.endDate : '';
            data.datepicker_setting.startDate = data.datepicker_setting.startDate ? data.datepicker_setting.startDate : '';
            data.datepicker_setting.forceParse = data.datepicker_setting.forceParse && data.datepicker_setting.forceParse == 'true' ? true : false;
            data.datepicker_setting.keyboardNavigation = data.datepicker_setting.keyboardNavigation && data.datepicker_setting.keyboardNavigation == 'true' ? true : false;
            data.datepicker_setting.language = data.datepicker_setting.language ? data.datepicker_setting.language : "en";
            data.datepicker_setting.maxViewMode = data.datepicker_setting.maxViewMode ? parseInt(data.datepicker_setting.maxViewMode) : 4;
            data.datepicker_setting.minViewMode = data.datepicker_setting.minViewMode ? parseInt(data.datepicker_setting.minViewMode) : 0;
            data.datepicker_setting.startView = data.datepicker_setting.startView ? parseInt(data.datepicker_setting.startView) : 0;
            data.datepicker_setting.multidate = data.datepicker_setting.multidate && data.datepicker_setting.multidate == 'true' ? true : false;
            data.datepicker_setting.multidateSeparator = data.datepicker_setting.multidateSeparator ? data.datepicker_setting.multidateSeparator : ",";
            if(data.datepicker_setting.todayBtn && data.datepicker_setting.todayBtn != '0'){
                if(data.datepicker_setting.todayBtn == '1'){
                    data.datepicker_setting.todayBtn = parseInt(data.datepicker_setting.todayBtn);
                }
            }else{
                data.datepicker_setting.todayBtn = false;
            }
            data.datepicker_setting.todayHighlight = data.datepicker_setting.todayHighlight && data.datepicker_setting.todayHighlight == "true" ? true : false;
            data.datepicker_setting.weekStart = data.datepicker_setting.weekStart ? parseInt(data.datepicker_setting.weekStart) : 0;
            delete data.datepicker_setting.custom_format;

            var type = data.datepicker_setting.type;
            var finall_settings = data.datepicker_setting;
            if(type && type === "component"){
                return obj.children('.input-group.date').datepicker("destroy").datepicker(finall_settings);
            }else if(type && type === "embedded"){
                return obj.children('div').datepicker("destroy").datepicker(finall_settings);
            }else if(type && type === "range"){
                return obj.children('.input-daterange').datepicker("destroy").datepicker(finall_settings);
            }
            return obj.children("input").datepicker("destroy").datepicker(finall_settings);
        }else{
            window.onload = function(){
                if(obj.length) {
                    if(!data.datepicker_setting){
                        return obj.children("input").datepicker();
                    }
                    data.datepicker_setting.autoclose = data.datepicker_setting.autoclose && data.datepicker_setting.autoclose == 'true' ? true : false;
                    data.datepicker_setting.calendarWeeks = data.datepicker_setting.calendarWeeks && data.datepicker_setting.calendarWeeks == 'true' ? true : false;
                    data.datepicker_setting.clearBtn = data.datepicker_setting.clearBtn && data.datepicker_setting.clearBtn == 1 ? true : false;
                    data.datepicker_setting.format = data.datepicker_setting.custom_format ? data.datepicker_setting.custom_format : "mm/dd/yyyy";
                    data.datepicker_setting.endDate = data.datepicker_setting.endDate ? data.datepicker_setting.endDate : '';
                    data.datepicker_setting.startDate = data.datepicker_setting.startDate ? data.datepicker_setting.startDate : '';
                    data.datepicker_setting.forceParse = data.datepicker_setting.forceParse && data.datepicker_setting.forceParse == 'true' ? true : false;
                    data.datepicker_setting.keyboardNavigation = data.datepicker_setting.keyboardNavigation && data.datepicker_setting.keyboardNavigation == 'true' ? true : false;
                    data.datepicker_setting.language = data.datepicker_setting.language ? data.datepicker_setting.language : "en";
                    data.datepicker_setting.maxViewMode = data.datepicker_setting.maxViewMode ? parseInt(data.datepicker_setting.maxViewMode) : 4;
                    data.datepicker_setting.minViewMode = data.datepicker_setting.minViewMode ? parseInt(data.datepicker_setting.minViewMode) : 0;
                    data.datepicker_setting.startView = data.datepicker_setting.startView ? parseInt(data.datepicker_setting.startView) : 0;
                    data.datepicker_setting.multidate = data.datepicker_setting.multidate && data.datepicker_setting.multidate == 'true' ? true : false;
                    data.datepicker_setting.multidateSeparator = data.datepicker_setting.multidateSeparator ? data.datepicker_setting.multidateSeparator : ",";
                    if(data.datepicker_setting.todayBtn && data.datepicker_setting.todayBtn != '0'){
                        if(data.datepicker_setting.todayBtn == '1'){
                            data.datepicker_setting.todayBtn = parseInt(data.datepicker_setting.todayBtn);
                        }
                    }else{
                        data.datepicker_setting.todayBtn = false;
                    }
                    data.datepicker_setting.todayHighlight = data.datepicker_setting.todayHighlight && data.datepicker_setting.todayHighlight == "true" ? true : false;
                    data.datepicker_setting.weekStart = data.datepicker_setting.weekStart ? parseInt(data.datepicker_setting.weekStart) : 0;
                    delete data.datepicker_setting.custom_format;

                    var type = data.datepicker_setting.type;
                    var finall_settings = data.datepicker_setting;
                    if(type && type === "component"){
                        return obj.children('.input-group.date').datepicker("destroy").datepicker(finall_settings);
                    }else if(type && type === "embedded"){
                        return obj.children('div').datepicker("destroy").datepicker(finall_settings);
                    }else if(type && type === "range"){
                        return obj.children('.input-daterange').datepicker("destroy").datepicker(finall_settings);
                    }
                    return obj.children("input").datepicker("destroy").datepicker(finall_settings);
                }
            }
        }
    }

</script>