
/* ------------------------------- Chimp Solutions All Funtions Start ------------------------------- */
(function($) {



    /* ------------------------------- Document Rready Funtions Start ------------------------------- */

    jQuery(document).ready(function() {
        //		
        //		$( "#target-list" ).click(function() {
        //			if ($('.cs-main-nav').hasClass("'col-lg-4', 'col-md-4', 'col-sm-6', 'col-xs-12'")) {
        //					$('.cs-main-nav').removeClass("'col-lg-4', 'col-md-4', 'col-sm-6', 'col-xs-12'");
        //			} else {
        //				$('.cs-main-nav').addClass("'col-lg-4', 'col-md-4', 'col-sm-6', 'col-xs-12'");
        //				}
        //			});
        //		$( "#target-grid" ).click(function() {
        //			if ($('.cs-main-nav').hasClass("'col-lg-12', 'col-md-12', 'col-sm-12', 'col-xs-12'")) {
        //					$('.cs-main-nav').removeClass("'col-lg-12', 'col-md-12', 'col-sm-12', 'col-xs-12'");
        //			}else {
        //				$('.cs-main-nav').addClass("'col-lg-12', 'col-md-12', 'col-sm-12', 'col-xs-12'");
        //				}
        //			});	
        //		



        /*
         * Responsive Menu
         */
        if (jQuery(".main-navigation>ul").length != '') {
            jQuery('.main-navigation>ul').slicknav();
        }



        /*  bootstrap-slider */
        if (jQuery("#price").length != '') {
            $("#price").slider({});
        }
        if (jQuery("#engine").length != '') {
            $("#engine").slider({});
        }

        $('[data-toggle="tooltip"]').tooltip();


        /*If Condition counter Start*/
        if (jQuery(".counter").length != '') {
            jQuery('.counter').counterUp({
                delay: 10,
                time: 1000
            });
        }

        /*If Condition Counter End*/


        /* 
         * Start Sticky Side Bar
         */



        /*If Condition Start*/
        if (jQuery(".cs-banner-slider").length != '') {
            $('.cs-banner-slider').slick({
                dots: false,
                arrows: true,
                infinite: true,
                speed: 300,
                autoplay: true,
                autoplaySpeed: 2000,
                slidesToShow: 4,
                slidesToScroll: 1,
                responsive: [{
                        breakpoint: 1170,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 1,
                            infinite: true
                        }
                    }, {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 1
                        }
                    }, {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    }
                    // You can unslick at a given breakpoint now by adding:
                    // settings: "unslick"
                    // instead of a settings object
                ]
            });
        }
        /*If Condition End*/


        /*If Condition Start*/
        if (jQuery(".cs-auto-box-slider").length != '') {

            jQuery(".cs-auto-box-slider").slick({
                slidesToShow: 3,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 2000,
                dots: false,
                infinite: true,
                responsive: [{
                        breakpoint: 1024,
                        settings: {

                        }
                    }, {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 1
                        }
                    }, {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    }

                ]
            });
        }
        /*If Condition End*/

        /*If Condition Client Slider Start*/
        if (jQuery(".cs-logo-slider").length != '') {


            $('.cs-logo-slider').slick({
                dots: false,
                infinite: false,
                speed: 300,
                slidesToShow: 6,
                slidesToScroll: 1,
                arrows: false,
                autoplay: true,
                responsive: [{
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 6,



                        }
                    }, {
                        breakpoint: 700,
                        settings: {
                            slidesToShow: 3,

                        }
                    }, {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 2,

                        }
                    }
                    // You can unslick at a given breakpoint now by adding:
                    // settings: "unslick"
                    // instead of a settings object
                ]
            });

        }
        /*If Condition Client Slider End*/
		/*Testimonial Slider*/
		$('.cs-testimonial-slider').slick({
		  dots: true,
		  arrows: false,
		  slidesToShow: 1,
		  slidesToScroll: 1,
		  autoplay: true,
		  autoplaySpeed: 2000,
		});	
		
		/*partners Slider*/
	if (jQuery(".cs-partners-slider").length != '') {
			$('.cs-partners-slider').slick({
				dots: false,
				arrows: false,
				infinite: true,
				speed: 300,
				autoplay: true,
				autoplaySpeed: 2000,
				slidesToShow: 6,
				slidesToScroll: 1,
				responsive: [{
						breakpoint: 1170,
						settings: {
							slidesToShow: 4,
							slidesToScroll: 1,
							infinite: true
						}
					}, {
						breakpoint: 768,
						settings: {
							slidesToShow: 3,
							slidesToScroll: 1
						}
					}, {
						breakpoint: 480,
						settings: {
							slidesToShow: 2,
							slidesToScroll: 1
						}
					}
					// You can unslick at a given breakpoint now by adding:
					// settings: "unslick"
					// instead of a settings object
				]
			});
		}		
		
        /* ------------------------------- Blog Listing grid view slider start ------------------------------- */
        if (jQuery(".blog-listing-grid-slider").length != '') {
            $('.blog-listing-grid-slider').slick({
                infinite: true,
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay: true,
            });
        }
        /* ------------------------------- Blog Listing grid view slider End --------------------------------- */


        /* ------------------------------- Blog Listing large view slider start ------------------------------- */
        if (jQuery(".blog-listing-large-slider").length != '') {
            $('.blog-listing-large-slider').slick({
                infinite: true,
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay: true,
            });
        }

        /* ------------------------------- Blog Listing large view slider End --------------------------------- */


        /* ------------------------------- Blog Listing medium view slider start ------------------------------- */
        if (jQuery(".blog-medium-slider").length != '') {
            $('.blog-medium-slider').slick({
                infinite: true,
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay: true,
            });
        }
        /* ------------------------------- Blog Listing medium view slider End --------------------------------- */


        /* ------------------------------- Blog Detail slider start ------------------------------- */
        if (jQuery(".blog-detail-slider").length != '') {
            $('.blog-detail-slider').slick({
                infinite: true,
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay: true,
            });
        }
        /* ------------------------------- Blog Detail slider End --------------------------------- */

        /* 
         * Btn Top
         */

        jQuery('.btn-to-top').on('click', function(e) {
            e.preventDefault();
            jQuery('html, body').animate({
                scrollTop: 0
            }, 800);
        });

        /* -------------------------------
        * Chosen Select 
        ---------------------------------- */

        var config = {
            '.chosen-select': {
                width: "100%"
            },
            '.chosen-select-deselect': {
                allow_single_deselect: true,
			 width: "100%"
            },
            '.chosen-select-no-single': {
                disable_search_threshold: 10,
			 width: "100%"
            },
            '.chosen-select-no-results': {
                no_results_text: 'Oops, nothing found!',
			 width: "100%"
            },
            '.chosen-select-width': {
                width: "100%"
            }
        }
        for (var selector in config) {
            $(selector).chosen(config[selector]);
        }
        /*Slider Bootstrap Start*/
        if (jQuery('#ex6').length != '') {
            $("#ex6").slider();
            $("#ex6").on("slide", function(slideEvt) {
                $("#ex6SliderVal").text(slideEvt.value);
            });
        }
        /*Slider Bootstrap End*/



        if (jQuery('.auto-media-slider').length != '') {
            jQuery('.auto-media-slider').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 2000,
            });
        }
        /*If Condition Start*/
        if (jQuery('.cs-detail-slider').length != '') {
            $('.cs-detail-slider').slick({
                slidesToShow: 5,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 2000,
            });
        }
        /*If Condition End*/

        //Map Scroll None Function
        $('.maps').click(function() {
            $('.maps iframe').css("pointer-events", "auto");
        });

        $(".maps").mouseleave(function() {
            $('.maps iframe').css("pointer-events", "none");
        });


        /* -------------------------------
		* Focus new code Start
		---------------------------------- */
        jQuery('input,textarea').on('focus', function() {
            var $this = jQuery(this);
            $this.data('placeholder', $this.prop('placeholder'));
            $this.removeAttr('placeholder')
        }).on('blur', function() {
            var $this = jQuery(this);
            $this.prop('placeholder', $this.data('placeholder'));
        });


        /*
         * Under Construction Count Down
         */
        if (jQuery('#getting-started').length != '') {
            jQuery('#getting-started').countdown('2016/03/20', function(event) {
                jQuery(this).html(event.strftime('<div class="time-box"><h4 class="dd">%D</h4> <span class="label">days</span><span class="cs-slash">&#x2F</span></div><div class="time-box"><h4 class="hh">%H</h4><span class="label">hours</span><span class="cs-slash">&#x2F</span></div><div class="time-box"><h4 class="mm">%M</h4> <span class="label">minutes</span><span class="cs-slash">&#x2F</span></div><div class="time-box"><h4 class="ss">%S</h4> <span class="label">seconds</span></div> '));
            });
        }


        /* ------------------------------- Quantity plus minus Funtions ------------------------------- */
        // This button will increment the value
        $('.qtyplus').click(function(e) {
            // Stop acting like a button
            e.preventDefault();
            // Get the field name
            fieldName = $(this).attr('field');
            // Get its current value
            var currentVal = parseInt($('input[name=' + fieldName + ']').val());
            // If is not undefined
            if (!isNaN(currentVal)) {
                // Increment
                $('input[name=' + fieldName + ']').val(currentVal + 1);
            } else {
                // Otherwise put a 0 there
                $('input[name=' + fieldName + ']').val(0);
            }
        });
        // This button will decrement the value till 0
        $(".qtyminus").click(function(e) {
            // Stop acting like a button
            e.preventDefault();
            // Get the field name
            fieldName = $(this).attr('field');
            // Get its current value
            var currentVal = parseInt($('input[name=' + fieldName + ']').val());
            // If it isn't undefined or its greater than 0
            if (!isNaN(currentVal) && currentVal > 0) {
                // Decrement one
                $('input[name=' + fieldName + ']').val(currentVal - 1);
            } else {
                // Otherwise put a 0 there
                $('input[name=' + fieldName + ']').val(0);
            }
        });
        /* ------------------------------- Quantity plus minus Funtions End ------------------------------- */


        /*Lazy Image Loader Start*/
        echo.init({
            offset: 100,
            throttle: 10,
            unload: false,
            callback: function(element, op) {
                console.log(element, 'has been', op + 'ed')
            }
        });
        /*Lazy Image Loader End*/

        $(function() {
            $(".more-text").slice(0, 2).show(500); // select the first ten
            $("#load-text").click(function(e) { // click event for load more
                e.preventDefault();
                $(".more-text:hidden").slice(0, 2).show(500); // select next 10 hidden divs and show them
                if ($(".more-text:hidden").length == 0) { // check if any hidden divs still exist

                }
            });
        });


    });
    /* ------------------------------- Document Rready Funtions End ------------------------------- */


    /* ------------------------------- Window Load Funtions Start ------------------------------- */
	

    jQuery(window).load(function() {
        if (jQuery(".cs-select-model .cs-checkbox-list").length != '') {
            $(".cs-select-model .cs-checkbox-list").mCustomScrollbar({
                setHeight: 300,
                theme: "dark"
            });
        }
		/*
     * Popup hover function  
     */
    var notH = 1,
            $pop = $('#popup').hover(function () {
        notH ^= 1;
    });

    $(document).on('mousedown keydown', function (e) {
        if (notH || e.which == 27)
            $pop.stop().fadeOut();
    });

    $('.pop').click(function () {
        $pop.stop().fadeIn();
    });

    /*
     * End Popup hover function  
     */
		
    });
    /* ------------------------------- Window Load Funtions End ------------------------------- */

    /* ------------------------------- Window Scroll Funtions Start ------------------------------- */

    jQuery(window).scroll(function() {
        /*
         * Header Add Class Start
         */
        //Detail Button Section Start
        var scroll = jQuery(window).scrollTop();
        if (scroll >= 700) {
            jQuery(".cs-button-style").addClass("cs-button-style-none");
        } else {
            jQuery(".cs-button-style").removeClass("cs-button-style-none");
        }
        //Detail Button Section End

        //Detail Nav bar Start
        var scroll = jQuery(window).scrollTop();
        if (scroll >= 700) {
            jQuery(".cs-detail-nav").addClass("cs-detail-nav-fixed");
        } else {
            jQuery(".cs-detail-nav").removeClass("cs-detail-nav-fixed");
        }
        //Detail Nav bar End


    });
    /* ------------------------------- Window Scroll Funtions End ------------------------------- */




    $(document).ready(function() {
        $(document).on("scroll", onScroll);

        //smoothscroll
        $('.cs-detail-nav ul li a[href^="#"]').on('click', function(e) {
            e.preventDefault();
            $(document).off("scroll");

            $('.cs-detail-nav ul li a').each(function() {
                $(this).removeClass('active');
            })
            $(this).addClass('active');

            var target = this.hash,
                menu = target;
            $target = $(target);
            $('html, body').stop().animate({
                'scrollTop': $target.offset().top + 2
            }, 500, 'swing', function() {
                window.location.hash = target;
                $(document).on("scroll", onScroll);
            });
        });
    });

    function onScroll(event) {
        var scrollPos = $(document).scrollTop();
        $('.cs-detail-nav ul li a').each(function() {
            var currLink = $(this);
            var refElement = $(currLink.attr("href"));
            if (refElement.position().top <= scrollPos && refElement.position().top + refElement.height() > scrollPos) {
                $('.cs-detail-nav ul li a').removeClass("active");
                currLink.addClass("active");
            } else {
                currLink.removeClass("active");
            }
        });
    }



})(jQuery);

/* ------------------------------- Chimp Solutions All Funtions End ------------------------------- */