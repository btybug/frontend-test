<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div class="col-md-12">
    <div class="col-md-9">
        <div class="content_attr">
            <h2>Attribute name here</h2>
            <div class="form-group">
                <label class="control-label">Display result as</label>
                <div class="">
                    <div class="input-group">
                                    <span class="input-group-addon">
                    <i class="fa fa-address-book"></i>
                </span>
                        <select class="form-controll">
                            <option selected="selected" value="">Select</option>
                            <option>radio1</option>
                            <option>radio1</option>
                        </select>
                    </div>
                    <div class="section">
                        <div>
                            <input name="attrradio" type="radio" class="bty-input-radio-7" id="attrradio1">
                            <label for="attrradio1">radio</label>
                        </div>
                        <div>
                            <input name="attrradio" type="radio" class="bty-input-radio-7" id="attrradio2">
                            <label for="attrradio2">radio</label>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            {{--<div class="form-group">--}}
                {{--<label class="col-sm-12 control-label">Quantity :</label>--}}
                {{--<div class="col-sm-12">--}}
                    {{--<div class="input-group">--}}
                                    {{--<span class="input-group-addon">--}}
                    {{--<i class="fa fa-square"></i>--}}
                {{--</span>--}}
                        {{--<input type="text" class="form-controll">--}}
                        {{--<span class="input-group-addon quant_add_span">--}}
                    {{--<a href="javascript:void(0)" class="add-new-qty"--}}
                       {{--data-parent="qty-parent"><i class="fa fa-plus"></i></a>--}}
                {{--</span>--}}
                    {{--</div>--}}

                {{--</div>--}}
                {{--<div class="clearfix"></div>--}}
            {{--</div>--}}
            {{--<div class="form-group">--}}
                {{--<label class="col-sm-12 control-label">Price :</label>--}}
                {{--<div class="col-sm-12">--}}
                    {{--<div class="input-group">--}}
                                    {{--<span class="input-group-addon">--}}
                    {{--<i class="fa fa-credit-card"></i>--}}
                {{--</span>--}}
                        {{--<input type="text" class="form-controll">--}}
                    {{--</div>--}}

                {{--</div>--}}
                {{--<div class="clearfix"></div>--}}
            {{--</div>--}}
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>
                        <input type="text" class="form-controll" placeholder="Quantity">
                    </td>

                    <td>
                        <input type="text" class="form-controll" placeholder="Price">
                    </td>
                    <td>
                        <button class="btn bnt-lg btn-primary render_tr"><i class="fa fa-plus-circle"></i></button>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-md-3">

    </div>
</div>
<style>
    .content_attr table tbody td:last-of-type{
        text-align: center;
        width: 65px;
    }
    .content_attr .form-group {
        margin: 20px 0;
    }

    .content_attr .form-controll {
        border: 1px solid #ddd;
        padding: 5px 8px;
        color: #777;
        background: #fff;
        box-shadow: none !important;
        width: 100%;
        font-weight: 300;
        height: 40px;
        border-radius: 0;
        outline: none;
    }

    .content_attr .input-group-addon {
        border-radius: 0;
    }

    .content_attr .quant_add_span {
        background-color: #337ab7;
    }

    .content_attr .quant_add_span a {
        color: white;
    }

    .content_attr h2 {
        border-bottom: 1px solid #ccc;
    }

    .content_attr .section {
        border: 1px solid #eee;
        padding: 20px;
    }

    .bty-input-radio-7 {
        display: none;
    }

    .bty-input-radio-7 + label {
        position: relative;
        cursor: pointer;
        padding-left: 28px;
    }

    .bty-input-radio-7 + label:before {
        top: 0;
        left: 0;
        width: 18px;
        height: 18px;
        background: #1565C0;
        -moz-box-shadow: inset 0 0 0 18px #E0E0E0;
        -webkit-box-shadow: inset 0 0 0 18px #E0E0E0;
        box-shadow: inset 0 0 0 18px #E0E0E0;
    }

    .bty-input-radio-7 + label:after {
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

    .bty-input-radio-7 + label:before, .bty-input-radio-7 + label:after {
        content: "";
        position: absolute;
        border-radius: 50%;
        -moz-transition: all 0.3s ease;
        -o-transition: all 0.3s ease;
        -webkit-transition: all 0.3s ease;
        transition: all 0.3s ease;
    }

    .bty-input-radio-7:checked + label:before {
        -moz-box-shadow: inset 0 0 0 4px #E0E0E0;
        -webkit-box-shadow: inset 0 0 0 4px #E0E0E0;
        box-shadow: inset 0 0 0 4px #E0E0E0;
    }

    .bty-input-radio-7:checked + label:after {
        -moz-transform: translate(-50%, -50%) scale(1);
        -ms-transform: translate(-50%, -50%) scale(1);
        -webkit-transform: translate(-50%, -50%) scale(1);
        transform: translate(-50%, -50%) scale(1);
        -moz-animation: ripple 1s none;
        -webkit-animation: ripple 1s none;
        animation: bty-input-radio-7-ripple 1s none;
    }
</style>
</body>
</html>
