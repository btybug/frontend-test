<div class="d1">
    <h2>Horizontal Menu</h2>
    <div class="col-md-12">
        <div class="col-md-8 p-t-34">
            <div class="bty-horizontal-menu-1">
                <ul>
                    <li><a href="#" target="_blank"><i class="fa fa-fw fa-home"></i>Menu 1</a></li>
                    <li class="has-sub"><a href="#"><i class="fa fa-fw fa-bars"></i>
                            Menu 2</a>
                        <ul>
                            <li class="has-sub"><a href="#">Menu 2.1</a>
                                <ul>
                                    <li><a href="#">Menu 2.1.1</a></li>
                                    <li><a href="#">Menu 2.2.2</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Menu 2.2</a></li>
                        </ul>
                    </li>
                    <li><a href="#"><i class="fa fa-fw fa-cog"></i> Menu 3</a></li>
                    <li><a href="#"><i class="fa fa-fw fa-phone"></i> Menu 4</a></li>
                </ul>
            </div>
        </div>
        <div class="col-md-4">
            <h5>bty-horizontal-menu-1</h5>
            <textarea class="form-control" name="" id="" cols="30" rows="5" readonly>
.bty-horizontal-menu-1,
.bty-horizontal-menu-1 ul,
.bty-horizontal-menu-1 ul li,
.bty-horizontal-menu-1 ul li a,
.bty-horizontal-menu-1 #menu-button {
    margin: 0;
    padding: 0;
    border: 0;
    list-style: none;
    line-height: 1;
    display: block;
    position: relative;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}

.bty-horizontal-menu-1:after,
.bty-horizontal-menu-1 > ul:after {
    content: ".";
    display: block;
    clear: both;
    visibility: hidden;
    line-height: 0;
    height: 0;
}

.bty-horizontal-menu-1 #menu-button {
    display: none;
}

