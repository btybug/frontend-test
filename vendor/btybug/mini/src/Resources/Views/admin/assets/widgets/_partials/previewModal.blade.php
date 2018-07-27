<div class="modal fade" id="preview-modal" role="basic" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <iframe class="unit_preview"
                    src="{{url('admin/mini/assets/widgets/render-with-form/'.$model->slug.'.default')}}"
                    width="100%" style="min-height: 500px;">

            </iframe>
        </div>
    </div>
</div>