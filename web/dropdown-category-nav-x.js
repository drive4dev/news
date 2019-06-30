(function ($) {
    $(document).ready(function () {
        $('.dropdown-category-nav ul.dropdown-menu [data-toggle=dropdown]').hover(function () {
            event.preventDefault();
            event.stopPropagation();
            $(this).parent().siblings().removeClass('open');
            $(this).parent().toggleClass('open');
        });
    });
})(jQuery);