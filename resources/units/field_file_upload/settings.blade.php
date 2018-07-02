<?php
$data_for_select = [
    0 => 'Select class',
    'upl-btn-bg-cl-black' => 'black',
    'upl-btn-bg-cl-grey' => 'gray',
    'upl-btn-bg-cl-skyblue' => 'skyblue',
    'upl-btn-bg-cl-darksalmon' => 'darksalmon',
    'upl-btn-bg-cl-deeppink' => 'deeppink',
    'upl-btn-bg-cl-fuchsia' => 'fuchsia',
    'upl-btn-bg-cl-brown' => 'brown',
    'upl-btn-bg-cl-red' => 'red',
    'upl-btn-bg-cl-cyan' => 'cyan',
    'upl-btn-bg-cl-lightcoral' => 'lightcoral',
    'upl-btn-bg-cl-darkorange' => 'darkorange',
    'rem-btn-bg-cl-forestgreen' => 'forestgreen',
    'upl-btn-bg-cl-yellow' => 'yellow',
    'upl-btn-bg-cl-crimson' => 'crimson',
    'rem-btn-bg-cl-deepskyblue' => 'deepskyblue',
    'upl-btn-bg-cl-darkblue' => 'darkblue',
    'upl-btn-bg-cl-peru' => 'peru',
    'upl-btn-bg-cl-orange' => 'orange',
];
?>

