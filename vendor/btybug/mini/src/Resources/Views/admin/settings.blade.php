@extends('btybug::layouts.mTabs',['index'=>'mini_settings'])
@section('tab')
    <div class="row">
        {!! Form::open(['class'=>'form-horizontal']) !!}
        <div class="form-group">
            <div class="col-xs-8">
                <div class="input-group">
                    {!! BBbutton2('mini_unit','header','header','Select Default User Navbar',['model'=>$header]) !!}
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-xs-8">
                <div class="input-group">
                    {!! BBbutton2('mini_layouts','layout','layout','Select Default Layout',['model'=>$layout]) !!}
                </div>
            </div>
        </div>
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
        <div class="form-group">
            <label class="col-md-12" for="selectmultiple">Select User Details Form</label>
            <div class="col-md-4">
                <select  name="user_details_form_id" class="form-control" >
                    @if(isset($forms))
                        @foreach($forms as $key => $val)
                            <option value="{{$val->id}}"
                                    @if($selectedForm2 && $selectedForm2->val == $val->id)
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
    @include('resources::assests.magicModal')
@stop
@section('JS')
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" crossorigin="anonymous"></script>
    {!! HTML::script("public/js/UiElements/bb_styles.js?v.".rand(999,99999)) !!}
@stop
