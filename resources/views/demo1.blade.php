<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile user</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .profile-user {
            margin: 0 auto;
            text-align: center;
            border-bottom: 1px solid #00C6D7;
            padding: 43px 0 24px 0;
            background: #00C6D7;
        }

        .profile-user h2 {
            margin: 7px 0;
            color: #fff;
            font-size: 21px;
            font-weight: normal;
        }

        .profile-user img {
            border-radius: 50%;
            -o-border-radius: 50%;
            -webkit-border-radius: 50%;
            -moz-border-radius: 50%;
            border: 4px solid #119BA7;
            width: 130px;
            height: 130px;
            object-fit: cover;
        }

        .profile-user p {
            font-size: 14px;
            color: #048590;
        }
        .profile-section .inner-tittle{
            font-size: 2em;
            font-weight: 400;
            color: #333;
            margin-bottom: 0.7em;
            text-align: left;
        }
        .profile-section .main-grid {
            background: #fff;
            padding: 2em 2em;
            box-shadow: 0 1px 1px rgba(0,0,0,.05);
            -o-box-shadow: 0 1px 1px rgba(0,0,0,.05);
            -webkit-box-shadow: 0 1px 1px rgba(0,0,0,.05);
            -moz-box-shadow: 0 1px 1px rgba(0,0,0,.05);
            border: 1px solid #E7E7E8;
        }
        .profile-section .main-grid p, .profile-section .main-grid a{
            font-size: 0.95em;
            color: #777;
            line-height: 1.9em;
            text-decoration: none;
        }
        .profile-section .left .skills {
            margin: 0 0 15px 0;
            height: 10px;
            background: #052963;
        }
        .profile-section .left .skill1, .profile-section .left .skill2, .profile-section .left .skill3, .profile-section .left .skill4 {
            height: 100%;
            display: block;
            background-color: #00C6D7;
        }
        .profile-section .left .skill1{
            width: 100%;
        }
        .profile-section .left .skill2{
            width: 90%;
        }
        .profile-section .left .skill3{
            width: 73%;
        }
        .profile-section .left .skill4{
            width: 87%;
        }
        ul li{
            list-style: none;
        }
        .profile-section .right .timeline {
            list-style: none;
            padding: 10px 0 10px;
            position: relative;
        }
        .profile-section .right .timeline:before {
            top: 0;
            bottom: 0;
            position: absolute;
            content: " ";
            width: 1px;
            background-color: #ccc;
            left: 24px;
            margin-right: -1.5px;
        }
        .profile-section .right .timeline > li {
            margin-bottom: 10px;
            position: relative;
        }
        .profile-section .right .timeline > li:before, .timeline > li:after {
            content: " ";
            display: table;
        }
        .profile-section .right .timeline > li:after {
            clear: both;
        }
        .profile-section .right .timeline > li > .timeline-badge {
            color: #fff;
            width: 50px;
            height: 50px;
            line-height: 50px;
            font-size: 1.4em;
            text-align: center;
            position: absolute;
            top: 16px;
            left: 0;
            margin-right: -25px;
            background-color: #999999;
            z-index: 100;
            border-top-right-radius: 50%;
            border-top-left-radius: 50%;
            border-bottom-right-radius: 50%;
            border-bottom-left-radius: 50%;
        }
        .profile-section .right .timeline > li > .timeline-panel {
            width: calc( 100% - 75px );
            float: right;
            border: 1px solid #d4d4d4;
            padding: 10px 15px;
            position: relative;
            -webkit-box-shadow: 0 1px 6px rgba(0, 0, 0, 0.175);
            box-shadow: 0 1px 6px rgba(0, 0, 0, 0.175);
            background: #fff;
        }
        .profile-section .right .timeline > li > .timeline-panel:before {
            position: absolute;
            top: 18px;
            left: -15px;
            display: inline-block;
            border-top: 15px solid transparent;
            border-right: 15px solid #ccc;
            border-left: 0 solid #ccc;
            border-bottom: 15px solid transparent;
            content: " ";
        }
        .profile-section .right h4.timeline-title a {
            margin: 0;
            padding: 5px 0;
            color: #333;
        }
        .profile-section .rightp.time {
            font-size: 0.8em;
            color: #C2C7C7;
        }
        .profile-section .right.timeline-body p {
            font-size: 0.9em;
            margin: 0;
            padding: 0;
            color: #777;
        }
        .profile-section .right .timeline > li > .timeline-panel:after {
            position: absolute;
            top: 19px;
            left: -14px;
            display: inline-block;
            border-top: 14px solid transparent;
            border-right: 14px solid #fff;
            border-left: 0 solid #fff;
            border-bottom: 14px solid transparent;
            content: " ";
        }
        .profile-section .right .timeline-badge.info {
            background-color: #5bc0de !important;
        }
        .profile-section .right .timeline-badge.primary {
            background-color: #477aa5 !important;
        }
        .profile-section .right .timeline-badge.danger {
            background-color: #d23f43 !important;
        }
        .profile-section .right .timeline-badge.success {
            background-color: #1c9b94 !important;
        }
        .profile-section .right .timeline-badge.success {
            background-color: #1c9b94 !important;
        }
        .profile-section{
            margin: 25px 0;
        }
    </style>
