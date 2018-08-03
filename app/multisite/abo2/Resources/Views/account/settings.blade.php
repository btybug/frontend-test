@extends('mini::layouts.app')
@extends('mini::layouts.mTabs',['index'=>'mini_my_account_settings'])
@section('tab')
    <div class="row">
    {!! Form::open(['class'=>'form-horizontal']) !!}

    <div class="form-group">
        <label class="col-md-12" for="selectmultiple">Select default user's form</label>
        <div class="col-md-4">
            <select id="selectmultiple" name="user_set_form_id" class="form-control" >
                @if(isset($forms))
                    @foreach($forms as $key => $val)
                        <option value="{{$val->id}}"
                                @if($selectedForm && $selectedForm->val == $val->id)
                                selected
                                @endif
                        >
                            {{$val->title}}</option>
                    @endforeach
                @endif
            </select>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-xs-offset-4 col-xs-8">
            <button id="siteSubmit" type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
    {!! Form::close() !!}

    </div>
@stop