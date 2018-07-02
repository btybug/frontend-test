{{--Form 13 --}}
<h2 class="form-title">Create Post
</h2>


<div class="col-md-12">
    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        <li class="nav-item active">
            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-general" role="tab"
               aria-controls="pills-general" aria-selected="true">General</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="pills-price-tab" data-toggle="pill" href="#pills-price" role="tab"
               aria-controls="pills-price" aria-selected="false">Price</a>
        </li>
    </ul>
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane active" id="pills-general" role="tabpanel" aria-labelledby="pills-general-tab">
            <div class="field-box">
                <fieldset class="bty-form-textarea" id="bty-input-id-10">
                    {!! Form::textarea(get_field_attr(10,'table_name')."_".get_field_attr(10,'column_name'),null,['class' => 'bty-textarea-1','placeholder' => get_field_attr(10,'placeholder')]) !!}
                </fieldset>
                <fieldset class="bty-form-text" id="bty-input-id-11">
                    <div>
                        {!! Form::text(get_field_attr(11,'table_name')."_".get_field_attr(11,'column_name'),null,['class' => 'bty-input-label-5','placeholder' => get_field_attr(11,'placeholder')]) !!}
                        <label>{!! get_field_attr(11,'label') !!}</label>
                    </div>
                </fieldset>


                <fieldset class="bty-form-select" id="bty-input-id-12">
                    <div class="bty-input-select-1">
                        {!! Form::select(get_field_attr(12,'table_name')."_".get_field_attr(12,'column_name'),get_field_data(12),null,['placeholder' => get_field_attr(12,'placeholder'),'class' => 'form-control input-md']) !!}
                    </div>
                </fieldset>
            </div>
        </div>
        <div class="tab-pane fade" id="pills-price" role="tabpanel" aria-labelledby="pills-price-tab">
            @include('payments::settings.price._partials.forms.quantity_price')
        </div>
    </div>
</div>
<button type="submit" class="bty-btn bty-btn-save"><span>Save</span></button>