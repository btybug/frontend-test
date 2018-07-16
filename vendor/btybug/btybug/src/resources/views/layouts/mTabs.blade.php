@inject('section','Btybug\btybug\Helpers\Tabs')
@php
$tabs=$section->getTabs($index);
@endphp
@extends($section->layout)
@section('content')
    @yield('parag')
    <div class="col-md-12">
        <div class="box box-default color-palette-box">
            <div class="box-body">
                <div class="top-nav-btybug">
                    <ul role="tablist">
                        @foreach($tabs as $value)
                            <?php
                            if ($section->just_text_in_quotes($value['url'])) {
                                $var = $section->just_text_in_quotes($value['url']);
                                $variable = $var[1];
                                if (!isset($$variable)) {
                                    $$variable = null;
                                }
                                try {
                                    $value['url'] = str_replace($var[0], isset($$variable) ? $$variable : null, $value['url']);
                                } catch (Exception $e) {
                                    $var[1] = null;
                                    $value['url'] = str_replace('/' . $var[0], $var[1], $value['url']);
                                }

                            };
                            if (isset($variable) && isset($$variable)) {
                                $param = $$variable;
                            } else {
                                $param = null;
                            }
                            ?>
                            <li role="presentation"
                                class="{!! $value["item_class"] or null !!} @if(Request::getPathInfo()==$value['url'] || (Request::getPathInfo().'/'.$param)==$value['url']) active @endif ">

                                <a href='{!! url($value["url"])!!}'>
                                    @if(isset($value["icon"]))
                                        <i class='{!!$value["icon"]!!} '></i>
                                    @endif
                                    {!!$value['title']!!}</a></li>
                        @endforeach


                    </ul>
                </div>
                <div class="tab-content">
                    @yield('tab')
                </div>
            </div>
        </div>
    </div>
@stop

@push('css')
    {!! HTML::style('public/css/tabs/tab-styles.css?v=0.1') !!}
@endpush