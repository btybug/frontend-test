@inject('section','Btybug\btybug\Helpers\Tabs')
@php
    $tabs=$section->getTabs($index);
@endphp
@extends('mini::layouts.app')
@section('content')
    <div class="pages-manage d-flex flex-column">
        <div class="head d-flex">
            <div class="left d-flex align-items-center">
                <span class="icon-user">
                    <i class="far fa-user"></i>
                </span>
                <span class="name">Manage Social</span>
                <a class="more" href="javascript:void(0);" id="dropdownManageHead" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    <span class="caret-down"><i class="fas fa-caret-down"></i></span>
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownManageHead">
                    <a class="dropdown-item d-flex align-items-center" href="#"><i class="fas fa-cog"></i><span
                                class="title">Item1</span></a>
                    <a class="dropdown-item d-flex align-items-center" href="#"><i class="fas fa-cog"></i><span
                                class="title">Item2</span></a>
                    <a class="dropdown-item d-flex align-items-center" href="#"><i class="fas fa-cog"></i><span
                                class="title">Item3</span></a>
                </div>
            </div>
            <div class="right d-flex align-items-center justify-content-between">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
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
                                <a class="nav-item nav-link @if(Request::getPathInfo()==$value['url'] || (Request::getPathInfo().'/'.$param)==$value['url']) active @endif " id="nav-pages-tab"                                              href="{!! url($value["url"])!!}">
                                    @if($value['title'] == 'Settings')
                                    <i class="fas fa-cog"></i>
                                    @elseif($value['title'] == 'Pages')
                                        <i class="far fa-sticky-note"></i>
                                    @endif
                                            <span>{!!$value['title']!!}</span></a>
                        @endforeach

                    </div>
                </nav>
                <div class="right-tooltip">
                    <a href="#" data-toggle="tooltip" title="Some tooltip text!" id="info-manage-head"
                       data-placement="left"><i class="fas fa-exclamation"></i></a>
                    <div class="tooltip bs-tooltip-left" role="tooltip">
                        <div class="arrow"></div>
                        <div class="tooltip-inner">
                            Some tooltip text!
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-manage-content">
            <div class="tab-content" id="nav-tabContent">

             @yield('tab')

            </div>
        </div>
    </div>

@stop
@push('js')
    {!! HTML::script('public/minicms/js/tabs/newTabs.js') !!}
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
            integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
            integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
            crossorigin="anonymous"></script>
    <script src="custom.js"></script>
@endpush
