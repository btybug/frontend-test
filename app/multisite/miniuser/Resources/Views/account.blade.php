@extends('mini::layouts.app')
@section('content')
    <div class="add-unit text-right mb-2">
        <button type="button" class="btn btn-outline-dark btn-lg save-unit ml-3" style="float: right; opacity: 1; display: block" >Save</button>
        <button type="button" class="btn btn-outline-dark btn-lg add-unit-btn">Add unit<i class="fas fa-plus"></i></button>
    </div>
    <!-- begin #content -->

        <!-- begin breadcrumb -->
        <ol class="breadcrumb pull-right">
            <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
        <!-- end breadcrumb -->
        <!-- begin page-header -->
        <h1 class="page-header">Dashboard <small>header small text goes here...</small></h1>
        <!-- end page-header -->

        <!-- begin row -->
        <div class="row">
            <!-- begin col-3 -->
            <div class="col-lg-3 col-md-6">
                <div class="widget widget-stats bg-red">
                    <div class="stats-icon"><i class="fa fa-desktop"></i></div>
                    <div class="stats-info">
                        <h4>TOTAL VISITORS</h4>
                        <p>3,291,922</p>
                    </div>
                    <div class="stats-link">
                        <a href="javascript:;">View Detail <i class="fa fa-arrow-alt-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <!-- end col-3 -->
            <!-- begin col-3 -->
            <div class="col-lg-3 col-md-6">
                <div class="widget widget-stats bg-orange">
                    <div class="stats-icon"><i class="fa fa-link"></i></div>
                    <div class="stats-info">
                        <h4>BOUNCE RATE</h4>
                        <p>20.44%</p>
                    </div>
                    <div class="stats-link">
                        <a href="javascript:;">View Detail <i class="fa fa-arrow-alt-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <!-- end col-3 -->
            <!-- begin col-3 -->
            <div class="col-lg-3 col-md-6">
                <div class="widget widget-stats bg-grey-darker">
                    <div class="stats-icon"><i class="fa fa-users"></i></div>
                    <div class="stats-info">
                        <h4>UNIQUE VISITORS</h4>
                        <p>1,291,922</p>
                    </div>
                    <div class="stats-link">
                        <a href="javascript:;">View Detail <i class="fa fa-arrow-alt-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <!-- end col-3 -->
            <!-- begin col-3 -->
            <div class="col-lg-3 col-md-6">
                <div class="widget widget-stats bg-black-lighter">
                    <div class="stats-icon"><i class="fa fa-clock"></i></div>
                    <div class="stats-info">
                        <h4>AVG TIME ON SITE</h4>
                        <p>00:12:23</p>
                    </div>
                    <div class="stats-link">
                        <a href="javascript:;">View Detail <i class="fa fa-arrow-alt-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <!-- end col-3 -->
        </div>
        <!-- end row -->
        <!-- begin row -->
        <div class="row" id="droppable">
            <!-- begin col-8 -->
            <div id="sortable1" class="col-lg-8 droppable1 connectedSortable">
                <!-- begin panel -->

            </div>
            <!-- end col-8 -->
            <!-- begin col-4 -->
            <div id="sortable2" class="col-lg-4 droppable2 connectedSortable">

                <!-- begin panel -->

                <!-- end panel -->

                <!-- begin panel -->

                <!-- end panel -->

                <!-- begin panel -->

                <!-- end panel -->
            </div>
            <!-- end col-4 -->
        </div>
        <ul class="right-side" >

        </ul>

        <!-- end row -->
    <!-- end #content -->

@endsection

@section('css')
    {!! HTML::style('public/minicms/plugins/jquery-jvectormap/jquery-jvectormap.css') !!}
    {!! HTML::style('public/minicms/plugins/bootstrap-datepicker/bootstrap-datepicker.css') !!}
    {!! HTML::style('public/minicms/plugins/gritter/jquery.gritter.css') !!}

@stop
@section('js')
    {!! HTML::script('public/minicms/plugins/gritter/jquery.gritter.js') !!}
    {!! HTML::script('public/minicms/plugins/flot/jquery.flot.min.js') !!}
    {!! HTML::script('public/minicms/plugins/flot/jquery.flot.time.min.js') !!}
    {!! HTML::script('public/minicms/plugins/flot/jquery.flot.resize.min.js') !!}
    {!! HTML::script('public/minicms/plugins/flot/jquery.flot.pie.min.js') !!}
    {!! HTML::script('public/minicms/plugins/sparkline/jquery.sparkline.js') !!}
    {!! HTML::script('public/minicms/plugins/jquery-jvectormap/jquery-jvectormap.min.js') !!}
    {!! HTML::script('public/minicms/plugins/jquery-jvectormap/jquery-jvectormap-world-mill-en.js') !!}
    {!! HTML::script('public/minicms/plugins/bootstrap-datepicker/bootstrap-datepicker.js') !!}
    {!! HTML::script('public/minicms/js/dashboard.js') !!}
    {!! HTML::script('public/minicms/js/pages/dashboard.js') !!}
    {!! HTML::script('public/js/add-unit.js') !!}
@stop

