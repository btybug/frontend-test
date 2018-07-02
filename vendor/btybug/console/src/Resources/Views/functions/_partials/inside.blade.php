<div class="removable_parent">
    <div class="col-md-12 m-10">
        <div class="col-md-5">
            <label class="col-md-4 control-label">Select column</label>
            <div class="col-md-8">
                {!! Form::select("conditions[$slug][$new_slug][column]",BBGetTableColumn($table),
                (isset($inside['column'])) ? $inside['column'] : null,['class' => 'form-control column-field']) !!}
            </div>
        </div>
        <div class="col-md-6">
            <label class="col-md-2 control-label">Value</label>
            <div class="col-md-5">
                {!! Form::select("conditions[$slug][$new_slug][operator]",
                    [
                        'equal' => 'Equal',
                        'not_equal' => 'Not equal',
                        'more' => '>',
                        'less' => '<',
                        'more_and_equal' => '>=',
                        'less_and_equal' => '<=',
                        'contains' => 'Contains',
                        'not_contains' => 'Not contains',
                        'in' => 'In',
                        'not_in' => 'Not in',
                        'between' => 'Between',
                        'not_between' => 'Not between',
                        'single_date' => 'Single Date',
                        'between_date' => 'Between Date',
                        'not_between_date' => 'Not between Date',
                        'is_null' => 'Is NULL',
                        'not_is_null' => 'Is not NULL',
                    ]
                    ,(isset($inside["operator"])) ? $inside['operator'] : null,
                    ['class' => 'form-control select-operator','data-slug' => $slug,'data-new-slug' => $new_slug]) !!}
            </div>
            <div class="col-md-5 expression-place">
                @if(isset($inside["operator"]))
                    @if($inside['operator'] == 'in' || $inside['operator'] == 'not_in')
                        @include('console::functions._partials.operators.in')
                    @elseif($inside['operator'] == 'single_date')
                        @include('console::functions._partials.operators.single_date')
                    @elseif($inside['operator'] == 'between' || $inside['operator'] == 'not_between')
                        @include('console::functions._partials.operators.between')
                    @elseif($inside['operator'] == 'between_date' || $inside['operator'] == 'not_between_date')
                        @include('console::functions._partials.operators.between_date')
                    @elseif($inside['operator'] == 'is_null' || $inside['operator'] == 'not_is_null')
                        {{--Nothing show--}}
                    @else
                        @include('console::functions._partials.operators.equal')
                    @endif
                @else
                    @include('console::functions._partials.operators.equal')
                @endif
            </div>
        </div>
        <div class="col-md-1">
            <button type="button" class="btn btn-sm btn-danger pull-right remove_this_field"><i class=" fa fa-minus"></i></button>
        </div>
    </div>
    <div class="col-md-2 col-md-offset-5">
        {!! Form::select("conditions[$slug][$new_slug][condition]",
        ['and' => 'and','or' => 'or']
        ,(isset($inside['condition'])) ? $inside['condition'] : null,['class' => 'form-control']) !!}
    </div>
    <div class="clearfix"></div>
</div>