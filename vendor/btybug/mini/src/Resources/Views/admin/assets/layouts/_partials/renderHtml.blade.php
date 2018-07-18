<head>
    <!-- ================== BEGIN BASE CSS STYLE ================== -->
{!! BBgetProfileAssets(false,'css','headerCss') !!}
{!! BBCss()  !!}
<!-- ================== END BASE CSS STYLE ================== -->

    <!-- ================== BEGIN PAGE LEVEL CSS STYLE ================== -->
{!! getCss() !!}
<!-- ================== END PAGE LEVEL CSS STYLE ================== -->



    <!-- ================== BEGIN BASE JS ================== -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
{!! BBgetProfileAssets(false) !!}
{!!  BBJs() !!}
<!-- ================== END BASE JS ================== -->

    <!-- ================== BEGIN PAGE LEVEL JS ================== -->
{!! getHeaderJs() !!}
<!-- ================== END PAGE LEVEL JS ================== -->

    {!! HTML::style('public/css/cms.css') !!}
    {!! HTML::style("public/css/bty.css?v=".rand('1111','9999')) !!}
    {!! getCss() !!}
    <style>
        .settings-bottom {
            position: fixed;
            bottom: 0;
            width: 100%;
            background-color: rgba(0, 0, 0, 0.76);
            /*height: 220px;*/
            color: white;
            z-index: 999;
        }

        .settings-bottom .head {
            display: flex;
            justify-content: space-between;
            padding: 15px;
            color: white;
            background-color: #090909;
            cursor: n-resize;
        }

        .settings-bottom .head a {
            color: white;
        }

        .settings-bottom .content .left, .settings-bottom .content .right {
            overflow-x: auto;
            height: 170px;
            padding: 10px;
        }

        .settings-bottom .content {
            height: 170px;
        }

        .settings-bottom .content.hide {
            height: 0;
            overflow: hidden;
        }

        .settings-bottom .content .left::-webkit-scrollbar-track, .settings-bottom .content .right::-webkit-scrollbar-track {
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
            background-color: #F5F5F5;
        }

        .settings-bottom .content .left::-webkit-scrollbar, .settings-bottom .content .right::-webkit-scrollbar {
            width: 6px;
            background-color: #F5F5F5;
        }

        .settings-bottom .content .left::-webkit-scrollbar-thumb, .settings-bottom .content .right::-webkit-scrollbar-thumb {
            background-color: #000000;
        }

        .settings-bottom .content > .container-fluid > .row > [class*="col-"] {
            padding: 0;
        }

        .settings-bottom .content .left ul {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .settings-bottom .content .left ul li > div {
            background-color: #090909;
            border: 1px solid #fff;
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 8px;
            cursor: pointer;
            -webkit-transition: 0.5s ease;
            -moz-transition: 0.5s ease;
            -ms-transition: 0.5s ease;
            -o-transition: 0.5s ease;
            transition: 0.5s ease;
        }

        .settings-bottom .content .left ul li > div:hover, .pl-item.hover-cl {
            background-color: #fff !important;
            color: black;
        }

        .closeCSSEditor.top-show i {
            transform: rotate(180deg);
        }

        .settings-bottom .content > .container-fluid, .settings-bottom .content > .container-fluid > .row, .settings-bottom .content > .container-fluid > .row > [class*="col-"],
        .settings-bottom .content > .container-fluid > .row > [class*="col-"] > div {
            height: 100%;
        }

        body::-webkit-scrollbar-track
        {
            -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
            background-color: #F5F5F5;
        }

        body::-webkit-scrollbar
        {
            width: 6px;
            background-color: #F5F5F5;
        }

        body::-webkit-scrollbar-thumb
        {
            background-color: #000000;
        }
    </style>
</head>

<body style="transform: scale(0.7);margin-top: -50px;">
{!! $layout->render() !!}
<!-- ================== BEGIN BASE FOOTER JS ================== -->
{!! BBgetProfileAssets(false,'js','footerJs') !!}
<!-- ================== END FOOTER JS ================== -->

<!-- ================== BEGIN FOOTER PAGE LEVEL JS ================== -->
{!! getFooterJs() !!}
<!-- ================== END FOOTER PAGE LEVEL JS ================== -->

{!! getFooterJs() !!}
{!! BBscriptsHook() !!}
</body>
