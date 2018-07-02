@if($field->type)
    @if($field->type == "special")
        <div class="col-md-8">
            <div class="form-group">
                <div class="">
                    {!! BBbutton2('unit','default_value','specialFields','select input',['class'=>'form-control','model'=>$field->toArray()]) !!}
                </div>
            </div>
        </div>
    @else

        @if($field->type == "text" or $field->type == "textarea")
            <div class="col-md-8">
                <div class="form-group">
                    <label class="col-sm-3 p-l-0" for="default_value_field">Default value</label>
                    <div class="col-md-6">
                        {!! Form::text('default_value', null, ['class' => 'form-control','placeholder' => 'Enter default value', 'id' => 'default_value_field']) !!}
                    </div>
                </div>
            </div>
        @else
            <div class="col-md-8">
                <div class="form-group">
                    <label class="col-xs-4 col-md-4 control-label" for="name">Data Source</label>
                    <div class="col-xs-8 col-md-8">
                        <!-- check if Data source is data-source -->
                        {!! Form::select('data_source',[
                         ''=>'-- Select Data source --',
                         'manual'=>'Manual',
                         'api'=>'From api',
                         'related'=>'Related',
                         'bb'=>'BB Functions',
                         'file'=>'File'], null,['class'=>'form-control','id'=>'data_source']) !!}
                    </div>
                </div>
                <div class="select_op_box">
                    {{--{!! dd($field->json_data) !!}--}}
                    @if($field->data_source == 'manual')
                        <div class="form-group data_source_manual">
                            {!! Form::textarea('json_data[manual]',null,['class' => 'form-control','id' => 'data_source_manual']) !!}
                        </div>
                    @endif
                    @if($field->data_source == 'related')
                        <div class="form-group data-source-box">
                            <label class="col-md-4 control-label" for="bbfunction">Select Table</label>
                            <div class="col-md-4">
                                {!! Form::select('json_data[data_source_table_name]',['' => 'Select Table'] + BBGetTables(), null,['class' => 'form-control','id' => 'data_source_table_name']) !!}
                            </div>
                        </div>
                        @if(isset($field->json_data['data_source_table_name']) && count(BBGetTableColumn($field->json_data['data_source_table_name'])))
                            <div class="form-group columns_list">
                                <label class="col-md-4 control-label" for="bbfunction">Select Column</label>
                                <div class="col-md-4">
                                    {!! Form::select('json_data[data_source_columns]',['' => 'Select Column'] + BBGetTableColumn($field->json_data['data_source_table_name']) , null,['class' => 'form-control','id' => 'table_column']) !!}
                                </div>
                            </div>
                        @endif
                    @endif

                    @if($field->data_source == 'api')
                        <div class="form-group data_source_api">
                            {!! Form::text('json_data[api]',null,['class' => 'btn btn-warning btn-md input-md','id' => 'data_source_api','placeholder' => 'Put Api Url ...']) !!}
                        </div>
                    @endif

                    @if($field->data_source == 'bb')
                        <div class="form-group data-source-box">
                            <label class="col-md-4 control-label" for="bbfunction">Insert BB</label>
                            <div class="col-md-4">
                                {!! Form::text('json_data[bb]',null,['class' => 'btn btn-warning btn-md input-md']) !!}
                            </div>
                        </div>
                    @endif

                    @if($field->data_source == 'file')
                        <div class="form-group">
                            <label class="col-xs-4 col-md-4 control-label" for="selectbasic">Files</label>
                            <div class="col-xs-8 col-md-8">
                                {!! BBbutton('json_data[file]','file-unit','Select File',['class' => 'form-control input-md','data-type' => 'files','model' => $field->json_data]) !!}
                            </div>
                        </div>
                    @endif
                    {{--<div class="data-source-box">--}}
                    {{--@if(isset($settings['data_source_type_val']))--}}
                    {{--<div class="form-group file-box">--}}
                    {{--<div class="col-xs-8 col-md-offset-4">--}}
                    {{--{!! Form::select('data_source_type_val',['' => 'Select Data Value'] + (array)\App\helpers\FieldHelper::getHeading($settings['file-unit']),$settings['data_source_type_val'],['class' => 'form-control','id' =>'data_source_type_val']) !!}--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--@endif--}}
                    {{--@if(isset($settings['data_source_type_key']))--}}
                    {{--<div class="form-group file-box">--}}
                    {{--<div class="col-xs-8 col-md-offset-4">--}}
                    {{--{!! Form::select('data_source_type_key',['' => 'Select Data Key'] + (array)\App\helpers\FieldHelper::getHeading($settings['file-unit']),$settings['data_source_type_key'],['class' => 'form-control','id' =>'data_source_type_key']) !!}--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--@if(isset($settings['data_source_type_default']))--}}
                    {{--<div class="form-group file-box">--}}
                    {{--<div class="col-xs-8 col-md-offset-4">--}}
                    {{--{!! Form::select('data_source_type_default', ['' => 'Select Default'] + (array)\App\helpers\FieldHelper::getPluck($settings['file-unit'],$settings['data_source_type_key']),$settings['data_source_type_default'],['class' => 'form-control','id' =>'data_source_type_default']) !!}--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--@endif--}}
                    {{--@endif--}}
                    {{--</div>--}}
                </div>
            </div>

        @endif
    @endif
@endif