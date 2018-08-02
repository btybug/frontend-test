<div class="my-account-right-col">
    <div class="heading">
        <ol class="breadcrumb pull-right">
            <li class="breadcrumb-item"><a href="{{ url('/my-account/my-site/pages/edit', $page->id) }}">Edit</a></li>
            <li class="breadcrumb-item active">settings</li>
            <li class="breadcrumb-item active"><a target="_blank" href="{{ url($page->url) }}">preview</a></li>
        </ol>
        <div class="clearfix"></div>
    </div>
    <div class="status mb-5 mt-5">
        <div class="row">
            <div class="col-md-3">
                <label>Status</label>
            </div>
            <div class="col-md-4">
                <input type="text" class="form-control">
            </div>
        </div>
    </div>
    <div class="access">
        <div class="row">
            <div class="col-md-3">
                <label>Access</label>
            </div>
            <div class="col-md-4">
                <div class="checkaccess">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox"
                                           id="inlineCheckbox1"
                                           value="option1">Public
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6 text-right">
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox"
                                           id="inlineCheckbox2"
                                           value="option2">Members
                                </label>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
    <div class="area-preview">
        preview area
    </div>
    <div>

    </div>
</div>