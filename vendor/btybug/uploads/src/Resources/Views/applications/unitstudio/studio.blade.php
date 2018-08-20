<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {!! HTML::style('https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css') !!}

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css" integrity="sha384-v2Tw72dyUXeU3y4aM2Y0tBJQkGfplr39mxZqlTBDUZAb9BGoC40+rdFCG0m10lXk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/fontawesome.css" integrity="sha384-q3jl8XQu1OpdLgGFvNRnPdj5VIlCvgsDQTQB6owSOHWlAurxul7f+JpUOVdAiJ5P" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    {!! Html::style("public/css/form-builder/form-builder.css?m=m") !!}

    {!! HTML::script('public/js/jquery-3.2.1.min.js') !!}
    <!-- {!! HTML::script('public/css-studio/bootstrap-tagsinput.min.js') !!} -->

    {!! HTML::style("public/libs/jspanel/jspanel.min.css") !!}
    {!! HTML::script("public/libs/jspanel/jspanel.min.js") !!}
    {!! HTML::script("public/js/framework/jstree.min.js") !!}

    {!! HTML::style("public/libs/autocomplete/easy-autocomplete.min.css") !!}
    {!! HTML::style("public/libs/autocomplete/easy-autocomplete.themes.min.css") !!}
    {!! HTML::script("public/libs/autocomplete/jquery.easy-autocomplete.min.js") !!}
    {!! HTML::script("public/js/jquery-ui/jquery-ui.min.js") !!}
    {!! HTML::script("https://ilikenwf.github.io/jquery.mjs.nestedSortable.js") !!}
    {!! HTML::script("https://cdn.jsdelivr.net/npm/@shopify/draggable@1.0.0-beta.7/lib/draggable.bundle.js") !!}
    

    {!! HTML::script("public/libs/beautify/beautify-html.js") !!}

    {!! HTML::script('public/js/framework/he.js') !!}
    {!! HTML::style('public/js/framework/framework.css?rnd='. rand(999,9999)) !!}
    {!! HTML::style('public/js/framework/custom.css?rnd='. rand(999,9999)) !!}
    {!! HTML::style("public/css/formio/formio.full.min.css") !!}
    {!! HTML::style("public/css/formio/bootstrap.vertical-tabs.min.css") !!}
    {!! Html::style("public/css/font-awesome/css/font-awesome.min.css") !!}
    {!! Html::style("public/css-studio/bootstrap-tagsinput.css") !!}
    {!! Html::style("public/js/jquery-ui/jquery-ui.min.css") !!}
    {!! Html::style("public/js/framework/jstreemin.css") !!}
    
    <style>
  
    </style>
    <title>Document</title>
    <script>
        var ajaxUrl = {
            frameworkUrl: '{!! url("admin/framework") !!}/'
        };
    </script>
</head>
<body class="container-fluid d-flex flex-column h-100 align-items-center px-0">


<!-- CSS Output style -->
<style id="bbcc-custom-style"></style>

<header class="w-100">
    <div class="container-fluid">
        <div class="head-btn d-flex justify-content-between">
        <input type="text" placeholder="File name" class="form-control studio-name">
            <!-- Hobo2 -->
            <div>
            <ul class="nav nav-tabs preview-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="preview-tab" data-toggle="tab" bb-click="tabsItemClick" href="#preview" role="tab">
                        <i class="fa fa-eye"></i> Preview
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="form-tab" data-toggle="tab" bb-click="tabsItemClick" href="#form" role="tab">
                        <i class="fas fa-cogs"></i> Options
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="code-tab" data-toggle="tab" bb-click="tabsItemClick" href="#code" role="tab">
                        <i class="fa fa-code"></i> Full Code
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="styles-tab" data-toggle="tab" bb-click="tabsItemClick" href="#styles" role="tab">
                        <i class="fa fa-css3"></i> Styles
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="functions-tab" data-toggle="tab" bb-click="tabsItemClick" href="#functions" role="tab">
                        <i class="fa fa-code"></i> Functions
                    </a>
                </li>
                
            </ul>
            </div>
            <div>
            <button class="btn btn-danger btn-sm">Import</button>
                @if(isset($allData))
                    <button class="btn btn-info btn-sm saving-studio" data-exist="{{$allData->id}}">Save</button>
                @else
                    <button class="btn btn-info btn-sm saving-studio">Save</button>
                @endif

            </div>
        </div>
    </div>
</header>
<div class="w-100 text-right buttons-layers">
    
<div class="preview-area-selected">
    <button bb-click="editPHPCode" class="preview-area-selected-edit"><i class="fa fa-edit"></i></button>
