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

        .profile-left-menu a{
            text-decoration: none;
        }
        .profile-left-menu ul{
            list-style: none;
            margin: 0;
            padding: 0;
        }
        .profile-left-menu .profile-img img{
            width:100%;
            height: 300px;
            object-fit: cover;
        }
        .profile-left-menu .menu{
            background-color: orange;
            height:100%;
        }
        .profile-left-menu {
            display: flex;
            flex-direction: column;
            height:100%;
        }
        .profile-left-menu .menu li a{
            display: block;
            padding: 15px;
            text-align: center;
            background-color: orange;
            color: white;
            border-bottom: 1px solid #ffffff;
            transition: 0.5s ease;
            font-size: 18px;
            font-weight: bold;
        }
        .profile-left-menu .menu li a:hover{
            background-color: #d28900;
        }
    </style>

</head>
<body>

<div class="col-md-3">
    <div class="profile-left-menu">
        <div class="profile-img">
            <img src="https://images.pexels.com/photos/874158/pexels-photo-874158.jpeg?auto=compress&cs=tinysrgb&h=350" alt="img">
        </div>
        <div class="menu">
            <ul>
                <li><a href="">General</a></li>
                <li><a href="">Pages</a></li>
                <li><a href="">My Media</a></li>
                <li><a href="">Uploads</a></li>
            </ul>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>
</body>
</html>