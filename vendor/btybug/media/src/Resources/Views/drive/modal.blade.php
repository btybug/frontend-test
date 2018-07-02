<div class="bestbetter-modal bestbetter-modal-media-dialog">
    <!-- Modal -->
    <div id="myModal" role="dialog">
        <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close-media-dialog close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Modal Header</h4>
                </div>
                <div class="modal-body">
                    <div class="content ">
                        <div class="left">
                            <div id="jstree_html" class="demo">

                            </div>
                        </div>
                        <div class="right main-content media-modal-main-content">
                            <div class="icon">
                                <i class="fa fa-folder" aria-hidden="true"></i>
                                <ul class="list-unstyled list-inline text-center icons">
                                    <li class="text-center"><a href="#"><i class="fa fa-info"
                                                                           aria-hidden="true"></i></a></li>
                                    <li class="text-center"><a href="#" target="_blank"><i class="fa fa-eye"
                                                                                           aria-hidden="true"></i></a>
                                    </li>
                                    <li class="text-center"><a href="#"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="img">
                                <a href="#">
                                    <img src="http://www.apicius.es/wp-content/uploads/2012/07/IMG-20120714-009211.jpg"
                                         alt="">
                                </a>
                                <ul class="list-unstyled list-inline text-center icons">
                                    <li class="text-center"><a href="#"><i class="fa fa-info"
                                                                           aria-hidden="true"></i></a></li>
                                    <li class="text-center">
                                        <a href="http://www.apicius.es/wp-content/uploads/2012/07/IMG-20120714-009211.jpg"
                                           target="_blank" data-lightbox="folder-set" data-title="Images title">
                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <li class="text-center"><a href="#"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>


                        <div class="content-upload media-modal-content-upload">
                            <div class="upload-space">
                                <label class="control-label">Upload Image</label>
                                <div class="file-loading">
                                    <input id="input-ru" name="inputru[]" type="file" multiple>
                                </div>

                                </label>
                                <div id="errorBlock" class="help-block"></div>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="modal-footer">
                    <input type="text" class="pull-left" placeholder="upload file name">
                    <button type="button" class="btn btn-success upload-btn">Upload</button>
                    <button type="button" class="btn btn-info">Open</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
</div>
<script type="template" id="media-modal-folder">
    <div class="icon">
        <i class="fa fa-folder" aria-hidden="true"></i>
        <span>{name}</span>
        <ul class="list-unstyled list-inline text-center icons">
            <li class="text-center"><a href="#"><i class="fa fa-info" aria-hidden="true"></i></a></li>
            <li class="text-center"><a href="#" target="_blank"><i class="fa fa-eye" aria-hidden="true"></i></a></li>
            <li class="text-center"><a href="#"><i class="fa fa-pencil" aria-hidden="true"></i></a></li>
        </ul>
    </div>
</script>
<script type="template" id="media-modal-files">
    <div class="img">
        <a href="#">
            <img src="{url}" alt="">
        </a>
        <ul class="list-unstyled list-inline text-center icons">
            <li class="text-center"><a href="#"><i class="fa fa-info" aria-hidden="true"></i></a></li>
            <li class="text-center">
                <a href="{url}" target="_blank" data-lightbox="folder-set" data-title="{name}">
                    <i class="fa fa-eye" aria-hidden="true"></i>
                </a>
            </li>
            <li class="text-center"><a href="#"><i class="fa fa-pencil" aria-hidden="true"></i></a></li>
        </ul>
    </div>
</script>




