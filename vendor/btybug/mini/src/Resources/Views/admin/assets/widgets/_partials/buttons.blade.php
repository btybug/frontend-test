<div class="settings text-right">
    <a href="{!! route('mini_admin_assets_widgets_settings',$model->slug) !!}" class="btn btn-md btn-danger">Settings</a>
    <a href="{!! route('mini_admin_assets_create_widget_variation',$model->slug) !!}" class="btn btn-md btn-info">Create Variation</a>
    <a href="{!! route('mini_admin_assets_widgets_live',$model->slug.'.default') !!}" class="btn btn-md btn-warning" id="live-preview">Live Preview Edit</a>
</div>