<div>
    @if(File::exists(public_path('css'.DS.'pages'.DS.str_replace(' ','-',$page->title).'.css')))
    {!! str_replace(' ','-',$page->title).'.css' !!}
        @endif
</div>