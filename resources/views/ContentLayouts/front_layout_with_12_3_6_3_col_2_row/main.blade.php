<div class="container-fluid">
    <div class="row row-no-gutter {{(isset($settings['main_page_style'])&& $settings['main_page_style']) ? $settings['main_page_style'] : ''}}">
        <div class="col-md-12">
            <div class="{{(isset($settings['tb_style'])&& $settings['tb_style'] ) ? $settings['tb_style'] : ''}}">
                <div>
                    @switch(issetReturn($settings,'tb_content_type'))
                        @case('unit')
                            @if(has_setting($settings,'tb_unit'))
                                {!! BBRenderUnits($settings['tb_unit'],isset($settings['_page'])?['_page'=>$settings['_page']]:[]) !!}
                            @endif
                        @break

                        @case('hook')
                            @if(has_setting($settings,'hooks') && is_array($settings['hooks']['tb_hook']))
                                {!! BBrenderHook($settings['hooks']['tb_hook']) !!}
                            @endif
                        @break

                        @default
                        <span>Something went wrong, please try again</span>
                    @endswitch
                </div>
            </div>
        </div>
        <div class="{!! issetReturn($settings,'ls_desktop').' '.issetReturn($settings,'ls_l_table').' '.issetReturn($settings,'ls_p_table').' '.issetReturn($settings,'ls_mobile')!!}">
            <div class="default-column {{(isset($settings['ls_style'])&& $settings['ls_style'] ) ? $settings['ls_style'] : ''}}">
                <div>
                    @switch(issetReturn($settings,'ls_content_type'))
                        @case('unit')
                        @if(has_setting($settings,'ls_unit'))
                            {!! BBRenderUnits($settings['ls_unit'],isset($settings['_page'])?['_page'=>$settings['_page']]:[]) !!}
                        @endif
                        @break

                        @case('hook')
                        @if(has_setting($settings,'hooks') && is_array($settings['hooks']['ls_hook']))
                            {!! BBrenderHook($settings['hooks']['ls_hook']) !!}
                        @endif
                        @break

                        @default
                        <span>Something went wrong, please try again</span>
                    @endswitch
                </div>
            </div>
        </div>

        <div class="{!! issetReturn($settings,'main_desktop').' '.issetReturn($settings,'main_l_table').' '.issetReturn($settings,'mainp_table').' '.issetReturn($settings,'main_mobile')!!}">
            <div class="default-column {{(isset($settings['mr_style'])&& $settings['mr_style']) ? $settings['mr_style']: ''}} ">
                {!! main_content($settings) !!}
            </div>
        </div>

        <div class="{!! issetReturn($settings,'rc_desktop').' '.issetReturn($settings,'rc_l_table').' '.issetReturn($settings,'rc_p_table').' '.issetReturn($settings,'rc_mobile')!!}">
            <div class="default-column {{(isset($settings['tr_style'])&& $settings['tr_style']) ? $settings['tr_style'] : ''}}">
                <div>
                    @switch(issetReturn($settings,'tr_content_type'))
                        @case('unit')
                        @if(has_setting($settings,'tr_unit'))
                            {!! BBRenderUnits($settings['tr_unit'],isset($settings['_page'])?['_page'=>$settings['_page']]:[]) !!}
                        @endif
                        @break

                        @case('hook')
                        @if(has_setting($settings,'hooks') && isset($settings['hooks']['tr_hook']))
                            {!! BBrenderHook($settings['hooks']['tr_hook']) !!}
                        @endif
                        @break
                        @default
                        <span>Something went wrong, please try again</span>
                    @endswitch
                </div>
            </div>
        </div>
    </div>
</div>

{!! BBstyle($_this->path.DS.'css/style.css') !!}
{!! useDinamicStyle('containers') !!}