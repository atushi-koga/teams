$(function () {
    $('button.navbar-toggler').on('click', function () {
        var menu = $('#navbarSupportedContent');
        if (menu.hasClass('show')) {
            menu.removeClass('show');
        } else {
            menu.addClass('show');
        }
    });
});
