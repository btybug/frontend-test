$('.what-offer-content').owlCarousel({
    margin:30,
    responsiveClass:true,
    nav: true,
    navSpeed:500,
    navText:["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
    responsive:{
        0:{
            items:1

        },
        400:{
            items:1

        },
        600:{
            items:2

        },
        700:{
            items:2

        },
        1000:{
            items:3


        }
    },
})