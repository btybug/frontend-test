<div class="d1">
    <h2>Vertical Menu</h2>
    <div class="col-md-12">
        <div class="col-md-6 p-t-34">
            <div class="bty-vertical-menu-1">
                <nav>
                    <ul>
                        <li><a href="#"><i class="fa fa-bus" aria-hidden="true"></i><span>Menu 1</span></a></li>
                        <li><a href="#"><i class="fa fa-circle-o-notch" aria-hidden="true"></i><span>Menu 2</span></a></li>
                        <li class="dropdown" rel="1"><a href="#"><i class="fa fa-child"
                                                                    aria-hidden="true"></i><span>Menu 3</span>
                                <ul class="dropdown-1">
                                    <li><a href="#"><i class="fa fa-certificate"
                                                       aria-hidden="true"></i><span>Menu 3.1</span></a></li>
                                    <li><a href="#"><i class="fa fa-clock-o"
                                                       aria-hidden="true"></i><span>Menu 3.2</span></a></li>
                                    <li><a href="#"><i class="fa fa-diamond"
                                                       aria-hidden="true"></i><span>Menu 3.3</span></a></li>
                                </ul>
                            </a></li>
                        <li class="dropdown" rel="2"><a href="#"><i class="fa fa-circle-o-notch"
                                                                    aria-hidden="true"></i><span>Menu 4</span>
                                <ul class="dropdown-2">
                                    <li><a href="#"><i class="fa fa-certificate"
                                                       aria-hidden="true"></i><span>Menu 4.1</span></a></li>
                                    <li><a href="#"><i class="fa fa-diamond"
                                                       aria-hidden="true"></i><span>Menu 4.2</span></a></li>
                                </ul>
                            </a></li>
                        <li><a href="#"><i class="fa fa-clock-o" aria-hidden="true"></i><span>Menu 5</span></a></li>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="col-md-6">
            <h5>bty-vertical-menu-1</h5>
            <textarea class="form-control" name="" id="" cols="30" rows="5" readonly>
                .bty-vertical-menu-1 > nav {
    width: 225px;
    height: 100%;
    background: #262626;
    border-right: 1px solid #293649;
}

.bty-vertical-menu-1 > nav ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.bty-vertical-menu-1 > nav ul li {
    position: relative;
    display: block;
    width: 100%;
    height: 60px;
    border-bottom: 1px solid #293649;
}

.bty-vertical-menu-1 > nav ul li.active {
    background: #2e2e2e;
}

.bty-vertical-menu-1 > nav ul li.dropdown:before {
    font-family: FontAwesome;
    font-style: normal;
    font-weight: normal;
    text-decoration: inherit;
    content: "\f054";
    position: absolute;
    margin: 20px 0 0 0;
    left: 85%;
    color: #aaa;
}

.bty-vertical-menu-1 > nav ul li:hover:after {
    width: 225px;
}

.bty-vertical-menu-1 > nav ul li:after {
    content: " ";
    position: absolute;
    z-index: 1;
    width: 0px;
    height: 2px;
    margin: -2px 0 0 0;
    background: #126CA1;
    -webkit-transition: 150ms ease all;
    -moz-transition: 150ms ease all;
    -ms-transition: 150ms ease all;
    -o-transition: 150ms ease all;
    transition: 150ms ease all;
}

.bty-vertical-menu-1 > nav ul li a {
    display: block;
    width: 100%;
    line-height: 60px;
    padding: 0 15px;
    text-decoration: none;
    color: #aaa;
    -webkit-transition: 150ms ease all;
    -moz-transition: 150ms ease all;
    -ms-transition: 150ms ease all;
    -o-transition: 150ms ease all;
    transition: 150ms ease all;
}

.bty-vertical-menu-1 > nav ul li a:hover {
    background: #2e2e2e;
    color: #eee;
}

.bty-vertical-menu-1 > nav ul li a i,
.bty-vertical-menu-1 > nav ul li a span {
    display: inline-block;
}

