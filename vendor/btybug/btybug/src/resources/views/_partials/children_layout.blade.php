<div class="panel panel-default custompanel m-t-20">
    <div class="panel-heading">
        Children Page layout
    </div>
    <div class="panel-body">
        <div class="form-group">
            <div class="col-md-12">
                <label>Children Layout permission</label>
            </div>
            <div class="col-md-12">
                {!! Form::select('children[enable_layout]',['1' => 'Enable','0' => 'Disable'],
                    ($settings && isset($settings['children']['enable_layout'])) ? $settings['children']['enable_layout'] : null ,
                    ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-12">
                <label>Select Layout</label>
            </div>
            <div class="col-md-12">
                <div class="col-md-12 m-b-10">
                    {!! BBbutton2('layouts','children[page_layout]','front_pages_layout',
                    ($settings && isset($settings['children']['page_layout'])) ? 'Change':'Select',
                    ['class'=>'btn btn-default change-layout',
                    'model' =>(isset($page) && isset($settings['children']['page_layout'])) ? $settings['children']['page_layout'] : null]) !!}
                </div>
            </div>
        </div>
        @if(isset($layout))
            <div class="form-group">
                <div class="col-md-12">
                    <label>Select Layout Placeholders</label>
                </div>
                <div class="col-md-12 layout-data">
                    <div id="placeholders">
                        @if(isset($layout->placeholders) && is_array($layout->placeholders))
                            @foreach($layout->placeholders as $key=>$placeholder)
                                <div>
                                    @if(isset($placeholder['tag']))
                                        {!! BBbutton2('unit',$key,$placeholder['tag'],(isset($placeholder['title'])?$placeholder['title']:'Sidebar'),['class'=>'btn btn-default change-layout','data-type'=>$placeholder['tag'],'data-name-prefix'=>'children_page_layout_settings','model'=>($settings['children_page_layout_settings'][$key])??null]) !!}
                                    @endif
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>

