
@php
    $params = \Request::route()->parameters();
    $client=null;
    $product = null;
    $url='javascript::void(0)';
    if(isset($params['param']) && isset($params['id'])){
        $clientId=$params['param'];
        $productId=$params['id'];
        $url=url('/oauth/clients/',$clientId);
        $client=\Laravel\Passport\Client::find($clientId);

          $appProductsRepository=new \Btybug\Uploads\Repository\AppProductRepository();

    $product=$appProductsRepository->find($productId);
    }

@endphp


<div class="tab">
    <button class="tablinks" onclick="openCity(event, 'default')" id="defaultOpen">Default Options</button>
    <button class="tablinks" onclick="openCity(event, 'data')">Data Manage</button>
    <button class="tablinks" onclick="openCity(event, 'Tokyo')">Usage</button>
</div>

<div id="default" class="tabcontent">
    <h3>Default Options</h3>
    <p>Default options form</p>
</div>

<div id="data" class="tabcontent">
    <h3>Data Manage</h3>
    <div>
        @if($product && View::exists($product->app->form_path))
            @include($product->app->form_path)
        @endif
    </div>
</div>

<div id="Tokyo" class="tabcontent">
    <h3>Documentation</h3>
    <p>SDK/USAGE</p>
</div>

{!! BBstyle($_this->path.DS.'css/style.css') !!}
{!! BBscript($_this->path.DS.'js'.DS.'custom.js',$_this) !!}

