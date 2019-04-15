

//@prepros-append plugins.js
//@prepros-append bootstrap.js
//@prepros-append ./../owl/owl.carousel.js

(function($){



    $(window).on('scroll', function (event) {

    });

    if ($('.run-owl').length > 0) {
        $(document).ready(function () {
            $('.run-owl').owlCarousel({
                items: "4",
                dots: 0,
                margin: 10,
                nav: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    767: {
                        items: 2
                    },
                    991: {
                        items: 4
                    }
                }
            });
        });
    }


    $(document).ready(function () {
        $('.itemFilter').on('change', function (event) {
            if ($(event.target).is('input')) {
                var $el = $(event.target);
                var data = {
                    label: $el.data('tax'),
                    value: $el.data('term')
                };

                var $selectVari = $('.variations #' + data.label);
                if ($selectVari.length > 0) {
                    $selectVari.val(data.value).trigger('change');
                }
            }
        });


        if ($('.variations select').length > 0) {
            $('.variations select').each(function () {
                var vl = $(this).val();
                var id  = $(this).attr('id');
                var target = '#' + id + vl;
                $(target).prop('checked', true);
            });
        }


        /*--
         Menu Sticky
         -----------------------------------*/
        // var windows = $(window);
        // var sticky = $('.header-sticky');

        // windows.on('scroll', function() {
        //     var scroll = windows.scrollTop();
        //     if (scroll < 230) {
        //         sticky.removeClass('is-sticky');
        //     }else{
        //         sticky.addClass('is-sticky');
        //     }
        // });



        /*--
         Mobile Menu
         ------------------------*/
        var menuNav = $('nav.main-navigation');
        menuNav.meanmenu({
            meanScreenWidth: '991',
            meanMenuContainer: '.mobile-menu',
            meanMenuClose: '<span class="menu-close"></span>',
            meanMenuOpen: '<span class="menu-bar"></span>',
            meanRevealPosition: 'right',
            meanMenuCloseSize: '0',
        });
    });




})(jQuery);