<div class="col-md-12">
    <div class="row  visibility-box  {!! (1) ? "show" : "hide" !!}">
        <div class="bty-panel-collapse">
            <div>
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#inputsetting"
                   aria-expanded="true">
                    <span class="icon"><i class="fa fa-chevron-down" aria-hidden="true"></i></span>
                    <span class="title">Input Setting</span>
                </a>
            </div>
            <div id="inputsetting" class="collapse in" aria-expanded="true" style="">
                <div class="content bty-settings-panel">
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="col-md-2">
                                <label>Field style</label>
                            </div>
                            <div class="col-md-9">
                                <select name="radio_inp" id="" class="form-control">
                                    <option value="">Select rating</option>
                                    <option value="">Style 1</option>
                                    <option value="">Style 2</option>
                                </select>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6">
                            <label for="lablename" class="col-sm-3 p-l-0 control-label m-0  text-left">Label
                                name</label>
                            <div class="col-sm-8">
                                {!! Form::text('label',null,['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6">
                            <label for="fieldicon" class="col-sm-3 p-l-0 control-label m-0 text-left">Field Icon</label>
                            <div class="col-sm-8">
                                {!!Form::text('icon',null,['class' => 'form-control icp'])  !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="tooltip-icon" class="col-sm-3 m-0 control-label text-left">Tooltip Icon</label>
                            <div class="col-sm-8">
                                {!!Form::text('tooltip_icon',null,['class' => 'form-control icp','id'=>'tooltip-icon'])  !!}

                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6">
                            <label for="help" class="col-sm-3 m-0 control-label text-left">help</label>
                            <div class="col-sm-8">
                                {!! Form::textarea('help',null,['class'=>'form-control','id'=>'help']) !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for='validation_message' class="col-sm-3 m-0 control-label text-left">Error
                                Message</label>
                            <div class="col-sm-8">
                                {!! Form::textarea('validation_message',null,['class' => 'form-control','id'=>'validation_message']) !!}
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row visibility-box {!! (1) ? "show" : "hide" !!}">
        <div class="bty-panel-collapse">
            <div>
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#uploadsettings"
                   aria-expanded="true">
                    <span class="icon"><i class="fa fa-chevron-down" aria-hidden="true"></i></span>
                    <span class="title">Settings</span>
                </a>
            </div>
            <div id="uploadsettings" class="collapse in" aria-expanded="true" style="">
                <div class="content bty-settings-panel">
                    <div class="form-group">
                        <div class="col-md-3">
                            <div class="customcheck">
                                <input type="checkbox" id="allowshowup" name="manual_item">
                                <label for="allowshowup">Show Upload</label>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-3">
                            <div class="customcheck">
                                <input type="checkbox" id="allowImg" name="upload_setting[allowedPreviewTypes][]"
                                       value="image"
                                       class="checkClick" {{isset($settings["upload_setting"]["allowedPreviewTypes"]) && in_array("image", $settings["upload_setting"]["allowedPreviewTypes"]) ? 'checked' : ''}}>
                                <label for="allowImg">Allow Images</label>
                            </div>
                        </div>
                        <div class="col-md-9 checkBlock {{isset($settings["upload_setting"]["allowedPreviewTypes"]) && in_array("image", $settings["upload_setting"]["allowedPreviewTypes"]) ? '' : 'custom_hidden'}}">
                            <div class="form-group">
                                <label class="col-sm-4 control-label text-right">Images extensions</label>
                                <div class="col-sm-8">
                                    {!! Form::select("upload_setting[allowedFileExtensions][]",['png' => 'PNG','jpg' => 'JPG','jpeg' => 'JPEG','gif' => 'GIF'],isset($settings["upload_setting"]["allowedFileExtensions"]) ? $settings["upload_setting"]["allowedFileExtensions"] : null,["class" => "extensions-multiple","multiple" => "multiple"]) !!}
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label text-right">Image Size</label>
                                <div class="col-sm-4">
                                    <input type="number" name="upload_setting[previewSettings][image][size]"
                                           class="form-control">
                                </div>
                                <div class="col-sm-1">
                                    <strong>MB</strong>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-4">
                                    <div class="customcheck lab-right">
                                        <input type="checkbox" id="unlimupload">
                                        <label for="unlimupload">Unlimitted upload</label>
                                    </div>
                                </div>
                                <label class="col-sm-4 control-label text-right">No of images</label>
                                <div class="col-sm-4">
                                    <input type="number" name="upload_setting[previewSettings][image][maxFileCount]"
                                           class="form-control">
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-3">
                            <div class="customcheck">
                                <input type="checkbox" id="allowVideo" name="upload_setting[allowedPreviewTypes][]"
                                       value="video"
                                       class="checkClick" {{isset($settings["upload_setting"]["allowedPreviewTypes"]) && in_array("video", $settings["upload_setting"]["allowedPreviewTypes"]) ? 'checked' : ''}}>
                                <label for="allowVideo">Allow video</label>
                            </div>
                        </div>
                        <div class="col-md-9 checkBlock {{isset($settings["upload_setting"]["allowedPreviewTypes"]) && in_array("video", $settings["upload_setting"]["allowedPreviewTypes"]) ? '' : 'custom_hidden'}}">
                            <div class="form-group">
                                <label class="col-sm-4 control-label text-right">Video extensions</label>
                                <div class="col-sm-8">
                                    {!! Form::select("upload_setting[allowedFileExtensions][]",['avi' => 'AVI','mp4' => 'MP4','mov' => 'MOV','mpa' => 'MPA'],isset($settings["upload_setting"]["allowedFileExtensions"]) ? $settings["upload_setting"]["allowedFileExtensions"] : null,["class" => "extensions-multiple","multiple" => "multiple"]) !!}
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label text-right">Video Size</label>
                                <div class="col-sm-2">
                                    <input type="number" class="form-control">
                                </div>
                                <div class="col-sm-1">
                                    <strong>MB</strong>
                                </div>
                                <label class="col-sm-3 control-label text-right">No of video</label>
                                <div class="col-sm-2">
                                    <input type="number" class="form-control">
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-3">
                            <div class="customcheck">
                                <input type="checkbox" id="allowMusic" name="upload_setting[allowedPreviewTypes][]"
                                       value="audio"
                                       class="checkClick" {{isset($settings["upload_setting"]["allowedPreviewTypes"]) && in_array("audio", $settings["upload_setting"]["allowedPreviewTypes"]) ? 'checked' : ''}}>
                                <label for="allowMusic">Allow music</label>
                            </div>
                        </div>
                        <div class="col-md-9 checkBlock {{isset($settings["upload_setting"]["allowedPreviewTypes"]) && in_array("audio", $settings["upload_setting"]["allowedPreviewTypes"]) ? '' : 'custom_hidden'}}">
                            <div class="form-group">
                                <label class="col-sm-4 control-label text-right">Music extensions</label>
                                <div class="col-sm-8">
                                    {!! Form::select("upload_setting[allowedFileExtensions][]",['mp3' => 'MP3','mod' => 'MOD','mpga' => 'MPGA'],isset($settings["upload_setting"]["allowedFileExtensions"]) ? $settings["upload_setting"]["allowedFileExtensions"] : null,["class" => "extensions-multiple","multiple" => "multiple"]) !!}
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label text-right">Music Size</label>
                                <div class="col-sm-2">
                                    <input type="number" class="form-control">
                                </div>
                                <div class="col-sm-1">
                                    <strong>MB</strong>
                                </div>
                                <label class="col-sm-3 control-label text-right">No of music</label>
                                <div class="col-sm-2">
                                    <input type="number" class="form-control">
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-3">
                            <div class="customcheck">
                                <input type="checkbox" id="allowDocs" name="upload_setting[allowedPreviewTypes][]"
                                       value="text"
                                       class="checkClick" {{isset($settings["upload_setting"]["allowedPreviewTypes"]) && in_array("text", $settings["upload_setting"]["allowedPreviewTypes"]) ? 'checked' : ''}}>
                                <label for="allowDocs">Allow docs</label>
                            </div>
                        </div>
                        <div class="col-md-9 checkBlock {{isset($settings["upload_setting"]["allowedPreviewTypes"]) && in_array("text", $settings["upload_setting"]["allowedPreviewTypes"]) ? '' : 'custom_hidden'}}">
                            <div class="form-group">
                                <label class="col-sm-4 control-label text-right">Docs extensions</label>
                                <div class="col-sm-8">
                                    {!! Form::select("upload_setting[allowedFileExtensions][]",['pdf' => 'PDF','zip' => 'ZIP','txt' => 'TEXT','docx' => 'DOCX'],isset($settings["upload_setting"]["allowedFileExtensions"]) ? $settings["upload_setting"]["allowedFileExtensions"] : null,["class" => "extensions-multiple","multiple" => "multiple"]) !!}
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label text-right">Docs Size</label>
                                <div class="col-sm-2">
                                    <input type="number" class="form-control">
                                </div>
                                <div class="col-sm-1">
                                    <strong>MB</strong>
                                </div>
                                <label class="col-sm-3 control-label text-right">No of docs</label>
                                <div class="col-sm-2">
                                    <input type="number" class="form-control">
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-3 col-md-offset-3 form-group text-right">
                            <div class="customcheck lab-right">
                                <input type="hidden" name="upload_setting[fileActionSettings][showDownload]"
                                       value="false">
                                <input type="checkbox" id="allowDownload"
                                       name="upload_setting[fileActionSettings][showDownload]"
                                       value="true" {{isset($settings["upload_setting"]["fileActionSettings"]["showDownload"]) && $settings["upload_setting"]["fileActionSettings"]["showDownload"] == 'true' ? 'checked' : ''}}>
                                <label for="allowDownload">Allow Download</label>
                            </div>

                        </div>
                        <div class="col-md-8 col-md-offset-2">
                            <div class="form-group">
                                <label class="col-sm-6 control-label text-right">Total maximum size to upload</label>
                                <div class="col-sm-4">
                                    <input type="number" min="0" max="1024" name="upload_setting[maxFileSize]"
                                           value="{{isset($settings["upload_setting"]["maxFileSize"]) ? $settings["upload_setting"]["maxFileSize"] : ''}}"
                                           class="form-control">
                                </div>
                                <div class="col-sm-2">
                                    <strong>MB</strong>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row visibility-box {!! (1) ? "show" : "hide" !!}">
        <div class="bty-panel-collapse">
            <div>
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#uploadbesic"
                   aria-expanded="true">
                    <span class="icon"><i class="fa fa-chevron-down" aria-hidden="true"></i></span>
                    <span class="title"> Basic</span>
                </a>
            </div>
            <div id="uploadbesic" class="collapse in" aria-expanded="true" style="">
                <div class="content bty-settings-panel">
                    <div class="form-group">
                        <div class="col-md-3">
                            <div class="customcheck">
                                {{--<input type="hidden" name="upload_setting[showBrowse]" value="false">
                                <input type="checkbox" name="upload_setting[showBrowse]" id="browseButton"
                                       value="true" {{isset($settings["upload_setting"]["showBrowse"]) && $settings["upload_setting"]["showBrowse"] == 'true' ? 'checked' : ''}}>--}}
                            </div>
                            <label for="browseButton">Browse Button</label>
                        </div>
                        <div class="col-md-9">
                            <div class="col-md-4">
                                <label class="control-label text-left">Title</label>
                                <div>
                                    <input type="text" class="form-control"
                                           name="upload_setting[browseLabel]"
                                           value="{{isset($settings['upload_setting']['browseLabel']) ? $settings['upload_setting']['browseLabel'] : ''}}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label class="control-label text-left">Select Icon</label>
                                <div>
                                    {!!Form::text('upload_setting[browseIcon]',isset($settings["upload_setting"]["browseIcon"])?$settings["upload_setting"]["browseIcon"]:null,['class' => 'form-control icpp','id'=>'tooltip-icon'])  !!}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label class="control-label text-left">Select Class</label>
                                <div>
                                    {!! Form::select("upload_setting[browseClass]",$data_for_select,isset($settings["upload_setting"]["browseClass"]) ? $settings["upload_setting"]["browseClass"] : null,["class" => "form-control"]) !!}
                                </div>
                            </div>

                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-3">
                            <div class="customcheck">
                                <input type="hidden" name="upload_setting[showUpload]" value="false"
                                       class="checkClick">
                                <input type="checkbox" name="upload_setting[showUpload]"
                                       id="uploadButton" value="true"
                                       class="checkClick" {{isset($settings["upload_setting"]["showUpload"]) && $settings["upload_setting"]["showUpload"]=='true' ? 'checked' : ''}}>
                                <label for="uploadButton">Upload Button</label>
                            </div>
                        </div>
                        <div class="col-md-9 checkBlock {{isset($settings["upload_setting"]["showUpload"]) && $settings["upload_setting"]["showUpload"]=='true' ? '' : 'custom_hidden'}}">
                            <div class="col-md-4">
                                <label class="control-label text-left">Title</label>
                                <div>
                                    <input type="text" name="upload_setting[uploadTitle]"
                                           value="{{isset($settings['upload_setting']['uploadTitle']) ? $settings['upload_setting']['uploadTitle'] : ''}}"
                                           class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label class="control-label text-left">Select Icon</label>
                                <div>
                                    {!!Form::text('upload_setting[uploadIcon]',isset($settings['upload_setting']['uploadIcon'])?$settings['upload_setting']['uploadIcon']:null,['class' => 'form-control icpp','id'=>'tooltip-icon'])  !!}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label class="control-label text-left">Select Class</label>
                                <div>
                                    {!! Form::select("upload_setting[uploadClass]",$data_for_select,isset($settings["upload_setting"]["uploadClass"]) ? $settings["upload_setting"]["uploadClass"] : null,["class" => "form-control"]) !!}
                                </div>
                            </div>

                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-3">
                            <div class="customcheck">
                                <input type="hidden" name="upload_setting[showRemove]" value="false"
                                       class="checkClick">
                                <input type="checkbox" name="upload_setting[showRemove]"
                                       value="true" id="removeButton"
                                       class="checkClick" {{isset($settings["upload_setting"]["showRemove"]) && $settings["upload_setting"]["showRemove"] == 'true' ? 'checked' : ''}}>
                                <label for="removeButton">Remove Button</label>
                            </div>
                        </div>
                        <div class="col-md-9 checkBlock {{isset($settings["upload_setting"]["showRemove"]) && $settings["upload_setting"]["showRemove"]=='true' ? '' : 'custom_hidden'}}">
                            <div class="col-md-4">
                                <label class="control-label text-left">Title</label>
                                <div>
                                    <input type="text" class="form-control"
                                           name="upload_setting[removeTitle]"
                                           value="{{isset($settings['upload_setting']['removeTitle']) ? $settings['upload_setting']['removeTitle'] : ''}}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label class="control-label text-left">Select Icon</label>
                                <div>
                                    {!!Form::text('upload_setting[removeIcon]',isset($settings["upload_setting"]["removeIcon"])?$settings["upload_setting"]["removeIcon"]:null,['class' => 'form-control icpp','id'=>'tooltip-icon'])  !!}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label class="control-label text-left">Select Class</label>
                                <div>
                                    {!! Form::select("upload_setting[removeClass]",$data_for_select,isset($settings["upload_setting"]["removeClass"]) ? $settings["upload_setting"]["removeClass"] : null,["class" => "form-control"]) !!}
                                </div>
                            </div>

                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-4">
                            <div class="customcheck">
                                <input type="hidden" name="upload_setting[showCaption]" value="false">
                                <input type="checkbox" id="showcaption" value="true"
                                       name="upload_setting[showCaption]" {{isset($settings['upload_setting']['showCaption']) && $settings['upload_setting']['showCaption'] == 'true' ? 'checked' : ''}}>
                                <label for="showcaption">Show Caption</label>
                            </div>

                        </div>
                        <div class="col-md-4">
                            <div class="customcheck">
                                <input type="hidden" name="upload_setting[showCancel]" value="false">
                                <input type="checkbox" id="showCancel" name="upload_setting[showCancel]"
                                       value="true" {{isset($settings['upload_setting']['showCancel']) && $settings['upload_setting']['showCancel'] == 'true' ? 'checked' : ''}}>
                                <label for="showCancel">Show Cancel</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="customcheck">
                                <input type="hidden" value="false" name="upload_setting[showPreview]">
                                <input type="checkbox" id="showpreview" value="true"
                                       name="upload_setting[showPreview]" {{isset($settings['upload_setting']['showPreview']) && $settings['upload_setting']['showPreview'] == 'true' ? 'checked' : ''}}>
                                <label for="showpreview">Show Preview</label>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group">
                        {{--<div class="col-md-4">
                            <div class="customcheck">
                                <input type="hidden" value="false" name="upload_setting[showUpload]">
                                <input type="checkbox" id="showupload" value="true"
                                       name="upload_setting[showUpload]" {{isset($settings['upload_setting']['showUpload']) && $settings['upload_setting']['showUpload'] == 'true' ? 'checked' : ''}}>
                                <label for="showupload">Show Upload</label>
                            </div>
                        </div>--}}
                       {{-- <div class="col-md-4">
                            <div class="customcheck">
                                <input type="hidden" value="false" name="upload_setting[showRemove]">
                                <input type="checkbox" id="showremove" value="true"
                                       name="upload_setting[showRemove]" {{isset($settings['upload_setting']['showRemove']) && $settings['upload_setting']['showRemove'] == 'true' ? 'checked' : ''}}>
                                <label for="showremove">Show Remove</label>
                            </div>
                        </div>--}}
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{!! BBstyle($_this->path.DS.'css'.DS.'settings.css',$_this) !!}
{!! BBstyle($_this->path.DS.'css'.DS.'select2.min.css',$_this) !!}
{!! HTML::style('public/css/font-awesome/css/fontawesome-iconpicker.min.css') !!}
{!! HTML::script('public/css/font-awesome/js/fontawesome-iconpicker.min.js') !!}
{!! BBscript($_this->path.DS.'js'.DS.'select2.min.js') !!}
<script>
    $('.icpp').iconpicker();
    $(document).ready(function () {
        $('.extensions-multiple').select2();
        var checkClick = $('.checkClick');
        var checkBlock = $('.checkBlock');
        checkClick.on('click', function () {
            if ($(this).is(':checked')) {
                $(this).closest('.form-group').find(checkBlock).removeClass("custom_hidden");
            } else {
                $(this).closest('.form-group').find(checkBlock).addClass("custom_hidden");
            }
        });

    });
</script>