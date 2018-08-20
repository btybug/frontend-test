$( document ).ready(function() {
    $(".tags_bug_custom").tagsinput('items');

    $('body').on('click','.quick_bug .main-bug .bottom .icons ul',function (e) {
        e.preventDefault();
        $('.quick_bug .main-content .form-group').each(function() {
            if(e.target.closest('a').className==$(this).data('group') && $(this).is(":hidden")){
                // console.log(this);
                $(this).removeAttr('hidden');
            }

        });
    });
    $('body').on('click','.quick_bug .main-bug .main-content .form-group .del-icon',function (e) {
        e.preventDefault();
        // console.log($(this).closest('.form-group')[0]);
        $(this).closest('.form-group')[0].setAttribute('hidden','hidden')
    })
    $(window).scroll(function(){
        var sticky = $('.profile-sticky .ux-tabs'),
            scroll = $(window).scrollTop();

        if (scroll >= 95) sticky.addClass('fixed-sticky');
        else sticky.removeClass('fixed-sticky');
    });

    var window_width = $(window).width();
    $(window).on('resize', function(){

        var win = $(this); //this = window
        // yourHeader = $('#top-navigation').height();
        window_width = win.width();
        if ($(this).scrollTop() >= yourHeader) {
            // StickyTop();
        } else {
            // StickyDown()
        }
        // console.log($(this).scrollTop());
        // console.log(yourHeader);
    });

    $("body").on("click",".navbar-brand",function () {
        $(this).closest('#header').find('.head-left-menu').toggleClass('active');

    })
    $("body").on("click",".head-left-menu .close",function () {
        $(this).closest('.head-left-menu').removeClass('active');

    });

    var yourHeader = $('#top-navigation').height();

    $(window).scroll(function() {
        yourHeader = $('#top-navigation').height();
        if( $(this).scrollTop() >= yourHeader ) {
            StickyTop();
        } else {
            StickyDown();

        }
    });


// Get the navbar
    var navbarSticky = document.querySelector(".profile-sticky .ux-tabs");
    // var topnavigation = document.querySelector("#top-navigation");

// Get the offset position of the navbar
//        var sticky = navbar.offsetTop;
    var sticky = navbarSticky ? navbarSticky.offsetTop : 0;

// Add the sticky class to the navbar when you reach its scroll position. Remove "sticky" when you leave the scroll position
    function StickyTop() {
        recalculateTabs();

        if($('.profile-sticky ul.ux-tabs__dropdown-items li').length < 1){
            $('.profile-sticky .ux-tabs__headers').parent().removeClass('col-10').css({'width':'100%'});
            $('.profile-sticky .ux-tabs__headers').css({'display':'flex'});
            $('.profile-sticky .ux-tabs__headers > li').css({'flex':'auto'});
        }else{
            $(".profile-sticky .ux-tabs__headers  >li:first-of-type").removeAttr('style');
        }
        // topnavigation.classList.add("sticky");

    }

    function StickyDown() {
        recalculateTabs();
        // topnavigation.classList.remove("sticky");
        if($('.profile-sticky ul.ux-tabs__dropdown-items li').length < 1){
            $('.profile-sticky .ux-tabs__headers').parent().addClass('col-10').removeAttr('style');
            $('.profile-sticky .ux-tabs__headers').removeAttr('style');
            $('.profile-sticky .ux-tabs__headers > li').removeAttr('style');
        }else {
            if($(".profile-sticky .ux-tabs__headers > li:not(:hidden)").length == 1){
                $(".profile-sticky .ux-tabs__headers > li:first-of-type").css({"width":'100%'});
            }else{
                $(".profile-sticky .ux-tabs__headers > li:first-of-type").removeAttr('style');
            }
        }

    }

    function myFunction() {

    }

    // Monsieur, high level idea for eUI to improve ux-tabs component.
// Could be applied to angular component with some tricks.

    const headers = document.querySelectorAll('.profile-sticky .ux-tabs__header');
    const dropdown = document.querySelector('.profile-sticky .ux-tabs__dropdown');
    // const dropdownCount = document.querySelector('.ux-tabs__dropdown-count');
    const dropdownItems = document.querySelector('.profile-sticky .ux-tabs__dropdown-items');

    dropdown.addEventListener('click', function() {
        dropdownItems.classList.toggle('ux-u-d-block');
    });

    function recalculateTabs(){

        let hiddenTabs = [];
        headers.forEach((h) => {
            h.style.display = ''; // by default its block for divs

        // all tabs which are floated, should not be visible on main bar
        if(h.offsetTop > 0) {
            h.style.display = 'none';
            hiddenTabs.push(h)
        }

        // show dropdown only if there are some tabs not fitting on the screen monsieur !
        dropdownItems.innerHTML = '';
        // dropdownCount.innerHTML = hiddenTabs.length;
        dropdown.style.visibility = hiddenTabs.length > 0 ? 'visible' : 'hidden';

        // populate dropdown with names of hidden tabs.
        hiddenTabs.forEach((tabName) => {
            const li = document.createElement('li');
        // let classNameOrignal = tabName.className.split(' ')
        // classNameOrignal.forEach(item => li.classList.add(item))
        li.classList.contains("ux-tabs__header") ? li.classList.remove("ux-tabs__header") : null

        li.innerHTML = tabName.innerHTML
        ;
        li.classList.add('ux-tabs__dropdown-item');
        dropdownItems.appendChild(li);
    });

    });

    }

// we might debounce here monsieur, some browsers shoot events like crazy during resize.
    window.addEventListener('resize', recalculateTabs, true);
    recalculateTabs();

    if($(".profile-sticky .ux-tabs__headers > li:not(:hidden)").length == 1){
        $(".profile-sticky .ux-tabs__headers > li:first-of-type").css({"width":'100%'});
    }else{
        $(".profile-sticky .ux-tabs__headers > li:first-of-type").removeAttr('style');
    }


});