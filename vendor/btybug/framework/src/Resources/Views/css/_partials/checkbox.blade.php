<div class="d1">
    <h2>Checkbox</h2>
    <div class="col-md-12">
        <div class="col-md-6 p-t-34">
            <div class="input-checkbox-1-bty">
                <input type="checkbox" id="bty-checkbox1">
                <label for="bty-checkbox1">checkbox</label>
            </div>
        </div>
        <div class="col-md-6">
            <h5>bty-input-checkbox-1</h5>
            <textarea class="form-control" name="" id="" cols="30" rows="5" readonly>
                .input-checkbox-1-bty input[type="checkbox"] {
    display: none;
}

.input-checkbox-1-bty label {
    position: relative;
    display: inline-block;
    padding-left: 1.5em;
    margin-right: 2em;
    cursor: pointer;
    line-height: 1em;
    -webkit-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out;
}

.input-checkbox-1-bty label:before,
.input-checkbox-1-bty label:after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 1em;
    height: 1em;
    text-align: center;
    color: white;
    border-radius: 50%;
    -webkit-transition: all .3s ease;
    transition: all .3s ease;
}

.input-checkbox-1-bty label:before {
    content: '✗';
    border-radius: 4px;
    background-color: white;
    color: white;
}

.input-checkbox-1-bty label:hover:before {
    color: #f0f0f0;
}

.input-checkbox-1-bty input[type="checkbox"]:checked + label:before {
    background-color: white;
    color: #f79420;
}
            </textarea>
        </div>
    </div>
    <div class="col-md-12">
        <div class="col-md-6 p-t-34">
            <div class="input-checkbox-2-bty">
                <input type="checkbox" id="bty-checkbox2">
                <label for="bty-checkbox2">checkbox</label>
            </div>
        </div>
        <div class="col-md-6">
            <h5>input-checkbox-2-bty</h5>
            <textarea class="form-control" name="" id="" cols="30" rows="5" readonly>
.input-checkbox-2-bty input[type="checkbox"]{
    display: none;
    cursor: pointer;
}

.input-checkbox-2-bty input[type="checkbox"]:focus,
.input-checkbox-2-bty input[type="checkbox"]:active {
    outline: none;
}

.input-checkbox-2-bty label {
    cursor: pointer;
    display: inline-block;
    position: relative;
    padding-left: 25px;
    margin-right: 10px;
    color: #0b4c6a;
}

.input-checkbox-2-bty label:before,
.input-checkbox-2-bty label:after {
    content: '';
    display: inline-block;
    width: 18px;
    height: 18px;
    left: 0;
    bottom: 0;
    text-align: center;
    position: absolute;
}

.input-checkbox-2-bty label:before {
    background-color: #fafafa;
    -moz-transition: all 0.3s ease-in-out;
    -o-transition: all 0.3s ease-in-out;
    -webkit-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out;
}

.input-checkbox-2-bty label:after {
    color: #fff;
}

.input-checkbox-2-bty input[type="checkbox"]:checked + label:before {
    -moz-box-shadow: inset 0 0 0 10px #158EC6;
    -webkit-box-shadow: inset 0 0 0 10px #158EC6;
    box-shadow: inset 0 0 0 10px #158EC6;
}

.input-checkbox-2-bty label:before {
    -moz-border-radius: 3px;
    -webkit-border-radius: 3px;
    border-radius: 3px;
}

.input-checkbox-2-bty label:hover:after, .input-checkbox-2-bty input[type="checkbox"]:checked + label:after {
    content: "\2713";
    line-height: 18px;
    font-size: 14px;
}

.input-checkbox-2-bty label:hover:after {
    color: #c7c7c7;
}

.input-checkbox-2-bty input[type="checkbox"]:checked + label:after, .input-checkbox-2-bty input[type="checkbox"]:checked + label:hover:after {
    color: #fff;
}
            </textarea>
        </div>
    </div>
    <div class="col-md-12">
        <div class="col-md-6 p-t-34">
            <div class="input-checkbox-3-bty">
                <input type="checkbox" id="bty-checkbox3">
            </div>
        </div>
        <div class="col-md-6">
            <h5>input-checkbox-3-bty</h5>
            <textarea class="form-control" name="" id="" cols="30" rows="5" readonly>
.input-checkbox-3-bty input[type="checkbox"] {
    display: inline-block;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    width: 55px;
    height: 28px;
    background-color: #fafafa;
    position: relative;
    -moz-border-radius: 30px;
    -webkit-border-radius: 30px;
    border-radius: 30px;
    -moz-transition: all 0.2s ease-in-out;
    -o-transition: all 0.2s ease-in-out;
    -webkit-transition: all 0.2s ease-in-out;
    transition: all 0.2s ease-in-out;
}

