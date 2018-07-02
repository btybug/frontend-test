@extends( 'btybug::layouts.admin' )
@section( 'content' )
    {!! Form::model($email,['class'=>'form-horizontal']) !!}
    <div class="bb-form-header">
        <div class="row">
            <div class="col-md-8">
                <label>Title</label>
                {!! Form::text('name',null,['class' => 'form-name']) !!}
            </div>
            <div class="col-md-4">

                <button type="submit" class="form-save pull-right" value="Save"><span>Save</span></button>

            </div>
        </div>
    </div>
    <div class="col-md-12 dis-flex">
        <div class="col-md-9 p-0 dis-fl-dir">
            <div class="panel panel-default p-0" data-sortable-id="ui-typography-7">
                <div class="panel-heading bg-black-darker text-white">Email Content</div>
                <div class="panel-body p-5">
                    <table class="table borderless m-0">
                        <tbody>
                        <tr>
                            <td width="15%">
                                <div class="p-5">From</div>
                            </td>
                            <td>
                                {!! Form::select('from_',
                                [
                                'info@avatarbugs.com'=>'Info',
                                'support@avatarbugs.com'=>'Support',
                                'admin@avatarbugs.com'=>'Admin',
                                'sales@avatarbugs.com'=>'Sales',
                                'tech@avatarbugs.com'=>'Technical Staff'
                                ],null,['class'=>'form-control']) !!}

                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="p-5">To</div>
                            </td>
                            <td>
                                <div class="input-group">
                                    {!! Form::text('to_',null,['class'=>'form-control hide tagit-hidden-field','data-tagit'=>'tagit']) !!}
                                    <div class="input-group-addon addonNone" data-toggle="tooltip"
                                         data-placement="right"
                                         title=""
                                         data-original-title="administrator,manager,superadmin,user,Requested Email,Logged  User,Signup User,user submitted form">
                                        <i class="fa fa-info-circle fa-lg" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="p-5">Subject</div>
                            </td>
                            <td>
                                <div class="input-group">
                                    {!! Form::text('subject',null,['class'=>'form-control']) !!}
                                    <div class="input-group-addon">
                                        <button type="button" class="subj-attach">
                                            <i class="fa fa-paperclip fa-lg" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                </div>
                            </td>
                        </tr>


                        {{--<tr>--}}
                        {{--<td>--}}
                        {{--<div class="p-5">Attachment</div>--}}
                        {{--</td>--}}
                        {{--<td>--}}
                        {{--<button class="btn btn-default" type="button" data-role="browseMediabutton">Browse Media--}}
                        {{--</button>--}}
                        {{--<span class="m-l-10"></span>--}}
                        {{--{!! Form::text('attachment',null,['class'=>'form-control hide tagit-hidden-field','data-tagit'=>'tagit']) !!}--}}
                        {{--</td>--}}
                        {{--</tr>--}}


                        {{--<tr id="editor">--}}
                        {{--<td valign="top">--}}
                        {{--<div class="p-5">Content</div>--}}
                        {{--</td>--}}
                        {{--<td>--}}
                        {{--{!! Form::textarea('content',null,['id'=>'contentEditor','aria-hidden'=>true]) !!}--}}
                        {{--</td>--}}
                        {{--</tr>--}}

                        </tbody>
                    </table>
                    <div class="bty-panel-collapse">
                        <div>
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion"
                               href="#advancedopt" aria-expanded="true">
                                <span class="icon"><i class="fa fa-chevron-down" aria-hidden="true"></i></span>
                                <span class="title">Advanced options</span>
                            </a>
                        </div>
                        <div id="advancedopt" class="collapse" aria-expanded="true" style="">
                            <div class="content">
                                <table class="table borderless m-0">
                                    <tbody>
                                    <tr>
                                        <td>
                                            <div class="p-5">Notify To</div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                {!! Form::text('notify_to',null,['class'=>'form-control hide tagit-hidden-field','data-tagit'=>'tagit']) !!}

                                                <div class="input-group-addon addonNone" data-toggle="tooltip"
                                                     data-placement="right"
                                                     title=""
                                                     data-original-title="administrator,manager,superadmin,user,Requested Email,Logged  User,Signup User">
                                                    <i class="fa fa-info-circle fa-lg" aria-hidden="true"></i>
                                                </div>
                                            </div>

                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <div class="p-5">CC</div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                {!! Form::text('cc',null,['class'=>'form-control hide tagit-hidden-field','data-tagit'=>'tagit']) !!}
                                                <div class="input-group-addon addonNone" data-toggle="tooltip"
                                                     data-placement="right"
                                                     title=""
                                                     data-original-title="administrator,manager,superadmin,user,Requested Email,Logged  User,Signup User">
                                                    <i class="fa fa-info-circle fa-lg" aria-hidden="true"></i>
                                                </div>
                                            </div>

                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <div class="p-5">BCC</div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                {!! Form::text('bcc',null,['class'=>'form-control hide tagit-hidden-field','data-tagit'=>'tagit']) !!}
                                                <div class="input-group-addon addonNone" data-toggle="tooltip"
                                                     data-placement="right"
                                                     title=""
                                                     data-original-title="administrator,manager,superadmin,user,Requested Email,Logged  User,Signup User">
                                                    <i class="fa fa-info-circle fa-lg" aria-hidden="true"></i>
                                                </div>
                                            </div>

                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <div class="p-5">Reply To</div>
                                        </td>
                                        <td>
                                            {!! Form::select('replyto',
                                        [
                                        'info@avatarbugs.com'=>'Info',
                                        'support@avatarbugs.com'=>'Support',
                                        'admin@avatarbugs.com'=>'Admin',
                                        'sales@avatarbugs.com'=>'Sales',
                                        'tech@avatarbugs.com'=>'Technical Staff'
                                        ],null,['class'=>'form-control']) !!}
                                        </td>
                                    </tr>
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-md-3">
            <div class="panel panel-default p-0" data-sortable-id="ui-typography-7">
                <div class="panel-heading bg-black-darker text-white">Event and Time</div>
                <div class="panel-body p-5">
                    <table class="table borderless m-0">

                        <tbody>
                        <tr class="select-trigger-td">
                            <td>
                                <div class="p-b-5">Form</div>
                                {!! Form::select('event_form_id',['' => 'Select Form'] + $forms, null, ['id' => 'form_event','class' => 'form-control']) !!}
                            </td>
                        </tr>


                        <tr>
                            <td>
                                <div class="p-b-5">When</div>
                                {!! Form::select('when_',[
                                    'immediate' => "Immediate",
                                    'custom_time' => 'Custom Time'
                                ],null,['class' => 'form-control','data-change' => 'afterday' ,'id' => 'when_']) !!}

                            </td>
                        </tr>
                        <tr data-container="afterday" class="hide">
                            <td>
                                <div class="p-b-5">After Days</div>
                                <select class="form-control" id="afterday" data-change="settime" name="custom_days">
                                    <option value="1">1 Day</option>
                                    <option value="3">3 Days</option>
                                    <option value="5">5 Days</option>
                                    <option value="10">10 Days</option>
                                    <option value="15">15 Days</option>
                                    <option value="30">30 Days</option>
                                    <option value="0" selected="selected">Custom Date</option>
                                </select>
                            </td>
                        </tr>
                        <tr data-container="settime" class="hide">
                            <td>
                                <div class="p-b-5">Select Date</div>
                                <div class="input-group date" data-actions="Timercalendar">
                                    <input name="custom_time" class="form-control" value="" type="text">
                                    <span class="input-group-addon"> <i class="fa fa-calendar"
                                                                        aria-hidden="true"></i> </span></div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12 dis-flex">
        <div class="col-md-9">
            <div class="panel panel-default custompanel m-t-20">
                <div class="panel-heading bg-black-darker text-white">Main Content
                    <div class="pull-right">
                        Editor{!! Form::radio('content_type','editor',null,['data-role'=>'editor']) !!}
                        Template{!! Form::radio('content_type','template',null,['data-role'=>'template']) !!}</div>
                </div>
                <div class="panel-body editor_body {{ ($email['content_type'] == 'editor') ? 'show' : 'hide' }}">
                    {!! Form::textarea('content',null,['id'=>'contentEditor','aria-hidden'=>true]) !!}
                </div>
                <div class="panel-body template_body {{ ($email['content_type'] == 'template') ? 'show' : 'hide' }}">
                    {{--<div class="col-sm-5 p-l-0 p-r-10">--}}
                    {{--<input name="selcteunit" data-key="title" readonly="readonly" data-id="template"--}}
                    {{--class="page-layout-title form-control"--}}
                    {{--value="{!! BBgetUnitAttr(($page->template)??null,'title') !!}"--}}
                    {{-->--}}
                    {{--</div>--}}
                    {!! BBcustomize('unit','template','mail_template',
                (isset($email['template']) && $email['template'])?'Change':'Select','email-template',['class'=>'btn btn-default change-layout','model' =>(isset($email['template']) && $email['template']) ?$email['template']: null]) !!}
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="panel panel-default p-0" data-sortable-id="ui-typography-7">
                <div class="panel-heading bg-black-darker text-white">Available Codes</div>
                <div class="panel-body p-5">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#general_shortcodes">General</a></li>
                        <li><a data-toggle="tab" href="#specific_shortcodes">Specific</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="general_shortcodes" class="tab-pane fade in active">
                            <table class="table borderless m-0">
                                <tbody>
                                <tr>
                                    <td>
                                        <div class="sc-item m-b-5">[general key=logo]</div>
                                        <div class="sc-item m-b-5">[general key=site_name]</div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div id="specific_shortcodes" class="tab-pane fade">
                            <h3>Specific shortcodes here</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3 p-0 p-l-5">
        {{--<div class="panel panel-default p-0" data-sortable-id="ui-typography-7">--}}
        {{--<div class="panel-heading bg-black-darker text-white">Content</div>--}}
        {{--<div class="panel-body p-5">--}}
        {{--<table class="table borderless m-0">--}}
        {{--<tbody>--}}
        {{--<tr>--}}
        {{--<td>--}}
        {{--<div class="p-b-5">Content Type</div>--}}
        {{--{!! Form::select('content_type',--}}
        {{--[--}}
        {{--'iwysiwyg'=>'WYSIWYG',--}}
        {{--'template'=>'Template',--}}
        {{--],null,['class'=>'form-control']) !!}--}}

        {{--</td>--}}
        {{--</tr>--}}
        {{--<tr class="template">--}}
        {{--<td>--}}
        {{--<div class="p-b-5">Templates</div>--}}
        {{--<select class="form-control" id="template" name="template_id"></select></td>--}}
        {{--</tr>--}}
        {{--<tr class="template-var" style="display:none">--}}
        {{--<td>--}}
        {{--<div class="p-b-5">Variations</div>--}}
        {{--<select class="form-control" id="variation_id" name="variation_id"></select></td>--}}
        {{--</tr>--}}
        {{--</tbody>--}}
        {{--</table>--}}
        {{--</div>--}}
        {{--</div>--}}


    </div>
    {!! Form::close() !!}

