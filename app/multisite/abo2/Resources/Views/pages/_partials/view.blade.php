<div id="page_settings_form" class="d-flex w-100 hide">
    <div class="col-lg-9 p-0">
        {!! Form::model($page,['url' => route('mini_user_page_edit',$page->id),'files' => true]) !!}
            <div class="">
                <div class="panel panel-default custompanel m-t-20">
                    <div class="panel-heading">General Settings</div>
                    <div class="panel-body">
                        @if($page->type!='core' && $page->type!='plugin' )
                            <div class="form-group row">
                                <label for="page_name" class="col-2 col-form-label">Statuse</label>
                                <div class="col-10">
                                    <div class="input-group">
                                        {!! Form::select('status',['draft'=>'Draft','published'=>'Published'],old('status'),['class'=>'select form-control']) !!}
                                    </div>
                                </div>
                            </div>


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
                                <label for="page_name" class="col-2 col-form-label">Page Template</label>
                                <div class="col-10">
                                    {!! BBbutton2('mini_unit','template',"user_unit","Change",['class'=>'btn btn-default change-layout','data-type'=>'frontend_sidebar','id'=>'chage-content','model'=>$page]) !!}
                                    {{--<a href="{!! route('mini_page_edit',$page->id) !!}" class="btn btn-primary">Change</a>--}}
                                </div>
                            </div>
                        @endif


                        <div class="form-group row">
                            <label for="page_description" class="col-2 col-form-label">Key Words</label>
                            <div class="col-10">
                                <input id="key_words" name="key_words" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="page_description" class="col-2 col-form-label">Page Description</label>
                            <div class="col-10">
                        <textarea id="page_description" name="page_description" cols="40" rows="5"
                                  class="form-control"></textarea>
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
        {!! Form::close() !!}
    </div>
    @if($page->type=='custom')
    <div class="col-lg-3 pr-0">
    <div class="bg-light m-t-20 h-100" >
        <div class="col-md-4">
            <button class="btn btn-warning delete_page" data-id="{!! $page->id !!}"><i class="fa fa-trash"></i>Delete Page</button>
        </div>
        </div>
    </div>
    @endif
    <input type="hidden" id="page" value="{!! $page->id !!}">
</div>
