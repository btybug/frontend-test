<div class="container classify">
    <div class="row">
        @if(isset($settings['classify']) && count(get_classifier_items($settings['classify'])))
            @foreach(get_classifier_items($settings['classify']) as $item)
                <div class="col-md-4">
                    <div class="product-item">
                        <div class="pi-img-wrapper">
                            @if($item->image)
                                <img src="{{ $item->image }}" class="img-responsive" alt="{!! $item->title !!}">
                            @else
                                <img src="http://keenthemes.com/assets/bootsnipp/k1.jpg" class="img-responsive" alt="{!! $item->title !!}">
                            @endif
                            <div>
                                <a href="#" class="btn">Zoom</a>
                                <a href="#" class="btn">View</a>
                            </div>
                        </div>
                        <h3><a href="#">{!! $item->title !!}</a></h3>
                        <div class="description">
                            {!! str_limit($item->description )!!}
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            No Items
        @endif
    </div>
</div>

<style>
    /***
User Profile Sidebar by @keenthemes
A component of Metronic Theme - #1 Selling Bootstrap 3 Admin Theme in Themeforest: http://j.mp/metronictheme
Licensed under MIT
***/

    body .classify {
        background: #f1f1f1;
    }

    .classify .product-item {
        padding: 15px;
        background: #fff;
        margin-top: 20px;
        position: relative;
    }
    .classify .product-item:hover {
        box-shadow: 5px 5px rgba(234, 234, 234, 0.9);
    }

    .classify .description {
        height: 60px;
        max-height: 60px;
    }
    .classify .product-item:after {
        content: ".";
        display: block;
        height: 0;
        clear: both;
        visibility: hidden;
        font-size: 0;
        line-height:0;
    }
    .classify .sticker {
        position: absolute;
        top: 0;
        left: 0;
        width: 63px;
        height: 63px;
    }
    .classify .sticker-new {
        background: url(http://keenthemes.com/assets/bootsnipp/new.png) no-repeat;
        left: auto;
        right: 0;
    }
    .classify .pi-img-wrapper {
        position: relative;
    }
    .classify .pi-img-wrapper div {
        background: rgba(0,0,0,0.3);
        position: absolute;
        left: 0;
        top: 0;
        display: none;
        width: 100%;
        height: 100%;
        text-align: center;
    }
    .classify .product-item:hover>.pi-img-wrapper>div {
        display: block;
    }
    .classify .pi-img-wrapper div .btn {
        padding: 3px 10px;
        color: #fff;
        border: 1px #fff solid;
        margin: -13px 5px 0;
        background: transparent;
        text-transform: uppercase;
        position: relative;
        top: 50%;
        line-height: 1.4;
        font-size: 12px;
    }
    .classify .product-item .btn:hover {
        background: #e84d1c;
        border-color: #c8c8c8;
    }

    .classify .product-item h3 {
        font-size: 14px;
        font-weight: 300;
        padding-bottom: 4px;
        text-transform: uppercase;
    }
    .classify .product-item h3 a {
        color: #3e4d5c;
    }
    .classify .product-item h3 a:hover {
        color: #E02222;
    }
    .classify .pi-price {
        color: #e84d1c;
        font-size: 18px;
        float: left;
        padding-top: 1px;
    }
    .classify .product-item .add2cart {
        float: right;
        color: #a8aeb3;
        border: 1px #ededed solid;
        padding: 3px 6px;
        text-transform: uppercase;
    }
    .classify .product-item .add2cart:hover {
        color: #fff;
        background: #e84d1c;
        border-color: #e84d1c;
    }
</style>