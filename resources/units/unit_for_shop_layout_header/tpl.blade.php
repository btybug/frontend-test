<div id="header">
    <div class="container">
        <div class="pull-left">
            <!-- Logo -->
            <div class="header-logo">
                <a class="logo" href="#">
                    <img src="{!! BBgetSiteLogo() !!}" alt="">
                </a>
            </div>
            <!-- /Logo -->

            <!-- Search -->
                @if(isset($settings["area1"]))
                    {!! BBRenderUnits($settings["area1"]) !!}
                @endif
            <!-- /Search -->
        </div>
        <div class="pull-right head-right">
            @if(isset($settings["area2"]))
                {!! BBRenderUnits($settings["area2"]) !!}
            @endif
            @if(isset($settings["area3"]))
                {!! BBRenderUnits($settings["area3"]) !!}
            @endif
        </div>
    </div>
    <!-- header -->
</div>
{!! BBstyle($_this->path.DS.'css'.DS.'style.css',$_this) !!}