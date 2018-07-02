<div class="col-md-12">
    <h2 class="form-title">Form</h2>


    <div class="col-md-12">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item active">
                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-general" role="tab"
                   aria-controls="pills-general" aria-selected="true">General</a>
            </li>
                    </ul>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane active" id="pills-general" role="tabpanel" aria-labelledby="pills-general-tab">
                <div class="field-box">
                    <fieldset class="bty-form-text" id="bty-input-id-28">
    <div>
        {!! Form::text(get_field_attr(28,'table_name')."_".get_field_attr(28,'column_name'),null,['class' => 'bty-input-label-5','placeholder' => get_field_attr(28,'placeholder')]) !!}
        <label>{!! get_field_attr(28,'label') !!}</label>
    </div>
</fieldset>


<fieldset class="bty-form-select" id="bty-input-id-29">
    <div class="bty-input-select-1">
        {!! Form::select(get_field_attr(29,'table_name')."_".get_field_attr(29,'column_name'),get_field_data(29),null,['placeholder' => get_field_attr(29,'placeholder'),'class' => 'form-control input-md']) !!}
    </div>
</fieldset>
<fieldset class="bty-form-textarea" id="bty-input-id-30">
    {!! Form::textarea(get_field_attr(30,'table_name')."_".get_field_attr(30,'column_name'),null,['class' => 'bty-textarea-1','placeholder' => get_field_attr(30,'placeholder')]) !!}
</fieldset>

                </div>
            </div>
                    </div>
    </div>
    </div>
<button type="submit" class="bty-btn bty-btn-save"><span>Save</span></button>


</div>