</div>
<div class="code-head" >
            <button class="btn btn-warning btn-sm add-html-items">Add item</button>
            <button class="btn btn-warning btn-sm showLayers">Layers</button>
            <button class="btn btn-info btn-sm createHtml">HTML</button>
            <button class="btn btn-primary btn-sm createAssets">Assets</button>
            <div class="add-custom-layers" style="display: none;">
            <select name="custom-layer" class="form-control" id="custom-layer" >

            </select>
            <button bb-click="addHtmlTag"><i class="fa fa-plus"></i></button>
            </div>
        </div>
</div>
<div class="row grow w-100 ">
    <div class="col-12 p-0 content-width">
        <div class="h-100 d-flex flex-column">
            <div class="tab-content d-flex" style="flex: 1;">
                <div class="tab-pane fade h-100 w-100 show active" id="preview" role="tabpanel">
                    <div dnd-placeholder="main" class="preview-area"></div>
                </div>
                <div class="tab-pane fade h-100 w-100" id="code" role="tabpanel">
                    <div id="code-editor"></div>
                </div>
                <div class="tab-pane fade h-100 w-100" id="styles" role="tabpanel">
                    <div id="styles-area">styles</div>
                </div>
                <div class="tab-pane fade h-100 w-100" id="functions" role="tabpanel">
                    <div id="functions-area">functions</div>
                </div>

                <div class="tab-pane fade h-100 w-100" id="form" role="tabpanel">
                    <div id="full-form-editor">
                            <div class="form">
                            <div class="bb-form-header">
        <div class="row">
            <div class="col-md-12">
                <button type="button" class="panel-trigger pull-right add-unit" bb-click="openFieldsWindow">Add fields</button>
                <button type="button" class="panel-trigger pull-right add-custom-filed" bb-click="openStudioWindow"
                        data-main="global">Add custom filed
                </button>
                <button type="button" class="panel-trigger pull-right" bb-click="openLogicModal" data-toggle="modal"
                        data-target="#logicModal">Logic
                </button>

                <button type="button" class="panel-trigger pull-right" bb-click="openLayoutWindow">Layout</button>
                <button type="button" class="panel-trigger pull-right" bb-click="openPanelWindow">Panel</button>
                <button type="submit" class="panel-trigger pull-right saveForm" bb-click="saveHTML">Save</button>

            </div>
        </div>
    </div>
                                @if(isset($allData))
                                    <textarea class="hidden" id="formJson">{!! $allData !!}</textarea>
                                @endif
    <div class="container-fluid" style="margin-top: 60px;">
    <div class="row formBuilderShow">
      <div class="col-sm-12">
        <h3 class="text-center text-muted" style="display: none">The
          <a href="https://github.com/formio/formio.js" target="_blank">Form Builder</a> allows you to build a
          <select class="form-control" id="form-select" style="display: inline-block; width: 150px;">
            <option value="form">Form</option>
            <option value="wizard">Wizard</option>
            <option value="pdf">PDF</option>
          </select>
        </h3>
        <div class="well" style="background-color: #fdfdfd;">
          <div id="builder"></div>
        </div>
      </div>
      <div class="col-sm-4" style="display: none">
        <h3 class="text-center text-muted">as JSON Schema</h3>
        <div class="well jsonviewer">
          <pre id="json"></pre>
        </div>
      </div>
    </div>
    <div class="row" style="display: none">
      <div class="col-sm-8 col-sm-offset-2">
        <h3 class="text-center text-muted">which
          <a href="https://github.com/formio/ngFormio" target="_blank">Renders as a Form</a> in your Application</h3>
        <div id="formio" class="well"></div>
      </div>
      <div class="clearfix"></div>
    </div>
    <div class="row" style="display: none">
      <div class="col-sm-8 col-sm-offset-2">
        <h3 class="text-center text-muted">which creates a Submission JSON</h3>
        <div class="well jsonviewer">
          <pre id="subjson"></pre>
        </div>
      </div>
      <div class="clearfix"></div>
    </div>

  </div>
           
                            </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row w-100 footer-editor" style="position: fixed;
    bottom: 0;
    right: 0;
    left: 0;
    padding-left: 15px;">
    <div class="col-12 p-0">
        <div class="style-studio">
            <h4>
                <span id="current-node-text">SELECT ELEMENT</span>
                <a href="#" class="outline-btn" bb-click="nodePHPCodeLoop">
                    <i class="fa fa-plus"></i>  Loop
                </a>

                <a href="#" class="outline-btn" data-to-index="0" bb-click="nodePHPCodeSave" hidden>Save</a>

                <a href="#" class="float-right closeCSSEditor" bb-click="closeCSSEditor" hidden><i class="fa fa-arrow-down"></i></a>
                <a href="#" class="float-right openCSSEditor" bb-click="openCSSEditor" hidden><i class="fa fa-arrow-up"></i></a>
            </h4>
            <div class="style-studio-container">
                <div class="container-fluid">
                    <div class="row h-100">
                        <div class="col px-0 d-flex flex-column" style="max-width: 250px;background: #484848;">
                            <div class="node-code-editor-bar">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col px-0 pr-1">
                                            <select class="node-code-position custom-select float-left">
                                                <option>Content</option>
                                                <option>Title</option>
                                                <option>Alt</option>
                                                <option>Src</option>
                                                <option>Attributes</option>
                                                <option>Class</option>
                                            </select>
                                        </div>
                                        <div class="col px-0 pr-1 custom-attribute" style="max-width: 110px;" hidden>
                                            <input type="text" id="custom-attribute" placeholder="attribute" class="float-left">
                                        </div>
                                        <div class="col px-0" style="max-width: 35px;">
                                            <i class="fas fa-plus btn btn-warning btn-sm add-code" bb-click="addCode"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="inserted-code" hidden></div>
                        </div>
                        <div class="col px-0 d-flex" style="background-color: #373638;">
                            <div id="php-node-code-editor" class="hidable-panel" hidden style="width: 400px !important"></div>
                            <div id="bb-css-studio" class="bb-css-studio hidable-panel" hidden></div>
                            <div id="test3" hidden style="display: flex; flex-direction: row-reverse;">
                                    <div class="filedsbuttons">
                                    <button class="btn btn-primary btnStatic" bb-click="btnStaticOpen">Static</button>
                                    <button class="btn btn-sucsess btnFieldValue" bb-click="btnFieldValueOpen">Field Value</button> 
                                    <button class="btn btn-sucsess btnFunction" bb-click="btnFunctionOpen">Functions</button> 
                                    </div>
                                    <div class="staticDynamic">
                                        <div class="contentStatic" hidden> <div>
                                            <input type="text" class="form-control" id="staticInput">
                                        </div> </div>
                                        <div class="contetnFiledValue" hidden> <div>
                                            
                                            <select class="form-control" value="formioSelect" id="formioSelect">
                                          
                                                </select>
                                        </div> </div>
                                        <div class="contentFunctions" hidden> 
                                            <div>
                                                <select class="form-control" value="functionsSelect" id="functionsSelect">
                                                    <option value="1">Function 1</option>
                                                    <option value="2">Function 2</option>
                                                    <option value="3">Function 3</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                </div>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="code-editor"></div>
