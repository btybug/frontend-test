@extends( 'btybug::layouts.admin' )

@section( 'CSS' )
    {!! HTML::style("public/libs/jspanel/jspanel.min.css") !!}
    {!! Html::style("public/css/form-builder/form-builder.css?m=m") !!}

    {!! HTML::style("public/css/bty.css") !!}
    <style>
        .modal-header .nav.nav-pills {
            display: inline-block;
        }

        .modal-dialog.modal-lg {
            min-width: 1200px;
        }

        .pn-head {
            display: flex;
            justify-content: space-between;
        }

        .head-right {
            display: flex;
            align-items: center;
        }

        .pn-head .title {
            display: flex;
            align-items: center;
            height: 100%;
        }

        .pn-head .title label {
            white-space: nowrap;
            margin-right: 10px;
        }

        .cont-bottom {
            margin-top: 20px;
        }

        .pn-head a {
            color: white;
        }
        .inp-head label{
            margin-bottom: 0;
            color: white;
        }
        .head-right button{
            margin-right: 5px;
        }
        .subj-attach{
            background: none;
            border:0;
        }
        .customelement{
            padding: 0;
        }
        .add-tmp{
            border-radius: 0;
            margin-top: 5px;
        }
        .bty-panel-collapse{
            margin-top: 5px;
        }
    </style>
@stop

