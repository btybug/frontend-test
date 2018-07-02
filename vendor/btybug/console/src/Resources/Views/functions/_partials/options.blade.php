@if(isset($model) && isset($model['conditions']) && count($model['conditions']))
    @foreach($model['conditions'] as $slug => $logics)
        <div class="custom_removable_general_parent">
            <div class="form-group form-horizontal col-md-11">
                <div class="inside-conditions">
                    @if(count($logics))
                        @foreach($logics as $new_slug => $inside)
                            @if($new_slug != 'logic_condition')
                                @include('console::functions._partials.inside')
                            @endif
                        @endforeach
                    @endif
                </div>
                <div class="col-md-12 text-center m-10">
                    <a href="javascript:void(0)" data-slug="{{ $slug }}" class="btn btn-md btn-info cust-btn add_new_inside"><i class=" fa fa-plus"></i></a>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="col-md-1 text-center">
                <button type="button" class="btn btn-md btn-danger custom_general_remove"><i class=" fa fa-minus"></i></button>
            </div>
            <div class="clearfix"></div>
            <div class="col-md-1 col-md-offset-5 m-b-10">
                {!! Form::select("conditions[$slug][logic_condition]",
                    ['and' => 'and','or' => 'or']
               ,(isset($logics['logic_condition'])) ? $logics['logic_condition'] : null,['class' => 'form-control']) !!}
            </div>
        </div>
    @endforeach
@else
    <div class="custom_removable_general_parent">
        <div class="form-group form-horizontal col-md-11">
            <div class="inside-conditions">
                @include('console::functions._partials.inside')
            </div>
            <div class="col-md-12 text-center m-10">
                <a href="javascript:void(0)" data-slug="{{ $slug }}" class="btn btn-md btn-info cust-btn add_new_inside"><i class=" fa fa-plus"></i></a>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="col-md-1 text-center">
            <button type="button" class="btn btn-md btn-danger custom_general_remove"><i class=" fa fa-minus"></i></button>
        </div>
        <div class="clearfix"></div>
        <div class="col-md-1 col-md-offset-5 m-b-10">
            {!! Form::select("conditions[$slug][logic_condition]",
                ['and' => 'and','or' => 'or']
           ,null,['class' => 'form-control']) !!}
        </div>
    </div>

@endif
