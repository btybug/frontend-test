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

    {!! HTML::style("public/libs/jspanel/jspanel.min.css") !!}
    {!! HTML::script("public/libs/jspanel/jspanel.min.js") !!}

    {!! HTML::style("public/libs/autocomplete/easy-autocomplete.min.css") !!}
    {!! HTML::style("public/libs/autocomplete/easy-autocomplete.themes.min.css") !!}
    {!! HTML::script("public/libs/autocomplete/jquery.easy-autocomplete.min.js") !!}

    {!! HTML::script("public/libs/beautify/beautify-html.js") !!}

    {!! HTML::script('public/js/framework/he.js') !!}
    {!! HTML::style('public/js/framework/framework.css?rnd='. rand(999,9999)) !!}
    {!! HTML::style("public/css/formio/formio.full.min.css") !!}
    {!! HTML::style("public/css/formio/bootstrap.vertical-tabs.min.css") !!}
    {!! Html::style("public/css/font-awesome/css/font-awesome.min.css") !!}
    <style>
        .formcomponents {
      float: right;
      /* display: none; */
      transform: translateX(+100px);
      opacity: 0;
      transition: all cubic-bezier(0.68, -0.55, 0.265, 1.55) 0.4s
    }

    .displayToggle {
      transform: translateX(0);
      opacity: 1;

      /* display: block !important; */
    }

    .accordion.panel-group {
      margin-top: auto !important;
    }

    .panel-default {
      border-color: #fff;
    }

    .panel-default>.panel-heading {
      border-color: #fff;
      background: #e6e6e6;
    }

    .builder-group-button {
      background: none;
      color: #000
    }

    #builder {
        
        display: flex;
        flex-direction: row-reverse;
       
    }      

    .formcomponents .formcomponent {
      padding: 15px 20px;
      background-color: #607d8b;
    }

    .panel-title {
        height: 56px !important; 
    }
.head-btn>.form-control{
width:20%;
}
    

    
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
        <input type="text" placeholder="File name" class="form-control">
            <!-- <button class="btn btn-success btn-sm excecte">Excecte</button>
            <button class="btn btn-warning btn-sm">Ace</button>
            <button class="btn btn-info btn-sm">Export</button> -->
            <div>
            <button class="btn btn-danger btn-sm">Import</button>
            <button class="btn btn-info btn-sm">Save</button>
            </div>
        </div>
    </div>
</header>
<div class="row grow w-100 ">
    <div class="col-7 p-0">
        <div class="h-100 d-flex flex-column">
            <ul class="nav nav-tabs preview-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="preview-tab" data-toggle="tab" href="#preview" role="tab">
                        <i class="fa fa-eye"></i> Preview
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="form-tab" data-toggle="tab" href="#form" role="tab">
                        <i class="fas fa-cogs"></i> Options
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="code-tab" data-toggle="tab" href="#code" role="tab">
                        <i class="fa fa-code"></i> Full Code
                    </a>
                </li>
                
            </ul>
            <div class="tab-content d-flex" style="flex: 1;">
                <div class="tab-pane fade h-100 w-100 show active" id="preview" role="tabpanel">
                    <div class="preview-area"></div>
                </div>
                <div class="tab-pane fade h-100 w-100" id="code" role="tabpanel">
                    <div id="code-editor"></div>
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

    <div class="container-fluid" style="margin-top: 60px;">
    <!-- <div class="text-right" style="margin-bottom: 25px;">
      <button class="btn btn-primary add-unit"> Add unit</button>
      <button class="btn btn-primary saveForm"> Save</button>
    </div> -->

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
    <div class="col-5 h-100 px-0 d-flex flex-column visualCodeEditorToggle">
        <div class="php-code-item">
            PHP Code
            <div class="controls">
                <a href="#" bb-click="mainPHPCodeEdit"><i class="fas fa-code"></i></a>
                <a href="#" class="outline-btn" bb-click="mainPHPCodeDiscard" hidden>Discard</a>
                <a href="#" class="outline-btn" bb-click="mainPHPCodeSave" hidden>Save</a>
            </div>
        </div>

        <div class="tree-area h-100">

            <div class="pt-1 tree-container">
                <!-- Tree List -->
                <ul class="tree-list"></ul>
            </div>

            <div class="h-50 pt-1 tree-container" style="display: none">
                <div id="full-code-editor"></div>
            </div>


            <!-- Main PHP Editor -->
            <div class="code-editor-area h-100" hidden>
                <div class="code-editor-bar">
                    <input type="text" id="search-code" placeholder="Search code">
                </div>
                <div id="php-code-editor"></div>
            </div>
        </div>
    </div>
</div>
<div class="row w-100" style="position: fixed;
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
                                                <option>title</option>
                                                <option>alt</option>
                                                <option>src</option>
                                                <option>Attribute</option>
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
                            <div id="bb-css-studio" class="bb-css-studio hidable-panel" hidden></div>
                            <div id="php-node-code-editor" class="hidable-panel" hidden></div>
                            <div id="test3" hidden>
                                    <button class="btn btn-primary btnStatic" bb-click="btnStaticOpen">Static</button>
                                    <button class="btn btn-sucsess btnDynamic">Dynamic</button>
                                    <div class="staticDynamic">
                                        <div class="contentStatic" hidden> Testttt 3</div>
                                        <div class="contetnDynamic" hidden> </div>
                                    </div>
                                </div>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


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

{!! HTML::script('public/js/ace-editor/ace.js') !!}
{!! HTML::script('public/js/framework/framework.js?rnd='. rand(999,9999)) !!}
{!! HTML::script("public/js/formio/buttons.js") !!}
{!! HTML::script("public/js/formio/formio.full.min.js") !!}
{!! HTML::script("public/js/formio/config.js?v=".rand(999,9999)) !!}
</body>
</html>




