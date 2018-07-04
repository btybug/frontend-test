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

        .user-details{
            padding: 50px 0;
            border-bottom: 2px solid #484848;
        }
        .user-details>.row{
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
        }
        .user-details .user-img img{
            width:200px;
            height:200px;
            object-fit: cover;
            border-radius: 50%;
        }
        .user-details .user-img {
            text-align: center;
            overflow: hidden;
        }
        .user-details .details{
            height:100%;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            align-items: center;

        }

        .user-details .details>div{
            border: 3px solid #484848;
            width: 100%;
            padding: 20px;
            padding-left: 0;
            border-left: none;
        }
        .posts{
            padding: 30px 100px !important;
        }
        .dis-flex{
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
        }
        .dis-flex>div>div{
            min-height: 490px;
            height:100%;
            border: 1px solid #484848;
            padding:15px;
        }
    </style>

</head>
<body>

<div class="container-fluid">
    <div class="user-details">
        <div class="row">
            <div class="col-md-2">
                <div class="user-img">
                    <img src="https://www.onlineuzaktanegitim.com/uploads/users/1.png" alt="img">
                </div>

            </div>
            <div class="col-md-10">
                <div class="details">
                    <div>
                        <h2>{!! $user->username !!}</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet asperiores cum distinctio
                            dolorem,
                            enim fugiat, labore nesciunt optio recusandae, repellendus sit velit voluptatem voluptates?
                            A
                            architecto dicta quasi quo vel.</p>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#home">Tab 1</a></li>
        <li><a data-toggle="tab" href="#menu1">Blog (all posts)</a></li>
    </ul>

    <div class="tab-content">
        <div id="home" class="tab-pane fade in active">
            <div class="row dis-flex">
                <div class="col-md-2 col-xs-12">
                    <div class="ads">
                        Our Ads
                    </div>
                </div>
                <div class="col-md-8 col-xs-12">
                    <div class="posts">
                        <div class="row dis-flex">
                            <div class="col-md-6 col-xs-12">
                                <div class="post">
                                    post1
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda blanditiis dolor, earum facere, fugiat id nulla possimus quae quidem vel veritatis voluptates. Aperiam, commodi debitis eius necessitatibus obcaecati perferendis tenetur.
                                </div>

                            </div>
                            <div class="col-md-6 col-xs-12">
                                <div class="post">
                                    post2
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. A ad, aliquam, asperiores assumenda autem blanditiis dignissimos eius esse ex expedita fugiat magni nam praesentium quisquam repellat soluta tempore temporibus voluptatum!
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 col-xs-12">
                    <div class="ads">
                        Our Ads
                    </div>
                </div>
            </div>
        </div>
        <div id="menu1" class="tab-pane fade">
            <h3>Menu 1</h3>
            <p>Some content in menu 1.</p>
        </div>

    </div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>
</body>
</html>