.bty-horizontal-menu-1 {
    display: inline-block;
    width: auto;
    border-radius: 5px;
    font-family: 'Open Sans', Helvetica, sans-serif;
    background: #499bc7;
    background: -o-linear-gradient(top, #70b0d3, #3686b1);
    background: -ms-linear-gradient(top, #70b0d3, #3686b1);
    background: -webkit-linear-gradient(top, #70b0d3, #3686b1);
    background: -moz-linear-gradient(top, #70b0d3, #3686b1);
    background: linear-gradient(to bottom, #70b0d3, #3686b1);
    box-shadow: inset 0 -3px 0 #337da5, inset 0 -3px 3px #3480a9, inset 0 2px 2px #9bc8e0, inset 1px 0 2px #3889b5, inset -1px 0 2px #3889b5, 0 1px 1px rgba(0, 0, 0, 0.1), 0 2px 2px rgba(0, 0, 0, 0.06), 0 3px 3px rgba(0, 0, 0, 0.17), 2px 1px 2px rgba(0, 0, 0, 0.05), -2px 1px 2px rgba(0, 0, 0, 0.05);
}

.bty-horizontal-menu-1.align-center > ul {
    font-size: 0;
    text-align: center;
}

.bty-horizontal-menu-1.align-center ul ul {
    text-align: left;
}

.bty-horizontal-menu-1.align-center > ul > li {
    display: inline-block;
    float: none;
}

.bty-horizontal-menu-1.align-right > ul > li {
    float: right;
}

.bty-horizontal-menu-1.align-right ul ul {
    text-align: right;
}

.bty-horizontal-menu-1 > ul > li {
    float: left;
}

.bty-horizontal-menu-1 > ul > li > a {
    padding: 20px 25px;
    font-size: 13px;
    color: #ffffff;
    text-transform: uppercase;
    letter-spacing: 1px;
    text-shadow: 0 1px 0 rgba(0, 0, 0, 0.25);
    font-weight: 700;
    text-decoration: none;
    -webkit-transition: color .2s ease;
    -moz-transition: color .2s ease;
    -ms-transition: color .2s ease;
    -o-transition: color .2s ease;
    transition: color .2s ease;
}

.bty-horizontal-menu-1 > ul > li:hover > a,
.bty-horizontal-menu-1 > ul > li > a:hover,
.bty-horizontal-menu-1 > ul > li.active > a {
    color: #cae5fd;
}

.bty-horizontal-menu-1 > ul > li.has-sub > a {
    padding-right: 40px;
}

.bty-horizontal-menu-1 ul > li.has-sub > a:after {
    content: '';
    position: absolute;
    right: 5px;
    top: 17.5px;
    display: block;
    width: 18px;
    height: 18px;
    border-radius: 9px;
    background: #499bc7;
    background: -webkit-linear-gradient(top, #60a8ce 0%, #55a1cb 25%, #3b92c0 50%, #60a8ce 75%, #55a1cb 100%);
    background: -ms-linear-gradient(top, #60a8ce 0%, #55a1cb 25%, #3b92c0 50%, #60a8ce 75%, #55a1cb 100%);
    background: -moz-linear-gradient(top, #60a8ce 0%, #55a1cb 25%, #3b92c0 50%, #60a8ce 75%, #55a1cb 100%);
    background: -o-linear-gradient(top, #60a8ce 0%, #55a1cb 25%, #3b92c0 50%, #60a8ce 75%, #55a1cb 100%);
    background: linear-gradient(to bottom, #60a8ce 0%, #55a1cb 25%, #3b92c0 50%, #60a8ce 75%, #55a1cb 100%);
    box-shadow: inset 0 -1px 1px #3583ad, inset 0 2px 1px #84bbd9;
    background-size: 36px 36px;
    background-position: 0 0;
    background-repeat: no-repeat;
    -webkit-transition: all 0.1s ease-out;
    -moz-transition: all 0.1s ease-out;
    -ms-transition: all 0.1s ease-out;
    -o-transition: all 0.1s ease-out;
    transition: all 0.1s ease-out;
}

.bty-horizontal-menu-1 ul > li.has-sub:hover > a:after {
    background-position: 0 -18px;
}

.bty-horizontal-menu-1 ul > li.has-sub > a:before {
    content: '';
    position: absolute;
    right: 11px;
    top: 25.5px;
    display: block;
    width: 0;
    height: 0;
    border: 3px solid transparent;
    border-top-color: #ffffff;
    z-index: 99;
}

.bty-horizontal-menu-1 ul > li.has-sub:hover > a:before {
    border-top-color: #286382;
}

.bty-horizontal-menu-1 ul ul {
    position: absolute;
    left: -9999px;
    opacity: 0;
    -webkit-transition: top .2s ease, opacity .2s ease;
    -moz-transition: top .2s ease, opacity .2s ease;
    -ms-transition: top .2s ease, opacity .2s ease;
    -o-transition: top .2s ease, opacity .2s ease;
    transition: top .2s ease, opacity .2s ease;
    z-index: 100;
}

.bty-horizontal-menu-1 > ul > li > ul {
    top: 91px;
    padding-top: 8px;
    border-radius: 5px;
}

.bty-horizontal-menu-1 > ul > li:hover > ul {
    left: auto;
    top: 51px;
    opacity: 1;
}

.bty-horizontal-menu-1.align-right > ul > li:hover > ul {
    right: 0;
}

.bty-horizontal-menu-1 ul ul ul {
    top: 40px;
}

.bty-horizontal-menu-1 ul ul > li:hover > ul {
    top: 0;
    left: 178px;
    padding-left: 10px;
    opacity: 1;
}

.bty-horizontal-menu-1.align-right ul ul > li:hover > ul {
    left: auto;
    right: 178px;
    padding-left: 0;
    padding-right: 10px;
    opacity: 1;
}

.bty-horizontal-menu-1 ul ul li a {
    width: 180px;
    padding: 12px 25px;
    font-size: 13px;
    font-weight: 700;
    text-shadow: 0 1px 0 rgba(0, 0, 0, 0.25);
    color: #ffffff;
    text-decoration: none;
    background: #499bc7;
    -webkit-transition: color .2s ease;
    -moz-transition: color .2s ease;
    -ms-transition: color .2s ease;
    -o-transition: color .2s ease;
    transition: color .2s ease;
}

.bty-horizontal-menu-1 ul ul li:hover > a,
.bty-horizontal-menu-1 ul ul li > a:hover,
.bty-horizontal-menu-1 ul ul li.active > a {
    color: #cae5fd;
}

.bty-horizontal-menu-1 ul ul li:first-child > a {
    border-top-left-radius: 5px;
    border-top-right-radius: 5px;
    box-shadow: inset 0 2px 2px #8bbfdb;
}

.bty-horizontal-menu-1 ul ul li:last-child > a {
    border-bottom-left-radius: 5px;
    border-bottom-right-radius: 5px;
    box-shadow: inset 0 -3px 0 #3a8fbc, inset 0 -3px 3px #3480a9, 0 1px 1px rgba(0, 0, 0, 0.03), 0 2px 2px rgba(0, 0, 0, 0.05), 0 2px 3px rgba(0, 0, 0, 0.13);
}

.bty-horizontal-menu-1 ul ul > li.has-sub > a:after {
    right: 12px;
    top: 9.5px;
    background: #499bc7;
    background: -webkit-linear-gradient(top, #60a8ce 0%, #55a1cb 25%, #3b92c0 50%, #60a8ce 75%, #55a1cb 100%);
    background: -ms-linear-gradient(top, #60a8ce 0%, #55a1cb 25%, #3b92c0 50%, #60a8ce 75%, #55a1cb 100%);
    background: -moz-linear-gradient(top, #60a8ce 0%, #55a1cb 25%, #3b92c0 50%, #60a8ce 75%, #55a1cb 100%);
    background: -o-linear-gradient(top, #60a8ce 0%, #55a1cb 25%, #3b92c0 50%, #60a8ce 75%, #55a1cb 100%);
    background: linear-gradient(to bottom, #60a8ce 0%, #55a1cb 25%, #3b92c0 50%, #60a8ce 75%, #55a1cb 100%);
    box-shadow: inset 0 -1px 1px #3583ad, inset 0 2px 1px #84bbd9;
    background-size: 36px 36px;
    background-position: 0 0;
    background-repeat: no-repeat;
}

.bty-horizontal-menu-1.align-right ul ul > li.has-sub > a:after {
    right: auto;
    left: 12px;
}

.bty-horizontal-menu-1 ul ul > li.has-sub:hover > a:after {
    background-position: 0 -18px;
}

.bty-horizontal-menu-1 ul ul > li.has-sub > a:before {
    top: 15.5px;
    right: 16px;
    border-top-color: transparent;
    border-left-color: #ffffff;
}

.bty-horizontal-menu-1.align-right ul ul > li.has-sub > a:before {
    top: 15.5px;
    right: auto;
    left: 16px;
    border-top-color: transparent;
    border-right-color: #ffffff;
    border-left-color: transparent;
}

.bty-horizontal-menu-1 ul ul > li.has-sub:hover > a:before {
    border-top-color: transparent;
    border-left-color: #2e7195;
}
            </textarea>
        </div>
    </div>
    <div class="col-md-12">
        <div class="col-md-8 p-t-34">
            <div class="bty-horizontal-menu-2">
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Menu 1</a></li>
                    <li><a href="#">Menu 2</a></li>
                    <li><a href="#">Menu 3</a></li>
                    <li><a href="#">Menu 4</a></li>
                    <li><a href="#">Menu 5</a></li>
                </ul>
            </div>
        </div>
        <div class="col-md-4">
            <h5>bty-horizontal-menu-2</h5>
            <textarea class="form-control" name="" id="" cols="30" rows="5" readonly>
.bty-horizontal-menu-2 > ul {
    background-color: #000000c9;
    padding: 17px 0;
    box-shadow: 0px 1px 2px #545454;
    display: inline-block;
}

.bty-horizontal-menu-2 > ul li {
    display: inline-block;
    list-style: outside none none;
    margin: 0 1.5em;
    padding: 0;
}

.bty-horizontal-menu-2 > ul a {
    padding: 0.6em 0;
    color: rgba(255, 255, 255, 0.5);
    position: relative;
    letter-spacing: 1px;
    text-decoration: none;
}

.bty-horizontal-menu-2 > ul a:hover {
    color: white;
}

.bty-horizontal-menu-2 > ul a:before,
.bty-horizontal-menu-2 > ul a:after {
    position: absolute;
    -webkit-transition: all 0.35s ease;
    transition: all 0.35s ease;
}

.bty-horizontal-menu-2 > ul a:before {
    top: 0;
    display: block;
    height: 3px;
    width: 0%;
    content: "";
    background-color: #c0392b;
}

.bty-horizontal-menu-2 > ul a:after {
    left: 0;
    top: 0;
    padding: 0.5em 0;
    position: absolute;
    content: attr(data-hover);
    color: #ffffff;
    white-space: nowrap;
    max-width: 0%;
    overflow: hidden;
}

.bty-horizontal-menu-2 > ul a:hover:before,
.bty-horizontal-menu-2 > ul li:first-child a:before {
    opacity: 1;
    width: 100%;
}

.bty-horizontal-menu-2 > ul a:hover:after,
.bty-horizontal-menu-2 > ul li:first-child a:after {
    max-width: 100%;
}
            </textarea>
        </div>
    </div>
    <div class="col-md-12">
        <div class="col-md-8 p-t-34">
            <div class="bty-horizontal-menu-3">
                <ul>
                    <li><a href="#">Menu 1</a></li>
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
                            <li><a href="#">Menu 3.2</a>
                                <ul>
                                    <li><a href="#">Menu 3.2</a></li>
                                    <li><a href="#">Menu 3.3</a></li>
                                    <li><a href="#">Menu 3.4</a></li>
                                    <li><a href="#">Menu 3.5</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Menu 3.3</a></li>
                            <li><a href="#">Menu 3.4</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Menu 4</a></li>
                    <li><a href="#">Menu 5</a>
                        <ul>
                            <li><a href="#">Menu 5.1</a></li>
                            <li><a href="#">Menu 5.2</a></li>
                            <li><a href="#">Menu 5.3</a></li>
                            <li><a href="#">Menu 5.4</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Menu 6</a></li>
                </ul>
            </div>
        </div>
        <div class="col-md-4">
            <h5>bty-horizontal-menu-3</h5>
            <textarea class="form-control" name="" id="" cols="30" rows="5" readonly>
.bty-horizontal-menu-3 {
    display: block;
}

.bty-horizontal-menu-3 ul {
    margin: 0;
    padding: 0;
    list-style: none;
}

.bty-horizontal-menu-3 > ul a {
    display: block;
    background: #111;
    color: #fff;
    text-decoration: none;
    padding: .8em 1.8em;
    text-transform: uppercase;
    font-size: 12px;
    letter-spacing: 2px;
    text-shadow: 0 -1px 0 #000;
    position: relative;
}

.bty-horizontal-menu-3 > ul {
    vertical-align: top;
    display: inline-block;
    border-radius: 6px;
}

.bty-horizontal-menu-3 > ul li {
    position: relative;
}

.bty-horizontal-menu-3 > ul > li {
    float: left;
    border-bottom: 4px #aaa solid;
    margin-right: 1px;
}

.bty-horizontal-menu-3 > ul > li > a {
    margin-bottom: 1px;
    box-shadow: inset 0 2em .33em -.5em #555;
}

.bty-horizontal-menu-3 > ul > li:hover, .bty-horizontal-menu-3 > ul > li:hover > a {
    border-bottom-color: #499bc7;
}

.bty-horizontal-menu-3 > ul li:hover > a {
    color: #499bc7;
}

.bty-horizontal-menu-3 > ul > li:first-child {
    border-radius: 4px 0 0 4px;
}

.bty-horizontal-menu-3 > ul > li:first-child > a {
    border-radius: 4px 0 0 0;
}

.bty-horizontal-menu-3 > ul > li:last-child {
    border-radius: 0 0 4px 0;
    margin-right: 0;
}

.bty-horizontal-menu-3 > ul > li:last-child > a {
    border-radius: 0 4px 0 0;
}

.bty-horizontal-menu-3 > ul li li a {
    margin-top: 1px
}

.bty-horizontal-menu-3 > ul li a:first-child:nth-last-child(2):before {
    content: "";
    position: absolute;
    height: 0;
    width: 0;
    border: 5px solid transparent;
    top: 50%;
    right: 5px;
}

/* submenu positioning*/
.bty-horizontal-menu-3 > ul ul {
    position: absolute;
    white-space: nowrap;
    border-bottom: 5px solid #499bc7;
    z-index: 1;
    left: -99999em;
}

.bty-horizontal-menu-3 > ul > li:hover > ul {
    left: auto;
    padding-top: 5px;
    min-width: 100%;
}

.bty-horizontal-menu-3 > ul > li li ul {
    border-left: 1px solid #fff;
}

.bty-horizontal-menu-3 > ul > li li:hover > ul {
    /* margin-left: 1px */
    left: 100%;
    top: -1px;
}

/* arrow hover styling */
.bty-horizontal-menu-3 > ul > li > a:first-child:nth-last-child(2):before {
    border-top-color: #aaa;
}

.bty-horizontal-menu-3 > ul > li:hover > a:first-child:nth-last-child(2):before {
    border: 5px solid transparent;
    border-bottom-color: #499bc7;
    margin-top: -5px
}

.bty-horizontal-menu-3 > ul li li > a:first-child:nth-last-child(2):before {
    border-left-color: #aaa;
    margin-top: -5px
}

.bty-horizontal-menu-3 > ul li li:hover > a:first-child:nth-last-child(2):before {
    border: 5px solid transparent;
    border-right-color: #499bc7;
    right: 10px;
}
            </textarea>
        </div>
    </div>
    <div class="col-md-12">
        <div class="col-md-8 p-t-34">
            <div class="bty-horizontal-menu-4">
                <ul>
                    <li><a href="#">Menu 1</a></li>
                    <li><a href="#">Menu 2</a>
                        <ul>
                            <li><a href="#">Menu 2.1</a></li>
                            <li><a href="#">Menu 2.2</a></li>
                            <li><a href="#">Menu 2.3</a></li>
                            <li><a href="#">Menu 2.4</a></li>
                            <li><a href="#">Menu 2.5</a>
                                <ul>
                                    <li><a href="#">Level 2</a></li>
                                    <li><a href="#">Level 2</a></li>
                                    <li><a href="#">Level 2</a></li>
                                    <li><a href="#">Level 2</a></li>
                                    <li><a href="#">Level 2</a>
                                        <ul>
                                            <li><a href="#">Level 3</a></li>
                                            <li><a href="#">Level 3</a>
                                                <ul>
                                                    <li><a href="#">Level 4</a></li>
                                                    <li><a href="#">Level 4</a></li>
                                                    <li><a href="#">Level 4</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#">Level 3</a></li>
                                            <li><a href="#">Level 3</a></li>
                                            <li><a href="#">Level 3</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li><a href="#">Menu 3</a></li>
                    <li><a href="#">Menu 4</a></li>
                    <li><a href="#">Menu 5</a></li>
                </ul>
            </div>
        </div>
        <div class="col-md-4">
            <h5>bty-horizontal-menu-4</h5>
            <textarea class="form-control" name="" id="" cols="30" rows="5" readonly>
.bty-horizontal-menu-4 {
    display: block;
}

.bty-horizontal-menu-4 ul {
    margin: 0;
    padding: 0;
    list-style: none;
}

.bty-horizontal-menu-4 > ul a {
    display: block;
    color: #fff;
    text-decoration: none;
    padding: .8em 1.8em;
    letter-spacing: 2px;
    text-shadow: 0 -1px 0 #000;
    position: relative;
    background: black;
    background: rgba(0, 0, 0, .6);
    -webkit-transition: color .3s ease-in;
    -moz-transition: color .3s ease-in;
    -o-transition: color .3s ease-in;
    -ms-transition: color .3s ease-in;
}

.bty-horizontal-menu-4 > ul {
    vertical-align: top;
    display: inline-block;
}

.bty-horizontal-menu-4 > ul li {
    position: relative;
}

.bty-horizontal-menu-4 > ul li a:hover {
    color: #0fd0f9;
}

.bty-horizontal-menu-4 > ul > li {
    float: left;
    margin-right: 1px;
}

.bty-horizontal-menu-4 > ul > li > a {
    margin-bottom: 1px;
    box-shadow: inset 0 2em .33em -.5em #555;
}

.bty-horizontal-menu-4 > ul > li:hover, .bty-horizontal-menu-3 > ul > li:hover > a {

}

.bty-horizontal-menu-4 > ul li:hover > a {
    background: rgba(0, 0, 0, .75);
}

.bty-horizontal-menu-4 > ul li li a {
    margin-top: 1px
}

.bty-horizontal-menu-4 > ul li a:first-child:nth-last-child(2):before {
    content: "";
    position: absolute;
    height: 0;
    width: 0;
    border: 5px solid transparent;
    top: 50%;
    right: 5px;

}

/* submenu positioning*/
.bty-horizontal-menu-4 > ul ul {
    position: absolute;
    white-space: nowrap;
    z-index: 1;
    left: -99999em;
    -webkit-transition: .3s ease-in, background .3s ease-in;
    -moz-transition: .3s ease-in, background .3s ease-in;
    -o-transition: .3s ease-in, background .3s ease-in;
    -ms-transition: .3s ease-in, background .3s ease-in;
}

.bty-horizontal-menu-4 > ul > li:hover > ul {
    left: auto;
    min-width: 100%;
    font-size: 13px;
}

.bty-horizontal-menu-4 > ul > li li ul {
    border-left: 1px solid #fff;
}

.bty-horizontal-menu-4 > ul > li li:hover > ul {
    /* margin-left: 1px */
    left: 100%;
    top: -1px;
    font-size: 12px;
}

/* arrow hover styling */
.bty-horizontal-menu-4 > ul > li > a:first-child:nth-last-child(2):before {
    border-top-color: white;
}

.bty-horizontal-menu-4 > ul > li:hover > a:first-child:nth-last-child(2):before {
    border: 5px solid transparent;
    border-bottom-color: white;
    margin-top: -5px
}

.bty-horizontal-menu-4 > ul li li > a:first-child:nth-last-child(2):before {
    border-left-color: white;
    margin-top: -5px
}

.bty-horizontal-menu-4 > ul li li:hover > a:first-child:nth-last-child(2):before {
    border: 5px solid transparent;
    border-right-color: white;
    right: 10px;
}
            </textarea>
        </div>
    </div>
    <div class="col-md-12">
        <div class="col-md-8 p-t-34">
            <div class="bty-horizontal-menu-5">
                <ul>
                    <li><a href="#"><i class="fa fa-fw fa-home"></i><br/>Menu 1</a></li>
                    <li><a href="#"><i class="fa fa-fw fa-home"></i><br/>Menu 2</a></li>
                    <li><a href="#"><i class="fa fa-fw fa-home"></i><br/>Menu 3</a>
                        <ul>
                            <li><a href="#"><i class="fa fa-fw fa-home"></i>Menu 3.1</a></li>
                            <li><a href="#"><i class="fa fa-fw fa-home"></i>Menu 3.2</a></li>
                            <li><a href="#"><i class="fa fa-fw fa-home"></i>Menu 3.3</a></li>
                        </ul>
                    </li>
                    <li><a href="#"><i class="fa fa-fw fa-home"></i><br/>Menu 4</a></li>
                    <li><a href="#"><i class="fa fa-fw fa-home"></i><br/>Menu 5</a></li>
                </ul>
            </div>
        </div>
        <div class="col-md-4">
            <h5>bty-horizontal-menu-5</h5>
            <textarea class="form-control" name="" id="" cols="30" rows="5" readonly>
.bty-horizontal-menu-5 {
    background-color: #499bc7;
    font-size: 0;
    text-align: center;
    width: 100%;
}

.bty-horizontal-menu-5 ul {
    font-size: 12px;
    position: relative;
}

.bty-horizontal-menu-5 i {
    font-size: 3em;
}

.bty-horizontal-menu-5 li {
    display: inline-block;
    height: inherit;
}

.bty-horizontal-menu-5 a {
    color: #fff;
    font-size: 1.3em;
    display: block;
    height: inherit;
    margin: 0;
    text-decoration: none;
    padding: 6px 12px;
}

.bty-horizontal-menu-5 a:hover {
    background-color: #3f7fa5;
    transition: background .25s ease;
}

.bty-horizontal-menu-5 > ul li ul {
    background-color: #3f7fa5;
    position: absolute;
    left: -9999px;
    opacity: 0;
    transition: opacity .75s;
    width: 100%;
    z-index: 10;
}

.bty-horizontal-menu-5 li:hover ul {
    left: 0;
    opacity: 1;
    margin: 0 !important;
}

.bty-horizontal-menu-5 > ul li ul i {
    font-size: 1em;
}

.bty-horizontal-menu-5 > ul li ul a {
    line-height: 3em;
    padding: 0 2em;
    height: inherit;
    width: 100%;
}

.bty-horizontal-menu-5 > ul li ul a:hover {
    background-color: #499bc7;
}
            </textarea>
        </div>
    </div>
    <div class="col-md-12">
        <div class="col-md-8 p-t-34">
            <div class="bty-horizontal-menu-6">
                <ul>
                    <li><a href="#">Menu 1</a></li>
                    <li><a href="#">Menu 2</a></li>
                    <li><a href="#">Menu 3</a>
                        <ul>
                            <li><a href="#">Menu 3.1</a></li>
                            <li><a href="#">Menu 3.2</a></li>
                            <li><a href="#">Menu 3.3</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Menu 4</a></li>
                    <li><a href="#">Menu 5</a></li>
                </ul>
            </div>
        </div>
        <div class="col-md-4">
            <h5>bty-horizontal-menu-6</h5>
            <textarea class="form-control" name="" id="" cols="30" rows="5" readonly>
.bty-horizontal-menu-6 > ul:before, .bty-horizontal-menu-6 > ul:after {
    content: " ";
    display: table;
}

.bty-horizontal-menu-6 > ul:after {
    clear: both;
}

.bty-horizontal-menu-6 > ul {
    *zoom: 1;
}

.bty-horizontal-menu-6 > ul {
    list-style: none;
    margin: 50px auto;
    width: 800px;
    width: -moz-fit-content;
    width: fit-content;
}

.bty-horizontal-menu-6 > ul > li {
    background: #34495e;
    float: left;
    position: relative;
    -webkit-transform: skewX(25deg);
    border-left: 1px solid #999;
}

.bty-horizontal-menu-6 > ul a {
    display: block;
    color: #fff;
    text-transform: uppercase;
    text-decoration: none;
    font-size: 14px;
}

.bty-horizontal-menu-6 > ul li:hover {
    background: #e74c3c;
}

.bty-horizontal-menu-6 > ul > li > a {
    -webkit-transform: skewX(-25deg);
    padding: 1em 2em;
}

/* Dropdown */
.bty-horizontal-menu-6 > ul > li ul {
    position: absolute;
    width: 200px;
    left: 50%;
    margin-left: -100px;
    -webkit-transform: skewX(-25deg);
    -webkit-transform-origin: left top;
}

.bty-horizontal-menu-6 > ul > li ul li {
    background-color: #34495e;
    position: relative;
    overflow: hidden;
}

.bty-horizontal-menu-6 > ul > li ul > li > a {
    padding: 1em 2em;
}

.bty-horizontal-menu-6 > ul > li ul > li::after {
    content: '';
    position: absolute;
    top: -125%;
    height: 100%;
    width: 100%;
    box-shadow: 0 0 50px rgba(0, 0, 0, .9);
}

/* Odd stuff */
.bty-horizontal-menu-6 > ul > li ul > li:nth-child(odd) {
    -webkit-transform: skewX(-25deg) translateX(0);
}

.bty-horizontal-menu-6 > ul > li ul > li:nth-child(odd) > a {
    -webkit-transform: skewX(25deg);
}

.bty-horizontal-menu-6 > ul > li ul > li:nth-child(odd)::after {
    right: -50%;
    -webkit-transform: skewX(-25deg) rotate(3deg);
}

/* Even stuff */
.bty-horizontal-menu-6 > ul > li ul > li:nth-child(even) {
    -webkit-transform: skewX(25deg) translateX(0);
}

.bty-horizontal-menu-6 > ul > li ul > li:nth-child(even) > a {
    -webkit-transform: skewX(-25deg);
}

.bty-horizontal-menu-6 > ul > li ul > li:nth-child(even)::after {
    left: -50%;
    -webkit-transform: skewX(25deg) rotate(3deg);
}

/* Show dropdown */
.bty-horizontal-menu-6 > ul > li ul, .bty-horizontal-menu-6 > ul > li ul li {
    opacity: 0;
    visibility: hidden;
}

.bty-horizontal-menu-6 > ul > li ul li {
    transition: .2s ease -webkit-transform;
}

.bty-horizontal-menu-6 > ul > li:hover ul, .bty-horizontal-menu-6 > ul > li:hover ul li {
    opacity: 1;
    visibility: visible;
}

.bty-horizontal-menu-6 > ul > li:hover ul li:nth-child(even) {
    -webkit-transform: skewX(25deg) translateX(15px);
}

.bty-horizontal-menu-6 > ul > li:hover ul li:nth-child(odd) {
    -webkit-transform: skewX(-25deg) translateX(-15px);
}
            </textarea>
        </div>
    </div>

</div>