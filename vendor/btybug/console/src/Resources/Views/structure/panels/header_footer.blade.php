<div class="form-group">
    <div class="col-md-12">
        {{Form::hidden('header',0)}}
        {{Form::hidden('footer',0)}}
        <label class="bd_layout pull-left m-r-15">
            {!! Form::checkbox('header',1,null,['style' => 'position:initial;z-index:1;']) !!}
            <span class="labls">Header</span>

        </label>
        <label class="bd_layout">
            {!! Form::checkbox('footer',1,null,['style' => 'position:initial;z-index:1;']) !!}
            <span class="labls">Footer</span>

        </label>
    </div>
</div>