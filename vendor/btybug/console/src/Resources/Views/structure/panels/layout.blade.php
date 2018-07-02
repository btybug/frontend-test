<div class="form-group">
    {!! BBcustomize('layouts','layout_id','frontend',
                                   (isset($page->layout_id) && $page->layout_id)?'Change':'Select',
                                   'admin_page_layout_'.$page->id,['class'=>'btn btn-default change-layout','model' =>$page]) !!}
</div>