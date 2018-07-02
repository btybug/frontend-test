@php
    $classes=BBmakeCssClasses('containers')->collect();
@endphp

<div style="z-index: 99999" class="modal fade bigfullModal " id="styles-settings" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close btn-red-close " data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title p-t-10">
                </h4>
            </div>
            <div class="modal-body" style="min-height: 500px; z-index: 999999">

                <div class="magic-body">
                    <div class="container-fluid">
                        <div class="row div-flex">
                            <div class="col-sm-4 col-xs-12">
                                <div class="preview">

                                </div>
                            </div>
                            <div class="col-sm-8 col-xs-12">
                                <div class="settings">
                                    <ul class="nav nav-tabs">
                                        <li class="active"><a data-toggle="tab" href="#selectclass">Select class</a>
                                        </li>
                                        <li><a data-toggle="tab" href="#studio">Studio</a></li>
                                    </ul>

                                    <div class="tab-content">
                                        <div id="selectclass" class="tab-pane fade in active">
                                            <div class="content-class">
                                                <div class="col-md-4 col-md-offset-4">
                                                    <form class="" role="search">
                                                        <div class="input-group add-on">
                                                            <input class="form-control" placeholder="Search"
                                                                   name="srch-term" id="srch-term" type="text">
                                                            <div class="input-group-btn">
                                                                <button class="btn btn-default" type="submit"><i
                                                                            class="fa fa-search"></i></button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="clearfix"></div>
                                                <div class="list">
                                                    <ul>
                                                        @foreach($classes as $key=>$class)
                                                            <li data-value="{!! $class !!}">{!! $key !!}</li>
                                                        @endforeach

                                                    </ul>
                                                </div>
                                                <div class="settings-tags">
                                                    <select class="form-control js-example-tokenizer"
                                                            multiple="multiple">
                                                        <option selected="selected">orange</option>
                                                        <option>white</option>
                                                        <option selected="selected">purple</option>
                                                    </select>
                                                </div>

                                            </div>

                                        </div>
                                        <div id="studio" class="tab-pane fade">
                                            <h3>Studio</h3>
                                            <p>Some content in menu 1.</p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .preview, .settings {
        border: 1px solid #000;
    }

    .preview {

        height: 100%;
    }

    .settings {
        height: 100vh;
        display: flex;
        flex-direction: column;
    }

    .div-flex {
        display: -webkit-box;
        display: -moz-box;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;
        flex-wrap: wrap;
    }

    .settings .add-on {
        margin: 20px 0;
    }

    .settings .tab-content {
        height: 100%;
        display: flex;

    }

    .settings .tab-content .tab-pane {
        overflow-y: auto;
    }

    .settings .nav-tabs > li.active > a, .settings .nav-tabs > li.active > a:focus, .settings .nav-tabs > li.active > a:hover {
        border-radius: 0;
    }

    .settings .list ul {
        padding: 0;
        margin: 0 auto;
        display: flex;
        justify-content: space-between;
        width: 70%;
        flex-wrap: wrap;
        margin-top: 80px;

    }

    .settings .list li {
        list-style: none;
        padding: 15px 20px;
        background-color: #dbdbdb;
        margin-bottom: 7px;
    }
    .settings .list li:hover{
        background: #36a14f;

    }
    .settings .list li:active{
        background: #326ca1;
    }
    .settings .content-class {
        display: flex;
        flex-direction: column;
        min-height: 100%;
    }

    .settings .settings-tags {
        margin-top: auto;
    }

    .select2-container--default .select2-selection--multiple {
        border-radius: 0;
    }

</style>
<script>
    $(function () {
        $('body').on('click', '.BBstyles', function () {
            $('#styles-settings').modal();
        });
    })
</script>


