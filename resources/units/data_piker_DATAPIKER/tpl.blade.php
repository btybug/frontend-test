<input data-toggle="datepicker" class="form-control input-sm" name="{!! isset($settings['field_id'])?get_field_data($settings['field_id'],'name'):''!!}">
{!! BBstyle($_this->path.DS.'css'.DS.'themes'.DS.'datepicker.css') !!}
{!! BBscript($_this->path.DS.'js'.DS.'datepicker.js',$_this) !!}
{!! BBscript($_this->path.DS.'js'.DS.'picker.date.js',$_this) !!}
<script>
$(function () {
    $('[data-toggle="datepicker"]').datepicker();
})

</script>