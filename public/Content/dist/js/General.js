function FocusOnValidation() {
    if ($(".required-valid:visible").length > 0) {
        $('html, body').animate({
            scrollTop: $(".required-valid:visible").first().offset().top - 70
        }, 1000);
        $('.required-valid:visible').first().focus();
    }
}