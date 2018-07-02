

@option('general','f',$data)
<div class="bty-settings-panel">
    <div class="col-md-12">
        <div class="form-group">
            <div class="col-md-4">
                <label for="">Functions</label>
            </div>
            <div class="col-md-8">
                {!! Form::select('main_function',[
                null=>'Main Function',
                'authUser'=>'Auth User',
                'specificUser'=>'Specific User',
                'specificUsers'=>'Specific Users',
                'specificPost'=>'Specific Posts'
                ],null,['class'=>'form-control double-select','data-value'=>'main']) !!}
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<div id="main_function_main_specificUser"
     class="main_function_main collapse in @if(issetReturn($settings,'main_function') !=='specificUser') hide   @endif"
     data-type="unit" aria-expanded="true" style="">
    <div class="bty-settings-panel">
        <div class="col-md-12">
            <div class="form-group">
                <div class="col-md-4">
                    <label for="">Specific User</label>
                </div>
                <div class="col-md-8">
                    {!! Form::select('specificUser',\Btybug\User\User::all()->pluck('username','id'),null,['class'=>'form-control ']) !!}

                </div>
                <div class="clearfix"></div>
            </div>
        </div>

    </div>
</div>
<div id="main_function_main_specificPost"
     class="main_function_main collapse in @if(issetReturn($settings,'main_function') !=='specificPost') hide   @endif"
     data-type="unit" aria-expanded="true" style="">
    <div class="bty-settings-panel">
        <div class="col-md-12">
            <div class="form-group">
                <div class="col-md-4">
                    <label for="">Specific Post</label>
                </div>
                <div class="col-md-8">
                    {!! Form::select('specificPost',BBgetTable('posts')->pluck('title','id'),null,['class'=>'form-control ']) !!}

                </div>
                <div class="clearfix"></div>
            </div>
        </div>

    </div>
</div>

<div id="main_function_main_specificUsers"
     class="main_function_main collapse in @if(issetReturn($settings,'main_function') !=='specificUsers') hide   @endif"
     data-type="unit" aria-expanded="true" style="">
    <div class="bty-settings-panel">
        <div class="col-md-12">
            <div class="form-group">
                <div class="col-md-4">
                    <label for="">Specific Users</label>
                </div>
                <div class="col-md-8">
                    {!! Form::select('specificUsers[]',\Btybug\User\User::all()->pluck('username','id'),$settings['specificUsers'],['class'=>'form-control specific-users','multiple'=>'multiple']) !!}
                </div>
                <div class="clearfix"></div>
            </div>
        </div>

    </div>
</div>
@endoption

@option('name','f',$data)
<div class="bty-settings-panel">
    <div class="col-md-12">
        <div class="form-group">
            <div class="col-md-12">
                {!! BBmediaButton('my_image',$settings) !!}
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="form-group">
            <div class="col-md-4">
                <label for="">Name Area Type</label>
            </div>
            <div class="col-md-8">

                {!! Form::select('name_type',[null=>'Select Content Type','static'=>'Static','dynamic'=>'Dynamic'],null,['class'=>'form-control double-select','data-value'=>'name']) !!}
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>

<div id="name_type_name_static"
     class="name_type_name collapse in @if(issetReturn($settings,'name_type') !=='static') hide   @endif"
     data-type="unit" aria-expanded="true" style="">
    <div class="bty-settings-panel">
        <div class="col-md-12">
            <div class="form-group">
                <div class="col-md-4">
                    <label for="">Static Name</label>
                </div>

                @if(issetReturn($settings,'main_function') =='specificUsers')
                    @if(isset($settings['specificUsers']))
                        @foreach($settings['specificUsers'] as $user_id)
                            <div class="col-md-12">
                                <div class="col-md-4">
                                    <label for="">{!! \Btybug\User\User::find($user_id)->username !!}</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="names[{!! $user_id !!}]" class="form-control">
                                </div>
                            </div>
                        @endforeach
                    @endif

                @endif
                @if(issetReturn($settings,'main_function') =='specificUser')
                    @if(isset($settings['specificUser']) && \Btybug\User\User::find($settings['specificUser']))
                        <div class="col-md-12">
                            <div class="col-md-4">
                                <label for="">{!! \Btybug\User\User::find($settings['specificUser'])->username !!}</label>
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="specificUserName" class="form-control">
                            </div>
                        </div>
                    @else
                        Select Specific User From General Tab Functions
                    @endif
                @endif
                <div class="clearfix"></div>
            </div>

        </div>
    </div>
</div>


<div id="name_type_name_dynamic"
     class="name_type_dynamic user_table collapse in @if(issetReturn($settings,'name_type') !=='dynamic' || issetReturn($settings,'main_function')=='specificPost') hide   @endif"
     data-type="unit" aria-expanded="true" style="">
    <div class="bty-settings-panel">
        <div class="col-md-12">
            <div class="form-group">
                <div class="col-md-4">
                    <label for="">Dynamic Name</label>
                </div>
                <div class="col-md-8">
                {!! Form::select('dynamic_name', BBGetTableColumn('users'),null,['class'=>'form-control']) !!}
                </div>
                <div class="clearfix"></div>
            </div>
        </div>

    </div>
</div>

<div id="name_type_name_dynamic"
     class="name_type_dynamic posts_table collapse in @if(issetReturn($settings,'main_function')!='specificPost') hide   @endif"
     data-type="unit" aria-expanded="true" style="">
    <div class="bty-settings-panel">
        <div class="col-md-12">
            <div class="form-group">
                <div class="col-md-4">
                    <label for="">Dynamic Name</label>
                </div>
                <div class="col-md-8">
                {!! Form::select('dynamic_name', BBGetTableColumn('posts'),null,['class'=>'form-control']) !!}
                </div>
                <div class="clearfix"></div>
            </div>
        </div>

    </div>
</div>
@endoption


{!! BBstyle(public_path('css'.DS.'select2'.DS.'select2.min.css')) !!}
{!! BBscript(public_path('js'.DS.'select2'.DS.'select2.full.min.js')) !!}
{!! BBscript($_this->path.DS.'js'.DS.'settings.js') !!}
<script>
    $(function () {
        $('body').find('.specific-users').select2();
    });
</script>





