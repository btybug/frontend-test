(function($){
    $('#show-three-slides').tosrus({
        infinite	: true,
        slides		: {
            visible		: 3
        }
    });

    $('#nbullet-pagination').tosrus({
        buttons		: false,
        pagination	: {
            add			: true
        },
        slides		: {
            scale		: 'fill'
        },
        autoplay   : {
            play       : true
        }
    });
})(jQuery);