@section( 'JS' )
    {!! HTML::script("public/libs/jspanel/jspanel.min.js") !!}
    {!! Html::script("public/js/form-builder/form-builder.js?m=m") !!}
    {!! Html::script("public/js/form-builder/form-logic.js?m=m") !!}
    {!! HTML::script('public/js/tinymice/tinymce.min.js') !!}
    <script>
        tinymce.init({
            selector: '.contentEditor',
            height: 300,
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

        $('body').on('click', ".sc-item", function () {
            tinymce.activeEditor.execCommand('mceInsertContent', false, $(this).text());
        });

        $('body').on('click', ".delete-email", function () {
            var key = $(this).data('key');
            $("#data-email-" + key).remove();
        });
        $('body').on('click', '.add-tmp', function () {
            var unique_count = uniqueID();
            var tmpHTML = $("#form-email-template").html();
            tmpHTML = tmpHTML.replace(/{count}/g, unique_count);
            $(".templates-box").append(tmpHTML);
        });
    </script>

@stop

@section( 'content' )
    <!-- Form Builder -->
    {!! Form::model($form,['id'=>'fields-list','url' => url(route('save_core_forms',$form->id))]) !!}
    {!! Form::hidden('id',$form->id) !!}
    <div class="bb-form-header">
        <div class="row">
            <div class="col-md-4">
                <label>Form name</label>
                {!! Form::text('name',null,['class' => 'form-name', 'placeholder' => 'Form Name']) !!}
            </div>
            <div class="col-md-8">
                <button type="submit" class="form-save pull-right" bb-click="saveHTML">Save</button>
                <button type="button" class="panel-trigger pull-right" data-toggle="modal" data-target="#settingsModal">
                    Settings
                </button>
            </div>
        </div>
    </div>
    <div class="bb-form-sub-header">
        <div class="row">
            <div class="col-md-12">
                <label>Form description</label>
                {!! Form::textarea('description',null,['class' => 'form-description', 'placeholder' => 'Form Description']) !!}
            </div>
        </div>
    </div>
    <div class="bb-form-header">
        <div class="row">
            <div class="col-md-12">
                <button type="button" class="panel-trigger pull-right" bb-click="openFieldsWindow">Fields</button>
                <button type="button" class="panel-trigger pull-right" bb-click="openStudioWindow"
                        data-main="global">Styling
                </button>
                <button type="button" class="panel-trigger pull-right" bb-click="openLogicModal" data-toggle="modal"
                        data-target="#logicModal">Logic
                </button>

                <button type="button" class="panel-trigger pull-right" bb-click="openLayoutWindow">Layout</button>
                <button type="button" class="panel-trigger pull-right" bb-click="openPanelWindow">Panel</button>
            </div>
        </div>
    </div>
    {!! Form::textarea('fields_html',null,['class' => 'generated_html hide']) !!}
    {!! Form::textarea('original_html',null,['class' => 'original_html hide']) !!}
    {!! Form::textarea('original_css',null,['class' => 'original_css hide']) !!}
    {!! Form::textarea('fields_json',null,['class' => 'generated_json hide']) !!}

    <div class="modal fade bs-example-modal-lg" id="settingsModal" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <ul class="nav nav-pills">
                        <li class="active"><a href="#form-settings" aria-controls="form-settings" role="tab"
                                              data-toggle="tab">Form Settings</a></li>
                        <li><a href="#email-tmp" aria-controls="email-tmp" role="tab" data-toggle="tab">Email
                                Template</a></li>
                    </ul>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="form-settings">
                            <div class="row">
                                <div class="form-group m-l-0 m-r-0">
                                    <label for="success_message" class="col-sm-4 ">Fire Event</label>
                                    <div class="col-sm-8">

                                        <div class="input-checkbox-3-bty">
                                            {!! Form::checkbox('settings[event]',1,(isset($settings['event'])) ? $settings['event'] : null ,['class' =>'']) !!}
                                        </div>


                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="form-group m-l-0 m-r-0">
                                    <label for="success_message" class="col-sm-4 ">Success Message</label>
                                    <div class="col-sm-8">
                                        {!! Form::text('settings[message]',(isset($settings['message'])) ? $settings['message'] : null ,['class' =>'form-control']) !!}
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="form-group m-l-0 m-r-0">
                                    <label for="success_message" class="col-sm-4 ">Redirect on Submit</label>
                                    <div class="col-sm-8">
                                        {!! Form::text('settings[redirect_url]',(isset($settings['redirect_url'])) ? $settings['redirect_url'] : null ,['class' =>'form-control']) !!}
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="form-group m-l-0 m-r-0">
                                    <label for="success_message" class="col-sm-4 ">Create Permission</label>
                                    <div class="col-sm-8">
                                        <div class="input-checkbox-2-bty">
                                            {!! Form::checkbox('settings[create_allow]',0,null,['class' => 'allow_create_permission','id' => 'allow_guesttt']) !!}
                                            <label for="allow_guesttt">allow guest</label>
                                        </div>
                                        <div class="input-checkbox-2-bty">
                                            {!! Form::checkbox('settings[create_allow]',1,null,['class' => 'allow_create_permission','id' => 'allow_login_intt']) !!}
                                            <label for="allow_login_intt">allow Logged In</label>
                                        </div>

                                        <div class="input-checkbox-2-bty">
                                            {!! Form::checkbox('settings[create_allow]',2,null,['class' => 'allow_create_permission allow_create_admins','id' => 'allow_adminstt']) !!}
                                            <label for="allow_adminstt">allow Admins</label>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="form-group m-l-0 m-r-0 hide create-roles-box">
                                    <label for="success_message" class="col-sm-4 ">Select Roles</label>
                                    <div class="col-sm-8">
                                        {!! Form::select('settings[create_allowed_roles]',\Btybug\User\Services\RoleService::getList(),null,['class' => 'form-control select-roles']) !!}
                                    </div>
                                    <div class="clearfix"></div>
                                </div>

                                <div class="form-group m-l-0 m-r-0">
                                    <label for="success_message" class="col-sm-4 ">Edit Permission</label>
                                    <div class="col-sm-8">
                                        <div class="input-checkbox-2-bty">
                                            {!! Form::checkbox('settings[edit_allow]',0,true,['id' => 'allow_guestbb']) !!}
                                            <label for="allow_guestbb">allow guest</label>
                                        </div>
                                        <div class="input-checkbox-2-bty">
                                            {!! Form::checkbox('settings[edit_allow]',1,null,['id' => 'allow_logged_inbb']) !!}
                                            <label for="allow_logged_inbb">allow Logged In</label>
                                        </div>
                                        <div class="input-checkbox-2-bty">
                                            {!! Form::checkbox('settings[edit_allow]',2,null,['class' => 'allow_edit_permission','id' => 'allow_adminsbb']) !!}
                                            <label for="allow_adminsbb">allow Admins</label>
                                        </div>

                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="form-group m-l-0 m-r-0 hide edit-roles-box">
                                    <label for="success_message" class="col-sm-4 ">Select Roles</label>
                                    <div class="col-sm-8">
                                        {!! Form::select('settings[edit_allowed_roles]',\Btybug\User\Services\RoleService::getList(),null,['class' => 'form-control select-roles']) !!}
                                    </div>
                                    <div class="clearfix"></div>
                                </div>

                                <div class="form-group m-l-0 m-r-0">
                                    <label for="" class="col-sm-4">Is Ajax</label>
                                    <div class="col-sm-8">
                                        <div class="customelement radio-inline input-radio-7-bty">
                                            <input name="settings[is_ajax]" id="is_ajax_yes"
                                                   <?php echo (isset($settings['is_ajax']) && $settings['is_ajax'] == 'yes') ? 'checked' : '' ?> value="yes"
                                                   type="radio">
                                            <label for="is_ajax_yes">Yes</label>
                                        </div>
                                        <div class="customelement radio-inline input-radio-7-bty">
                                            <input name="settings[is_ajax]" id="is_ajax_no"
                                                   <?php echo (isset($settings['is_ajax'])
                                                       && $settings['is_ajax'] == 'no') ? 'checked' : (isset($settings['is_ajax']) && $settings['is_ajax'] == 'yes') ? '' : 'checked' ?>
                                                   value="no" type="radio"> <label for="is_ajax_no">No</label>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="email-tmp">
                            <div class="templates-box">
                                @include("console::structure._partials.email-templates")
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <a href="javascript:void(0)" class="btn btn-primary add-tmp pull-right"><i
                                                class="fa fa-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="row">
                        <div class="form-group m-l-0 m-r-0">
                            <div class="col-sm-12">
                                <button type="button" class="btn btn-info pull-right" data-dismiss="modal">Apply
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {!! Form::close() !!}

    <hr/>

    <div class="container-fluid">
        <style id="bbcc-form-style">{!! $form->original_css !!}</style>

        <div class="row" id="form-builder-rows">
            @if(! $form->original_html)
                <div class="col-md-12" data-field="true" data-id="0">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            @endif

            {!! $form->original_html !!}
        </div>


    </div>

    <div class="modal fade" id="logicModal" role="dialog">
        <div class="modal-dialog modal-logic">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="logic-box">
                        <div class="logic-tabs">
                            <div class="active">
                                <div class="logic-head">
                                    <div class="condition">
                                        Conditions
                                    </div>
                                    <div class="action">
                                        Actions
                                    </div>
                                </div>
                                <div class="logic-list"></div>
                                <div class="add-logic-cover">
                                    <button class="add-logic-button">Add New Logic</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script type="template" id="fields-html">
        <div class="form-elements-list">
            @if(count($fields))
                @foreach($fields as $field)
                    <div class="form-element-item draggable-element {!! (in_array($field->slug,$existingFields)) ? 'hide' : '' !!}"
                         data-id="{!! $field->id !!}"
                         data-shortcode="[field id={{$field->id}}]">
                        {{ $field->name }}
                        <div class="form-element-item-sample hidden">
                            <div class="col-md-12">
                                {!! field_render(['id' => $field->id]) !!}
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </script>

    <!-- Edit Panel Panel -->
    <script type="template/html" id="bbt-panel-panel">
        <div class="form-elements-list">
            <div class="form-element-item draggable-element ui-draggable ui-draggable-handle">
                Panel 1
                <div class="form-element-item-sample hidden">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">Panel heading without title</div>
                            <div class="panel-body">
                                <div class="row form-builder-area bbcc-form"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </script>

    <!-- Edit Layout Panel -->
    <script type="template/html" id="bbt-layout-panel">
        <div class="layout-list">
            <a href="#" class="layout-item" data-layout="9-3" data-index="0" bb-click="applyLayout">
                <img src="{!! url("public/images/layouts/cols-9-3.png") !!}" alt="">
            </a>
            <a href="#" class="layout-item" data-layout="3-9" data-index="1" bb-click="applyLayout">
                <img src="{!! url("public/images/layouts/cols-3-9.png") !!}" alt="">
            </a>
            <a href="#" class="layout-item" data-layout="6-6" data-index="0" bb-click="applyLayout">
                <img src="{!! url("public/images/layouts/cols-6-6.png") !!}" alt="">
            </a>
            <a href="#" class="layout-item" data-layout="4-4-4" data-index="0" bb-click="applyLayout">
                <img src="{!! url("public/images/layouts/cols-4-4-4.png") !!}" alt="">
            </a>
        </div>
    </script>

    <!-- Edit Element Panel -->
    <script type="template/html" id="bbt-edit-panel">
        <h4>Adding classes to: {element}</h4>
        <h3 class="active-selector">{selector}</h3>

        <div class="p-2" id="element-edit-panel">
            <div class="card mb-2">
                <div class="card-body p-2">
                    <input type="text" class="element-classes"/>
                </div>
            </div>

            <!-- Available Classes -->
            <div class="bb-type-panel mb-2 bb-css-add-panel">
                <input type="text" class="form-control form-control-sm mb-2" placeholder="Search Available Classes"/>

                <div class="class-list">
                    <div class="class-item badge badge-warning" data-class="class-1">Class 1</div>
                    <div class="class-item badge badge-warning" data-class="class-2">Class 2</div>
                    <div class="class-item badge badge-warning" data-class="class-3">Class 3</div>
                </div>
            </div>
        </div>
    </script>

    <!-- CSS Studio Templates -->
    <script type="template" id="bbt-field-selector">
        <ul class="bbs-field-selectors">
            <li data-selector="{mainSelector}">
                Main Container
                <i class="fa fa-paint-brush pull-right" bb-click="openStudioWindow"></i>
                <i class="fa fa-plus pull-right" bb-click="openAddClassWindow"></i>
            </li>
            <li data-selector="{containerSelector}">
                Field Container
                <i class="fa fa-paint-brush pull-right" bb-click="openStudioWindow"></i>
                <i class="fa fa-plus pull-right" bb-click="openAddClassWindow"></i>
            </li>
            <li data-selector="{labelSelector}">
                Field Label
                <i class="fa fa-paint-brush pull-right" bb-click="openStudioWindow"></i>
                <i class="fa fa-plus pull-right" bb-click="openAddClassWindow"></i>
            </li>
            <li data-selector="{iconSelector}">
                Field Icon
                <i class="fa fa-paint-brush pull-right" bb-click="openStudioWindow"></i>
                <i class="fa fa-plus pull-right" bb-click="openAddClassWindow"></i>
            </li>
            <li data-selector="{helpIconSelector}">
                Help Icon
                <i class="fa fa-paint-brush pull-right" bb-click="openStudioWindow"></i>
                <i class="fa fa-plus pull-right" bb-click="openAddClassWindow"></i>
            </li>
            <li data-selector="{helpPopupSelector}">
                Help Popup
                <i class="fa fa-paint-brush pull-right" bb-click="openStudioWindow"></i>
                <i class="fa fa-plus pull-right" bb-click="openAddClassWindow"></i>
            </li>
        </ul>
    </script>

    @include('console::structure.templates.studio')

    <script type="template" id="condition-row">
        <div class="group-row">
            <div class="and-or">
                <select name="" id="" class="logic-touch">
                    <option value="">AND</option>
                    <option value="">OR</option>
                </select>
            </div>

            <div class="field">
                <select name="" id="" class="logic-touch">
                    <option value="">(field)</option>
                    <option value="">1</option>
                    <option value="">2</option>
                </select>
            </div>
            <div class="trigger">
                <select name="" id="" class="logic-touch">
                    <option value="">(trigger)</option>
                    <option value="equal_to">is equal to</option>
                    <option value="not_equal_to">is not equal to</option>
                    <option value="contains">contains</option>
                    <option value="contains_not">doest not contain</option>
                    <option value="greater_than">is greater than</option>
                    <option value="less_than">is less than</option>
                </select>
            </div>
            <div class="text">
                <input type="text" placeholder=" ..." class="logic-touch">
            </div>
            <div class="remove-action">
                x
            </div>
        </div>
    </script>



    <script type="template" id="fields-selectBox">
        <select name="" id="" class="logic-touch">
            <option value="">(fields)</option>
            <option value="">1</option>
            <option value="">2</option>
        </select>
    </script>

    <script type="template" id="input-box">
        <input type="text" class="logic-touch" placeholder="..."/>
    </script>

    <script type="template" id="then-row">
        <div class="group-row">
            <div class="sign-and">&</div>
            <div class="set-value">
                <select name="" id="" class="logic-touch than-action">
                    <option value="">(action)</option>
                    <option value="show_fields">show fields</option>
                    <option value="hide_fields">hide fields</option>
                    <option value="email_to">send email to</option>
                    <option value="redirect_to">redirect to</option>
                    <option value="trigger_integration">trigger integration</option>
                    <option value="set_value">set value of</option>
                </select>
            </div>
            <div class="result">

            </div>
            <div class="remove-action act-rem">x</div>
        </div>
    </script>

    <script type="template" id="logic-html">
        <div class="logic-area">
            <div class="logic-text if">
                if
            </div>
            <div class="group-cond">
                <div class="group-row">
                    <div class="field">
                        <select name="" id="" class="logic-touch">
                            <option value="">(field)</option>
                            <option value="">1</option>
                            <option value="">2</option>
                        </select>
                    </div>
                    <div class="trigger">
                        <select name="" id="" class="logic-touch">
                            <option value="">(trigger)</option>
                            <option value="equal_to">is equal to</option>
                            <option value="not_equal_to">is not equal to</option>
                            <option value="contains">contains</option>
                            <option value="contains_not">doest not contain</option>
                            <option value="greater_than">is greater than</option>
                            <option value="less_than">is less than</option>
                        </select>
                    </div>
                    <div class="text">
                        <input type="text" placeholder=" ..." class="logic-touch">
                    </div>
                    <div class="remove-action">
                        x
                    </div>
                </div>
                <div class="add-group add-cond-row">add condition row</div>
            </div>
            <div class="logic-text than">
                then
            </div>
            <div class="group-action">
                <div class="group-row">
                    <div class="set-value">
                        <select name="" id="" class="logic-touch than-action">
                            <option value="">(action)</option>
                            <option value="show_fields">show fields</option>
                            <option value="hide_fields">hide fields</option>
                            <option value="email_to">send email to</option>
                            <option value="redirect_to">redirect to</option>
                            <option value="trigger_integration">trigger integration</option>
                            <option value="set_value">set value of</option>
                        </select>
                    </div>
                    <div class="result">

                    </div>
                    <div class="remove-action act-rem">x</div>
                </div>

                <div class="add-group add-action-row">add action row</div>
            </div>

            <div class="logic-remove">×</div>
        </div>
    </script>

    <script type="template" id="form-email-template">
        <div class="row" id="data-email-{count}">
            <div class="col-md-12">
                <div class="bty-panel-collapse">
                    <div class="pn-head">
                        <div>
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion{count}"
                               href="#formTeplate{count}" aria-expanded="true">
                                <span class="icon"><i class="fa fa-chevron-down" aria-hidden="true"></i></span>
                            </a>
                            <div class="title">
                                <label>Template Title</label>
                                {!! Form::text('settings[email_templates][{count}][title]',null,['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="head-right">
                            <div class="inp-head">
                                <div class="input-checkbox-2-bty">
                                    {!! Form::hidden('settings[email_templates][{count}][active]',0) !!}
                                    {!! Form::checkbox('settings[email_templates][{count}][active]',1,null,['id'=>'head-active-{count}']) !!}
                                    <label for="head-active-{count}">Active</label>
                                </div>

                            </div>
                            <a href="javascript:void(0)" data-key="{count}" class="btn btn-danger btn-sm delete-email"><i class="fa fa-times" aria-hidden="true"></i>
                            </a>
                        </div>

                    </div>
                    <div id="formTeplate{count}" class="collapse" aria-expanded="true">
                        <div class="content">
                            <div class="cont-top">
                                <div class="col-md-9 p-0 dis-fl-dir">
                                    <div class="panel panel-default p-0" data-sortable-id="ui-typography-7">
                                        <div class="panel-heading bg-grey-darker text-white">Email Content</div>
                                        <div class="panel-body p-5">
                                            <table class="table borderless m-0">
                                                <tbody>
                                                <tr>
                                                    <td width="15%">
                                                        <div class="p-5">From</div>
                                                    </td>
                                                    <td>
                                                        {!! Form::select('settings[email_templates][{count}][from_]',
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
                                                            {!! Form::text('settings[email_templates][{count}][to_]',null,['class'=>'form-control tagit-hidden-field','data-tagit'=>'tagit']) !!}
                                                            <div class="input-group-addon addonNone"
                                                                 data-toggle="tooltip"
                                                                 data-placement="right"
                                                                 title=""
                                                                 data-original-title="administrator,manager,superadmin,user,Requested Email,Logged  User,Signup User,user submitted form">
                                                                <i class="fa fa-info-circle fa-lg"
                                                                   aria-hidden="true"></i>
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
                                                            {!! Form::text('settings[email_templates][{count}][subject]',null,['class'=>'form-control']) !!}
                                                            <div class="input-group-addon">
                                                                <button type="button" class="subj-attach">
                                                                    <i class="fa fa-paperclip fa-lg"
                                                                       aria-hidden="true"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            <div class="panel panel-default p-0">
                                                <div class="panel-heading bg-grey-darker text-white">
                                                    Advanced options
                                                </div>
                                                <div class="">
                                                    <table class="table borderless m-0">
                                                        <tbody>
                                                        <tr>
                                                            <td>
                                                                <div class="p-5">Notify To</div>
                                                            </td>
                                                            <td>
                                                                <div class="input-group">
                                                                    {!! Form::text('settings[email_templates][{count}][notify_to]',null,['class'=>'form-control tagit-hidden-field','data-tagit'=>'tagit']) !!}

                                                                    <div class="input-group-addon addonNone"
                                                                         data-toggle="tooltip"
                                                                         data-placement="right"
                                                                         title=""
                                                                         data-original-title="administrator,manager,superadmin,user,Requested Email,Logged  User,Signup User">
                                                                        <i class="fa fa-info-circle fa-lg"
                                                                           aria-hidden="true"></i>
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
                                                                    {!! Form::text('settings[email_templates][{count}][cc]',null,['class'=>'form-control tagit-hidden-field','data-tagit'=>'tagit']) !!}
                                                                    <div class="input-group-addon addonNone"
                                                                         data-toggle="tooltip"
                                                                         data-placement="right"
                                                                         title=""
                                                                         data-original-title="administrator,manager,superadmin,user,Requested Email,Logged  User,Signup User">
                                                                        <i class="fa fa-info-circle fa-lg"
                                                                           aria-hidden="true"></i>
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
                                                                    {!! Form::text('settings[email_templates][{count}][bcc]',null,['class'=>'form-control tagit-hidden-field','data-tagit'=>'tagit']) !!}
                                                                    <div class="input-group-addon addonNone"
                                                                         data-toggle="tooltip"
                                                                         data-placement="right"
                                                                         title=""
                                                                         data-original-title="administrator,manager,superadmin,user,Requested Email,Logged  User,Signup User">
                                                                        <i class="fa fa-info-circle fa-lg"
                                                                           aria-hidden="true"></i>
                                                                    </div>
                                                                </div>

                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>
                                                                <div class="p-5">Reply To</div>
                                                            </td>
                                                            <td>
                                                                {!! Form::select('settings[email_templates][{count}][replyto]',
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
                                <div class="col-md-3">
                                    <div class="panel panel-default p-0" data-sortable-id="ui-typography-7">
                                        <div class="panel-heading bg-grey-darker text-white">Event and Time</div>
                                        <div class="panel-body p-5">
                                            <table class="table borderless m-0">
                                                <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="p-b-5">When</div>
                                                        {!! Form::select('settings[email_templates][{count}][when_]',[
                                                            'immediate' => "Immediate",
                                                            'custom_time' => 'Custom Time'
                                                        ],null,['class' => 'form-control','data-change' => 'afterday' ,'id' => 'when_']) !!}

                                                    </td>
                                                </tr>
                                                <tr data-container="afterday" class="hide">
                                                    <td>
                                                        <div class="p-b-5">After Days</div>
                                                        <select class="form-control" id="afterday" data-change="settime"
                                                                name="settings[email_templates][{count}][custom_days]">
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
                                                            <input name="settings[email_templates][{count}][custom_time]" class="form-control" value=""
                                                                   type="text">
                                                            <span class="input-group-addon"> <i class="fa fa-calendar"
                                                                                                aria-hidden="true"></i> </span>
                                                        </div>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>

                            <div class="cont-bottom">
                                <div class="col-md-9">
                                    <div class="panel panel-default custompanel m-t-20">
                                        <div class="panel-heading bg-grey-darker text-white">Main Content
                                            <div class="pull-right">
                                                Editor{!! Form::radio('settings[email_templates][{count}][content_type]','editor',null,['data-role'=>'editor']) !!}
                                                Template{!! Form::radio('settings[email_templates][{count}][content_type]','template',null,['data-role'=>'template']) !!}</div>
                                        </div>
                                        <div class="panel-body editor_body show">
                                            {!! Form::textarea('settings[email_templates][{count}][template_content]',null,['id'=>'contentEditor','aria-hidden'=>true]) !!}
                                        </div>
                                        <div class="panel-body template_body hide">
                                            {!! BBcustomize('unit','template','mail_template',
                                        (isset($settings['template']) && $settings['template'])?'Change':'Select','email-template',['class'=>'btn btn-default change-layout','model' =>(isset($settings['template']) && $settings['template']) ?$settings['template']: null]) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="panel panel-default p-0" data-sortable-id="ui-typography-7">
                                        <div class="panel-heading bg-grey-darker text-white">Available Codes</div>
                                        <div class="panel-body p-5">
                                            <ul class="nav nav-tabs">
                                                <li class="active"><a data-toggle="tab" href="#general_shortcodes">General</a>
                                                </li>
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
                                <div class="clearfix"></div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>


        </div>
    </script>
@stop

@section( 'Footer' )
    <div class="bb-node-action-size"></div>
    <div class="bb-node-action-menu">
        <i class="fa fa-arrows-h bb-node-move" bb-click="toggleResize"></i>
        <i class="fa fa-trash bb-node-delete" bb-click="deleteActiveField"></i>
        <i class="fa fa-paint-brush bb-node-edit" bb-click="openStudioWindow"></i>
    </div>
@stop

@section( 'JS' )
    <script>
        $(function () {
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
//get partial options view
            $('body').on('change', '.partials-change', function () {

                var data = {
                    'type': $(this).val(),
                    'data_id': $(this).attr('data-id'),
                    'options_form_id': $('input[name=id]').val()
                };
                $.ajax({
                    type: 'POST',
                    url: "",
                    data: data,
                    headers: {
                        'X-CSRF-TOKEN': $("input[name='_token']").val()
                    },
                    dataType: 'json',
                    success: function (data) {
                        if (!data.error) {
                            var data_id = data.data_id;
                            $('body').find('div[data-id=' + data_id + ']').find('.partials-area').html(data.html);
                        } else {
                            alert(data.message);
                        }
                    }
                });
            });

            var jsonString = $('#tabs-json-area').text();
            var jsonData = JSON.parse(jsonString);
            var tabJson = {name: null, data: {}}
            $('#save-tab-changes').on('click', function () {
                var newTab = (objectifyForm($('#tab-options')));
                var copyData = tabJson;
                copyData.name = newTab.name;
                copyData.data = [{'type': 'unit', 'value': 'price_calculate.default'}];
                jsonData.push(copyData);
                updateTabs(jsonData);
                $('#tab-manage-modal').modal('hide');
                $('#tabs-json-area').text(JSON.stringify(jsonData));


            });

//data-id

            function objectifyForm(formArray) {//serialize data function
                var data = {};
                formArray.serializeArray().map(function (x) {
                    data[x.name] = x.value;
                });
                data.data = {};
                return data;
            }
        });

    </script>



    <script>

        $("body").on('input', '.form-title-settings', function () {
            var val = $(this).val();

            $(".form-title").text(val);
        });

        $("body").on('change', '.select-field', function () {
            var checkbox = this;
            var field = $(checkbox).val();
            if (checkbox.checked) {
                var table = $(checkbox).data('table');
                $.ajax({
                    url: "mbsp_render_fields",
                    data: {table: table, field: field},
                    headers: {
                        'X-CSRF-TOKEN': $("input[name='_token']").val()
                    },
                    dataType: 'json',
                    success: function (data) {
                        if (!data.error) {
                            $(".field-box").append(data.html);
                        }
                    },
                    type: 'POST'
                });
                // alert($(checkbox).val());
            } else {

                $("#bty-input-id-" + $(checkbox).data('id')).remove();
            }
        });


        $('button[data-action=save-form]').on('click', function () {
            var data = $('#fields-list').serialize();
            $.ajax({
                url: "mbsp_save_form",
                data: data,
                headers: {
                    'X-CSRF-TOKEN': $("input[name='_token']").val()
                },
                dataType: 'json',
                success: function (data) {
                    if (!data.error) {
                        window.location.href = "blog_form_list";
                    }
                },
                type: 'POST'
            });
        });
    </script>

@stop