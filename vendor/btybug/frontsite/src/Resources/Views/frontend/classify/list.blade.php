@extends('btybug::layouts.mTabs',['index'=>'frontend_manage'])
@section('tab')
    <script type="template" id="classify-main-template">
        <div class="bb-classify-item" data-id="{id}" data-title="{title}" data-icon="{icon}" data-type="{type}">
            <div class="bb-classify-item-title">
                <a href="javascript:" class="bb-classify-drag-handler">
                    <i class="fa fa-arrows"></i>
                </a>
                <i class="fa {icon}"></i>
                <span>{title}</span>

                <div class="bb-classify-actions pull-right">
                    <a href="javascript:" class="bb-classify-delete">
                        <i class="fa fa-close"></i>
                    </a>
                    <a href="javascript:" class="bb-classify-collapse">
                        <i class="fa fa-caret-down"></i>
                    </a>
                </div>
            </div>
            <div class="bb-classify-item-body">
                <div class="bb-classify-form">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Icon</label>
                                <input type="text" class="form-control input-sm icp" value="{icon}" readonly>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label>Item Title</label>
                                <input type="text" class="form-control input-sm classify-item-title" value="{title}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </script>

    <script type="template" id="classify-item-template">
        <div class="bb-classify-item" data-id="{id}" data-title="{title}" data-icon="{icon}"
             data-image="{image}" data-description="{description}">
            <div class="bb-classify-item-title">
                <a href="javascript:" class="bb-classify-drag-handler">
                    <i class="fa fa-arrows"></i>
                </a>
                <i class="fa {icon}"></i>
                <span>{title}</span>

                <div class="bb-classify-actions pull-right">
                    <a href="javascript:" class="bb-classify-item-delete">
                        <i class="fa fa-close"></i>
                    </a>
                    <a href="javascript:" class="bb-classify-collapse">
                        <i class="fa fa-caret-down"></i>
                    </a>
                </div>
            </div>
            <div class="bb-classify-item-body">
                <div class="bb-classify-form">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Icon</label>
                                <input type="text" class="form-control input-sm icp" value="{icon}" readonly>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label>Item Title</label>
                                <input type="text" class="form-control input-sm classify-item-title" value="{title}">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Item Image</label>
                                <input type="text" class="form-control item_img" placeholder="Enter image url" value="{image}" name="image">
                            </div>
                            <div class="form-group">
                                <label>Item Description</label>
                                <textarea name="description" rows="5" class="form-control classify-item-textarea">{description}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </script>
    <!-- Add Item Modal -->
    <div class="modal fade" id="addItemModal" tabindex="-1" role="dialog" aria-labelledby="addItemModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="addItemModalLabel">Modal title</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Item Title</label>
                        <input type="text" class="form-control" name="item_title">
                    </div>
                    <div class="form-group">
                        <label>Icon</label>
                        <input type="text" name="item_icon" class="form-control input-sm icp" readonly>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Item Image</label>
                            <input type="text" class="form-control" placeholder="Enter image url" name="image">
                        </div>
                        <div class="form-group">
                            <label>Item Description</label>
                            <textarea name="description" rows="5" class="form-control classify-item-textarea"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary btn-sm add-item" data-parent-id="addItemModal" data-to="bb-children-items">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addMainModal" tabindex="-1" role="dialog" aria-labelledby="addMainModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="addMainModalLabel">Modal title</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Item Title</label>
                        <input type="text" class="form-control" name="item_title">
                    </div>
                    <div class="form-group">
                        <label>Icon</label>
                        <input type="text" name="item_icon" class="form-control input-sm icp" readonly>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary btn-sm add-item" data-parent-id="addMainModal" data-to="bb-main-items">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <div class="bb-classify-container">
        <div class="container-fluid">
            <!-- Classify -->
            <div class="row">
                <div class="col-md-4">
                    <div data-placement="inline" class="icp icp-auto"></div>
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="form-group">
                                <button class="btn btn-default btn-block add-item-modal" data-to="bb-main-items" data-toggle="modal" data-target="#addMainModal">
                                    <i class="fa fa-plus"></i> Add Main Item
                                </button>
                            </div>
                            <ol class="bb-classify-area" id="bb-main-items"></ol>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Selected Main ID</label>
                        <input type="text" name="main_id" class="form-control input-sm" value="0" readonly>
                    </div>
                    @if(count($classifiers))
                        <textarea class="form-control" id="log_main" rows="15" placeholder="JSON LOG">
                                {!! json_encode($classifiers,true) !!}
                        </textarea>
                    @else
                        <textarea class="form-control" id="log_main" rows="15" placeholder="JSON LOG"></textarea>
                    @endif
                </div>
                <div class="col-md-8">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row hide" id="children-actions">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <button class="btn btn-default btn-block btn-sm add-item-modal" data-to="bb-children-items" data-toggle="modal" data-target="#addItemModal">
                                            <i class="fa fa-plus"></i> Add Child Item
                                        </button>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <button class="btn btn-primary btn-block btn-sm save-children">
                                            <i class="fa fa-floppy-o"></i> Save Items
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <ol class="bb-classify-area" id="bb-children-items"></ol>
                        </div>
                    </div>

                    <textarea class="form-control" id="log" rows="15" placeholder="JSON LOG"></textarea>
                </div>
            </div>
        </div>
    </div>

    @include('btybug::_partials.delete_modal')
    @include('resources::assests.magicModal')
@stop
@section('CSS')
    {!! HTML::style('public/css/bootstrap/css/bootstrap-switch.min.css') !!}
    {!! HTML::style('public/css/font-awesome/css/fontawesome-iconpicker.min.css') !!}
    {!! HTML::style('public/css/classify.css?v='.rand(1111,9999)) !!}

@stop

@section('JS')
    {!! HTML::script('public/js/jquery.mjs.nestedSortable.js') !!}
    {!! HTML::script('public/js/jquery.menuRenderer.js') !!}
    {!! HTML::script('public/css/bootstrap/js/bootstrap-switch.min.js') !!}
    {!! HTML::script('public/css/font-awesome/js/fontawesome-iconpicker.min.js') !!}
    {!! HTML::script('public/js/classify.js?v='.rand(1111,9999)) !!}
@stop