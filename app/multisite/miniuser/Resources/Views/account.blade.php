@extends('mini::layouts.app')
@section('content')
    <div class="add-unit text-right mb-2">
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
            <div class="col-lg-8 droppable1">
                <!-- begin panel -->
               
            </div>
            <!-- end col-8 -->
            <!-- begin col-4 -->
            <div class="col-lg-4 droppable2">
               
                <!-- begin panel -->
               
                <!-- end panel -->

                <!-- begin panel -->
                
                <!-- end panel -->

                <!-- begin panel -->
                
                <!-- end panel -->
            </div>
            <!-- end col-4 -->
        </div>
        <ul class="right-side" style="width: 200px; height: 500px; background-color: yellow;  position:fixed; right:0px; margin-right: -200px; top: 0">
                    
            <!-- <div class="item draggable">012</div>
            <div class="item draggable">345</div>
            <div class="item draggable">678</div>
            <div class="item draggable">910</div>
            <div class="item draggable">910</div>
            <div class="item draggable">910</div>
            <div class="item draggable">910</div>
            <div class="item draggable">910</div> -->
</ul>
        <!-- end row -->
    <!-- end #content -->
   <style>
       .right-side,.add-unit-btn {
         transition: all 600ms cubic-bezier(0.47, 0, 0.745, 0.715); 

       }

       #droppable {
           min-height: 500px;
       }

   </style>
@endsection


@section('js')
    {!! HTML::script('public/js/add-unit.js') !!}
@stop

