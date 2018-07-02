<ul class="header-btns">
    <!-- Cart -->
    <li class="header-cart dropdown default-dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
            <div class="header-btns-icon">
                <i class="fa fa-shopping-cart"></i>
                <span class="qty">3</span>
            </div>
            <strong class="text-uppercase">My Cart:</strong>
            <br>
            <span>35.20$</span>
        </a>
        <div class="custom-menu">
            <div id="shopping-cart">
                <div class="shopping-cart-list">
                    <div class="product product-widget">
                        <div class="product-thumb">
                            <img src="https://lh3.googleusercontent.com/k7mGaSl6hfNSWuJAtWzEQrOLQ0fwwga2FC7zK-hsDkDyWu9dTJfOkhMzuvQ4m4vuMA" alt="">
                        </div>
                        <div class="product-body">
                            <h3 class="product-price">$32.50 <span class="qty">x3</span></h3>
                            <h2 class="product-name"><a href="#">Product Name Goes Here</a></h2>
                        </div>
                        <button class="cancel-btn"><i class="fa fa-trash"></i></button>
                    </div>
                    <div class="product product-widget">
                        <div class="product-thumb">
                            <img src="https://lh3.googleusercontent.com/k7mGaSl6hfNSWuJAtWzEQrOLQ0fwwga2FC7zK-hsDkDyWu9dTJfOkhMzuvQ4m4vuMA" alt="">
                        </div>
                        <div class="product-body">
                            <h3 class="product-price">$32.50 <span class="qty">x3</span></h3>
                            <h2 class="product-name"><a href="#">Product Name Goes Here</a></h2>
                        </div>
                        <button class="cancel-btn"><i class="fa fa-trash"></i></button>
                    </div>
                </div>
                <div class="shopping-cart-btns">
                    <button class="main-btn">View Cart</button>
                    <button class="primary-btn">Checkout <i class="fa fa-arrow-circle-right"></i></button>
                </div>
            </div>
        </div>
    </li>
    <!-- /Cart -->

    <!-- Mobile nav toggle-->
    <li class="nav-toggle">
        <button class="nav-toggle-btn main-btn icon-btn"><i class="fa fa-bars"></i></button>
    </li>
    <!-- / Mobile nav toggle -->
</ul>
{!! BBstyle($_this->path.DS.'css'.DS.'style.css') !!}