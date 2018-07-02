<div class="d1">
    <h2>Breadcrumb</h2>
    <div class="col-md-12">
        <div class="col-md-7 p-t-34">
            <div class="bty-breadcrumb-1">
                <a href="#" class="active">Browse</a>
                <a href="#">Compare</a>
                <a href="#">Order Confirmation</a>
                <a href="#">Checkout</a>
            </div>
        </div>
        <div class="col-md-5">
            <h5>bty-breadcrumb-1</h5>
            <textarea class="form-control" name="" id="" cols="30" rows="5" readonly>
                .bty-breadcrumb-1 {
    display: inline-block;
    box-shadow: 0 0 15px 1px rgba(0, 0, 0, 0.35);
    overflow: hidden;
    border-radius: 5px;
    counter-reset: flag;
}

.bty-breadcrumb-1 a {
    text-decoration: none;
    outline: none;
    display: block;
    float: left;
    font-size: 12px;
    line-height: 36px;
    padding: 0 10px 0 60px;
    position: relative;
    text-align: center;
    background: white;
    color: black;
    transition: all 0.5s;
}

.bty-breadcrumb-1 a:first-child {
    padding-left: 46px;
    border-radius: 5px 0 0 5px;
}

.bty-breadcrumb-1 a:first-child:before {
    left: 14px;
}

.bty-breadcrumb-1 a:last-child {
    border-radius: 0 5px 5px 0;
    padding-right: 20px;
}

.bty-breadcrumb-1 a.active, .bty-breadcrumb-1 a:hover {
    background: #499bc7;
}

.bty-breadcrumb-1 a.active:after, .bty-breadcrumb-1 a:hover:after {
    background: #499bc7;
}

.bty-breadcrumb-1 a:after {
    content: '';
    position: absolute;
    top: 0;
    right: -18px;
    width: 36px;
    height: 36px;
    transform: scale(0.707) rotate(45deg);
    z-index: 1;
    box-shadow: 2px -2px 0 2px rgba(0, 0, 0, 0.4),
    3px -3px 0 2px rgba(255, 255, 255, 0.1);
    border-radius: 0 5px 0 50px;
    background: white;
    color: black;
    transition: all 0.5s;
}

.bty-breadcrumb-1 a:last-child:after {
    content: none;
}

.bty-breadcrumb-1 a:before {
    content: counter(flag);
    counter-increment: flag;
    border-radius: 100%;
    width: 20px;
    height: 20px;
    line-height: 20px;
    margin: 8px 0;
    position: absolute;
    top: 0;
    left: 30px;
    background: white;
    font-weight: bold;
    box-shadow: 0 0 0 1px #ccc;
}

            </textarea>
        </div>
    </div>
    <div class="col-md-12">
        <h4>Breadcrumb 2</h4>
        <h5>bty-breadcrumb-2</h5>
        <div class="bty-breadcrumb-2">
            <ol>
                <li><a href="#">Browse</a></li>
                <li><a href="#">Compare</a></li>
                <li><a href="#">Order</a></li>
                <li><a href="#">Checkout</a></li>
            </ol>
        </div>
    </div>
    <div class="col-md-12">
        <h4>Breadcrumb 3</h4>
        <h5>bty-breadcrumb-3</h5>
        <div class="bty-breadcrumb-3">
            <ul>
                <li><a href="#">Browse</a></li>
                <li><a href="#">Compare</a></li>
                <li><a href="#">Order</a></li>
                <li><a href="#">Checkout</a></li>
                <li><a href="#">Checkout</a></li>
            </ul>
        </div>
    </div>
</div>