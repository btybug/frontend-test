{!! Form::hidden('id') !!}
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12  left_sd verticalcontainer">
        <div class="row left_part_publ">
            <div>
                <div class="row rows">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 row_inputs page-name">
                        <div class="col-sm-4 col-xs-12 left">
                            <i class="fa fa-file-text" aria-hidden="true"></i><span
                                    class="labls">Page Name</span>
                        </div>
                        <div class="col-sm-8 col-xs-12 right">
                            {!! Form::text('title',null,['class' => 'page_name']) !!}
                        </div>


                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 row_inputs page-url">
                        <div class="col-sm-4 col-xs-12 left">
                            <i class="fa fa-link" aria-hidden="true"></i><span
                                    class="labls">Page URL</span>
                        </div>
                        <div class="col-sm-8 col-xs-12 right">
                            <div class="page_address page_labels">{!! $page->url !!}</div>
                            {!! Form::hidden('url',null) !!}
                        </div>

                    </div>
                </div>
                <div class="row rows">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                        <div class="col-sm-4 col-xs-12 left">
                            <i class="fa fa-table" aria-hidden="true"></i><span
                                    class="labls">Page Icon</span>
                        </div>
                        <div class="col-sm-8 col-xs-12 page-icon">
                            <div class="input-group">
                                {!! Form::text('page_icon',null,['class' => 'form-control icp icp-auto','data-placement' => 'bottomRight']) !!}
                                <span style="height: 34px;min-width: 60px;"
                                      class="input-group-addon"></span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>