@stop
@section( 'CSS' )
    {!!HTML::style( 'public/css/tag-it/jquery.tagit.css' ) !!}
    {!! BBstyle(plugins_path("vendor/sahak.avatar/membership/src/public/css/form-builder.css")) !!}
    <style>
        .sc-item{
            background: darkturquoise;
            text-align: center;
            padding: 10px;
            margin-bottom: 3px;
            color: ghostwhite;
            cursor: pointer;
        }
        .input-group-addon.addonNone {
            background: none;
            border: 0;
            box-shadow: none
        }

        .dis-flex {
            display: flex;
            height: 100%;
            margin-top: 20px;
        }

        .panel-default {
            height: 100%;

        }

        .editor_body {
            display: none;
        }

        .subj-attach {
            border: 0;
            background: none;
            outline: none;
        }

        /*.dis-fl-dir{*/
        /*display: flex;*/
        /*flex-direction: column;*/
        /*}*/
    </style>
@stop
@section( 'JS' )
    {!! HTML::script('public/js/tinymice/tinymce.min.js') !!}
    {!! HTML::script('public/js/tag-it/tag-it.js') !!}
    <script>
        tinymce.init({
            selector: 'textarea#contentEditor',
            height: 500,
            theme: 'modern',
            plugins: [
                'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                'searchreplace wordcount visualblocks visualchars code fullscreen',
                'insertdatetime media nonbreaking save table contextmenu directionality',
                'emoticons template paste textcolor colorpicker textpattern imagetools'
            ],
            toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
            toolbar2: 'print preview media | forecolor backcolor emoticons',
            image_advtab: true,

        });

        $(function () {

            var tagdatasorce = 'administrator,manager,superadmin,user,Requested Email,Logged  User,Signup User';
            $('[data-tagit="tagit"]').each(function () {
                var getExt = tagdatasorce.split(',');
                $(this).tagit({
                    availableTags: getExt

                });

            })
            $('[data-toggle="tooltip"]').tooltip()
            var formLists = function (data) {

                $(data.html).insertAfter($('.select-trigger-td'));
            }
            $('#event_trigger').on('change', function () {
                $('body').find('.appendet-forms-lists').remove();
                if ($(this).val() == 'form_submited') {
                    var data = {};
                    postAjax('/admin/manage/emails/get-forms-lists', data, formLists);
                }
            });

            $('body').on('change', '#form_event', function () {
                if ($(this).val() != '0') {
                    $.ajax({
                        url: "{!! route('frontsite_emails_get_form_shortcodes') !!}",
                        type: 'POST',
                        data: {
                            id: $(this).val()
                        },
                        headers: {
                            'X-CSRF-TOKEN': $("input[name='_token']").val()
                        }
                    }).done(function (data) {
                        $('#specific_shortcodes').html(data.html);
                    }).fail(function () {
                        alert('Could not load shortcodes. Please try again.');
                    });
                }else{
                    $('#specific_shortcodes').html('');
                }
            });

            var form_slug = $('#form_event').val();
            if (form_slug) {
                $.ajax({
                    url: "{!! route('frontsite_emails_get_form_shortcodes') !!}",
                    type: 'POST',
                    data: {
                        id: form_slug
                    },
                    headers: {
                        'X-CSRF-TOKEN': $("input[name='_token']").val()
                    }
                }).done(function (data) {
                    $('#specific_shortcodes').html(data.html);
                }).fail(function () {
                    alert('Could not load shortcodes. Please try again.');
                });
            }
        });

        $('body').on('click', ".sc-item", function () {
            tinymce.activeEditor.execCommand('mceInsertContent', false, $(this).text());
        });

        $(document).ready(function () {
            var checkedit = $("input[value='editor']");
            var checktemple = $("input[value='template']");
            var edBody = $('.editor_body');
            var temBody = $('.template_body');
            checkedit.on('click', function () {
                if ($(this).is(':checked')) {
                    $(this).closest('.dis-flex').find(edBody).show();
                    $(this).closest('.dis-flex').find(temBody).hide();
                } else {
                    alert(55);
                    $(this).closest('.dis-flex').find(edBody).hide();
                    $(this).closest('.dis-flex').find(temBody).show();

                }
            });
            checktemple.on('click', function () {
                if ($(this).is(':checked')) {
                    $(this).closest('.dis-flex').find(edBody).hide();
                    $(this).closest('.dis-flex').find(temBody).show();
                } else {
                    $(this).closest('.dis-flex').find(temBody).hide();

                }
            });

        });

    </script>

@stop