<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile user 2</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body, html {
            margin: 0;
            padding: 30px;
            color: #2f2f2f;
            font-size: 16px;
            line-height: 1.625;
            letter-spacing: .5px;
            background-color: #f2f2f2;
        }

        ul, li {
            list-style: none;
        }

        .profile-section .left {
            background-color: #fff;
            box-shadow: 0 10px 40px 0 rgba(1, 1, 1, 0.1);
            padding: 0;
        }

        .profile-user .profile-img {
            text-align: center;
        }

        .profile-user .profile-img img {
            width: 100%;
            height: 210px;
            object-fit: cover;
        }

        .profile-user .profile-name {
            padding: 45px 10px;
            background-color: #ffffff;
            box-shadow: 0 10px 40px 15px rgba(1, 1, 1, 0.1);
            text-align: center;
        }

        .profile-user .profile-name h2 {
            font-size: 34px;
            margin-bottom: 10px;
            margin-top: 0;
            padding: 0;
            color: #111111;
        }

        .profile-user .profile-name p span {
            color: rgb(71, 122, 165);
        }

        .profile-user ul.social-btn {
            width: 100%;
            padding: 50px 10px;
            text-align: center;
        }

        .profile-user ul.social-btn li {
            margin: 5px;
            width: 35px;
            height: 35px;
            opacity: 0.2;
            border-radius: 100%;
            display: inline-block;
            background-color: #477aa5;
            transition: opacity 0.4s ease;
        }

        .profile-user ul.social-btn li a {
            width: 100%;
            height: 100%;
            display: block;
            color: #ffffff;
            line-height: 35px;
            text-align: center;

        }
        .profile-user .profile-menu{
            background: #FBFBFC;
            padding: 0;
        }
        .profile-user .profile-menu ul{
            padding: 0;

        }
        .profile-user .profile-menu ul a{
            text-indent: 2em !important;
        }
        .profile-user .profile-menu li>a{
            width: 100%;
            line-height: 3.5em;
            text-indent: 1.2em;
            display: block;
            position: relative;
            color: #666;
            text-decoration: none;
            border-bottom: 1px solid #ddd;
            font-weight: 700;
            font-size: 16px;
        }

        .profile-user .profile-menu .sublink.active,.profile-user .profile-menu a:hover{
            background-color: #cacaca;
            color: white;
        }
        .profile-user .profile-menu a i{
            float: right;
            margin: 20px 20px 0 0;
        }
        .profile-user .profile-menu .sublink.active i{
            -webkit-transform: rotatex(180deg);
            transform: rotatex(180deg);
            -moz-transform: rotatex(180deg);
            -o-transform: rotatex(180deg);
            -ms-transform: rotatex(180deg)
        }
        .profile-user .profile-menu .cute{
            overflow: hidden;
            display: none;
        }

        .profile-user ul.social-btn li:hover {
            background-color: rgb(71, 122, 165);
            opacity: 1;
        }

        .profile-main .profile-about {
            padding: 100px;
            background-color: #ffffff;
            box-shadow: 0 10px 40px 0 rgba(1, 1, 1, 0.1);
        }

        .profile-main .profile-about .about-head {
            margin-bottom: 80px;
        }

        .profile-main .profile-about .about-head h3 {
            font-size: 40px;
            font-weight: 700;
            padding: 15px 0;
            line-height: 0.65;
            margin-bottom: 20px;
            text-transform: capitalize;
        }

        .profile-main .profile-about .about-head h3 i {
            color: #1d82d8;
            margin-right: 10px
        }

        .profile-main .profile-about .about-bottom h3 {
            margin-bottom: 50px;
            font-size: 18px;
            font-weight: 700;
            text-transform: uppercase;
        }

        .profile-main .profile-about .about-bottom table {
            width: 100%;
            display: table;
        }

        .profile-main .profile-about .about-bottom table td {
            padding: 11px 5px;
        }

        .profile-main .profile-about .about-bottom table .td-1 {
            width: 25%
        }

        .profile-main .profile-about .about-bottom table .td-2 {
            width: 10%
        }

        .profile-main .profile-about .about-bottom table .td-3 {
            width: 65%;
            color: #111111;
            font-style: italic;
        }

        .profile-main .profile-skills {
            padding: 100px;
            background-color: #ffffff;
            box-shadow: 0 10px 40px 0 rgba(1, 1, 1, 0.1);
            margin-top: 40px;
        }

        .profile-main .profile-skills .skill-head {
            text-align: left;
            margin-bottom: 80px;
        }

        .profile-main .profile-skills .skill-head h3 {
            font-size: 40px;
            font-weight: 700;
            padding: 15px 0;
            line-height: 0.65;
            margin-bottom: 20px;
            text-transform: capitalize;
        }

        .profile-main .profile-skills .skill-head h3 i {
            color: #1d82d8;
            margin-right: 10px
        }

        .profile-main .profile-skills .skill-bottom {
            margin-bottom: 90px;
        }

        .profile-main .profile-skills .skill-bottom .skill-tag {
            padding: 0;
            margin-bottom: 60px;
        }

        .profile-main .profile-skills .skill-bottom .skill-tag .tag-item {
            float: left;
            width: auto;
            height: 53px;
            line-height: 53px;
            text-align: center;
        }

        .profile-main .profile-skills .skill-bottom .skill-tag .tag-icon {
            width: 30px;
            height: 53px;
            color: #111111;
            text-align: left;
            line-height: 53px;
        }

        .profile-main .profile-skills .skill-bottom .skill-tag .tag-item a {
            color: #111111;
            padding: 0 20px;
            text-transform: lowercase;
            -webkit-transition: all 0.5s;
            -o-transition: all 0.5s;
            -ms-transition: all 0.5s;
            -moz-transition: all 0.5s;
            transition: all 0.5s;
            font-size: 14px;
            text-overflow: ellipsis;
            overflow: hidden;
            display: block;
            width: 100%;
            height: 100%;
            text-decoration: none;
        }

        .profile-main .profile-skills .skill-bottom .skill-tag .tag-item a:hover, .profile-main .profile-skills .skill-bottom .skill-tag .tag-item a.active {
            background-color: #ffffff;
            color: #1d82d8;
            box-shadow: 0 10px 40px 0 rgba(1, 1, 1, 0.1);
            -webkit-transition: all 0.5s;
            -o-transition: all 0.5s;
            -ms-transition: all 0.5s;
            -moz-transition: all 0.5s;
            transition: all 0.5s;
        }

        .profile-main .profile-skills .skill-bottom .prof-skills {
            padding: 60px 60px;
            background-color: #fff;
            box-shadow: 0 10px 40px 0 rgba(1, 1, 1, 0.1);
            margin-top: 60px;
        }

        .profile-main .profile-skills .skill-bottom .prof-skills h3 {
            font-size: 18px;
            font-weight: 700;
            text-transform: uppercase;
            margin-bottom: 50px;
        }

        .profile-main .profile-skills .skill-bottom .prof-skills .single .bar-blue {
            width: 90%;

        }

        .profile-main .profile-skills .skill-bottom .prof-skills .single .bar-green {
            width: 60%;
            background-color: green;
        }

        .profile-main .profile-skills .skill-bottom .prof-skills .single .bar-red {
            width: 75%;
            background-color: red;
        }

        .profile-main .profile-skills .skill-bottom .prof-skills .single .bar-black {
            width: 80%;
            background-color: black;
        }

        .profile-main .profile-skills .skill-bottom .prof-skills .single .bar-orange {
            width: 35%;
            background-color: orange;
        }

        .profile-main .profile-skills .skill-bottom .prof-skills .single .bar-brown {
            width: 18%;
            background-color: brown;
        }

        .profile-main .profile-skills .skill-bottom .prof-skills .single .skilled-tittle {
            font-size: 18px;
            color: #888;
        }

        .profile-main .profile-contact {
            padding: 100px;
            background-color: #ffffff;
            box-shadow: 0 10px 40px 0 rgba(1, 1, 1, 0.1);
            margin-top: 40px;
        }

        .profile-main .profile-contact .contact-head h3 {
            font-size: 40px;
            font-weight: 700;
            padding: 15px 0;
            line-height: 0.65;
            margin-bottom: 20px;
            text-transform: capitalize;
        }

        .profile-main .profile-contact .contact-head h3 i {
            color: #1d82d8;
            margin-right: 10px
        }
        .profile-main .profile-contact .contact-bottom .contact-left{
            margin-top: 50px;
        }
        .profile-main .profile-contact .contact-bottom .contact-left .cont-item{
            width: 100%;
            padding: 10px 60px;
            margin-bottom: 30px;
            transition: all .4s ease-in-out;
        }
        .profile-main .profile-contact .contact-bottom .contact-left h4{
            font-size: 18px;
            font-weight: 700;
            text-transform: uppercase;
            margin-bottom: 30px;
        }
        .profile-main .profile-contact .contact-bottom .contact-left .cont-numbers p{
            font-style: italic;
        }
        .profile-main .profile-contact .contact-bottom .contact-left .cont-numbers p>span{
            float: left;
            width: 110px;
            margin-right: 25px;
            position: relative;
        }
        .profile-main .profile-contact .contact-bottom .contact-left .cont-numbers p>span:after{
            top: 0;
            right: 0;
            content: ':';
            color: #828282;
            position: absolute;
        }
        .profile-main .profile-contact .contact-bottom .contact-left a{
            text-decoration: none;
            color: #1d82d8;
        }
        .profile-main .profile-contact .contact-bottom .contact-right{
            margin-top: 70px;
        }

    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <div class="profile-section">
            <div class="col-md-3 left">
                <div class="profile-user">
                    <div class="profile-img">
                        <img src="https://dnatesting.com/wp-content/uploads/2010/01/1-21-2009_IDG-Blog-1000x562.jpg"
                             alt="">
                    </div>
                    <div class="profile-name">
                        <h2>User name</h2>
                        <p>
                            <span class="small-info">lorem/lorem</span> ipsum
                        </p>
                    </div>
                    <ul class="profile-menu">
                        <li class="item">
                            <a href="#" class="sublink">Menu1<i class="fa fa-chevron-down"></i></a>
                            <ul class="cute">
                                <li class="subitem"><a href="#">sub menu1</a></li>
                                <li class="subitem"><a href="#">sub menu2</a></li>
                                <li class="subitem"><a href="#">sub menu3</a></li>
                            </ul>
                        </li>
                        <li class="item">
                            <a href="#" class="sublink">Menu2<i class="fa fa-chevron-down"></i></a>
                            <ul class="cute">
                                <li class="subitem"><a href="#">sub menu2.1</a></li>
                                <li class="subitem"><a href="#">sub menu2.2</a></li>
                                <li class="subitem"><a href="#">sub menu2.3</a></li>
                            </ul>
                        </li>
                        <li class="item"><a href="#">Menu3</a></li>
                        <li class="item"><a href="#">Menu4</a></li>
                        <li class="item"><a href="#">Menu5</a></li>
                    </ul>
                    <ul class="social-btn">
                        <li>
                            <a href="#">
                                <i class="fa fa-facebook" aria-hidden="true"></i>
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <i class="fa fa-twitter" aria-hidden="true"></i>
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <i class="fa fa-behance" aria-hidden="true"></i>
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <i class="fa fa-instagram" aria-hidden="true"></i>
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <i class="fa fa-linkedin" aria-hidden="true"></i>
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <i class="fa fa-dribbble" aria-hidden="true"></i>
                            </a>
                        </li>
                    </ul>

                </div>

            </div>
            <div class="col-md-9 right">
                <div class="profile-main">
                    <div class="profile-about">
                        <div class="about-head">
                            <h3>
                                <i class="fa fa-user-o" aria-hidden="true"></i>
                                About me
                            </h3>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. At beatae facere magni porro!
                                Explicabo in quaerat reprehenderit similique vero. Asperiores, consequatur consequuntur
                                dolore doloremque labore nostrum placeat ratione repellat sit! Lorem ipsum dolor sit
                                amet, consectetur adipisicing elit. Animi deleniti dolor, dolores doloribus eaque eos
                                est in inventore laudantium mollitia necessitatibus numquam, perspiciatis provident,
                                quam quod sed similique unde ut.
                            </p>
                        </div>
                        <div class="about-bottom col-md-6">
                            <h3>User details</h3>
                            <table>
                                <tbody>
                                <tr>
                                    <td class="td-1">First Name</td>
                                    <td class="td-2">:</td>
                                    <td class="td-3">USer name</td>
                                </tr>
                                <tr>
                                    <td class="td-1">Last Name</td>
                                    <td class="td-2">:</td>
                                    <td class="td-3">User last name</td>
                                </tr>
                                <tr>
                                    <td class="td-1">Address</td>
                                    <td class="td-2">:</td>
                                    <td class="td-3">Lorem ipsum dolor sit amet,</td>
                                </tr>
                                <tr>
                                    <td class="td-1">Zip Code</td>
                                    <td class="td-2">:</td>
                                    <td class="td-3">1111111</td>
                                </tr>
                                <tr>
                                    <td class="td-1">Phone</td>
                                    <td class="td-2">:</td>
                                    <td class="td-3">++11111 000-000</td>
                                </tr>
                                <tr>
                                    <td class="td-1">Email</td>
                                    <td class="td-2">:</td>
                                    <td class="td-3">mail@example.com</td>
                                </tr>
                                <tr>
                                    <td class="td-1">Website</td>
                                    <td class="td-2">:</td>
                                    <td class="td-3">http://wwwwwwww.com</td>
                                </tr>

                                </tbody>
                            </table>

                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="profile-skills">
                        <div class="skill-head">
                            <h3>
                                <i class="fa fa-lightbulb-o" aria-hidden="true"></i>
                                My Skills
                            </h3>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet, consequuntur dolore
                                eligendi ex excepturi fuga in iusto laboriosam molestiae molestias natus numquam
                                obcaecati optio sapiente sequi similique tempora tenetur veniam! Lorem ipsum dolor sit
                                amet, consectetur adipisicing elit?
                            </p>
                        </div>
                        <div class="skill-bottom">
                            <ul class="skill-tag">
                                <li class="tag-item tag-icon">
                                    <i class="fa fa-tags" aria-hidden="true"></i>
                                </li>
                                <li class="tag-item"><a href="#">#lorem</a></li>
                                <li class="tag-item"><a href="#" class="active">#lorem</a></li>
                                <li class="tag-item"><a href="#">#lorem</a></li>
                                <li class="tag-item"><a href="#">#lorem ipsum</a></li>
                                <li class="tag-item"><a href="#">#lorem</a></li>
                                <li class="tag-item"><a href="#">#lorem lorem</a></li>
                            </ul>
                            <div class="clearfix"></div>
                            <div class="prof-skills">
                                <h3>professional skills</h3>
                                <div class="skill_progress">
                                    <div class="row">
                                        <div class="col-md-6 col-xs-12">
                                            <div class="single">
                                                <div class="skilled-tittle">Lorem</div>
                                                <div class="progress">
                                                    <div class="progress-bar bar-blue">
                                                        <span class="percent">90%</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="single">
                                                <div class="skilled-tittle">Lorem</div>
                                                <div class="progress">
                                                    <div class="progress-bar bar-green">
                                                        <span class="percent">60%</span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="single">
                                                <div class="skilled-tittle">Lorem</div>
                                                <div class="progress">
                                                    <div class="progress-bar bar-red">
                                                        <span class="percent">75%</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="single">
                                                <div class="skilled-tittle">Lorem</div>
                                                <div class="progress">
                                                    <div class="progress-bar bar-black">
                                                        <span class="percent">80%</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="single">
                                                <div class="skilled-tittle">Lorem</div>
                                                <div class="progress">
                                                    <div class="progress-bar bar-orange">
                                                        <span class="percent">35%</span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="single">
                                                <div class="skilled-tittle">Lorem</div>
                                                <div class="progress">
                                                    <div class="progress-bar bar-brown">
                                                        <span class="percent">18%</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="profile-contact">
                        <div class="contact-head">
                            <h3>
                                <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                contact me
                            </h3>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. A accusamus, aliquid corporis
                                deserunt dignissimos dolore dolorum ex excepturi fugit harum itaque magni maiores,
                                nostrum numquam quasi qui reprehenderit repudiandae temporibus?
                            </p>
                        </div>
                        <div class="contact-bottom">
                            <div class="row">
                                <div class="col-md-6 col-xs-12">
                                    <div class="contact-left">

                                        <div class="cont-item phone">
                                            <h4>phone</h4>
                                            <div class="cont-numbers">
                                                <p>
                                                    <span>Mob.</span>+0 123456789
                                                </p>
                                                <p>
                                                    <span>Home</span>+0 123456789
                                                </p>
                                                <p>
                                                    <span>Skype</span>lorem
                                                </p>
                                            </div>
                                        </div>

                                        <div class="cont-item email">
                                            <h4>email</h4>
                                            <div class="cont-numbers">
                                                <p>mail@example.com</p>
                                                <p>mail@example.com</p>
                                            </div>
                                        </div>

                                        <div class="cont-item address">
                                            <h4>address</h4>
                                            <div class="cont-numbers">
                                                <p>Lorem ipsum Lorem ipsum  52/20</p>
                                                <p><a href="#" class="website">https:wwwww.com</a></p>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-6 col-xs-12">
                                    <div class="contact-right">
                                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13007070.354009148!2d-104.65387033028972!3d37.25828124582162!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x54eab584e432360b%3A0x1c3bb99243deb742!2z0KHQvtC10LTQuNC90LXQvdC90YvQtSDQqNGC0LDRgtGLINCQ0LzQtdGA0LjQutC4!5e0!3m2!1sru!2s!4v1518681776752" width="100%" height="380" frameborder="0" style="border:0" allowfullscreen></iframe>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    jQuery(document).ready(function ($) {
        $('.sublink').click(function(e) {
            e.preventDefault();

            var $this = $(this);

            if ($this.next().hasClass('show')) {
                $this.removeClass('active');
                $this.next().removeClass('show');
                $this.next().slideUp(0);
            }
            else {
                $('.sublink').removeClass('active');
                $this.addClass('active');
                $this.parent().parent().find('li .cute').removeClass('show');
                $this.parent().parent().find('li .cute').slideUp(0);
                $this.next().toggleClass('show');
                $this.next().slideToggle(0);

            }
        });
    });
</script>

</body>
</html>