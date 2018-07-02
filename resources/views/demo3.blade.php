<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile user 3</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        ul, li {
            list-style: none;
        }

        .img-head img {
            width: 100%;
            height: 450px;
            object-fit: cover;
        }

        .section-profile .profile-user {
            position: relative;
            top: 0;
            background-color: #eeeeee7a;
        }

        .section-profile .profile-user .profile-img {
            text-align: center;
            position: absolute;
            top: -120px;
            left: 0;
            right: 0;
        }

        .section-profile .profile-user .profile-img img {
            width: 210px;
            height: 210px;
            object-fit: cover;
            border-radius: 50%;
            border: 2px solid #fff;
            box-shadow: 0 0 3px 0;
        }

        .section-profile .profile-user .profile-name {
            text-align: center;
            padding: 100px 10px 40px 10px;
        }

        .section-profile .profile-user .profile-name h2 {
            font-size: 34px;
            margin-bottom: 10px;
            margin-top: 0;
            padding: 0;
            color: #111111;
        }

        .section-profile .profile-user ul.social-btn {
            width: 100%;
            padding: 50px 10px;
            text-align: center;
            margin: 0;
        }

        .section-profile .profile-user ul.social-btn li {
            margin: 5px;
            width: 35px;
            height: 35px;
            border-radius: 100%;
            display: inline-block;
            background-color: #477aa5;
            transition: opacity 0.4s ease;
        }

        .section-profile .profile-user ul.social-btn li a {
            width: 100%;
            height: 100%;
            display: block;
            color: #ffffff;
            line-height: 35px;
            text-align: center;

        }

        .section-profile .profile-user .profile-menu {
            background: #FBFBFC;
            padding: 0;
        }

        .section-profile .profile-user .profile-menu ul {
            padding: 0;

        }

        .section-profile .profile-user .profile-menu ul a {
            text-indent: 2em !important;
        }

        .section-profile .profile-user .profile-menu li > a {
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

        .section-profile .profile-user .profile-menu .sublink.active, .profile-user .profile-menu a:hover {
            background-color: #cacaca;
            color: white;
        }

        .section-profile .profile-user .profile-menu a i {
            float: right;
            margin: 20px 20px 0 0;
        }

        .section-profile .profile-user .profile-menu .sublink.active i {
            -webkit-transform: rotate(-90deg);
            transform: rotate(-90deg);
            -moz-transform: rotate(-90deg);
            -o-transform: rotate(-90deg);
            -ms-transform: rotate(-90deg);
            margin-top: 30px;
        }

        .section-profile .profile-user .profile-menu .cute {
            overflow: hidden;
            display: none;
            position: absolute;
            right: -155px;
            top: 0;
            background-color: #f6f6f6;
            z-index: 1;
            width: 155px;
        }

        .section-profile .profile-user .profile-menu .item {
            position: relative;
        }

        .section-profile .profile-user ul.social-btn li:hover {
            background-color: rgb(71, 122, 165);
            opacity: 1;
        }

        .section-profile .profile-more .more-head h3 {
            font-size: 46px;
            border-bottom: 1px solid #ccc;
            padding-bottom: 4px;

        }

        .section-profile .profile-more .more-head p {
            font-size: 16px;
            line-height: 25px;
            color: #828c93;
        }

        .section-profile .profile-more .more-bottom h3 {
            text-align: center;
            font-size: 33px;
            margin: 20px 0;
        }

        .section-profile .profile-more .more-bottom .what-do {
            width: 80%;
            margin: 0 auto;
        }

        .section-profile .profile-more .more-bottom .what-do .icon {
            background-color: #2d8de0;
            width: 90px;
            height: 90px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 25px;
        }

        .section-profile .profile-more .more-bottom .what-do h4 {
            font-size: 24px;
            line-height: 24px;
            margin-top: 0;
            color: #2d8de0;
        }

        .section-profile .profile-more .more-bottom .what-do p {
            font-weight: 300;
            font-style: normal;
            color: #3b668d;
            font-size: 16px;
            line-height: 1.6;
            letter-spacing: 0;
        }

        .section-profile .profile-more .more-bottom .what-do article {
            margin-bottom: 12px;
        }

        .section-profile .profile-more .more-bottom .what-do article:last-of-type .icon {
            background-color: #a9c5d5;
        }

        .section-profile .profile-more .more-bottom .what-do article:last-of-type h4 {
            color: #a9c5d5;
        }

        section.education {
            background: #e5f4fd;
            padding: 95px 0;
        }

        section.education .left .single .day {
            font-weight: 700;
            font-style: normal;
            font-family: sans-serif;
            color: #258ce4;
            font-size: 20px;
            line-height: 1.2;
            letter-spacing: 0;
        }

        section.education .left .single .title {
            font-weight: 700;
            font-style: normal;
            color: #153b5d;
            font-size: 26px;
            line-height: 1.5;
            letter-spacing: 0;
        }

        section.education .left .single .status {
            font-weight: 300;
            font-style: normal;
            color: #3b668d;
            font-size: 16px;
            line-height: 1.6;
            letter-spacing: 0;
        }

        section.education .left .single {
            margin-bottom: 30px;
        }

        section.education .left .single .license {
            padding: 0;
        }

        section.education .left .single .license li {
            margin-bottom: 6px;
            position: relative;
        }

        section.education .left .single .license li span {
            color: #124e80;
            font-weight: 300;
            font-style: normal;
            font-size: 16px;
            line-height: 1.6;
            letter-spacing: 0;
            margin-left: 25px;
        }

        section.education .left .single .license li:before {
            width: 8px;
            height: 8px;
            border-radius: 8px;
            background: #258ce4;
            position: absolute;
            content: '';
            transition: .3s;
            left: 0;
            top: 50%;
            -webkit-transform: translate(0, -50%);
            transform: translate(0, -50%);
        }

        section.education .right {
            height: 550px;
            border: 8px solid #A9C5D5;
        }

        section.education .right .inside {
            margin: 20px;
            background-color: #1A517D;
            height: calc(100% - 40px);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        section.education .right .inside .more {
            display: flex;
            font-size: 50px;
            flex-direction: column;
            align-items: center;
            text-transform: uppercase;
        }

        section.skills {
            padding: 95px 0;
        }

        section.skills .text {
            font-weight: 300;
            font-style: normal;
            color: #3b668d;
            font-size: 16px;
            line-height: 1.6;
            letter-spacing: 0;
        }

        section.skills .title {
            font-weight: 300;
            font-style: normal;
            color: #153b5d;
            font-size: 40px;
            line-height: 1;
            letter-spacing: 0;
            margin-bottom: 35px;
        }

        section.skills .experience ul {
            padding: 0;
        }

        section.skills .experience ul li {
            margin-bottom: 6px;
            position: relative;
        }

        section.skills .experience ul li span {
            color: #124e80;
            font-weight: 300;
            font-style: normal;
            font-size: 16px;
            line-height: 1.6;
            letter-spacing: 0;
            margin-left: 25px;
        }

        section.skills .experience ul li:before {
            width: 8px;
            height: 8px;
            border-radius: 8px;
            background: #258ce4;
            position: absolute;
            content: '';
            transition: .3s;
            left: 0;
            top: 50%;
            -webkit-transform: translate(0, -50%);
            transform: translate(0, -50%);
        }

        section.skills .lang {
            margin-top: 50px;
        }

        section.contact .left {
            background-color: #2C8DDF;
            height: 500px;
        }

        section.contact .right {
            background-color: #E4F4FC;
            height: 500px;
        }

        section.contact .left .contact-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            height: 100%;
            font-size: 50px;
            /*position: relative;*/
        }

        section.contact .left .contact-icon:after {
            content: '';
            height: 2px;
            background-color: #fff;
            position: absolute;
            right: 0;
            width: 20%;
        }

        section.contact .left .contact-icon > div {
            margin-left: 10px;
        }

        section.contact .right .contact-form {
            padding: 30px 0;
            width: 62%;
        }

        section.contact .right .contact-form .form-control {
            color: #b2cad9;
            font-weight: 300;
            border-color: #b2cad9;
            font-size: 16px;
            padding: 10px 22px;
            line-height: normal;
            height: 46px;
            outline: none;
            border-radius: 0;

        }

        section.contact .right .contact-form .form-control:focus {
            box-shadow: none;
        }

        section.contact .right .contact-form button {
            position: relative;
            text-align: center;
            z-index: 1;
            border-width: 2px;
            border-style: solid;
            border-radius: 30px;
            padding: 14px 10px;
            min-width: 229px;
            font-size: 16px;
            font-weight: 300;
            font-style: normal;
            color: #ffffff;
            background-color: #124e80;
            border-color: #124e80;
            outline: none;
            transition: 0.4s ease;
        }

        section.contact .right .contact-form textarea {
            height: 120px !important;
        }

        section.contact .right .contact-form button:hover {
            background-color: #2d8de0;
            border-color: #2d8de0;
        }

        section.contact .right .contact-info {
            font-size: 16px;
            width: 62%;
        }

        section.contact .right .contact-info p i {
            color: #258ce4;
            margin-right: 15px;
        }

        section.contact .right .contact-info p span {
            color: #777;
        }

        section.contact .right input::-webkit-input-placeholder {
            color: #ccc;
        }

        section.contact .right input::-moz-placeholder {
            color: #ccc;
        }

        section.contact .right input:-ms-input-placeholder {
            color: #ccc;
        }

        section.contact .right input:-moz-placeholder {
            color: #ccc;
        }

        section.contact .right textarea::-webkit-input-placeholder {
            color: #ccc;
        }

        section.contact .right textarea:-moz-placeholder {
            color: #ccc;
        }

        section.contact .right textarea::-moz-placeholder {
        / color: #ccc;
        }

        section.contact .right textarea:-ms-input-placeholder {
            color: #ccc;
        }

    </style>
</head>
<body>
<section class="img-head">
    <img src="http://s1.picswalls.com/wallpapers/2016/03/29/beautiful-nature-hd-wallpaper_042322367_304.jpg" alt="">
</section>
<section class="section-profile">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="profile-user">
                    <div class="profile-img">
                        <img src="https://dnatesting.com/wp-content/uploads/2010/01/1-21-2009_IDG-Blog-1000x562.jpg"
                             alt="">
                    </div>
                    <div class="profile-name">
                        <h2>User name</h2>
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
                                <i class="fa fa-instagram" aria-hidden="true"></i>
                            </a>
                        </li>

                    </ul>

                </div>
            </div>
            <div class="col-md-9">
                <div class="profile-more">
                    <div class="more-head">
                        <h3>
                            User Name
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
                    <div class="more-bottom ">
                        <h3>What I do</h3>
                        <div class="what-do">
                            <article>
                                <div class="col-md-2">
                                    <div class="icon">
                                        <i class="fa fa-camera"></i>
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <h4>Lorem ipsum dolor sit amet</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto debitis est
                                        nam provident quisquam sint sunt. Blanditiis earum eligendi est facere
                                        laboriosam libero maxime quaerat tempora unde voluptatem? Asperiores, odio!</p>
                                </div>
                                <div class="clearfix"></div>
                            </article>
                            <article>
                                <div class="col-md-2">
                                    <div class="icon">
                                        <i class="fa fa-image"></i>
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <h4>Lorem ipsum dolor sit amet</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto debitis est
                                        nam provident quisquam sint sunt. Blanditiis earum eligendi est facere
                                        laboriosam libero maxime quaerat tempora unde voluptatem? Asperiores, odio!</p>
                                </div>
                                <div class="clearfix"></div>
                            </article>
                        </div>


                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>

        </div>
    </div>
</section>
<section class="education">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-xs-12">
                <div class="left">
                    <div class="single">
                        <div class="day">June 2018</div>
                        <p class="title">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus, aperiam
                            blanditiis commod</p>
                        <p class="status">stady 2000-2018</p>
                    </div>
                    <div class="single">
                        <div class="day">June 2018</div>
                        <p class="title">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus, aperiam
                            blanditiis commod</p>
                        <p class="status">stady 2000-2018</p>
                    </div>
                    <div class="single">
                        <p class="title">Licenses and Certifications</p>
                        <ul class="license">
                            <li><span>Certificat 0000</span></li>
                            <li><span>Certificat ,Licenses 0000</span></li>
                            <li><span>Certificat 0000</span></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xs-12">
                <div class="right">
                    <div class="inside">
                        <div class="more">
                            <i class="fa fa-book"></i>
                            <div>
                                Education
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<section class="skills">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-xs-12">
                <div class="left">
                    <div class="single">
                        <div class="title"><strong>Skills</strong> and Expert</div>
                        <p class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus, aperiam
                            blanditiis commod
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda beatae, deserunt facere
                            fugit, iste, laudantium minus nobis officia repellat tempora temporibus veniam voluptate.
                            Delectus distinctio enim ipsam libero recusandae veniam.</p>
                        <p class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci assumenda
                            doloribus ea et
                            facere incidunt natus officiis omnis quasi, ratione, sequi totam. Eius facere id maiores
                            necessitatibus quae quas tempore?
                        </p>
                        <p class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci assumenda
                            doloribus ea et
                            facere incidunt natus officiis omnis quasi, ratione, sequi totam. Eius facere id maiores
                            necessitatibus quae quas tempore?
                        </p>
                    </div>

                </div>
            </div>
            <div class="col-md-6 col-xs-12">
                <div class="right">
                    <div class="experience">
                        <div class="title"><strong>Experience</strong> and Expert</div>
                        <ul>
                            <li><span>Professor USA</span></li>
                            <li><span>Professor Russia 2000-2005</span></li>
                            <li><span>Professor Canada 2000-2000</span></li>
                        </ul>
                    </div>
                    <div class="lang">
                        <div class="title"><strong>Languages</strong></div>
                        <p class="text">English - Native</p>
                        <p class="text">English - Native</p>
                        <p class="text">English - Native</p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<section class="contact">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 left">
                <div class="contact-icon">
                    <i class="fa fa-phone"></i>
                    <div>Contacts</div>
                </div>
            </div>
            <div class="col-md-6 right">
                <div class="contact-form">
                    <form action="">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="" id="" cols="30" rows="10"
                                      placeholder="Text"></textarea>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-info" type="submit">Send</button>
                        </div>
                    </form>
                </div>
                <div class="contact-info">
                    <p><i class="fa fa-home"></i><span>Lorem ipsum dolor sit amet 48/15</span></p>
                    <p><i class="fa fa-envelope"></i><span>mail@example.com</span></p>
                    <p><i class="fa fa-phone-square"></i><span>++11111 000-000</span></p>

                </div>
            </div>
        </div>
    </div>
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    jQuery(document).ready(function ($) {
        $('.sublink').click(function (e) {
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