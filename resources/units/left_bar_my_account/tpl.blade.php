<?php
$front_pages = \Btybug\FrontSite\Models\FrontendPage::getMenus();
?>
<div class="bty-vertical-menu-2">
    <ul>
        {!! \Btybug\FrontSite\Models\FrontendPage::renderMenu($front_pages) !!}
    </ul>
</div>
{!! BBstyle($_this->path.DS.'css'.DS.'styles.css') !!}
{!! BBscript($_this->path.DS.'js'.DS.'script.js',$_this) !!}