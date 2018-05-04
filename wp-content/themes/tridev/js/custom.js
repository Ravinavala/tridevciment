//makes sure the whole site is loaded
jQuery(window).load(function () {
   
    // will first fade out the loading animation
    jQuery("#status").fadeOut();
    // will fade out the whole DIV that covers the website.
    jQuery("#preloader").delay(2000).fadeOut("slow");
});

jQuery(document).ready(function () {
     jQuery('.achievements').attr('data-midnight', 'white');
    jQuery(".form-control").focus(function () {
        jQuery(this).parent().siblings('label').addClass('has-value');
    });
    jQuery(".form-control").blur(function () {
        var text_val = jQuery(this).val();
        if (text_val === "") {
            jQuery(this).parent().siblings('label').removeClass('has-value');
        }
    });

//    jQuery('.about_flexslider').flexslider({
//        animation: "slide",
//        controlNav: false
//    });

    jQuery(window).scroll(function () {
        if (jQuery(window).scrollTop() > 10) {
            jQuery('nav.fixed,.section_header').addClass('topnav');
        } else {
            jQuery('nav.fixed,.section_header').removeClass('topnav');
        }
    });
    jQuery(".grid .fancybox").fancybox({
        openEffect: 'none',
        closeEffect: 'none'
    });
    jQuery(".toggle_button a").click(function () {
        jQuery(".overlayed_header").slideDown();
        jQuery("body").addClass("scroll");
    });
//    var $grid = jQuery('.grid').isotope({
//        itemSelector: '.grid-item',
//        stagger: 40
//    });
//    jQuery('.filter-button-group').on('click', '.button', function () {
//        var filterValue = jQuery(this).attr('data-filter');
//        $grid.isotope({filter: filterValue});
//    });
    // change is-checked class on buttons
    jQuery('.button-group').each(function (i, buttonGroup) {
        var $buttonGroup = jQuery(buttonGroup);
        $buttonGroup.on('click', 'button', function () {
            $buttonGroup.find('.is-checked').removeClass('is-checked');
            jQuery(this).addClass('is-checked');
        });
    });
    jQuery(".toggle_close a").click(function () {
        jQuery(".overlayed_header").slideUp();
        jQuery("body").removeClass("scroll");
    });
    if (jQuery(window).width() > 1200) {
        function logoSwitch() {
            jQuery('.altLogo').each(function () {
                jQuery(this).css('margin-top', jQuery('.startLogo').offset().top() - jQuery(this).closest('section').offset().top() + '15');
                jQuery('.altLogo').addClass('notransition');
            });
        }
        ;
        jQuery(document).scroll(function () {
            logoSwitch();
        });
        logoSwitch();
    }
    jQuery('.progress .progress-bar').css("width",
            function () {
                return jQuery(this).attr("aria-valuenow") + "%";
            });
    setInterval(function () {
        jQuery('.skill').addClass("show");
    }, 3000);


    jQuery(window).resize(function () {
        if (window.matchMedia('(max-width: 1199px)').matches) {
            jQuery('#fullpage').css('padding-top', jQuery('nav.fixed').outerHeight());
        } else {
            jQuery('#fullpage').css('padding-top', '0');
        }

        if (jQuery(window).width() > 1182) {
            jQuery('header > nav').addClass('nilesh');
            jQuery('header > nav.nilesh').midnight();
        } else
        {
            jQuery('header > nav').removeClass('nilesh');
            jQuery('header > nav.fixed,header > nav.fixed .midnightHeader, header > nav.fixed .midnightInner').removeAttr('style');
        }



    });
    jQuery(window).trigger('resize');
});
jQuery(document).ready(function () {
    jQuery(".toggle_button").click(function () {
        jQuery(".overlayed_header").slideDown();
        jQuery("body").addClass("scroll");
    });
    jQuery(".toggle_close a").click(function () {
        jQuery(".overlayed_header").slideUp();
        jQuery("body").removeClass("scroll");
    });


    jQuery('#responsiveTabs2').responsiveTabs({});


    jQuery('.r-tabs-accordion-title a').click(function () {
        jQuery('.r-tabs-nav > .r-tabs-state-default').trigger('click');
    });
    jQuery(".toggle_button a").click(function () {
        jQuery(".overlayed_header").slideDown();
        jQuery("body").addClass("fixed");
    });
    jQuery(".toggle_close a").click(function () {
        jQuery(".overlayed_header").slideUp();
        jQuery("body").removeClass("fixed");
    });
//    jQuery(window).on("resize", function () {
//        if (jQuery(window).width() < 768) {
//            jQuery('.products_logo').find("img").attr("src", "images/tridev-color-logo.svg");
//        } else {
//            jQuery('.products_logo').find("img").attr("src", "images/tridev-white-logo.svg");
//        }
//    });
    jQuery('#responsiveTabs1').responsiveTabs({});
    jQuery('#responsiveTabs1 .r-tabs-nav > .r-tabs-state-default a').click(function () {
        jQuery('#responsiveTabs1 .r-tabs-nav li.r-tabs-state-default').trigger('dblclick');
    });
    jQuery('#responsiveTabs1 .r-tabs-nav li.r-tabs-state-default').dblclick(function () {
        (function () {
            var $window = jQuery(window),
                    flexslider1 = {vars: {}};
            function getGridSize1() {
                return (window.innerWidth < 480) ? 1 :
                        (window.innerWidth < 768) ? 2 :
                        (window.innerWidth < 1200) ? 3 : 4;
            }
            setTimeout(function () {
                $window.trigger('resize');
                jQuery('.product_slider').flexslider({
                    animation: "slide",
                    itemWidth: 165,
                    itemMargin: 30,
                    directionNav: true,
                    controlNav: false,
                    minItems: getGridSize1(),
                    maxItems: getGridSize1(),
                    move: 1,
                    start: function (slider1) {
                        flexslider1 = slider1;
                    }
                });
            }, 500);
            $window.resize(function () {
                var gridSize1 = getGridSize1();
                flexslider1.vars.minItems = gridSize1;
                flexslider1.vars.maxItems = gridSize1;
            });
        }());
    });
    jQuery('#responsiveTabs3').responsiveTabs({});
    jQuery('#responsiveTabs3 .r-tabs-nav li.r-tabs-state-default').click(function () {
        jQuery('#responsiveTabs3 .r-tabs-nav li.r-tabs-state-default').trigger('dblclick');
    });
    jQuery('#responsiveTabs3 .r-tabs-nav li.r-tabs-state-default').dblclick(function () {
        (function () {
            var $window = jQuery(window),
                    flexslider1 = {vars: {}};
            function getGridSize1() {
                return (window.innerWidth < 480) ? 1 :
                        (window.innerWidth < 768) ? 2 :
                        (window.innerWidth < 1200) ? 3 : 4;
            }
            setTimeout(function () {
                $window.trigger('resize');
                jQuery('.product_slider').flexslider({
                    animation: "slide",
                    itemWidth: 165,
                    itemMargin: 30,
                    directionNav: true,
                    controlNav: false,
                    minItems: getGridSize1(),
                    maxItems: getGridSize1(),
                    move: 1,
                    start: function (slider1) {
                        flexslider1 = slider1;
                    }
                });
            }, 500);
            $window.resize(function () {
                var gridSize1 = getGridSize1();
                flexslider1.vars.minItems = gridSize1;
                flexslider1.vars.maxItems = gridSize1;
            });
        }());
    });


});
/********************* Product list page slider js start*************************/
jQuery('document').ready(function () {
    (function () {
        var $window = jQuery(window),
                flexslider1 = {vars: {}};
        function getGridSize1() {
            return (window.innerWidth < 480) ? 2 :
                    (window.innerWidth < 768) ? 2 :
                    (window.innerWidth < 1200) ? 3 : 4;
        }
        jQuery('.product_slider').flexslider({
            animation: "slide",
            itemWidth: 165,
            itemMargin: 30,
            directionNav: true,
            controlNav: false,
            minItems: getGridSize1(),
            maxItems: getGridSize1(),
            move: 1,
            start: function (slider1) {
                flexslider1 = slider1;
            }
        });
        setTimeout(function () {
            $window.trigger('resize');
            jQuery('.product_slider').flexslider({
                animation: "slide",
                itemWidth: 165,
                itemMargin: 30,
                directionNav: true,
                controlNav: false,
                minItems: getGridSize1(),
                maxItems: getGridSize1(),
                move: 1,
                start: function (slider1) {
                    flexslider1 = slider1;
                }
            });
        }, 500);
        $window.resize(function () {
            var gridSize1 = getGridSize1();
            flexslider1.vars.minItems = gridSize1;
            flexslider1.vars.maxItems = gridSize1;
        });
    }());
    jQuery('.flex-caption').fancybox({
        openEffect: 'elastic',
        closeEffect: 'elastic'
    });
});

/********************* Product list page slider js end*************************/