.bty-vertical-menu-1 > nav ul li a i {
    position: absolute;
    margin: 22px 0 0 0;
    font-size: 1.3em;
}

.bty-vertical-menu-1 > nav ul li a span {
    margin: 0 0 0 35px;
    font-size: 0.85em;
}

.bty-vertical-menu-1 > nav ul li ul[class*="dropdown-"] {
    position: absolute;
    display: none;
    margin: -61px 0 0 225px;
}

.bty-vertical-menu-1 > nav ul li ul[class*="dropdown-"] li {
    width: 225px;
    background: #171717;
}

.bty-vertical-menu-1 > nav ul li ul[class*="dropdown-"] li a:hover {
    background: #1f1f1f;
}
            </textarea>
        </div>
    </div>
    <div class="col-md-12">
        <div class="col-md-6 p-t-34">
            <div class="bty-vertical-menu-dark-1">
                <nav>
                    <ul>
                        <li><a href="#"><i class="fa fa-bus" aria-hidden="true"></i><span>Menu 1</span></a></li>
                        <li><a href="#"><i class="fa fa-circle-o-notch" aria-hidden="true"></i><span>Menu 2</span></a></li>
                        <li><a href="#"><i class="fa fa-child" aria-hidden="true"></i><span>Menu 3</span><b><i class="fa fa-angle-right"></i></b></a>
                                <ul>
                                    <li><a href="#"><i class="fa fa-certificate" aria-hidden="true"></i><span>Menu 3.1</span></a></li>
                                    <li><a href="#"><i class="fa fa-clock-o" aria-hidden="true"></i><span>Menu 3.2</span></a></li>
                                    <li><a href="#"><i class="fa fa-diamond" aria-hidden="true"></i><span>Menu 3.3</span></a></li>
                                </ul>

                        </li>
                        <li>
                            <a href="#"><i class="fa fa-circle-o-notch" aria-hidden="true"></i><span>Menu 4</span><b><i class="fa fa-angle-right"></i></b></a>
                                <ul>
                                    <li><a href="#"><i class="fa fa-certificate" aria-hidden="true"></i><span>Menu 4.1</span></a></li>
                                    <li><a href="#"><i class="fa fa-diamond" aria-hidden="true"></i><span>Menu 4.2</span></a></li>
                                </ul>
                        </li>
                        <li><a href="#"><i class="fa fa-clock-o" aria-hidden="true"></i><span>Menu 5</span></a></li>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="col-md-6">
            <h5>bty-vertical-menu-dark-1</h5>
            <textarea class="form-control" name="" id="" cols="30" rows="5" readonly>

.bty-vertical-menu-dark-1 > nav {
    width: 100%;
    height: 100%;
    background: #262626;
    border-right: 1px solid #293649;
}

.bty-vertical-menu-dark-1 > nav ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.bty-vertical-menu-dark-1 > nav ul li {
    position: relative;
    display: block;
    width: 100%;
    height: 60px;
    border-bottom: 1px solid #293649;
}

.bty-vertical-menu-dark-1 > nav ul li {
    background: #2e2e2e;
}

.bty-vertical-menu-dark-1 > nav ul li:hover:after {
    width: 100%;
}

.bty-vertical-menu-dark-1 > nav ul li:after {
    content: " ";
    position: absolute;
    z-index: 1;
    width: 0px;
    height: 2px;
    margin: -2px 0 0 0;
    background: #126CA1;
    -webkit-transition: 150ms ease all;
    -moz-transition: 150ms ease all;
    -ms-transition: 150ms ease all;
    -o-transition: 150ms ease all;
    transition: 150ms ease all;
}

