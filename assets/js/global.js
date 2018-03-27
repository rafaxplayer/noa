jQuery(document).ready(function($) {

    var $grid = $('.posts-container').masonry({
        itemSelector: '.post-wrapp',

    });

    $grid.imagesLoaded().progress(function() {
        $grid.masonry('layout');
        $(".post").fadeIn();
    });

    $(document).ready(function() {
        setTimeout(function() {
            $grid.masonry('layout');
        }, 500);
    });

    $(window).resize(function() {
        $grid.masonry('layout');
    });

    $('.search-button').on('click', function(e) {
        e.preventDefault();
        $('.searchform').slideToggle();
        $('.searchform .s')[0].focus();
    });

    $('.menu-toggle').on('click', function(e) {
        e.preventDefault();
        $('#primary-menu').slideToggle();

    });

    AOS.init();

});