<div class="col-md-12">
    <div class="form-group">
        <div class="col-md-6">
            <label style="width: 100%;">
                Name
                <div class="form-control input-md">{!! $column[0]->Field !!}</div>
            </label>
        </div>
        <div class="col-md-6">
            <label style="width: 100%;">
                Type
                <div class="form-control input-md">{!! issetReturn($tbtypes,$type) !!}</div>
            </label>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-6">
            <label style="width: 100%;">
                Length
                <div class="form-control input-md">{{ $length }}</div>
            </label>
        </div>
        <div class="col-md-6">
            <label style="width: 100%;">
                Default

                <div class="form-control input-md">{{ $column[0]->Default }}</div>
            </label>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-4">
            <label style="width: 100%;">
                Nullable
                <div class="form-control input-md">{!! ($column[0]->Null == "YES") ? "YES" : "NO" !!}</div>
            </label>
        </div>
        <div class="col-md-4">
            <label style="width: 100%;">
                Unique
                <div class="form-control input-md"></div>
            </label>
        </div>
        <div class="col-md-4">
            <label style="width: 100%;">
                Field
                <div class="form-control input-md">{!! ($field) ? "YES" : "NO" !!}</div>
            </label>
        </div>
    </div>
</div>