.bty-vertical-menu-dark-1 > nav ul li a {
    position: relative;
    display: block;
    width: 100%;
    line-height: 60px;
    padding: 0 15px;
    text-decoration: none;
    color: #aaa;
    -webkit-transition: 150ms ease all;
    -moz-transition: 150ms ease all;
    -ms-transition: 150ms ease all;
    -o-transition: 150ms ease all;
    transition: 150ms ease all;
}
.bty-vertical-menu-dark-1 > nav ul li a b{
    position: absolute;
    right: 37px;
    color: #abaaaa;
}
.bty-vertical-menu-dark-1 > nav ul li a:hover {
    background: #2e2e2e;
    color: #eee;
}

.bty-vertical-menu-dark-1 > nav ul li a i,
.bty-vertical-menu-dark-1 > nav ul li a span {
    display: inline-block;
}

.bty-vertical-menu-dark-1 > nav ul li a i {
    position: absolute;
    margin: 22px 0 0 0;
    font-size: 1.3em;
}

.bty-vertical-menu-dark-1 > nav ul li a span {
    margin: 0 0 0 35px;
    font-size: 0.85em;
}
.bty-vertical-menu-dark-1 > nav ul li:hover a+ul{
    display: block;
}
.bty-vertical-menu-dark-1 > nav ul li ul {
    position: absolute;
    display: none;
    top: 0;
    right: -226px;
}

.bty-vertical-menu-dark-1 > nav ul li ul> li {
    width: 225px;
    background: #171717;
}

.bty-vertical-menu-dark-1 > nav ul li ul> li a:hover {
    background: #1f1f1f;
}
            </textarea>
        </div>
    </div>
    <div class="col-md-12">
        <div class="col-md-6 p-t-34">
            <div class="bty-vertical-menu-light-1">
                <nav>
                    <ul>
                        <li><a href="#"><i class="fa fa-bus" aria-hidden="true"></i><span>Menu 1</span></a></li>
                        <li><a href="#"><i class="fa fa-circle-o-notch" aria-hidden="true"></i><span>Menu 2</span></a></li>
                        <li><a href="#"><i class="fa fa-child" aria-hidden="true"></i><span>Menu 3</span><b><i class="fa fa-angle-right"></i></b></a>
                            <ul>
                                <li><a href="#"><i class="fa fa-certificate" aria-hidden="true"></i><span>Menu 3.1</span></a></li>
                                <li><a href="#"><i class="fa fa-clock-o" aria-hidden="true"></i><span>Menu 3.2</span></a></li>
                                <li><a href="#"><i class="fa fa-diamond" aria-hidden="true"></i><span>Menu 3.3</span></a></li>
                            </ul>

                        </li>
                        <li>
                            <a href="#"><i class="fa fa-circle-o-notch" aria-hidden="true"></i><span>Menu 4</span><b><i class="fa fa-angle-right"></i></b></a>
                            <ul>
                                <li><a href="#"><i class="fa fa-certificate" aria-hidden="true"></i><span>Menu 4.1</span></a></li>
                                <li><a href="#"><i class="fa fa-diamond" aria-hidden="true"></i><span>Menu 4.2</span></a></li>
                            </ul>
                        </li>
                        <li><a href="#"><i class="fa fa-clock-o" aria-hidden="true"></i><span>Menu 5</span></a></li>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="col-md-6">
            <h5>bty-vertical-menu-light-1</h5>
            <textarea class="form-control" name="" id="" cols="30" rows="5" readonly>
.bty-vertical-menu-light-1 > nav {
    width: 100%;
    height: 100%;

}

.bty-vertical-menu-light-1 > nav ul {
    list-style: none;
    padding: 0;
    margin: 0;
    background-color: white;
    box-shadow: 0 0 5px #777;
}

.bty-vertical-menu-light-1 > nav ul li {
    position: relative;
    display: block;
    width: 100%;
    height: 60px;
    border-bottom: 1px solid #293649;
}


.bty-vertical-menu-light-1 > nav ul li:hover:after {
    width: 100%;
}

