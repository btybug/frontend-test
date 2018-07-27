@extends('btybug::layouts.admin')
@section('content')
    {{-- {{$units}}--}}
    <div class="ui-2_col">
        <div class="row">
            <div class="col-md-3 col-xs-12">
                @include('multisite::admin.assets.units._partials.sidebar')
            </div>
            <div class="col-md-9 col-xs-12">
                @if($model)
                    <div class="display-area">
                        @include('multisite::admin.assets.units._partials.buttons')
                        <div class="right-iframe">
                            {!! Form::model($model,['url' => route('mini_admin_assets_units_settings_post',$slug)]) !!}
                            <div class="form-group">
                                <label>Select Tags</label>
                                {!! Form::text('tags',$tags,['class' => 'form-control','id' => 'tagits']) !!}
                            </div>
                            <div class="form-group">
                                <label>Select Memberships</label>
                                {!! Form::select('memberships[]',$memberships,$model->memberships,['class' => 'form-control memberships-select','multiple' => true]) !!}
                            </div>
                            <div class="form-group">
                                <label>Select status</label>
                                {!! Form::select('status',['draft' => "Draft",'published' => "Published"],(isset($model->status))?$model->status:null ,['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::submit('save',['class' => 'btn btn-success']) !!}
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    @include('multisite::admin.assets.units._partials.previewModal')

@stop
@section("JS")
    {!! HTML::script('public/js/tag-it/tag-it.js') !!}
    {!! HTML::script('public/js/select2/select2.full.min.js') !!}
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function () {
            $('body').on('click', '.preview-modal', function () {
                $("#preview-modal").modal()
            });

            $(".memberships-select").select2();


            $('#tagits').tagit({
                autocomplete: {
                    delay: 0,
                    minLength: 0

                },
                tagSource: function () {
                    $.ajax({
                        url: "{!! route('front_site_tag_list') !!}",
                        dataType: "json",
                        method: "post",
                        data: {},
                        headers: {
                            'X-CSRF-TOKEN': $("input[name='_token']").val()
                        },
                        success: function (data) {
                            console.log(data);
                            return data;
                        }

                    });
                },
                // This will make Tag-it submit a single form value, as a comma-delimited field.
                singleField: true,
                singleFieldNode: $('.tagitext'),
                beforeTagAdded: function (event, ui) {
                    if (!ui.duringInitialization) {
//                    var exis = getExt.indexOf(ui.tagLabel);
//                    if (exis < 0) {
//                        $('.tagit-new input').val('');
//                        //alert('PLease add allow at tag')
//                        return false;
//                    }
                    }

                }
            });
        });
    </script>
@stop

@section('CSS')
    {!! HTML::style('public/css/jquery.tagit.css') !!}
    {!! HTML::style("public/css/select2/select2.min.css") !!}

    <style>
        .ui-2_col {
            margin-top: 30px;
        }

        .ui-2_col .left-menu ul {
            border-right: 1px solid #c5c5c5;
            background-color: #3e81a5;
            padding-top: 20px !important;
            height: calc(100vh - 154px);
            overflow-x: auto;
        }

        .ui-2_col .left-menu li {
            background: #0000004f;
            width: 95%;
            height: 60px;
            margin-bottom: 11px;
            box-shadow: -4px 4px 5px 0 #00000073;
            margin-left: 11px;
            cursor: pointer;
            color: white;
            display: flex;
            justify-content: space-between;
            transition: 0.5s ease;
        }

        .ui-2_col .left-menu li > a {
            align-self: center;
            margin-left: 10px;
            font-size: 16px;
            color: white;
            text-decoration: none;
        }

        .ui-2_col .left-menu li.active {
            background: rgba(0, 0, 0, 0.48);
        }

        .ui-2_col .left-menu .button {
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: flex-end;
        }

        .ui-2_col .left-menu .button button {
            margin-right: 5px;
        }

        .ui-2_col .left-menu li:hover {
            background: rgba(0, 0, 0, 0.48);
        }
    </style>

@stop


{{--
public function iframeRander($slug){
return BBRenderUnits($slug);
}--}}
