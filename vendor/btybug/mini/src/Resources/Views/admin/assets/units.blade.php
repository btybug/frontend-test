@extends('btybug::layouts.mTabs',['index'=>'mini_assets'])
@section('tab')
    <div class="ui-2_col">
        <div class="row">
            <div class="col-md-3 col-xs-12">
                <div class="left-menu">
                    <ul>
                        <li>
                            <span>Item 1</span>
                            <div class="button">
                                <button class="btn btn-sm btn-success">Form</button>
                                <button class="btn btn-sm btn-info">Preview</button>
                            </div>
                        </li>
                        <li><span>Item 2</span></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-9 col-xs-12">
                <div class="display-area">
                    <div class="settings text-right">
                        <button class="btn btn-md btn-warning">Settings</button>
                    </div>
                    <div class="right-iframe">

                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
<style>
    .ui-2_col {
        margin-top: 30px;
    }

    .ui-2_col .left-menu ul {
        border-right: 1px solid #c5c5c5;
        background-color: #3e81a5;
        padding-top: 20px !important;
        height: calc(100vh - 154px);
        overflow-x: auto;
    }

    .ui-2_col .left-menu li {
        background: #0000004f;
        width: 95%;
        height: 60px;
        margin-bottom: 11px;
        box-shadow: -4px 4px 5px 0 #00000073;
        margin-left: 11px;
        cursor: pointer;
        color: white;
        display: flex;
        justify-content: space-between;
        transition: 0.5s ease;
    }

    .ui-2_col .left-menu li > span {
        align-self: center;
        margin-left: 10px;
        font-size: 16px;
    }

    .ui-2_col .left-menu .button {
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: flex-end;
    }

    .ui-2_col .left-menu .button button {
        margin-right: 5px;
    }

    .ui-2_col .left-menu li:hover {
        background: rgba(0, 0, 0, 0.48);
    }
</style>