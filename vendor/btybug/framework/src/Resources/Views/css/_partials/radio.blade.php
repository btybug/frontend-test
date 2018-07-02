<div class="d1">
    <h2>Input Radio</h2>
    <div class="col-md-12">
        <div class="col-md-6 p-t-34">
            <div class="input-radio-1-bty">
                <input type="radio" id="bty-radio1">
                <label for="bty-radio1">radio</label>
            </div>
        </div>
        <div class="col-md-6">
            <h5>input-radio-1-bty</h5>
            <textarea class="form-control" name="" id="" cols="30" rows="5" readonly>
             .input-radio-1-bty input[type="radio"] {
    display: none;
    cursor: pointer;
}

.input-radio-1-bty input[type="radio"]:focus, .input-radio-1-bty input[type="radio"]:active {
    outline: none;
}

.input-radio-1-bty label {
    cursor: pointer;
    display: inline-block;
    position: relative;
    padding-left: 25px;
    margin-right: 10px;
    color: #0b4c6a;
}

.input-radio-1-bty label:before, .input-radio-1-bty label:after {
    content: '';
    display: inline-block;
    width: 18px;
    height: 18px;
    left: 0;
    bottom: 0;
    text-align: center;
    position: absolute;
}

.input-radio-1-bty label:before {
    background-color: #fafafa;
    -moz-transition: all 0.3s ease-in-out;
    -o-transition: all 0.3s ease-in-out;
    -webkit-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out;
}

.input-radio-1-bty label:after {
    color: #fff;
}

.input-radio-1-bty input[type="radio"]:checked + label:before {
    -moz-box-shadow: inset 0 0 0 10px #158EC6;
    -webkit-box-shadow: inset 0 0 0 10px #158EC6;
    box-shadow: inset 0 0 0 10px #158EC6;
}

.input-radio-1-bty label:before {
    -moz-border-radius: 50%;
    -webkit-border-radius: 50%;
    border-radius: 50%;
}

.input-radio-1-bty label:hover:after, .input-radio-1-bty input[type="radio"]:checked + label:after {
    content: "\2022";
    position: absolute;
    top: 0;
    font-size: 19px;
    line-height: 15px;
}

.input-radio-1-bty label:hover:after {
    color: #c7c7c7;
}

.input-radio-1-bty input[type="radio"]:checked + label:after, .input-radio-1-bty input[type="radio"]:checked + label:hover:after {
    color: #fff;
}
            </textarea>
        </div>
    </div>
    <div class="col-md-12">
        <div class="col-md-6 p-t-34">
            <div class="input-radio-2-bty">
                <input type="radio" id="bty-radio2">
                <label for="bty-radio2">radio</label>
            </div>
        </div>
        <div class="col-md-6">
            <h5>input-radio-2-bty</h5>
            <textarea class="form-control" name="" id="" cols="30" rows="5" readonly>
                .input-radio-2-bty input[type="radio"] {
    display: none;
}

.input-radio-2-bty label:before {
    content: "";
    display: inline-block;
    width: 15px;
    height: 15px;
    margin: -2px 10px 0 0;
    vertical-align: middle;
    cursor: pointer;
    -moz-border-radius: 50%;
    border-radius: 50%;
    border: 1px solid #c9c9c9;
}

.input-radio-2-bty label:hover {
    cursor: pointer;
}

.input-radio-2-bty label {
    color: #999;
    text-shadow: 1px 1px 0 #fff;
    font: 16px Wellfleet, sans-serif;
}

.input-radio-2-bty label:before {
    content: "";
    background-color: #fff;
    background-repeat: no-repeat;
    background-position: 2px 3px;
    background-size: 10px 10px;
}

.input-radio-2-bty input[type="radio"]:checked + label {
    color: #555;
}

.input-radio-2-bty label:before,
.input-radio-2-bty input[type="radio"]:checked + label:before {
    -webkit-transition: all 0.4s linear;
    -o-transition: all 0.4s linear;
    -moz-transition: all 0.4s linear;
    transition: all 0.2s linear;
    content: "";
}

