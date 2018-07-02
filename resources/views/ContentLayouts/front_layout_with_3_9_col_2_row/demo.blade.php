<div class="container-fluid">
    <div class="row row-no-gutter {{(isset($settings['main_page_style'])&& $settings['main_page_style']) ? $settings['main_page_style'] : 'div-flex'}}">
        <div class="top-menu-container {{(isset($settings['style'])&& $settings['style'] ) ? $settings['style'] : 'demo-column'}}">
            <div class="top-menu">
                <ul class="profile-menu {{isset($settings['menu_area_style']) ? $settings['menu_area_style'] : ''}}">
                    @php
                        $items = isset($settings['menu_area']) ? BBGetMenu($settings['menu_area']) : [];
                    @endphp
                    @if(count($items))
                        @foreach($items as $item)
                            @if(isset($item['children']))
                                <li class="item">
                                    <ul class="cute">
                                        @foreach($item['children'] as $child)
                                            <li><a href="{!! url($child['url']) !!}"><i class="fa {!! $child['icon'] !!}"></i> {!! $child['title'] !!}</a></li>
                                            @if(isset($child['children']) && !empty($child['children']))
                                                <a class="sublink" data-toggle="dropdown" aria-expanded="true"><i class="fa fa-caret-down"></i></a>
                                            @endif
                                            @if(isset($child['children']))
                                                <ul class="cute">
                                                    @foreach($child['children'] as $next_child)
                                                        <li><a href="{!! url($next_child['url']) !!}"><i class="fa {!! $next_child['icon'] !!}"></i> {!! $next_child['title'] !!}</a></li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        @endforeach
                                    </ul>
                                </li>
                            @else
                                <li class="item"><a href="{!! url($item['url']) !!}"><i class="fa {!! $item['icon'] !!}"></i> {!! $item['title'] !!}</a></li>
                            @endif
                        @endforeach
                    @endif
                </ul>
            </div>
        </div>
        <div class="{!! issetReturn($settings,'ls_desktop').' '.issetReturn($settings,'ls_l_table').' '.issetReturn($settings,'ls_p_table').' '.issetReturn($settings,'ls_mobile')!!}">
            <div class=" default-column {{(isset($settings['ls_style'])&& $settings['ls_style'] ) ? $settings['ls_style'] : 'demo-column'}}">
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
                        @case('editor')
                        <div class="text-right">
                            <div class="cl-editor">
                                <button type="submit" class="btn btn-sm btn-info">Save</button>
                                {!! BBeditor() !!}
                            </div>
                        </div>

                        @break
                        @default
                        <span>Something went wrong, please try again</span>
                    @endswitch
                </div>
            </div>
        </div>
        <div class="{!! issetReturn($settings,'rc_desktop').' '.issetReturn($settings,'rc_l_table').' '.issetReturn($settings,'rc_p_table').' '.issetReturn($settings,'rc_mobile')!!}">
            <div class="default-column  {{isset($settings['right_area_style']) ? $settings['right_area_style'] : ''}}">
                <div>
                    <div class="{{(isset($settings['tr_style'])&& $settings['tr_style']) ? $settings['tr_style'] : 'demo-column'}} ">
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
                    <div class="{{(isset($settings['mr_style'])&& $settings['mr_style']) ? $settings['mr_style']: 'demo-column'}} ">
                        @switch(issetReturn($settings,'main_content_type'))
                            @case('unit')
                            @if(has_setting($settings,'main_unit'))
                                {!! BBRenderUnits($settings['main_unit'],isset($settings['_page'])?['_page'=>$settings['_page']]:[]) !!}
                            @endif
                            @break

                            @case('hook')
                            @if(has_setting($settings,'hooks') && is_array($settings['hooks']['main_hook']))
                                {!! BBrenderHook($settings['hooks']['main_hook']) !!}
                            @endif
                            @break
                            @case('editor')
                            <div class="text-right">
                                <div class="cl-editor">
                                    <button type="submit" class="btn btn-sm btn-info">Save</button>
                                    {!! BBeditor() !!}
                                </div>
                            </div>

                            @break
                            @default
                            <span>Something went wrong, please try again</span>
                        @endswitch
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    tinymce.init({
        selector: 'textarea.cms_editor'});
</script>
{!! BBstyle($_this->path.DS.'css/style.css') !!}
{!! useDinamicStyle('containers') !!}
{{--<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>--}}