.bty-vertical-menu-light-1 > nav ul li:after {
    content: " ";
    position: absolute;
    z-index: 1;
    width: 0px;
    height: 2px;
    margin: -2px 0 0 0;
    background: #126CA1;
    -webkit-transition: 150ms ease all;
    -moz-transition: 150ms ease all;
    -ms-transition: 150ms ease all;
    -o-transition: 150ms ease all;
    transition: 150ms ease all;
}

.bty-vertical-menu-light-1 > nav ul li a {
    position: relative;
    display: block;
    width: 100%;
    line-height: 60px;
    padding: 0 15px;
    text-decoration: none;
    color: #000;
    -webkit-transition: 150ms ease all;
    -moz-transition: 150ms ease all;
    -ms-transition: 150ms ease all;
    -o-transition: 150ms ease all;
    transition: 150ms ease all;
}
.bty-vertical-menu-light-1 > nav ul li a b{
    position: absolute;
    right: 37px;
    color: #abaaaa;
}

.bty-vertical-menu-light-1 > nav ul li a:hover {
    background: #2e2e2e;
    color: #eee;
}

.bty-vertical-menu-light-1 > nav ul li a i,
.bty-vertical-menu-light-1 > nav ul li a span {
    display: inline-block;
}

.bty-vertical-menu-light-1 > nav ul li a i {
    position: absolute;
    margin: 22px 0 0 0;
    font-size: 1.3em;
}

.bty-vertical-menu-light-1 > nav ul li a span {
    margin: 0 0 0 35px;
    font-size: 0.85em;
}
.bty-vertical-menu-light-1 > nav ul li:hover a+ul{
    display: block;
}
.bty-vertical-menu-light-1 > nav ul li ul {
    position: absolute;
    display: none;
    top: 0;
    right: -226px;
}

.bty-vertical-menu-light-1 > nav ul li ul> li {
    width: 225px;
}

.bty-vertical-menu-light-1 > nav ul li ul> li a:hover {
    background: #1f1f1f;
}
            </textarea>
        </div>
    </div>
    <div class="col-md-12">
        <div class="col-md-6 p-t-34">
            <div class="bty-vertical-menu-noicon-1">
                <nav>
                    <ul>
                        <li><a href="#"><i class="fa fa-bus" aria-hidden="true"></i><span>Menu 1</span></a></li>
                        <li><a href="#"><i class="fa fa-circle-o-notch" aria-hidden="true"></i><span>Menu 2</span></a></li>
                        <li><a href="#"><i class="fa fa-child" aria-hidden="true"></i><span>Menu 3</span><b><i class="fa fa-angle-right"></i></b></a>
                            <ul>
                                <li><a href="#"><i class="fa fa-certificate" aria-hidden="true"></i><span>Menu 3.1</span></a></li>
                                <li><a href="#"><i class="fa fa-clock-o" aria-hidden="true"></i><span>Menu 3.2</span></a></li>
                                <li><a href="#"><i class="fa fa-diamond" aria-hidden="true"></i><span>Menu 3.3</span></a></li>
                            </ul>

                        </li>
                        <li>
                            <a href="#"><i class="fa fa-circle-o-notch" aria-hidden="true"></i><span>Menu 4</span><b><i class="fa fa-angle-right"></i></b></a>
                            <ul>
                                <li><a href="#"><i class="fa fa-certificate" aria-hidden="true"></i><span>Menu 4.1</span></a></li>
                                <li><a href="#"><i class="fa fa-diamond" aria-hidden="true"></i><span>Menu 4.2</span></a></li>
                            </ul>
                        </li>
                        <li><a href="#"><i class="fa fa-clock-o" aria-hidden="true"></i><span>Menu 5</span></a></li>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="col-md-6">
            <h5>bty-vertical-menu-noicon-1</h5>
            <textarea class="form-control" name="" id="" cols="30" rows="5" readonly>
.bty-vertical-menu-noicon-1 > nav {
    width: 100%;
    height: 100%;

}

.bty-vertical-menu-noicon-1 > nav ul {
    list-style: none;
    padding: 0;
    margin: 0;
    background-color: white;
    border: 1px solid #ccc;
}

