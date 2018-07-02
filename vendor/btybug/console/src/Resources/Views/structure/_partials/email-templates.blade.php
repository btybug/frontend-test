@if(isset($form->settings['email_templates']) && count($form->settings['email_templates']))
    @foreach($form->settings['email_templates'] as $key => $templates)
        <div class="row" id="data-email-{{ $key }}">
            <div class="col-md-12">
                <div class="bty-panel-collapse">
                    <div class="pn-head">
                        <div>
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion{{$key}}"
                               href="#formTeplate{{$key}}" aria-expanded="true">
                                <span class="icon"><i class="fa fa-chevron-down" aria-hidden="true"></i></span>
                            </a>
                            <div class="title">
                                <label>Template Title</label>
                                {!! Form::text("settings[email_templates][$key][title]",null,['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="head-right">
                            <div class="inp-head">
                                <div class="input-checkbox-2-bty">
                                    {!! Form::hidden("settings[email_templates][$key][active]",0) !!}
                                    {!! Form::checkbox("settings[email_templates][$key][active]",1,null,['id'=>'head-active-'.$key]) !!}
                                    <label for="head-active-{{$key}}">Active</label>
                                </div>

                            </div>
                            <a href="javascript:void(0)" data-key="{{ $key }}" class="btn btn-danger btn-sm delete-email"><i class="fa fa-times" aria-hidden="true"></i>
                            </a>
                        </div>

                    </div>
                    <div id="formTeplate{{ $key }}" class="collapse" aria-expanded="true">
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
                                                        {!! Form::select("settings[email_templates][$key][from_]",
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
                                                            {!! Form::text("settings[email_templates][$key][to_]",null,['class'=>'form-control tagit-hidden-field','data-tagit'=>'tagit']) !!}
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
                                                            {!! Form::text("settings[email_templates][$key][subject]",null,['class'=>'form-control']) !!}
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
                                                                    {!! Form::text("settings[email_templates][$key][notify_to]",null,['class'=>'form-control tagit-hidden-field','data-tagit'=>'tagit']) !!}

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
                                                                    {!! Form::text("settings[email_templates][$key][cc]",null,['class'=>'form-control tagit-hidden-field','data-tagit'=>'tagit']) !!}
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
                                                                    {!! Form::text("settings[email_templates][$key][bcc]",null,['class'=>'form-control tagit-hidden-field','data-tagit'=>'tagit']) !!}
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
                                                                {!! Form::select("settings[email_templates][$key][replyto]",
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
                                                        {!! Form::select("settings[email_templates][$key][when_]",[
                                                            'immediate' => "Immediate",
                                                            'custom_time' => 'Custom Time'
                                                        ],null,['class' => 'form-control','data-change' => 'afterday' ,'id' => 'when_']) !!}

                                                    </td>
                                                </tr>
                                                <tr data-container="afterday" class="hide">
                                                    <td>
                                                        <div class="p-b-5">After Days</div>
                                                        <select class="form-control" id="afterday" data-change="settime"
                                                                name="settings[email_templates][{{$key}}][custom_days]">
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
                                                            <input name="settings[email_templates][{{$key}}][custom_time]" class="form-control" value=""
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
                                                Editor{!! Form::radio("settings[email_templates][$key][content_type]",'editor',true,['data-role'=>'editor']) !!}
                                                Template{!! Form::radio("settings[email_templates][$key][content_type]",'template',null,['data-role'=>'template']) !!}</div>
                                        </div>
                                        <div class="panel-body editor_body show">
                                            {!! Form::textarea("settings[email_templates][$key][template_content]",null,['class'=>'contentEditor','aria-hidden'=>true]) !!}
                                        </div>
                                        <div class="panel-body template_body hide">
                                            {!! BBcustomize('unit','template','mail_template',
                                        (isset($settings['email_templates'][$key]['template']) && $settings['email_templates'][$key]['template'])?'Change':'Select','email-template',['class'=>'btn btn-default change-layout','model' =>(isset($settings['email_templates'][$key]['template']) && $settings['email_templates'][$key]['template']) ?$settings['email_templates'][$key]['template']: null]) !!}
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
    @endforeach
@endif