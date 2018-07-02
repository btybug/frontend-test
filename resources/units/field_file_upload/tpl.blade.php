{!! BBstyle($_this->path.DS.'css/main.css',$_this) !!}
{!! BBstyle($_this->path.DS.'css/fileinput.css',$_this) !!}
<div class="form-group">
    <div class="{!! issetReturn($settings,'radio_inp',null) !!}">
        <h4>
            @if(has_setting($settings, 'icon'))
                <i class="fa {!! issetReturn($settings,'icon',null) !!}"></i>
            @endif
            {!! issetReturn($settings,'label',null) !!}
            @if(has_setting($settings, 'tooltip_icon'))
                <span title="{!! issetReturn($settings,'help',null) !!}">
                <i class="fa {!! issetReturn($settings,'tooltip_icon',null) !!}"></i>
            </span>
            @endif
        </h4>
    </div>
</div>

<textarea id="upload_setting" class="hidden">{{isset($settings["upload_setting"]) ? json_encode($settings["upload_setting"],true) : ''}}</textarea>
@if(isset($settings['manual_item']))
    <div class="form-group">
        <input id="input-id" type="file" multiple>
        <div id="kv-error-2" style="margin-top:10px;display:none"></div>
    </div>
@endif
{{--<script>
    $(document).on('ready', function() {
        var url1 = 'http://upload.wikimedia.org/wikipedia/commons/thumb/e/e1/FullMoon2010.jpg/631px-FullMoon2010.jpg',
            url2 = 'http://upload.wikimedia.org/wikipedia/commons/thumb/6/6f/Earth_Eastern_Hemisphere.jpg/600px-Earth_Eastern_Hemisphere.jpg';
        $("#input-id").fileinput({
            initialPreview: [url1, url2],
            initialPreviewAsData: true,
            initialPreviewConfig: [
                {caption: "Moon.jpg", downloadUrl: url1, size: 930321, width: "120px", key: 1},
                {caption: "Earth.jpg", downloadUrl: url2, size: 1218822, width: "120px", key: 2}
            ],
            deleteUrl: "/site/file-delete",
            overwriteInitial: false,
            maxFileSize: 100,
            initialCaption: "The Moon and the Earth"
        });
    });
</script>--}}
{!! BBscript($_this->path.DS.'js/fileinput.js') !!}
<script>
    window.frameElement.contentWindow.targetFunction(1);

    function targetFunction(is_called){
        if(is_called) {
            var hidden_data = $('#upload_setting').val();
            if(hidden_data){
                hidden_data = JSON.parse(hidden_data);
            }
            var data = {};
            data.manual_item = {{isset($settings["manual_item"]) ? 1 : 0}};
            data.upload_setting = hidden_data;
            getStars(data);
        }
    }
    function getStars(data){
       // console.log(data.upload_setting);
        var obj = $("#input-id");
        if(typeof window.onload === 'function'){
            if (data.manual_item) {
                data.upload_setting.showRemove = data.upload_setting.showRemove && data.upload_setting.showRemove == 'true' ? true : false;
                data.upload_setting.removeClass = data.upload_setting.removeClass && data.upload_setting.removeClass != 0 ? 'btn btn-kv btn-outline-secondary '+data.upload_setting.removeClass : 'btn btn-kv btn-default btn-outline-secondary';
                data.upload_setting.removeIcon = data.upload_setting.removeIcon ? '<i class="fa '+data.upload_setting.removeIcon+'"></i>' : '<i class="glyphicon glyphicon-trash"></i>';
                data.upload_setting.removeTitle = data.upload_setting.removeTitle ? data.upload_setting.removeTitle : 'Remove file';
                data.upload_setting.removeLabel = data.upload_setting.removeTitle ? data.upload_setting.removeTitle : 'Remove file';

                data.upload_setting.showUpload = data.upload_setting.showUpload && data.upload_setting.showUpload == 'true' ? true : false;
                data.upload_setting.uploadClass = data.upload_setting.uploadClass && data.upload_setting.uploadClass != 0 ? 'btn btn-kv btn-outline-secondary '+data.upload_setting.uploadClass : 'btn btn-kv btn-default btn-outline-secondary';
                data.upload_setting.uploadIcon = data.upload_setting.uploadIcon ? '<i class="fa '+data.upload_setting.uploadIcon+'"></i>' : '<i class="glyphicon glyphicon-upload"></i>';
                data.upload_setting.uploadTitle = data.upload_setting.uploadTitle ? data.upload_setting.uploadTitle : 'Upload file';
                data.upload_setting.uploadLabel = data.upload_setting.uploadTitle ? data.upload_setting.uploadTitle : 'Upload file';

                data.upload_setting.browseClass = data.upload_setting.browseClass && data.upload_setting.browseClass != 0 ? 'btn btn-kv '+data.upload_setting.browseClass : 'btn btn-primary';
                data.upload_setting.browseIcon = data.upload_setting.browseIcon ? '<i class="fa '+data.upload_setting.browseIcon+'"></i>' : '<i class="glyphicon glyphicon-folder-open"></i>&nbsp;';
                data.upload_setting.browseLabel = data.upload_setting.browseLabel ? data.upload_setting.browseLabel : 'Browse …';

                data.upload_setting.showDownload = data.upload_setting.showDownload && data.upload_setting.showDownload == 'true' ? true : false;
                data.upload_setting.showCancel = data.upload_setting.showCancel && data.upload_setting.showCancel == 'true' ? true : false;
                data.upload_setting.showCaption = data.upload_setting.showCaption && data.upload_setting.showCaption == 'true' ? true : false;
                data.upload_setting.showPreview = data.upload_setting.showPreview && data.upload_setting.showPreview == 'true' ? true : false;

                return obj.fileinput(data.upload_setting);
            }
        }else{
            window.onload = function(){
                if(obj.length) {
                    if(!data.upload_setting){
                        return obj.fileinput({'showUpload':false, 'previewFileType':'any','showCaption':false});
                    }
                    data.upload_setting.showRemove = data.upload_setting.showRemove && data.upload_setting.showRemove == 'true' ? true : false;
                    data.upload_setting.removeClass = data.upload_setting.removeClass && data.upload_setting.removeClass != 0 ? 'btn btn-kv btn-outline-secondary '+data.upload_setting.removeClass : 'btn btn-kv btn-default btn-outline-secondary';
                    data.upload_setting.removeIcon = data.upload_setting.removeIcon ? '<i class="fa '+data.upload_setting.removeIcon+'"></i>' : '<i class="glyphicon glyphicon-trash"></i>';
                    data.upload_setting.removeTitle = data.upload_setting.removeTitle ? data.upload_setting.removeTitle : 'Remove file';
                    data.upload_setting.removeLabel = data.upload_setting.removeTitle ? data.upload_setting.removeTitle : 'Remove file';

                    data.upload_setting.showUpload = data.upload_setting.showUpload && data.upload_setting.showUpload == 'true' ? true : false;
                    data.upload_setting.uploadClass = data.upload_setting.uploadClass && data.upload_setting.uploadClass != 0 ? 'btn btn-kv btn-outline-secondary '+data.upload_setting.uploadClass : 'btn btn-kv btn-default btn-outline-secondary';
                    data.upload_setting.uploadIcon = data.upload_setting.uploadIcon ? '<i class="fa '+data.upload_setting.uploadIcon+'"></i>' : '<i class="glyphicon glyphicon-upload"></i>';
                    data.upload_setting.uploadTitle = data.upload_setting.uploadTitle ? data.upload_setting.uploadTitle : 'Upload file';
                    data.upload_setting.uploadLabel = data.upload_setting.uploadTitle ? data.upload_setting.uploadTitle : 'Upload file';

                    data.upload_setting.browseClass = data.upload_setting.browseClass && data.upload_setting.browseClass != 0 ? 'btn btn-kv '+data.upload_setting.browseClass : 'btn btn-primary';
                    data.upload_setting.browseIcon = data.upload_setting.browseIcon ? '<i class="fa '+data.upload_setting.browseIcon+'"></i>' : '<i class="glyphicon glyphicon-folder-open"></i>&nbsp;';
                    data.upload_setting.browseLabel = data.upload_setting.browseLabel ? data.upload_setting.browseLabel : 'Browse …';

                    data.upload_setting.showDownload = data.upload_setting.showDownload && data.upload_setting.showDownload == 'true' ? true : false;
                    data.upload_setting.showCancel = data.upload_setting.showCancel && data.upload_setting.showCancel == 'true' ? true : false;
                    data.upload_setting.showCaption = data.upload_setting.showCaption && data.upload_setting.showCaption == 'true' ? true : false;
                    data.upload_setting.showPreview = data.upload_setting.showPreview && data.upload_setting.showPreview == 'true' ? true : false;

                    return obj.fileinput(data.upload_setting);
                }
            }
        }
    }
    /*$('#input-id').on('filebatchselected', function(event, file, previewId, index, reader) {
        console.log($('#input-id').fileinput('getFileStack'));
        $('#input-id').fileinput('updateStack', index, $('#input-id').fileinput('getFileStack')[0]);
        console.log($('#input-id').fileinput('getFileStack'));
        var customValidationFailed = 0;
        if (customValidationFailed) {
            var err = {
                message: 'You are not allowed to do that',
                data: {key1: 'Key 1', detail1: 'Detail 1'}
            };
        }
        return $('#input-id').trigger('filecustomerror',[file,err]);
    });
    $('#input-id').on('filecustomerror', function(event, data, msg) {
       // console.log(event, data, msg);
        $('#kv-error-2').append(msg.message);
        $('#kv-error-2').fadeIn('slow');
    });*/
</script>