.input-radio-2-bty input[type="radio"]:checked + label:before {
    box-shadow: 0 0 2px rgba(0, 0, 0, 0.5);
    -webkit-animation: input-radio-2-bty-pop 0.2s linear 1 forwards;
}

@-webkit-keyframes input-radio-2-bty-pop
{
    0% {
        background-color: #0c6497;
    }
    100% {
        background-color: #8fd0f6;
    }
}
            </textarea>
        </div>
    </div>
    <div class="col-md-12">
        <div class="col-md-6 p-t-34">
            <div class="input-radio-3-bty">
                <input type="radio" id="bty-radio3">
                <label for="bty-radio3"></label>
            </div>
        </div>
        <div class="col-md-6">
            <h5>input-radio-3-bty</h5>
            <textarea class="form-control" name="" id="" cols="30" rows="5" readonly>
                .input-radio-3-bty input[type="radio"] {
    display: none;
}

.input-radio-3-bty input[type="radio"]:checked + label:before {
    content: '\f00c';
    display: block;
    position: absolute;
    font-family: 'fontawesome';
    top: 0;
    left: 1px;
    font-size: 12px;
    color: #000;
}

.input-radio-3-bty label {
    display: inline-block;
    height: 16px;
    width: 16px;
    cursor: pointer;
    border: 1px solid transparent;
    position: relative;
    margin-right: 5px;
    background-color: #46D6DB;
    border-color: #46D6DB;
}

.input-radio-3-bty label:hover {
    border-color: #000;
}
            </textarea>
        </div>
    </div>
    <div class="col-md-12">
        <div class="col-md-6 p-t-34">
            <div class="input-radio-4-bty">
                <input type="radio" id="bty-radio4">
                <label for="bty-radio4">radio</label>
            </div>
        </div>
        <div class="col-md-6">
            <h5>input-radio-4-bty</h5>
            <textarea class="form-control" name="" id="" cols="30" rows="5" readonly>
     .input-radio-4-bty input[type="radio"] {
    display: none;
}

.input-radio-4-bty label {
    position: relative;
    display: inline-block;
    padding-left: 1.5em;
    margin-right: 2em;
    cursor: pointer;
    line-height: 1em;
    -webkit-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out;
}