.bty-vertical-menu-noicon-1 > nav ul li {
    position: relative;
    display: block;
    width: 100%;
    height: 60px;
    border-bottom: 1px solid #293649;
}


.bty-vertical-menu-noicon-1 > nav ul li:hover:after {
    width: 100%;
}

.bty-vertical-menu-noicon-1 > nav ul li:after {
    content: " ";
    position: absolute;
    z-index: 1;
    width: 0px;
    height: 2px;
    margin: -2px 0 0 0;
    background: #126CA1;
    -webkit-transition: 150ms ease all;
    -moz-transition: 150ms ease all;
    -ms-transition: 150ms ease all;
    -o-transition: 150ms ease all;
    transition: 150ms ease all;
}

.bty-vertical-menu-noicon-1 > nav ul li a {
    font-size: 20px;
    position: relative;
    display: block;
    width: 100%;
    line-height: 60px;
    padding: 0 15px;
    text-decoration: none;
    color: #000;
    -webkit-transition: 150ms ease all;
    -moz-transition: 150ms ease all;
    -ms-transition: 150ms ease all;
    -o-transition: 150ms ease all;
    transition: 150ms ease all;
}

.bty-vertical-menu-noicon-1 > nav ul li a b{
    position: absolute;
    right: 37px;
    color: #abaaaa;
}

.bty-vertical-menu-noicon-1 > nav ul li a:hover {
    background: #499bc7;
    color: #eee;
}

.bty-vertical-menu-noicon-1 > nav ul li a>i{
    display: none;
}
.bty-vertical-menu-noicon-1 > nav ul li a span {
    display: inline-block;
}

.bty-vertical-menu-noicon-1 > nav ul li a i {
    position: absolute;
    margin: 22px 0 0 0;
    font-size: 1.3em;
}

.bty-vertical-menu-noicon-1 > nav ul li a span {
    margin: 0 0 0 12px;
    font-size: 0.85em;
}
.bty-vertical-menu-noicon-1 > nav ul li:hover a+ul{
    display: block;
}
.bty-vertical-menu-noicon-1 > nav ul li ul {
    position: absolute;
    display: none;
    top: 0;
    right: -226px;
}

.bty-vertical-menu-noicon-1 > nav ul li ul> li {
    width: 225px;
}
            </textarea>
        </div>
    </div>
    <div class="col-md-12">
        <div class="col-md-6 p-t-34">
            <div class="bty-vertical-menu-2">
                <ul>
                    <li><a href="#">Menu 1</a>
                        <ul>
                            <li><a href="#">Menu 1.1</a></li>
                            <li><a href="#">Menu 1.2</a></li>
                            <li><a href="#">Menu 1.3</a></li>
                            <li><a href="#">Menu 1.4</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Menu 2</a>
                        <ul>
                            <li><a href="#">Menu 2.1</a></li>
                            <li><a href="#">Menu 2.2</a></li>
                            <li><a href="#">Menu 2.3</a></li>
                            <li><a href="#">Menu 2.4</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Menu 3</a>
                        <ul>
                            <li><a href="#">Menu 3.1</a></li>
                            <li><a href="#">Menu 3.2</a></li>
                            <li><a href="#">Menu 3.3</a></li>
                            <li><a href="#">Menu 3.4</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-md-6">
            <h5>bty-vertical-menu-2</h5>
            <textarea class="form-control" name="" id="" cols="30" rows="5" readonly>
               .bty-vertical-menu-2 ul {
    list-style: none;
}

.bty-vertical-menu-2 ul,
.bty-vertical-menu-2li,
.bty-vertical-menu-2 a {
    padding: 0px;
    margin: 0px;
}

.bty-vertical-menu-2 > ul a {
    color: #FFFFFF;
}

.bty-vertical-menu-2 > ul li ul li a:hover {
    background-color: #394963;
}

