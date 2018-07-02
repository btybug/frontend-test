<?php

$page = $paginator->getPage();
function index($paginator, $page)
{
    $links = $paginator->getLinksCount();
    $total = $paginator->getTotal();
    $last = (int)ceil($total / $links);
    $paginations = array_chunk(range(1, $last - 1), $links);
    $pos = (int)($page / $links) - 1;
    $index = $page % $links == 0 ? $pos : $pos + 1;
    if (!isset($paginations[$index]) || array_search($page, $paginations[$index]) === false) return false;
    return ['index' => $index, 'paginations' => $paginations];
}

$result = index($paginator, $page);

?>
@if($result)
    @php
        $index=$result['index'];
        $paginations=$result['paginations'];
        $next=index($paginator,$page+1);
        $Previous=index($paginator,$page-1);
    @endphp
    <div class="{!!$paginator->getListClass()!!}">
        <ul>
            @if($Previous)
                <li class="prev"><a href="?page={!!$page-1!!}" disabled="true">Previous</a>
                    @endif
                </li>
                @foreach($paginations[$index] as $key=>$pagination)
                    <li @if($page==$pagination)class="active"@endif><a
                                href="?page={!! $pagination !!}">{!! $pagination !!}</a></li>
                @endforeach
                @if($next)
                    <li class="next"><a href="?page={!!$page+1!!}" disabled="true">Next</a></li>
                @endif
        </ul>
    </div>
@endif