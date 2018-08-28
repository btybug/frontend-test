@php
    $title = 'More Sites';
@endphp
@extends('mini::layouts.app',['index'=>'mini_more_sites'])
@section('content')

    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css"/>
        <div class="well">
            <div class="media">
                <a class="pull-left" href="#">
                    <img class="media-object" src="http://placekitten.com/150/150">
                </a>
                <div class="media-body">
                    <h2 class="media-heading">CV</h2>
                    <div class="col-md-4 pull-right">
                        <p><button class="col-md-4 btn btn-default">More</button></p>
                        <p><button class="col-md-4 btn btn-default">Activate</button></p>
                    </div>
                    <p class="col-md-8">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis pharetra varius quam sit amet vulputate.
                        Quisque mauris augue, molestie tincidunt condimentum vitae, gravida a libero. Aenean sit amet felis
                        dolor, in sagittis nisi. Sed ac orci quis tortor imperdiet venenatis. Duis elementum auctor accumsan.
                        Aliquam in felis sit amet augue.</p>
                    <ul class="list-inline list-unstyled">


                    </ul>
                </div>
            </div>
        </div>
    <br>
        <div class="well">
            <div class="media">
                <a class="pull-left" href="#">
                    <img class="media-object" src="http://placekitten.com/150/150">
                </a>
                <div class="media-body">
                    <h2 class="media-heading">CV</h2>
                    <div class="col-md-4 pull-right">
                        <p><button class="col-md-4 btn btn-default">More</button></p>
                        <p><button class="col-md-4 btn btn-default">Activate</button></p>
                    </div>
                    <p class="col-md-8">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis pharetra varius quam sit amet vulputate.
                        Quisque mauris augue, molestie tincidunt condimentum vitae, gravida a libero. Aenean sit amet felis
                        dolor, in sagittis nisi. Sed ac orci quis tortor imperdiet venenatis. Duis elementum auctor accumsan.
                        Aliquam in felis sit amet augue.</p>
                    <ul class="list-inline list-unstyled">


                    </ul>
                </div>
            </div>
        </div>
    <br>



@stop
@section('css')
    <style>
        body{padding-top:30px;}

        .glyphicon {  margin-bottom: 10px;margin-right: 10px;}

        small {
            display: block;
            line-height: 1.428571429;
            color: #999;
        }
    </style>
@stop
