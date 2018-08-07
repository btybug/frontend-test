@if(!isset($v) || (isset($v) && $v=='b3'))
    <div style="z-index: 99999" class="modal fade bigfullModal " id="magic-settings" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="mod-head-left">
                                <input type="text" class="form-control" placeholder="Search area">
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="mod-head-right">
                                <div>
                                    <select class="form-control magic-modal-select-variations"></select>
                                    <button class="btn btn-default item item-unit" data-key=""
                                            id="select-unit-item-button" data-value="">Select
                                    </button>
                                </div>

                                <button type="button" class="close btn-red-close " data-dismiss="modal"
                                        aria-label="Close"><span
                                            aria-hidden="true">&times;</span></button>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="modal-body" style="min-height: 500px;">

                    <div id="magic-body">


                    </div>

                </div>
            </div>
        </div>
    </div>
@endif

@if(isset($v) && $v=='b4')

    <div class="modal fade bigfullModal" id="magic-settings" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-full  modal-lg mw-100" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="mod-head-left">
                                <input type="text" class="form-control" placeholder="Search area">
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="mod-head-right">
                                <div>
                                    <select class="form-control magic-modal-select-variations"></select>
                                    <button class="btn btn-default item item-unit" data-key=""
                                            id="select-unit-item-button" data-value="">Select
                                    </button>
                                </div>

                                <button type="button" class="close btn-red-close " data-dismiss="modal"
                                        aria-label="Close"><span
                                            aria-hidden="true">&times;</span></button>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-body p-4" id="magic-body" style="min-height: 500px;">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>
@endif




