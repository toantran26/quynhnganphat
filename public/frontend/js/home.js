$(document).ready(function () {
    $(".owl-mission").owlCarousel({
        rtl: true,
        loop: true,
        nav: false,
        dots: true,
        items: 2.2,
        responsive: {
            0: {
                rtl: false,
                items: 1.2,
                margin: 20,
            },
            576: {
                rtl: true,
                items: 1.2,
                margin: 20,
            },
            1520: {
                rtl: true,
                items: 2.2,
                margin: 30,
            },
            1600: {
                items: 2.5,
                margin: 50,
            },
        },
    });
    $(".owl-project").owlCarousel({
        loop: true,
        nav: false,
        margin: 30,
        dots: false,
        items: 2,
        responsive: {
            0: {
                items: 1.3,
                margin: 15,
                nav: false,
            },
            600: {
                items: 2,
                nav: false,
            },
            // 1000: {
            //     items: 4,
            //     nav: true,
            //     loop: true,
            //     margin: 20,
            // },
        },
    });
    $(".owl-leader-manage").owlCarousel({
        loop: true,
        nav: false,
        margin: 40,
        dots: false,
        items: 5,
        responsive: {
            0: {
                items: 2.65,
                margin: 20,
            },
            576: {
                items: 3,
                margin: 20,
            },
            768: {
                items: 4,
                margin: 20,
            },
            992: {
                items: 5,
                margin: 30,
            },
        },
    });

    if ($(".child li").hasClass("active")) {
        $(".child li.active").parent().parent(".item").addClass("active");
    }

    $(".arrow-top").click(function () {
        $("html, body").animate({ scrollTop: 0 }, 1000);
    });

    // tooltip bootstrap
    $('[data-toggle="tooltip"]').tooltip();
});
