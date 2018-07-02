@extends('btybug::layouts.admin')
@section('content')
    <div class="studio-container container-fluid">
        <div class="row">
            <div class="col-md-3">
                <div class="panel panel-default p-0 boxpanelminheight">
                    <div class="panel-heading">Available Functions</div>
                    <div class="panel-body">
                        <div class="list-group events-list-group">
                            @foreach(BBallFunctions() as $key => $data)
                                <button type="button" data-value="{!! $key !!}" data-title='{!! $key !!}' class="list-group-item list-group-item-action" bb-click="addAction">
                                    {!! $data['fn'] !!}
                                </button>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-9">
                <div class="panel panel-default p-0 boxpanelminheight" data-panelevent="connections">
                    <div class="panel-heading">Options</div>
                    <div class="panel-body p-0">
                        <div id="fn-name">

                        </div>
                        <div class="panel-group" id="options-view" role="tablist" aria-multiselectable="true">

                        </div>
                        <div id="fn-desc">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('CSS')
    {!! HTML::style('public/css/bty.css?v='.rand(1111,9999)) !!}
    <style>
        header {
            background-color: black;
            padding: 15px 0;
        }

        header .head-btn {
            width: 100%;
            text-align: right;
            margin-right: 50px;
        }

        section.main {
            margin-top: 20px;
        }

        section.main .preview, section.main .settings {
            border: 1px solid #000;
            min-height: 500px;
        }

        .ace_editor{
            height:100%;
            flex: 1;
        }
        .set_border{
            border: 2px solid #FF0000;
        }
        .custom_inline_block{
            display:inline-block;
        }

        .studio-container{
            background: #e7e7e7;
        }

        .full-height {
            height: calc(100vh - 61px);
        }

        .tree-area {
            background: #3d3d3d;
        }

        .preview-area {
            height: 100%;
            padding: 10px;
            background: #fff;
            border-bottom: 10px solid #e7e7e7;
            border-top: 10px solid #e7e7e7;
            position: relative;
            overflow: scroll;
        }

        .preview-area:empty:before {
            content: "Code Preview";
            width: 100%;
            height: 100%;
            text-align: center;
            position: absolute;
            top: 0;
            left: 0;
            line-height: 120px;
            text-transform: uppercase;
            color: #afafaf;
            font-size: 18px;
        }

        .tree-list{
            list-style: none;
            margin: 0;
            padding: 10px;
        }

        .node-content {
            background: #4b9bc7;
            margin-bottom: 10px;
            color: #fff;
            padding: 6px 10px;
        }

        .tree-list li {
            list-style: none;
        }

        .controls {
            float: right;
        }

        .controls a {
            color: #fff;
            margin-left: 10px;
        }
    </style>
@stop
@section('JS')
    {!! HTML::script('public/js/bty.js?v='.rand(1111,9999)) !!}
    {!! HTML::script('public/js/bootstrap-select/js/bootstrap-select.min.js') !!}
    <script>
        $('document').ready(function () {
            $('body')
            // Click events
                .on('click', '[bb-click]', function (e) {
                   var value = $(this).data('value');
                    $.ajax({
                        url: "{{ route('get_bb_fn_options') }}",
                        data: {
                            slug:value
                        },
                        headers: {
                            'X-CSRF-TOKEN': $("[name=_token]").val()
                        },
                        success: function (data) {
                            if(!data.error){
                                $("#options-view").html(data.html);
                                $("#fn-name").html("<h3>Function Name</h3>" + data.data.fn + "<hr />");
                                $("#fn-desc").html("<hr />" + "<h3>Function Description</h3>" + data.data.description);
                            }
                        },
                        type: 'POST'
                    });
                });
        })
    </script>
@stop