.bty-vertical-menu-2 ul li ul {
    background-color: #4a5b78;
    list-style: none
}

.bty-vertical-menu-2 > ul > li > a {
    background-color: #282828;
    padding: 16px 18px;
    text-decoration: none;
    display: block;
    border-bottom: 2px solid #212121;
    background: linear-gradient(top, #343434, #111111);
}

.bty-vertical-menu-2 > ul li ul li a {
    padding: 10px 0;
    padding-left: 30px;
    text-decoration: none;
    display: block;
}

.bty-vertical-menu-2 {
    background-color: #000000;
    background-color: #343434;
    width: 280px;
}

.bty-vertical-menu-2 > ul li ul {
    display: none;
}
            </textarea>
        </div>
    </div>
    <div class="col-md-12">
        <div class="col-md-6 p-t-34">
            <div class="bty-vertical-menu-3">
                <ul>
                    <li>
                        <div><i class="fa fa-paint-brush"></i>Menu 1<i class="fa fa-chevron-down"></i></div>
                        <ul>
                            <li><a href="#">Menu 1.1</a></li>
                            <li><a href="#">Menu 1.2</a></li>
                            <li><a href="#">Menu 1.3</a></li>
                            <li><a href="#">Menu 1.4</a></li>
                        </ul>
                    </li>
                    <li class="default open">
                        <div><i class="fa fa-code"></i>Menu 2<i class="fa fa-chevron-down"></i></div>
                        <ul>
                            <li><a href="#">Menu 2.1</a></li>
                            <li><a href="#">Menu 2.2</a></li>
                            <li><a href="#">Menu 2.3</a></li>
                        </ul>
                    </li>
                    <li>
                        <div><i class="fa fa-mobile"></i>Menu 3<i class="fa fa-chevron-down"></i></div>
                        <ul>
                            <li><a href="#">Menu 3.1</a></li>
                            <li><a href="#">Menu 3.2</a></li>
                            <li><a href="#">Menu 3.3</a></li>
                            <li><a href="#">Menu 3.4</a></li>
                        </ul>
                    </li>
                    <li>
                        <div><i class="fa fa-globe"></i>Menu 4<i class="fa fa-chevron-down"></i></div>
                        <ul>
                            <li><a href="#">Menu 4.1</a></li>
                            <li><a href="#">Menu 4.2</a></li>
                            <li><a href="#">Menu 4.3</a></li>
                            <li><a href="#">Menu 4.4</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-md-6">
            <h5>bty-vertical-menu-3</h5>
            <textarea class="form-control" name="" id="" cols="30" rows="5" readonly>
            .bty-vertical-menu-3 ul {
    list-style: none;
    padding: 0;
}

.bty-vertical-menu-3 ul a {
    color: #499bc7;
    text-decoration: none;
}

.bty-vertical-menu-3 > ul {
    width: 300px;
    background: #FFF;
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    border-radius: 4px;
}

.bty-vertical-menu-3 > ul li div {
    cursor: pointer;
    display: block;
    padding: 15px 15px 15px 42px;
    color: #4D4D4D;
    font-size: 14px;
    font-weight: 700;
    border-bottom: 1px solid #CCC;
    position: relative;
    -webkit-transition: all 0.4s ease;
    -o-transition: all 0.4s ease;
    transition: all 0.4s ease;
}

.bty-vertical-menu-3 > ul li:last-child div {
    border-bottom: 0;
}

.bty-vertical-menu-3 > ul li i {
    position: absolute;
    top: 16px;
    left: 12px;
    font-size: 18px;
    color: #595959;
    font-style: normal;
    -webkit-transition: all 0.4s ease;
    -o-transition: all 0.4s ease;
    transition: all 0.4s ease;
}

.bty-vertical-menu-3 > ul li i.fa-chevron-down {
    right: 12px;
    left: auto;
    font-size: 16px;
}

.bty-vertical-menu-3 > ul li.open div {
    color: #499bc7;
}

.bty-vertical-menu-3 > ul li.open i {
    color: #499bc7;
}

.bty-vertical-menu-3 > ul li.open i.fa-chevron-down {
    -webkit-transform: rotate(180deg);
    -ms-transform: rotate(180deg);
    -o-transform: rotate(180deg);
    transform: rotate(180deg);
}

.bty-vertical-menu-3 > ul li.default ul {
    display: block;
}

/**
 * Submenu
 -----------------------------*/
.bty-vertical-menu-3 ul > li > ul {
    display: none;
    background: #444359;
    font-size: 14px;
}

.bty-vertical-menu-3 ul > li > ul li {
    border-bottom: 1px solid #4b4a5e;
}

.bty-vertical-menu-3 ul > li > ul a {
    display: block;
    text-decoration: none;
    color: #d9d9d9;
    padding: 12px;
    padding-left: 42px;
    -webkit-transition: all 0.25s ease;
    -o-transition: all 0.25s ease;
    transition: all 0.25s ease;
}

.bty-vertical-menu-3 ul > li > ul a:hover {
    background: #499bc7;
    color: #FFF;
}
            </textarea>
        </div>
    </div>
    <div class="col-md-12">
        <div class="col-md-6 p-t-34">

        </div>
        <div class="col-md-6">
            <h5></h5>
            <textarea class="form-control" name="" id="" cols="30" rows="5" readonly>

            </textarea>
        </div>
    </div>
    <div class="col-md-12">
        <div class="col-md-6 p-t-34">

        </div>
        <div class="col-md-6">
            <h5></h5>
            <textarea class="form-control" name="" id="" cols="30" rows="5" readonly>

            </textarea>
        </div>
    </div>




    <div class="col-md-12">
        <div class="col-md-6 p-t-34">
            <div class="bty-vertical-menu-4">
                <nav>
                    <ul class="bty-menu4">
                        <li>
                            <a href="">
                                <i class="fa fa-home"></i>
                                <strong>Menu 1</strong>
                                <small>description</small>
                            </a>
                        </li>
                        <li>
                            <a href="" class="active">
                                <i class="fa fa-edit"></i>
                                <strong>Menu 2</strong>
                                <small>description</small>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <i class="fa fa-gift"></i>
                                <strong>Menu 3</strong>
                                <small>description</small>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <i class="fa fa-globe"></i>
                                <strong>Menu 4</strong>
                                <small>description</small>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <i class="fa fa-comments-o"></i>
                                <strong>Menu 5</strong>
                                <small>description</small>
                            </a>
                            <ul>
                                <li><a href="#"><i class="fa fa-globe"></i>Menu 5.1</a></li>
                                <li>
                                    <a href="#"><i class="fa fa-group"></i>Menu 5.2</a>
                                    <ul>
                                        <li><a href="#"><i class="fa fa-female"></i>Menu 5.2.1</a></li>
                                        <li>
                                            <a href="#"><i class="fa fa-male"></i>Menu 5.2.2</a>
                                            <ul>
                                                <li><a href="#"><i class="fa fa-leaf"></i>Menu 5.2.2.1</a></li>
                                                <li><a href="#"><i class="fa fa-tasks"></i>Menu 5.2.2.2</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#"><i class="fa fa-female"></i>Menu 5.2.3</a></li>
                                    </ul>
                                </li>
                                <li><a href="#"><i class="fa fa-trophy"></i>Menu 5.2</a></li>
                                <li><a href="#"><i class="fa fa-certificate"></i>Menu 5.3</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="">
                                <i class="fa fa-picture-o"></i>
                                <strong>description</strong>
                                <small>description</small>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <i class="fa fa-envelope-o"></i>
                                <strong>Menu 7</strong>
                                <small>description</small>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="col-md-6">
            <h5>bty-vertical-menu-4</h5>
            <textarea class="form-control" name="" id="" cols="30" rows="5" readonly>

            </textarea>
        </div>
    </div>


</div>