<div class="function-tab w-100" hidden>
    <ul class="tree-list-functions" bb-click="functionConnectItemSelecter" style="width: 300px; position: fixed; right: 0; top: 0" ></ul>
    <ul class="row m-0 p-0">
        <li class=" col-sm-3 function-tab-item">
            <p>Section</p>
            <div class="function-tab-item-section"></div>
            <button bb-click="addFunctionSectionItem" class="btn btn-primary btn-block"><i class="fa fa-plus"></i></button>
        </li>
        <li class=" col-sm-3 function-tab-item function-tab-options" hidden>

            <p>Options</p>
        <div class="function-tab-item-options"></div>

            <button bb-click="addFunctionOptionsItem" class="btn btn-primary btn-block"><i class="fa fa-plus"></i></button>
        </li>
        <li class=" col-sm-6 function-tab-item function-tab-connections" hidden>
            <p>Conection</p>
            <div class="function-tab-item-connections"></div>
        </li>
    </ul>

</div>
<div id="containerForJsPanel"></div>
<script type="template" id="demo-html">
    <div class="jumbotron">
        <h1 class="display-4">Hello, world!</h1>
        <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
        <hr class="my-4">
        <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
        <p class="lead">
            <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
        </p>
    </div>
</script>

@include('console::structure.templates.studio')

<input type="hidden" id="renderUrl" value="{!! route('blades_live_render') !!}">
{!! csrf_field() !!}

<script type="template" id="bbt-controls">
    <div class="controls">
        <i bb-click="editPHPCode" class="fas fa-edit"></i>
        <i bb-click="removeHtmlElement" class="fas fa-remove"></i>
    </div>
</script>

<script type="template" id="bbt-php-panel">
    <div class="php-panel-header mt-1 mb-2">
        <select name="" id="" class="form-control">
            <option value="">PHP Editor</option>
            <option value="">Select Shortcode</option>
        </select>
    </div>

    <div id="php-code-editor"></div>
</script>
{!! HTML::script("public/js/framework/jsPanelCreater.js") !!}

{!! HTML::script("public/js/formio/buttons.js") !!}
{!! HTML::script("public/js/formio/formio.full.min.js") !!}
{!! HTML::script('public/js/ace-editor/ace.js') !!}
{!! HTML::script('public/js/framework/framework.js?rnd='. rand(999,9999)) !!}
{!! HTML::script("public/js/formio/config.js?v=".rand(999,9999)) !!}

</body>
</html>




