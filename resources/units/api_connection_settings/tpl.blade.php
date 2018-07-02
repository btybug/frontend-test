{!! BBstyle($_this->path.DS.'css/style.css',$_this) !!}
{!! BBstyle('public/libs/tagsinput/bootstrap-tagsinput.css',$_this) !!}
@php
    $params = \Request::route()->parameters();
    $client=null;
    $url='javascript::void(0)';
    if(isset($params['param'])){
        $clientId=$params['param'];
        $url=url('/oauth/clients/',$clientId);
        $client=\Laravel\Passport\Client::find($clientId);
    }
    $appProductsRepository=new \Btybug\Uploads\Repository\AppProductRepository();
$products=$appProductsRepository->allConnectedToClient($clientId);
@endphp

<div id="exTab1" class="container custom_tabs">
    <ul class="nav nav-pills">
        <li class="active">
            <a href="#general" data-toggle="tab" aria-expanded="true">General</a>
        </li>
        <li>
            <a href="#modal" data-toggle="tab">Modal</a>
        </li>
        <li>
            <a href="#products" data-toggle="tab">Products</a>
        </li>
        <li>
            <a href="#code" data-toggle="tab">Code</a>
        </li>
    </ul>

    <div class="tab-content clearfix">
        <div class="tab-pane active" id="general">
            {!! Form::model($client,['url'=>$url]) !!}
            <div class="custom_general_content">
                <div class="form-group">
                    <div class="col-md-6">
                        <label>App ID</label>
                        {!! Form::text('id',null,['readonly','class'=>'form-control']) !!}
                    </div>
                    <div class="col-md-6">
                        <label>App Secret</label>
                        {!! Form::text('secret',null,['readonly','class'=>'form-control']) !!}
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="form-group">
                    <div class="col-md-6">
                        <label>Displae Name</label>
                        {!! Form::text('name',null,['class'=>'form-control']) !!}
                    </div>
                    <div class="col-md-6">
                        <label>Redirect Url</label>
                        {!! Form::text('redirect',null,['class'=>'form-control']) !!}
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="form-group">
                    <div class="col-md-6">
                        <label>Terms of Service URl</label>
                        <input type="url" class="form-control">
                    </div>
                </div>
                <div class="text-right col-md-12">
                    <button class="btn btn-success">Save</button>
                </div>
                <div class="clearfix"></div>

            </div>
            {!! Form::close() !!}
        </div>
        <div class="tab-pane " id="modal">
            {!! Form::model($client,['url'=>$url]) !!}
            <div class="custom_general_content">

                <div class="form-group">

                    <div class="col-md-6">
                        <label>Namespace</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="form-group">

                    <div class="col-md-6">
                        <label>Contact Email</label>
                        <input type="email" class="form-control">
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="form-group">
                    <div class="col-md-6">
                        <label>Private Police URL</label>
                        <input type="url" class="form-control">
                    </div>

                    <div class="clearfix"></div>
                </div>
                <div class="form-group">
                    <div class="col-md-6">
                        <label>App Icon</label>
                        <div class="d-flex">
                            <input type="text" class="form-control">
                            <button class="btn btn-md btn-info">Upload</button>
                        </div>


                    </div>
                    <div class="col-md-6">
                        <label>Category</label>
                        <select name="" id="" class="form-control">
                            <option value="">Business and Pages</option>
                            <option value="">2</option>
                            <option value="">3</option>
                        </select>
                        <p class="custom_info">Find out more information about app categories here</p>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="text-right col-md-12">
                    <button class="btn btn-success">Save</button>
                </div>
                <div class="clearfix"></div>

            </div>
            {!! Form::close() !!}
        </div>
        <div class="tab-pane " id="products">
            <div class="row">

                <div class="main_lay_cont">
                    <div class="layouts_row">
                        @if(count($products))
                            @foreach($products as $product)
                                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 items_links">


                                    <div  class="ly_items">
                                        <div class="col-md-12">
                                            <span>ON/OFF</span> <input type="checkbox" @if($product->connection_status) checked @endif data-role="on_off" value="{!! $product->id !!}">
                                        </div>
                                        <h3>{{ $product->name }}</h3>
                                        <h2><i class="fa fa-columns" aria-hidden="true"></i></h2>
                                    </div>
                                    <div class="custom_btn">
                                        <a href="{!! url("/my-account/developers/connections/$clientId/edit-product/$product->id") !!}" data-settings="{!! $product->id !!}" class="btn btn-settings  @if(!$product->connection_status) not-active @endif"><i class="fa fa-edit"></i></a>
                                    </div>
                                </div>
                            @endforeach
                        @endif

                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane " id="code">
            <h3>Code</h3>
        </div>
    </div>
</div>
<input type="hidden" name="client_id" id="client_id" value="{!! $clientId !!}">
{!! HTML::style('public/css/new-store.css') !!}
{!! HTML::style('public/css/backend_layouts_style.css') !!}
<style>
    .pages.col-md-5 {
        border: 1px solid black;
        border-radius: 8px;
        text-align: center;
        height: 200px;
        background: antiquewhite;
        padding-top: 72px;
        margin: 7px;
        font-size: xx-large;
        font-family: fantasy;
    }
    .btn-settings{
        background: #0a6640;
        color: white;
    }
    .not-active {
        pointer-events: none;
        cursor: default;
        text-decoration:none;
        color:black;
        background: #a9a8a8;
    }
    .add-product {
        background: black !important;
        color: white !important;
        border: 0;
    }

    .add-product h3, .add-product h2 {
        color: #ffffff !important;
    }

    .custom_btn {
        display: flex;
    }

    .custom_btn a {
        width: 100%;
        border-radius: 0;
    }

    .layouts_row .ly_items {
        width: 100%;
        border-radius: 0;
        margin: 0 !important;
    }
</style>

{!! BBscript('public/libs/tagsinput/bootstrap-tagsinput.min.js',$_this) !!}
{!! BBscript($_this->path.DS.'js'.DS.'custom.js',$_this) !!}


<script>
    window.onload = function () {
        $(".app_domain_custom").tagsinput('items');
    };
</script>