.input-checkbox-3-bty input[type="checkbox"]:hover:after {
    background-color: #c7c7c7;
}

.input-checkbox-3-bty input[type="checkbox"]:after {
    content: '';
    display: inline-block;
    position: absolute;
    width: 24px;
    height: 24px;
    background-color: #aeaeae;
    top: 2px;
    left: 2px;
    -moz-border-radius: 50%;
    -webkit-border-radius: 50%;
    border-radius: 50%;
    -moz-transition: all 0.2s ease-in-out;
    -o-transition: all 0.2s ease-in-out;
    -webkit-transition: all 0.2s ease-in-out;
    transition: all 0.2s ease-in-out;
}

.input-checkbox-3-bty input[type="checkbox"]:checked {
    -moz-box-shadow: inset 0 0 0 15px #158EC6;
    -webkit-box-shadow: inset 0 0 0 15px #158EC6;
    box-shadow: inset 0 0 0 15px #158EC6;
}

.input-checkbox-3-bty input[type="checkbox"]:checked:after {
    left: 29px;
    background-color: #fff;
}

.input-checkbox-3-bty input[type="checkbox"]:focus, .input-checkbox-3-bty input[type="checkbox"]:active {
    outline: none !important;
}
            </textarea>
        </div>
    </div>
    <div class="col-md-12">
        <div class="col-md-6 p-t-34">
            <div class="input-checkbox-4-bty">
                <input type="checkbox" id="bty-checkbox4">
                <label for="bty-checkbox4">checkbox</label>
            </div>
        </div>
        <div class="col-md-6">
            <h5>input-checkbox-4-bty</h5>
            <textarea class="form-control" name="" id="" cols="30" rows="5" readonly>
.input-checkbox-4-bty input[type="checkbox"]{
    display: none;
}

.input-checkbox-4-bty label:before {
    content: "";
    margin: 0 .5em 0 0;
    float: left;
    width: 22px;
    height: 22px;
    background: #fff;
    color: #fff;
    border: 3px solid #e5e5e5;
    border-radius: 3px;
    transition: all .3s ease;
}

.input-checkbox-4-bty input[type="checkbox"]:checked + label:before {
    font-family: "FontAwesome";
    content: "\f00c";
    color: #fff;
    background-color: #88c6ff;
    border: 3px solid #2295ff;
    font-size: 13px;
}
            </textarea>
        </div>
    </div>
    <div class="col-md-12">
        <div class="col-md-6 p-t-34">
            <div class="input-checkbox-5-bty">
                <input type="checkbox" id="bty-checkbox5">
                <label for="bty-checkbox5"></label>
            </div>
        </div>
        <div class="col-md-6">
            <h5>input-checkbox-5-bty</h5>
            <textarea class="form-control" name="" id="" cols="30" rows="5" readonly>
