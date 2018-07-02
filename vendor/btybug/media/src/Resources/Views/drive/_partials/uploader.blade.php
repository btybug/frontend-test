<input id="uploader" class="file-loading" data-folder-id="{!! 1 !!}" multiple   name="item[]" type="file" data-upload-url="{!! route('media_upload') !!}">

{!!  Html::style('js/bootstrap-fileinput/css/fileinput.min.css') !!}
{!!  Html::script('js/bootstrap-fileinput/js/fileinput.min.js') !!}
<script>
    $(function(){
       $("#uploader").fileinput({
           maxFileCount: 5,
           uploadExtraData:{'_token':$("meta[name='csrf-token']").attr('content')}
       });
        $('#uploader').on('filebatchuploadsuccess', function(event, data, previewId, index) {
            var form = data.form, files = data.files, extra = data.extra,
                response = data.response, reader = data.reader;
            alert (extra.bdInteli + " " +  response.uploaded);
        });
    })
</script>