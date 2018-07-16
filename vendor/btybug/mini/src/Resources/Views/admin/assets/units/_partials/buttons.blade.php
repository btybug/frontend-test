<div class="settings text-right">
    <a href="{!! route('mini_admin_assets_units',$model->slug) !!}" class="btn btn-md btn-info unit_preview">Preview</a>
    <a href="{!! route('mini_admin_assets_units_form',$model->slug) !!}" class="btn btn-md btn-primary unit_form">Form</a>
    <a href="{!! route('mini_admin_assets_units_mapping',$model->slug) !!}" class="btn btn-md btn-success unit_mapping">Mapping</a>
    <a href="{!! route('mini_admin_assets_units_settings',$model->slug) !!}" class="btn btn-md btn-warning unit_settings">Settings</a>
</div>