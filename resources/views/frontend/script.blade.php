<script>
    var numSlick = 0;
    $(".slider-products").each(function () {
        numSlick++;
        $(this)
            .addClass("slider-" + numSlick)
            .slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: true,
                fade: true,
                asNavFor: ".slider-nav.slider-" + numSlick,
            });
    });
    $('.dropdown-toggle').mouseenter(function () {
        $(this).parents('.custom-dropdown-area').find('.custom-Dropdown').slideDown(300);
        // if ($(".User-Dropdown").hasClass("U-open")) {
        //     $('.User-Dropdown').removeClass("U-open");
        // }
        // else {
        //     $('.User-Dropdown').addClass("U-open");
        // }
    });

    $('.custom-Dropdown').hover(function () {
        $(this).slideDown();
    });
    $('.custom-Dropdown').mouseleave(function () {
        $(this).slideUp(300);
    });
    $('.top-links').mouseleave(function () {
        $(this).find('.custom-Dropdown').slideUp(300);
    });
    $(".user-btn").click(function () {
        $("nav ul .user-show").toggleClass("show3");
        $("nav ul .fourth").toggleClass("rotate");
    });
    numSlick = 0;
    $(".slider-nav").each(function () {
        numSlick++;
        $(this)
            .addClass("slider-" + numSlick)
            .slick({
                vertical: false,
                slidesToShow: 4,
                slidesToScroll: 1,
                asNavFor: ".slider-products.slider-" + numSlick,
                arrow: true,
                focusOnSelect: true,
                responsive: [
                    {
                        breakpoint: 800,
                        settings: {
                            slidesToShow: 3,
                        },
                    },
                ],
            });
    });
    $(document).ready(function () {
        $("#toggle_filter").click(function () {
            $("#main_filter").slideToggle("Slow");
        });
    });

    // Open and Close Navbar Menu

    const navbarMenu = document.getElementById("menu");
    const burgerMenu = document.getElementById("burger");
    const bgOverlay = document.querySelector(".overlay");

    if (burgerMenu && bgOverlay) {
        burgerMenu.addEventListener("click", () => {
            navbarMenu.classList.add("is-active");
            bgOverlay.classList.toggle("is-active");
        });

        bgOverlay.addEventListener("click", () => {
            $("body").removeClass("scroll-active");
            navbarMenu.classList.remove("show");
            bgOverlay.classList.toggle("show");
        });
    }

    // Close Navbar Menu on Links Click
    document.querySelectorAll(".menu-link").forEach((link) => {
        link.addEventListener("click", () => {
            navbarMenu.classList.remove("is-active");
            bgOverlay.classList.remove("is-active");

        });
    });

    // Open and Close Search Bar Toggle
    const searchBlock = document.querySelector(".search-block");
    const searchToggle = document.querySelector(".search-toggle");
    const searchCancel = document.querySelector(".search-cancel");

    if (searchToggle && searchCancel) {
        searchToggle.addEventListener("click", () => {
            searchBlock.classList.add("is-active");
        });

        searchCancel.addEventListener("click", () => {
            searchBlock.classList.remove("is-active");
        });
    }

    $(".heart_img").click(function () {
        if (!$(this).hasClass("active")) {
            $(this).attr("src", "https://eliteblue.net/Clients/viys/coupon/public/frontend/img/active0.png");
            $(this).addClass("active");
        } else {
            $(this).attr("src", "https://eliteblue.net/Clients/viys/coupon/public/frontend/img/Icon feather-heart.png");
            $(this).removeClass("active");
        }
    });
    $(".like_img").click(function () {
        if (!$(this).hasClass("active")) {
            $(this).attr("src", "https://eliteblue.net/Clients/viys/coupon/public/frontend/img/filled.png");
            $(this).addClass("active");
        } else {
            $(this).attr("src", "https://eliteblue.net/Clients/viys/coupon/public/frontend/img/Path 81.png");
            $(this).removeClass("active");
        }
    });

    // Iterate over each select element
    $("#selectbox1").each(function () {
        // Cache the number of options
        var $this = $(this),
            numberOfOptions = $(this).children("option").length;

        // Hides the select element
        $this.addClass("s-hidden");

        // Wrap the select element in a div
        $this.wrap('<div class="select"></div>');

        // Insert a styled div to sit over the top of the hidden select element
        $this.after('<div class="styledSelect"></div>');

        // Cache the styled div
        var $styledSelect = $this.next("div.styledSelect");

        // Show the first select option in the styled div
        $styledSelect.text($this.children("option").eq(0).text());

        // Insert an unordered list after the styled div and also cache the list
        var $list = $("<ul />", {
            class: "options",
        }).insertAfter($styledSelect);

        // Insert a list item into the unordered list for each select option
        for (var i = 1; i < numberOfOptions; i++) {
            var $links = $("<li />", {
                rel: $this.children("option").eq(i).val(),
            }).appendTo($list);
            $("<a />", {
                text: $this.children("option").eq(i).text(),
                href: $this.children("option").eq(i).val(),
            }).appendTo($links);
        }

        // Cache the list items
        var $listItems = $list.children("li");

        // Show the unordered list when the styled div is clicked (also hides it if the div is clicked again)
        $styledSelect.click(function (e) {
            e.stopPropagation();
            // $("div.styledSelect.active").each(function () {
            //   $(this).removeClass("active").next("ul.options").hide();
            // });
            $(this).toggleClass('active')
            $("ul.options").toggleClass('options_active');
        });

        // Hides the unordered list when a list item is clicked and updates the styled div to show the selected list item
        // Updates the select element to have the value of the equivalent option
        $listItems.click(function (e) {
            e.stopPropagation();
            $styledSelect.text($(this).text()).removeClass("active");
            $this.val($(this).attr("rel"));
            $list.hide();
            /* alert($this.val()); Uncomment this for demonstration! */
        });

        // Hides the unordered list when clicking outside of it
        $(document).click(function () {
            $styledSelect.removeClass("active");
            $list.hide();
        });
    });


    // const bgOverlay = document.querySelector(".overlay");
    $(".togle").click(function () {
        $(this).toggleClass("click");
        $(".sidebar").toggleClass("show");
        $("body").toggleClass("scroll-active");
        $(".overlay").toggleClass("is-active");
    });
    $(".search-toggle").click(function () {
        $(".togle").toggleClass("click");
        $(".sidebar").toggleClass("show");
        $(".overlay").toggleClass("is-active");
    });
    bgOverlay.addEventListener("click", () => {
        $(".togle").removeClass("click");
        $(".sidebar").removeClass("show");
        $(".overlay").removeClass("is-active");
        // bgOverlay.classList.toggle("show");
    });
    $(".feat-btn").click(function () {
        $("nav ul .feat-show").toggleClass("show");
        $("nav ul .first").toggleClass("rotate");
    });
    $(".serv-btn").click(function () {
        $("nav ul .serv-show").toggleClass("show1");
        $("nav ul .second").toggleClass("rotate");
    });
    $(".categ-btn").click(function () {
        $("nav ul .categ-show").toggleClass("show4");
        $("nav ul .five").toggleClass("rotate");
    });
    $(".comm-btn").click(function () {
        $("nav ul .comm-show").toggleClass("show2");
        $("nav ul .third").toggleClass("rotate");
    });
    $("nav ul li.linkz").click(function () {
        $(this).addClass("active").siblings().removeClass("active");
    });


    $("[data-fancybox]").fancybox({
        afterClose: function () {
            $(this.href).show();
        },
        // Options will go here
        buttons: ["close"],
        wheel: false,
        transitionEffect: "slide",
        // thumbs          : false,
        // hash            : false,
        loop: true,
        // keyboard        : true,
        toolbar: false,
        // animationEffect : false,
        // arrows          : true,
        clickContent: false,
    });

</script>
