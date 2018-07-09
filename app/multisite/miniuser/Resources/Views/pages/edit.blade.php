@extends('btybug::layouts.mTabs',['index'=>'mini_user_page_edit'])
@section('tab')
    {!! Form::model($page,['url' => route('mini_user_page_edit',$id), 'id' => 'page_settings_form','files' => true]) !!}

    <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 col-xl-9 p-20">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 page-data p-20">
            <div class="panel panel-default custompanel m-t-20">
                <div class="panel-heading">General Settings</div>
                <div class="panel-body">
                    <div class="form-group row">
                        <label for="page_name" class="col-2 col-form-label">Page Name</label>
                        <div class="col-10">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-adn"></i>
                                </div>
                                {!! Form::text('title',null,['class'=>'form-control here','id'=>'page_name']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="page_icon" class="col-2 col-form-label">Page Icon</label>
                        <div class="col-10">
                            {!! Form::text('page_icon',null,['class'=>'form-control here','id'=>'page_icon']) !!}
                        </div>
                    </div>
                    <div class="form-group row">
                        {{Form::label('icon', 'Page Icon',['class' => 'col-sm-2 control-label'])}}
                        <div class="col-sm-4">
                            <div class="input-group iconpicker-container">
                                {{Form::text('icon', null,
                                ['class' =>$errors->has('icon') ? 'icon icp icp-auto iconpicker-element iconpicker-input form-control  is-invalid' : "icon icp icp-auto iconpicker-element iconpicker-input form-control ",
                                'placeholder' => 'icon'])}}
                                <span class="input-group-addon"><i class="fas fa-archive"></i></span>
                            </div>
                            @if ($errors->has('icon'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('icon') }}</strong></span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="select" class="col-2 col-form-label">Tags</label>
                        <div class="col-10">
                            <select id="select" name="select" class="custom-select">
                                <option value="rabbit">Rabbit</option>
                                <option value="duck">Duck</option>
                                <option value="fish">Fish</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="page_description" class="col-2 col-form-label">Page Description</label>
                        <div class="col-10">
                            <textarea id="page_description" name="page_description" cols="40" rows="5" class="form-control"></textarea>
                        </div>
                    </div>


                    <div class="form-group row">
                        <div class="offset-2 col-10">
                            <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>


    </div>
    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 p-20">
        <div class="panel panel-default custompanel m-t-20">
            <div class="panel-heading">General</div>
            <div class="panel-body">
                {{ Form::submit('Save', array('class' => 'save_btn m-b-5 btn-block','style' => "width:100%;")) }}
            </div>
        </div>
    </div>


    {!! Form::close() !!}

    <input type="hidden" id="page" value="{!! $page->id !!}">
@stop
@section('css')
    {!! Html::style("public/css/fontawesome-iconpicker.min.css") !!}
@stop
@section('js')
    {!! Html::script("public/js/fontawesome-iconpicker.min.js") !!}

    <script>
        $('.icp-auto').iconpicker();
    </script>
@stop