.input-radio-4-bty label:before,
.input-radio-4-bty label:after {
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

.input-radio-4-bty label:before {
    -webkit-transition: all .3s ease;
    transition: all .3s ease;
    box-shadow: inset 0 0 0 0.2em white, inset 0 0 0 1em white;
}

.input-radio-4-bty label:hover:before {
    -webkit-transition: all .3s ease;
    transition: all .3s ease;
    box-shadow: inset 0 0 0 0.3em white, inset 0 0 0 1em #c6c6c6;
}

.input-radio-4-bty input[type="radio"]:checked + label:before {
    -webkit-transition: all .3s ease;
    transition: all .3s ease;
    box-shadow: inset 0 0 0 0.2em white, inset 0 0 0 1em #f79420;
}
            </textarea>
        </div>
    </div>
    <div class="col-md-12">
        <div class="col-md-6 p-t-34">
            <div class="input-radio-5-bty">
                <input type="radio" id="bty-radio5">
                <label for="bty-radio5"><i class="fa fa-check" aria-hidden="true"></i></label>
            </div>
        </div>
        <div class="col-md-6">
            <h5>input-radio-5-bty</h5>
            <textarea class="form-control" name="" id="" cols="30" rows="5" readonly>
         .input-radio-5-bty label {
    width: 20px;
    height: 20px;
    border-radius: 50%;
    box-shadow: 0 2px 0 rgba(51, 51, 51, 0.2);
    transition: transform .2s ease;
    cursor: pointer;
    background-color: #709DD3
}

.input-radio-5-bty label i {
    padding: 3px 3px;
    display: none;
    color: white;
}

.input-radio-5-bty input[type="radio"] {
    display: none;
}

.input-radio-5-bty input[type="radio"]:checked + label {
    transform: scale(1.52);
    box-shadow: 0 3px 5px rgba(51, 51, 51, 0.3);
    transition: transform 0.2s cubic-bezier(0.05, 0.59, 0.64, 1.46), box-shadow 0.2s ease-in-out;
}

.input-radio-5-bty input[type="radio"]:checked + label i {
    display: block;
}
            </textarea>
        </div>
    </div>
    <div class="col-md-12">
        <div class="col-md-6 p-t-34">
            <div class="input-radio-6-bty">
                <input type="radio" id="bty-radio6">
            </div>
        </div>
        <div class="col-md-6">
            <h5>input-radio-6-bty</h5>
            <textarea class="form-control" name="" id="" cols="30" rows="5" readonly>
          .input-radio-6-bty input[type="radio"] {
    display: block;
    width: 24px;
    height: 24px;
    border-radius: 12px;
    cursor: pointer;
    vertical-align: middle;
    -webkit-transition: background-position .15s cubic-bezier(.8, 0, 1, 1),
    -webkit-transform .25s cubic-bezier(.8, 0, 1, 1);
    outline: none;
}

.input-radio-6-bty input[type="radio"]:checked {
    -webkit-transition: background-position .2s .15s cubic-bezier(0, 0, .2, 1),
    -webkit-transform .25s cubic-bezier(0, 0, .2, 1);
}

.input-radio-6-bty input[type="radio"]:active {
    -webkit-transform: scale(1.5);
    -webkit-transition: -webkit-transform .1s cubic-bezier(0, 0, .2, 1);
}

.input-radio-6-bty input[type="radio"]:active {
    background-position: 0 24px;
}

.input-radio-6-bty input[type="radio"]:checked {
    background-position: 0 0;
}

.input-radio-6-bty input[type="radio"]:checked ~ .input-radio-6-bty input[type="radio"],
.input-radio-6-bty input[type="radio"]:checked ~ .input-radio-6-bty input[type="radio"]:active {
    background-position: 0 -24px;
}
            </textarea>
        </div>
    </div>
    <div class="col-md-12">
        <div class="col-md-6 p-t-34">
            <div class="input-radio-7-bty">
                <input type="radio" id="bty-radio7">
                <label for="bty-radio7">radio</label>
            </div>
        </div>
        <div class="col-md-6">
            <h5>input-radio-7-bty</h5>
            <textarea class="form-control" name="" id="" cols="30" rows="5" readonly>
                .input-radio-7-bty input[type="radio"] {
    display: none;
}

.input-radio-7-bty label {
    position: relative;
    cursor: pointer;
    padding-left: 28px;
}

.input-radio-7-bty label:before, .input-radio-7-bty label:after {
    content: "";
    position: absolute;
    border-radius: 50%;
    -moz-transition: all 0.3s ease;
    -o-transition: all 0.3s ease;
    -webkit-transition: all 0.3s ease;
    transition: all 0.3s ease;
}

.input-radio-7-bty label:before {
    top: 0;
    left: 0;
    width: 18px;
    height: 18px;
    background: #1565C0;
    -moz-box-shadow: inset 0 0 0 18px #E0E0E0;
    -webkit-box-shadow: inset 0 0 0 18px #E0E0E0;
    box-shadow: inset 0 0 0 18px #E0E0E0;
}

.input-radio-7-bty label:after {
    top: 49%;
    left: 9px;
    width: 54px;
    height: 54px;
    opacity: 0;
    background: rgba(255, 255, 255, 0.3);
    -moz-transform: translate(-50%, -50%) scale(0);
    -ms-transform: translate(-50%, -50%) scale(0);
    -webkit-transform: translate(-50%, -50%) scale(0);
    transform: translate(-50%, -50%) scale(0);
}

.input-radio-7-bty input[type="radio"]:checked + label:before {
    -moz-box-shadow: inset 0 0 0 4px #E0E0E0;
    -webkit-box-shadow: inset 0 0 0 4px #E0E0E0;
    box-shadow: inset 0 0 0 4px #E0E0E0;
}

.input-radio-7-bty input[type="radio"]:checked + label:after {
    -moz-transform: translate(-50%, -50%) scale(1);
    -ms-transform: translate(-50%, -50%) scale(1);
    -webkit-transform: translate(-50%, -50%) scale(1);
    transform: translate(-50%, -50%) scale(1);
    -moz-animation: ripple 1s none;
    -webkit-animation: ripple 1s none;
    animation: input-radio-7-bty-ripple 1s none;
}

@-moz-keyframes input-radio-7-bty-ripple {
    5%, 100% {
        opacity: 0;
    }
    5% {
        opacity: 1;
    }
}

@-webkit-keyframes input-radio-7-bty-ripple {
    5%, 100% {
        opacity: 0;
    }
    5% {
        opacity: 1;
    }
}

@keyframes input-radio-7-bty-ripple {
    5%, 100% {
        opacity: 0;
    }
    5% {
        opacity: 1;
    }
}
            </textarea>
        </div>
    </div>
    <div class="col-md-12">
        <div class="col-md-6 p-t-34">
            <div class="input-radio-8-bty">
                <input type="radio" id="bty-radio8">
                <label for="bty-radio8">radio<span></span></label>
            </div>
        </div>
        <div class="col-md-6">
            <h5>input-radio-8-bty</h5>
            <textarea class="form-control" name="" id="" cols="30" rows="5" readonly>
               .input-radio-8-bty input[type="radio"] {
    position: absolute;
    left: 0;
    opacity: 0;
}

.input-radio-8-bty label {
    /*clear: none;*/
    cursor: pointer;
    /*display: block;*/
    /*margin: 0 0 1em 0;*/
    padding: 0 0 0 1.5em;
    position: relative;
    left: 0;
}

.input-radio-8-bty label > span::before {
    position: absolute;
    content: "";
    top: 2px;
    left: 0;
    border-radius: 50%;
    border: solid 2px #bbb;
    height: 1em;
    width: 1em;
}

.input-radio-8-bty input[type="radio"]:checked + label > span::after {
    position: absolute;
    content: "";
    top: 0.3065em;
    left: 0.3065em;
    height: .6em;
    width: .6em;
    border-radius: 50%;
    background: #004665;
}

.input-radio-8-bty input[type="radio"]:checked + label {
    position: relative;
    left: -1.5em;
    /*font-size: 1.5em;*/
    transition: font-size .333s ease .2s, left .333s ease .6s;
}

.input-radio-8-bty input[type="radio"]:checked + label span {
    opacity: 0;
    left: -1.5em;
    transition: opacity .333s ease .1s;
}
            </textarea>
        </div>
    </div>
    <div class="col-md-12">
        <div class="col-md-6 p-t-34">
            <div class="input-radio-without-lab-1-bty">
                <input type="radio">
            </div>
        </div>
        <div class="col-md-6">
            <h5>input-radio-without-lab-1-bty</h5>
            <textarea class="form-control" name="" id="" cols="30" rows="5" readonly>
.input-radio-without-lab-1-bty input[type="radio"] {
    display: inline-block;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    width: 20px;
    height: 20px;
    border-radius: 50%;
    background-color: #fafafa;
    position: relative;
    -moz-transition: all 0.2s ease-in-out;
    -o-transition: all 0.2s ease-in-out;
    -webkit-transition: all 0.2s ease-in-out;
    transition: all 0.2s ease-in-out;
}

.input-radio-without-lab-1-bty input[type="radio"]:after {
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

.input-radio-without-lab-1-bty input[type="radio"]:checked {
    -moz-box-shadow: inset 0 0 0 15px #158EC6;
    -webkit-box-shadow: inset 0 0 0 15px #158EC6;
    box-shadow: inset 0 0 0 15px #158EC6;
}

.input-radio-without-lab-1-bty input[type="radio"]:checked:after {
    color: white;
    content: "\f00c";
    font-family: FontAwesome;
}

.input-radio-without-lab-1-bty input[type="radio"]:focus, .input-radio-without-lab-1-bty input[type="radio"]:active {
    outline: none !important;
}
            </textarea>
        </div>
    </div>
    <div class="col-md-12">
        <div class="col-md-6 p-t-34">
            <div class="input-radio-without-lab-2-bty">
                <input type="radio">
            </div>
        </div>
        <div class="col-md-6">
            <h5>input-radio-without-lab-2-bty</h5>
            <textarea class="form-control" name="" id="" cols="30" rows="5" readonly>
.input-radio-without-lab-2-bty input[type="radio"] {
    display: inline-block;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    width: 20px;
    height: 20px;
    border-radius: 50%;
    background-color: #158EC6;
    position: relative;
    -moz-transition: all 0.2s ease-in-out;
    -o-transition: all 0.2s ease-in-out;
    -webkit-transition: all 0.2s ease-in-out;
    transition: all 0.2s ease-in-out;
}

.input-radio-without-lab-2-bty input[type="radio"]:after {
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

.input-radio-without-lab-2-bty input[type="radio"]:checked {
    -moz-box-shadow: inset 0 0 0 15px #ffffff;
    -webkit-box-shadow: inset 0 0 0 15px #ffffff;
    box-shadow: inset 0 0 0 15px #ffffff;
}

.input-radio-without-lab-2-bty input[type="radio"]:checked:after {
    color: #158EC6;
    content: "\f00c";
    font-family: FontAwesome;
}

.input-radio-without-lab-2-bty input[type="radio"]:focus, .input-radio-without-lab-2-bty input[type="radio"]:active {
    outline: none !important;
}
            </textarea>
        </div>
    </div>

    {{--<div class="col-md-12">--}}
        {{--<div class="col-md-3">--}}
            {{--<h4>Input radio 1</h4>--}}
            {{--<h5>bty-input-radio-1</h5>--}}
            {{--<input type="radio" class="bty-input-radio-1" id="bty-radio-1">--}}
            {{--<label for="bty-radio-1">radio</label>--}}
        {{--</div>--}}
        {{--<div class="col-md-3">--}}
            {{--<h4>Input radio 2</h4>--}}
            {{--<h5>bty-input-radio-2</h5>--}}
            {{--<input type="radio" class="bty-input-radio-2" id="bty-radio-2">--}}
            {{--<label for="bty-radio-2">radio</label>--}}
        {{--</div>--}}
        {{--<div class="col-md-3">--}}
            {{--<h4>Input radio 3</h4>--}}
            {{--<h5>bty-input-radio-3</h5>--}}
            {{--<input type="radio" class="bty-input-radio-3" id="bty-radio-3">--}}
            {{--<label for="bty-radio-3"></label>--}}
        {{--</div>--}}
        {{--<div class="col-md-3">--}}
            {{--<h4>Input radio 4</h4>--}}
            {{--<h5>bty-input-radio-4</h5>--}}
            {{--<input type="radio" class="bty-input-radio-4" id="bty-radio-4">--}}
            {{--<label for="bty-radio-4">radio</label>--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--<div class="col-md-12">--}}
        {{--<div class="col-md-3">--}}
            {{--<h4>Input radio 5</h4>--}}
            {{--<h5>bty-input-radio-5</h5>--}}
            {{--<input type="radio" class="bty-input-radio-5" id="bty-radio-5">--}}
            {{--<label for="bty-radio-5"><i class="fa fa-check" aria-hidden="true"></i></label>--}}
        {{--</div>--}}
        {{--<div class="col-md-3">--}}
            {{--<h4>Input radio 6</h4>--}}
            {{--<h5>bty-input-radio-6</h5>--}}
            {{--<input type="radio" class="bty-input-radio-6" id="bty-radio-6">--}}

        {{--</div>--}}
        {{--<div class="col-md-3">--}}
            {{--<h4>Input radio 7</h4>--}}
            {{--<h5>bty-input-radio-7</h5>--}}
            {{--<input type="radio" class="bty-input-radio-7" id="bty-radio-7">--}}
            {{--<label for="bty-radio-7">radio</label>--}}
        {{--</div>--}}
        {{--<div class="col-md-3">--}}
            {{--<h4>Input radio 8</h4>--}}
            {{--<h5>bty-input-radio-8</h5>--}}
            {{--<input type="radio" class="bty-input-radio-8" id="bty-radio-8">--}}
            {{--<label for="bty-radio-8">radio<span></span></label>--}}
        {{--</div>--}}
    {{--</div>--}}
</div>