</head>
<body>
<div class="profile-user">
    <div class="container">
        <div class="row">
            <img src="https://dnatesting.com/wp-content/uploads/2010/01/1-21-2009_IDG-Blog-1000x562.jpg" alt="">
            <h2>User name</h2>
            <p>Lorem lorem</p>
        </div>
    </div>
</div>
<div class="profile-section">
    <div class="container">
        <div class="row">
            <div class="col-md-6 left">
                    <h3 class="inner-tittle">Personal Information </h3>
                    <div class="main-grid">
                        <div class="main">
                            <div class="about-info">
                                <strong>Full Name</strong>
                                <br>
                                <p class="text-muted">User Name</p>
                            </div>
                            <div class="about-info">
                                <strong>Mobile</strong>
                                <br>
                                <p class="text-muted">(+111) 123 1234</p>
                            </div>
                            <div class="about-info">
                                <strong>Email</strong>
                                <br>
                                <p class="text-muted"><a href="#">mail@example.com</a></p>
                            </div>
                            <div class="about-info">
                                <strong>Location</strong>
                                <br>
                                <p class="text-muted">USA, NW</p>
                            </div>
                        </div>
                    </div>
                    <h3 class="inner-tittle">Biography </h3>
                    <div class="main-grid">
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                        <p>But also the leap into electronic typesetting, remaining essentially unchanged.</p>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
                    </div>
                    <h3 class="inner-tittle">Skills </h3>
                    <div class="main-grid">
                        <div class="bar">
                            <p>LOREM/LOREM</p>
                        </div>
                        <div class="skills">
                            <div class="skill1"> </div>
                        </div>
                        <div class="bar">
                            <p>LOREM / LOREM / LOREM</p>
                        </div>
                        <div class="skills">
                            <div class="skill2"> </div>
                        </div>
                        <div class="bar">
                            <p>LOREM</p>
                        </div>
                        <div class="skills">
                            <div class="skill3"> </div>
                        </div>
                        <div class="bar">
                            <p>LOREM</p>
                        </div>
                        <div class="skills">
                            <div class="skill4"> </div>
                        </div>
                    </div>
            </div>
            <div class="col-md-6 right">
                <h3 class="inner-tittle">Activity </h3>
                <div class="main-grid">
                    <ul class="timeline">
                        <li>
                            <div class="timeline-badge info"><i class="fa fa-smile-o"></i></div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4 class="timeline-title"><a href="#">Lorem name</a></h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="time">Today 4:21 pm</p>
                                    <p>Lorem ipsum lorem lorem</p>
                                </div>
                            </div>
                        </li>

                        <li>
                            <div class="timeline-badge primary"><i class="fa fa-star-o"></i></div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4 class="timeline-title"><a href="#">Lorem name</a></h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="time">Today 4:21 pmo</p>
                                    <p>Lorem ipsum lorem lorem</p>
                                </div>
                            </div>
                        </li>



                        <li>
                            <div class="timeline-badge danger"><i class="fa fa-times-circle-o"></i></div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4 class="timeline-title"><a href="#">Lorem name</a></h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="time">Today 4:21 pm</p>
                                    <p>Lorem ipsum lorem lorem</p>
                                </div>
                            </div>
                        </li>

                        <li>
                            <div class="timeline-badge success"><i class="fa fa-check-circle-o"></i></div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4 class="timeline-title"><a href="#">Lorem name</a></h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="time">Today 4:21 pm</p>
                                    <p>Lorem ipsum lorem lorem</p>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <h3 class="inner-tittle">My Office </h3>
                <div class="main-grid">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13007070.354009148!2d-104.65387033028972!3d37.25828124582162!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x54eab584e432360b%3A0x1c3bb99243deb742!2z0KHQvtC10LTQuNC90LXQvdC90YvQtSDQqNGC0LDRgtGLINCQ0LzQtdGA0LjQutC4!5e0!3m2!1sru!2s!4v1518614604719" width="100%" height="250" frameborder="0" style="border:0" allowfullscreen></iframe>
                    <div class="gmap-info">
                        <h4> <i class="fa fa-map-marker"></i> <b><a href="#" class="text-dark">Lorem ipsum USA.NW</a></b></h4>
                        <p>No. 0,City - City, </p>
                        <p>Street 25/65 lorem</p>
                        <p>USA, NN</p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>