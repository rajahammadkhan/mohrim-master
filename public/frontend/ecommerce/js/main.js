$(document).ready(function () {

    // Mobile Navigation JS START

    $(".navigation-list ul").each(function () {
        var $this = $(this);
        $this.clone().attr("class", "mobile-nav-items").appendTo(".mobile-body");
    });

    $(".hamburger").on("click", function (e) {
        e.preventDefault();
        var body_element = $("body");

        if ((body_element).hasClass("mobile-view")) {
            body_element.removeClass("mobile-view");
        } else {
            body_element.addClass("mobile-view");
        }
    });

    $(".mobile-close").on("click", function (e) {
        e.preventDefault();
        var body_element = $("body");

        if ((body_element).hasClass("mobile-view")) {
            body_element.removeClass("mobile-view");
        }
    });

    $(document).mouseup(function (e) {
        var container = $(".mobile-nav");
        if (!container.is(e.target) && container.has(e.target).length === 0) {
            if ($("body").hasClass("mobile-view")) {
                $("body").removeClass("mobile-view");
            }
        }
    });

    $(window).resize(function () {
        var $this = $(this),
            win_width = $this.width();

        if (win_width > 990) {
            if ($("body").hasClass("mobile-view")) {
                $("body").removeClass("mobile-view");
            }
        }
    });

    // Mobile Navigation JS END


    // WOW JS

    new WOW().init();


    // SERVICES-SEC SLICK

    $('.service-slider').slick({
        dots: true,
        arrows: true,
        infinite: false,
        speed: 300,
        slidesToShow: 3,
        slidesToScroll: 1,
        responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    infinite: true,
                    dots: true
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            },
            {
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



    // TESTIMONIAL-SEC SLICK

    $('.testimonial-slider').slick({
        dots: true,
        arrows: false,
        infinite: false,
        speed: 300,
        slidesToShow: 3,
        slidesToScroll: 1,
        responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    infinite: true,
                    dots: true
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            },
            {
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

});