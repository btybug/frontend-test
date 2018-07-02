{{--<table class="table table-striped">
    <thead>
    <tr>
        <th>Name</th>
        <th>Units</th>
    </tr>
    </thead>
    <tbody>
    --}}{{--@if(isset($layout->settings['hook']))
        @foreach($layout->settings['hook'] as $key=>$cms_hook)
            <tr>
                <td>{!! $key !!}</td>
                <td>
                    @if(isset($cms_hook['units']))
                        @foreach($cms_hook['units'] as $unit)
                            {!! BBgetUnitAttr($unit,'title').',' !!}
                        @endforeach
                    @endif
                </td>
            </tr>
        @endforeach
    @endif--}}{{--
    @if(isset($_this->placeholders) && is_array($_this->placeholders))
        @foreach($_this->placeholders as $key=>$placeholder)
            @if(isset($placeholder['tag']) && $placeholder['tag'] == "hook")
                <tr>
                    <td>{!! $key !!}</td>
                    <td>
                        {!! BBbutton2('unit',$key,$placeholder['tag'],(isset($placeholder['title'])?$placeholder['title']:'Sidebar'),['class'=>'btn btn-default change-layout','data-type'=>$placeholder['tag'],'data-name-prefix'=>'page_layout_settings','model'=>($page->page_layout_settings[$key])??null]) !!}
                    </td>
                </tr>
            @endif
        @endforeach
    @endif
    </tbody>
</table>--}}
<?php
$hook = json_decode($page->settings, true);
$hook = issetReturn($hook,'children',[]);
$hooks[0] = "Select Hook";
?>
{!! Form::select('children[hook]',$hooks,issetReturn($hook,'hook',null),['class'=>'form-control']) !!}