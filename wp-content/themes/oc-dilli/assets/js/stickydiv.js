function sticky_relocate() {
    var window_top = $(window).scrollTop() + 1; // the "12" should equal the margin-top value for nav.stick
    var div_top = $('#checkdiv').offset().top;
        if (window_top > div_top) {
            $('nav').addClass('stick');
        } else {
            $('nav').removeClass('stick');
        }
}