.input-checkbox-5-bty label {
    width: 20px;
    height: 20px;
    position: absolute;
    left: 15px;
    cursor: pointer;
    background: -webkit-linear-gradient(top, #222222 0%, #45484d 100%);
    background: linear-gradient(to bottom, #222222 0%, #45484d 100%);
    box-shadow: inset 0px 1px 1px white, 0px 1px 3px rgba(0, 0, 0, 0.5);
}

.input-checkbox-5-bty label:after {
    content: '';
    width: 16px;
    height: 16px;
    position: absolute;
    top: 2px;
    left: 2px;
    background: #27ae60;
    background: -webkit-linear-gradient(top, #27ae60 0%, #145b32 100%);
    background: linear-gradient(to bottom, #27ae60 0%, #145b32 100%);
    box-shadow: inset 0px 1px 1px white, 0px 1px 3px rgba(0, 0, 0, 0.5);
    opacity: 0;
}

.input-checkbox-5-bty label:hover::after {
    opacity: 0.3;
}

.input-checkbox-5-bty input[type="checkbox"] {
    visibility: hidden;
}

.input-checkbox-5-bty input[type="checkbox"]:checked + label:after {
    opacity: 1;
}
            </textarea>
        </div>
    </div>
    <div class="col-md-12">
        <div class="col-md-6 p-t-34">
            <div class="input-checkbox-6-bty">
                <input type="checkbox" id="bty-checkbox6">
                <label for="bty-checkbox6"><span>checkbox</span></label>
            </div>
        </div>
        <div class="col-md-6">
            <h5>input-checkbox-6-bty</h5>
            <textarea class="form-control" name="" id="" cols="30" rows="5" readonly>
.input-checkbox-6-bty label {
    width: 20px;
    height: 20px;
    cursor: pointer;
    position: absolute;
    left: 15px;
    background: -webkit-linear-gradient(top, #222222 0%, #45484d 100%);
    background: linear-gradient(to bottom, #222222 0%, #45484d 100%);
    box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.5), 0px 1px 0px white;
}

.input-checkbox-6-bty label span {
    position: relative;
    left: 25px;
}

.input-checkbox-6-bty input[type="checkbox"]:checked + label span {
    color: white;
    transition: 0.5s ease;
}

.input-checkbox-6-bty label:after {
    content: '';
    width: 10px;
    height: 5px;
    position: absolute;
    top: 6px;
    left: 5px;
    border: 3px solid #fcfff4;
    border-top: none;
    border-right: none;
    background: transparent;
    opacity: 0;
    -webkit-transform: rotate(-45deg);
    transform: rotate(-45deg);
}

.input-checkbox-6-bty label:hover::after {
    opacity: 0.3;
}

.input-checkbox-6-bty input[type="checkbox"] {
    visibility: hidden;
}

.input-checkbox-6-bty input[type="checkbox"]:checked + label:after {
    opacity: 1;
}
            </textarea>
        </div>
    </div>
    <div class="col-md-12">
        <div class="col-md-6 p-t-34">
            <div class="input-checkbox-7-bty">
                <input type="checkbox" id="bty-checkbox7">
                <label for="bty-checkbox7">checkbox</label>
            </div>
        </div>
        <div class="col-md-6">
            <h5>input-checkbox-7-bty</h5>
            <textarea class="form-control" name="" id="" cols="30" rows="5" readonly>
.input-checkbox-7-bty input[type="checkbox"] {
    cursor: pointer;
    visibility: hidden;
}

.input-checkbox-7-bty input[type="checkbox"]:after {
    border: 1px solid #166B94;
    border-radius: 3px;
    color: #fff;
    content: "";
    display: block;
    height: 16px;
    line-height: 16px;
    position: absolute;
    text-align: center;
    visibility: visible;
    width: 16px;
}

.input-checkbox-7-bty input[type="checkbox"]:checked:after {
    border: 1px solid #979797;
    color: #979797;
    content: "✓";
}

.input-checkbox-7-bty input[type="checkbox"]:checked + label {
    color: #979797;
    font-weight: normal;
    text-decoration: line-through;
}

.input-checkbox-7-bty label {
    color: #166B94;
    font-weight: bold;
    margin-left: 12px;
    cursor: pointer;
}
            </textarea>
        </div>
    </div>
    <div class="col-md-12">
        <div class="col-md-6 p-t-34">
            <div class="input-checkbox-8-bty">
                <input type="checkbox" id="bty-checkbox8" >
                <label for="bty-checkbox8">checkbox</label>
            </div>
        </div>
        <div class="col-md-6">
            <h5>input-checkbox-8-bty</h5>
            <textarea class="form-control" name="" id="" cols="30" rows="5" readonly>
.input-checkbox-8-bty input[type="checkbox"] {
    display: none;
}

.input-checkbox-8-bty label {
    padding: 0;
    display: inline-block;
    position: relative;
    font-size: 20px;
    text-shadow: 0 0 9px rgba(0, 0, 0, 0.4);
    color: #333;
}

.input-checkbox-8-bty input[type="checkbox"]:checked + label:before,
.input-checkbox-8-bty label:active:before {
    content: "\f05d";
    font-family: FontAwesome;
    padding-right: 5px;
}

.input-checkbox-8-bty label:before,
.input-checkbox-8-bty input[type="checkbox"]:checked + label:active:before {
    content: "\f05c";
    font-family: FontAwesome;
    padding-right: 5px;
}
            </textarea>
        </div>
    </div>
    <div class="col-md-12">
        <div class="col-md-6 p-t-34">
            <div class="input-checkbox-without-lab-1-bty">
                <input type="checkbox">
            </div>
        </div>
        <div class="col-md-6">
            <h5>input-checkbox-without-lab-1-bty</h5>
            <textarea class="form-control" name="" id="" cols="30" rows="5" readonly>
.input-checkbox-without-lab-1-bty input[type="checkbox"] {
    display: inline-block;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    width: 25px;
    height: 25px;
    background-color: #fafafa;
    position: relative;
    -moz-transition: all 0.2s ease-in-out;
    -o-transition: all 0.2s ease-in-out;
    -webkit-transition: all 0.2s ease-in-out;
    transition: all 0.2s ease-in-out;
}


.input-checkbox-without-lab-1-bty input[type="checkbox"]:checked {
    -moz-box-shadow: inset 0 0 0 15px #158EC6;
    -webkit-box-shadow: inset 0 0 0 15px #158EC6;
    box-shadow: inset 0 0 0 15px #158EC6;
}

.input-checkbox-without-lab-1-bty input[type="checkbox"]:focus, .input-checkbox-without-lab-1-bty input[type="checkbox"]:active, .input-checkbox-without-lab-1-bty input[type="checkbox"]:active:hover {
    outline: none !important;
    cursor: pointer;
}
            </textarea>
        </div>
    </div>
    <div class="col-md-12">
        <div class="col-md-6 p-t-34">
            <div class="input-checkbox-without-lab-2-bty">
                <input type="checkbox">
            </div>
        </div>
        <div class="col-md-6">
            <h5>input-checkbox-without-lab-2-bty</h5>
            <textarea class="form-control" name="" id="" cols="30" rows="5" readonly>
.input-checkbox-without-lab-2-bty input[type="checkbox"] {
    display: inline-block;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    width: 55px;
    height: 28px;
    background-color: #fafafa;
    position: relative;
    -moz-border-radius: 30px;
    -webkit-border-radius: 30px;
    border-radius: 30px;
    -moz-transition: all 0.2s ease-in-out;
    -o-transition: all 0.2s ease-in-out;
    -webkit-transition: all 0.2s ease-in-out;
    transition: all 0.2s ease-in-out;
}

.input-checkbox-without-lab-2-bty input[type="checkbox"]:after {
    content: "\f05e";
    font-family: FontAwesome;
    position: absolute;
    color: red;
    font-size: 25px;
    top: 2px;
    left: 2px;
    -moz-transition: all 0.2s ease-in-out;
    -o-transition: all 0.2s ease-in-out;
    -webkit-transition: all 0.2s ease-in-out;
    transition: all 0.2s ease-in-out;
}

.input-checkbox-without-lab-2-bty input[type="checkbox"]:checked {
    -moz-box-shadow: inset 0 0 0 15px #158EC6;
    -webkit-box-shadow: inset 0 0 0 15px #158EC6;
    box-shadow: inset 0 0 0 15px #158EC6;
}

.input-checkbox-without-lab-2-bty input[type="checkbox"]:checked:after {
    left: 29px;
    color: white;
    content: "\f05d";
}

.input-checkbox-without-lab-2-bty input[type="checkbox"]:focus, .input-checkbox-without-lab-2-bty input[type="checkbox"]:active {
    outline: none !important;
}
            </textarea>
        </div>
    </div>
    <div class="col-md-12">
        <div class="col-md-6 p-t-34">
            <div class="input-checkbox-without-lab-3-bty">
                <input type="checkbox">
            </div>
        </div>
        <div class="col-md-6">
            <h5>input-checkbox-without-lab-3-bty</h5>
            <textarea class="form-control" name="" id="" cols="30" rows="5" readonly>
.input-checkbox-without-lab-3-bty input[type="checkbox"] {
    display: inline-block;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    width: 24px;
    height: 24px;
    position: relative;
    -moz-transition: all 0.2s ease-in-out;
    -o-transition: all 0.2s ease-in-out;
    -webkit-transition: all 0.2s ease-in-out;
    transition: all 0.2s ease-in-out;
}

.input-checkbox-without-lab-3-bty input[type="checkbox"]:after {
    content: "\f05e";
    font-family: FontAwesome;
    position: absolute;
    color: red;
    font-size: 25px;
    -moz-transition: all 0.2s ease-in-out;
    -o-transition: all 0.2s ease-in-out;
    -webkit-transition: all 0.2s ease-in-out;
    transition: all 0.2s ease-in-out;
}

.input-checkbox-without-lab-3-bty input[type="checkbox"]:checked:after {
    color: black;
    content: "\f05d";
}

.input-checkbox-without-lab-3-bty input[type="checkbox"]:focus, .input-checkbox-without-lab-3-bty input[type="checkbox"]:active {
    outline: none !important;
}
            </textarea>
        </div>
    </div>
    <div class="col-md-12">
        <div class="col-md-6 p-t-34">
            <div class="input-checkbox-without-lab-4-bty">
                <input type="checkbox">
            </div>
        </div>
        <div class="col-md-6">
            <h5>input-checkbox-without-lab-4-bty</h5>
            <textarea class="form-control" name="" id="" cols="30" rows="5" readonly>
.input-checkbox-without-lab-4-bty input[type="checkbox"] {
    display: inline-block;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    width: 20px;
    height: 20px;
    background-color: #fafafa;
    position: relative;
    -moz-transition: all 0.2s ease-in-out;
    -o-transition: all 0.2s ease-in-out;
    -webkit-transition: all 0.2s ease-in-out;
    transition: all 0.2s ease-in-out;
}

.input-checkbox-without-lab-4-bty input[type="checkbox"]:after {
    content: "";
    display: flex;
    font-size: 16px;
    -moz-transition: all 0.2s ease-in-out;
    -o-transition: all 0.2s ease-in-out;
    -webkit-transition: all 0.2s ease-in-out;
    transition: all 0.2s ease-in-out;
    align-items: center;
    justify-content: center;
    height: inherit;
}

.input-checkbox-without-lab-4-bty input[type="checkbox"]:checked {
    -moz-box-shadow: inset 0 0 0 15px #158EC6;
    -webkit-box-shadow: inset 0 0 0 15px #158EC6;
    box-shadow: inset 0 0 0 15px #158EC6;
}

.input-checkbox-without-lab-4-bty input[type="checkbox"]:checked:after {
    color: white;
    content: "\f00c";
    font-family: FontAwesome;
}

.input-checkbox-without-lab-4-bty input[type="checkbox"]:focus, .input-checkbox-without-lab-4-bty input[type="checkbox"]:active {
    outline: none !important;
}
            </textarea>
        </div>
    </div>


    {{--<div class="col-md-12">--}}
        {{--<div class="col-md-3">--}}
            {{--<h4>Input checkbox 1</h4>--}}
            {{--<h5>bty-input-checkbox-1</h5>--}}
            {{--<input type="checkbox" class="bty-input-checkbox-1" id="bty-checkbox-1">--}}
            {{--<label for="bty-checkbox-1">checkbox</label>--}}
        {{--</div>--}}
        {{--<div class="col-md-3">--}}
            {{--<h4>Input checkbox 2</h4>--}}
            {{--<h5>bty-input-checkbox-2</h5>--}}
            {{--<input type="checkbox" class="bty-input-checkbox-2" id="bty-checkbox-2">--}}
            {{--<label for="bty-checkbox-2">checkbox</label>--}}
        {{--</div>--}}
        {{--<div class="col-md-3">--}}
            {{--<h4>Input checkbox 3</h4>--}}
            {{--<h5>bty-input-checkbox-3</h5>--}}
            {{--<input type="checkbox" class="bty-input-checkbox-3" id="bty-checkbox-3">--}}
        {{--</div>--}}
        {{--<div class="col-md-3">--}}
            {{--<h4>Input checkbox 4</h4>--}}
            {{--<h5>bty-input-checkbox-4</h5>--}}
            {{--<input type="checkbox" class="bty-input-checkbox-4" id="bty-checkbox-4">--}}
            {{--<label for="bty-checkbox-4">checkbox</label>--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--<div class="col-md-12">--}}
        {{--<div class="col-md-3">--}}
            {{--<h4>Input checkbox 5</h4>--}}
            {{--<h5>bty-input-checkbox-5</h5>--}}
            {{--<input type="checkbox" class="bty-input-checkbox-5" id="bty-checkbox-5">--}}
            {{--<label for="bty-checkbox-5"></label>--}}
        {{--</div>--}}
        {{--<div class="col-md-3">--}}
            {{--<h4>Input checkbox 6</h4>--}}
            {{--<h5>bty-input-checkbox-6</h5>--}}
            {{--<input type="checkbox" class="bty-input-checkbox-6" id="bty-checkbox-6">--}}
            {{--<label for="bty-checkbox-6"><span>checkbox</span></label>--}}
        {{--</div>--}}
        {{--<div class="col-md-3">--}}
            {{--<h4>Input checkbox 7</h4>--}}
            {{--<h5>bty-input-checkbox-7</h5>--}}
            {{--<input type="checkbox" class="bty-input-checkbox-7" id="bty-checkbox-7">--}}
            {{--<label for="bty-checkbox-7">checkbox</label>--}}
        {{--</div>--}}
        {{--<div class="col-md-3">--}}
            {{--<h4>Input checkbox 8</h4>--}}
            {{--<h5>bty-input-checkbox-8</h5>--}}
            {{--<input type="checkbox" class="bty-input-checkbox-8" id="bty-checkbox-8" >--}}
            {{--<label for="bty-checkbox-8">checkbox</label>--}}
        {{--</div>--}}
    {{--</div>--}}
</div>