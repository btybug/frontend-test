@if($unit)
    <div class="layout clearfix">
        <img src="/app/Modules/Resources/Resources/assets/img/layout-img.jpg" alt="" class="layoutImg">
        <div class="layoutData">
            <div class="layoutCol">
                <h4>{!! $unit->title !!}</h4>
                <p>{!! @$unit->description !!}</p>
            </div>
            <div class="layoutFooter row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4 ">
                    <span class="textWrap"><a href="{!! @$unit->author_site !!}"
                                              class="link"><i>{!! @$unit->author_site !!}</i></a></span>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4  centerText">
                    <span class="iconRefresh"><i class="fa fa-refresh"></i></span> {!! @$unit->version !!}
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4 rightText">
                    <i class="fa fa-user"></i> {!! @$unit->author !!}, {!! BBgetDateFormat(@$unit->created_at) !!}
                </div>
            </div>
        </div>
    </div>
@endif
