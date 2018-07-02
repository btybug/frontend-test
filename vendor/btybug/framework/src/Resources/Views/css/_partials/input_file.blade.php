<div class="d1">
    <h2>File</h2>
    <div class="col-md-12">
        <div class="col-md-6 p-t-34">
            <div class="bty-input-file-1">
                <label></label>
                <input type="file">
                <div>
                    <span>Choose a file</span>
                    <span>Browse</span>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <h5>bty-input-file-1</h5>
            <textarea class="form-control" name="" id="" cols="30" rows="5" readonly>
              .bty-input-file-1 {
    position: relative;
    cursor: pointer;
    height: 40px;
    width: 100%;
}

.bty-input-file-1 label {
    display: block;
    position: absolute;
    z-index: 2;
    top: 0;
    left: 0;
    width: 100%;
    max-width: 400px;
    height: 40px;
}

.bty-input-file-1 label:before {
    content: '\f093';
    position: absolute;
    font-family: FontAwesome;
    top: -15px;
    left: 10px;
    background-color: #c7c7c7;
    padding: 2px 10px;
    color: #FFF;
}

.bty-input-file-1 input[type=file] {
    position: absolute;
    z-index: 3;
    top: 0;
    left: 0;
    width: 100%;
    max-width: 400px;
    height: 40px;
    opacity: 0;
}

.bty-input-file-1 > div {
    width: 100%;
    height: 40px;
    border: 1px solid #ccc;
}

.bty-input-file-1 > div span:first-child {
    display: block;
    float: left;
    line-height: 40px;
    width: 80%;
    padding-left: 10px;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}

.bty-input-file-1 > div span:first-child.hasValue {
    background-color: #ededed;
}

.bty-input-file-1 > div span:last-child {
    display: block;
    float: left;
    width: 20%;
    background-color: #499bc7;
    color: #FFF;
    height: 40px;
    line-height: 40px;
    padding: 0 10px;
    text-align: center;
    overflow: hidden;
}
            </textarea>
        </div>
    </div>
    <div class="col-md-12">
        <div class="col-md-6">
            <h4>Input file 1</h4>
            <h5>bty-input-file-1</h5>
            <div class="bty-input-file-1">
                <label></label>
                <input type="file">
                <div>
                    <span>Choose a file</span>
                    <span>Browse</span>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <h4>Input file 2</h4>
            <h5>bty-input-file-2</h5>
            <input type="file" name="file" id="file-2" class="bty-input-file-2"
                   data-multiple-caption="{count} files selected" multiple>
            <label for="file-2"><i class="fa fa-upload" aria-hidden="true"></i><span>Choose a file</span></label>
        </div>
    </div>
    <div class="col-md-12">
        <div class="col-md-6">
            <h4>Input file 3</h4>
            <h5>bty-input-file-3</h5>
            <input type="file" name="file" id="file-3" class="bty-input-file-3"
                   data-multiple-caption="{count} files selected" multiple>
            <label for="file-3"><i class="fa fa-upload" aria-hidden="true"></i><span>Choose a file</span></label>
        </div>
        <div class="col-md-6">
            <h4>Input file 4</h4>
            <h5>bty-input-file-4</h5>
            <input type="file" name="file" id="file-4" class="bty-input-file-4"
                   data-multiple-caption="{count} files selected" multiple>
            <label for="file-4">
                <div>
                    <i class="fa fa-upload" aria-hidden="true"></i>
                </div>
                <span></span>
            </label>
        </div>
    </div>
</div>