<div class="left-menu">
    <ul>
        @if(count($layouts))
            @foreach($layouts as $key => $val)
                <li class="unit_rend {{ ($slug == $val->slug)? 'active' : '' }}">
                    <a href="{!! route('mini_admin_assets_layouts',$val->slug) !!}">{{ $val->title }}</a>
                </li>
            @endforeach
        @endif
    </ul>
</div>

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

    .ui-2_col .left-menu li > a {
        align-self: center;
        margin-left: 10px;
        font-size: 16px;
        color: white;
        text-decoration: none;
        height: 60px;
        width: 95%;
        display: flex;
        align-items: center;
    }

    .ui-2_col .left-menu li.active {
        background: rgba(0, 0, 0, 0.48);
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

    .unit_preview {
        border: none;
        margin-top: 15px;
        height: calc(100vh - 180px);
    }

</style>