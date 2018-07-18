{!! Form::model($model,['class'=>'form-horizontal']) !!}
{!! Form::hidden('id') !!}
        <div class="form-group">
            <label for="page_title" class="control-label col-xs-4">Title</label>
            <div class="col-xs-8">
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-bullhorn"></i>
                    </div>
                    {!! Form::text('title',null,['class'=>'form-control','id'=>'page_title']) !!}
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="page_url" class="control-label col-xs-4">Url</label>
            <div class="col-xs-8">
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-link"></i>
                    </div>
                    {!! Form::text('url',null,['class'=>'form-control','id'=>'page_url']) !!}
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="page_status" class="control-label col-xs-4">Page Status</label>
            <div class="col-xs-8">
                {!! Form::select('status',['draft'=>'Draft','published'=>'Published'],null,['class'=>'form-control','id'=>'page_status']) !!}
            </div>
        </div>
        <div class="form-group">
            <label for="membership" class="control-label col-xs-4">Membership</label>
            <div class="col-xs-8">
                {!! Form::select('membership',['free'=>'Free','pro'=>'Pro'],null,['class'=>'form-control','id'=>'membership']) !!}
            </div>
        </div>
        <div class="form-group">
            <label for="tag_unit_for_page" class="control-label col-xs-4">Tag Unit To Page</label>
            <div class="col-xs-8">
                {!! Form::select('template',[
                'mini_profile'=>'mini_profile',
                'mini_samuel'=>'mini_samuel',
                'mini_urkis'=>'mini_urkis',
                'mini_urkis_cv'=>'mini_urkis_cv',
                ],null,['class'=>'form-control','id'=>'tag_unit_for_page']) !!}
            </div>
        </div>
        <div class="form-group">
            <label for="page_url" class="control-label col-xs-4"></label>
            <div class="col-xs-8">
                <div class="input-group">
                    {!! BBmediaButton('icon',$model) !!}
                </div>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-xs-offset-4 col-xs-8">
                <button id="save-page" type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

{!! Form::close() !!}