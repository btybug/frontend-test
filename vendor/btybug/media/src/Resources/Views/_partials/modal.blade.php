@if($v==3)
    <div class="settingsModal">
        <!-- Modal -->
        <div class="modal fade" id="mysettingsModal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <textarea name="" id="path-text-location" cols="30" rows="10" class="form-control"
                                  readonly></textarea>
                        <button class="btn btn-submit media-select">Select</button>
                        <button type="button" class="close media-modal-close">&times;</button>
                    </div>
                    <div class="modal-body">
                        @include('media::_partials.drive')
                    </div>
                    <input type="hidden" name="" id="path-location" value="">
                </div>
            </div>
        </div>
    </div>

    <style>
        .settingsModal .fade.in {
            opacity: 1;
            display: block;
        }

        .settingsModal .modal-content {
            color: #000;
        }

        .settingsModal .modal-dialog {
            width: 100%;
            height: 100%;
            margin: 0;
            padding: 0;
        }

        .settingsModal .modal-content {
            height: auto;
            min-height: 100%;
            border-radius: 0;
        }

        .settingsModal .modal-content .modal-header {
            padding: 0;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
        }

        .settingsModal .modal-content .modal-header .close {
            margin-right: 7px;
            margin-left: auto;
        }

        .settingsModal .modal-content .modal-header .btn-submit {
            border: none;
            border-radius: 0;
            background-color: #f0ad4e;
            color: white;
        }

        .settingsModal .modal-content .modal-header textarea {
            resize: none;
            height: 35px;
            width: 30%;
            border-radius: 0;
        }
    </style>
@elseif($v==4)
    <div class="settingsModal">
        <!-- Modal -->
        <div class="modal fade" id="mysettingsModal" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog  modal-lg " role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <textarea name="" id="path-text-location" cols="30" rows="10" class="form-control"
                                  readonly></textarea>
                        <button class="btn btn-submit media-select">Select</button>
                        <button type="button" class="close media-modal-close">&times;</button>
                    </div>
                    <div class="modal-body">
                        @include('media::_partials.drive')
                    </div>
                    <input type="hidden" name="" id="path-location" value="">
                </div>
            </div>
        </div>
    </div>

    <style>
        .settingsModal .fade.in {
            opacity: 1;
            display: block;
            z-index: 999999999999;
        }

        .settingsModal .modal-content {
            color: #000;
        }

        .settingsModal .modal-dialog {
            max-width: 100%;
            height: 100%;
            transform: none !important;
            margin: 0;
        }

        .settingsModal .modal-content {
            height: auto;
            min-height: 100%;
            border-radius: 0;
        }

        .settingsModal .modal-content .modal-header {
            padding: 0;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
        }

        .settingsModal .modal-content .modal-header .close {
            margin-right: 7px;
            margin-left: auto;
        }

        .settingsModal .modal-content .modal-header .btn-submit {
            border: none;
            border-radius: 0;
            background-color: #f0ad4e;
            color: white;
        }

        .settingsModal .modal-content .modal-header textarea {
            resize: none;
            height: 35px;
            width: 30%;
            border-radius: 0;
        }
    </style>
@endif