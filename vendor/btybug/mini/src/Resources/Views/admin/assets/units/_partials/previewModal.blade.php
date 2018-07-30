<div class="modal fade" id="preview-modal" role="basic" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            @if(isset($model) && count($model))
            <iframe class="unit_preview"
                    src="{{url('admin/mini/assets/units/render-with-form/'.$model->slug.'.default')}}"
                    width="100%" style="min-height: 500px;">

            </iframe>
            @endif
        </div>
    </div>
</div>