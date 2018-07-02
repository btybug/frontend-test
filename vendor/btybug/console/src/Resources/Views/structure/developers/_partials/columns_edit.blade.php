<div class="col-md-12">
    {!! Form::open(['url' => url('/admin/console/structure/tables/edit-column',[$table,$table_column]),'id' => 'edit-column-form']) !!}
        <div class="form-group">
            <div class="col-md-6">
                <label>
                    Name
                    {!! Form::text('column[0][name]',$column[0]->Field,['class' => 'form-control input-md']) !!}
                </label>
            </div><div class="col-md-6">
                <label>
                    Type
                    <select name="column[0][type]" class="form-control">@foreach($tbtypes as $k=>$v) <option value="{!! $k !!}"  {!! ($type == $k) ? "selected" : "null" !!} >{!! $v !!}</option> @endforeach</select>
                </label>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-6">
                <label>
                    Length
                    <input type="text" name="column[0][lenght]" value="{{ $length }}" class="form-control" />
                </label>
            </div><div class="col-md-6">
                <label>
                    Default
                    <input type="text" name="column[0][default]" value="{{ $column[0]->Default }}" class="form-control" />
                </label>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-4">
                <label>
                    Nullable
                    <input type="checkbox" name="column[0][nullable]" value="YES" checked="{!! ($column[0]->Null == "YES") ? 'checked' : '' !!}"/>
                </label>
            </div>
            <div class="col-md-4">
                <label>
                    Unique
                    <input type="checkbox" name="column[0][unique]" value="YES" />
                </label>
            </div>
            <div class="col-md-4">
                <label>
                    Field
                    YES <input value="yes" type="radio" name="column[0][field]" {!! ($field) ? "checked" : "null" !!}  />
                    NO <input value="no" type="radio" name="column[0][field]" {!! ($field) ? "null" : "checked" !!} />
                </label>
            </div>
        </div>
        <div class="form-group">
            {!! Form::button('Save',['class' => 'btn btn-info pull-right edit-column-btn','data-column' => $column[0]->Field]) !!}
        </div>
    {!! Form::close() !!}
</div>