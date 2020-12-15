$('#dataTable').DataTable({
    "aaSorting": []
});

$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

function FocusOnValidation() {
    if ($(".required-valid:visible").length > 0) {
        $('html, body').animate({
            scrollTop: $(".required-valid:visible").first().offset().top - 70
        }, 1000);
        $('.required-valid:visible').first().focus();
    }
}
//------###### Validations #####-------//
$("input[data-alpha='true']:visible").keyup(function () {
    var pattern = /\`|\~|\-|\_|\!|\@|\#|\$|\%|\^|\&|\*|\(|\)|\+|\=|\[|\{|\]|\}|\||\\|\'|\<|\,|\.|\>|\?|\/|\""|\;|\:|/;
    if ($(this).attr("data-readonly") !== "true") {
        var newVal = $(this).val().replace(/\`|\~|\-|\_|\!|\@|\#|\$|\%|\^|\&|\*|\(|\)|\+|\=|\[|\{|\]|\}|\||\\|\'|\<|\,|\.|\>|\?|\/|\""|\;|\:|/g, '')
        newVal = newVal.replace(/  +/g, ' ');
        $(this).val(newVal);
    }
})
$("input[data-alpha='true']:visible").on('input propertychange paste', function () {
    var pattern = /\`|\~|\-|\_|\!|\@|\#|\$|\%|\^|\&|\*|\(|\)|\+|\=|\[|\{|\]|\}|\||\\|\'|\<|\,|\.|\>|\?|\/|\""|\;|\:|[0-9]|/;
    if ($(this).attr("data-readonly") !== "true") {
        var newVal = $(this).val().replace(/\`|\~|\-|\_|\!|\@|\#|\$|\%|\^|\&|\*|\(|\)|\+|\=|\[|\{|\]|\}|\||\\|\'|\<|\,|\.|\>|\?|\/|\""|\;|\:|[0-9]|/g, '')
        newVal = newVal.replace(/  +/g, ' ');
        $(this).val(newVal);
    }
});

   // Validation for numers only
   $("input[data-number='true']").keyup(function () {
    var pattern = /^d+(\.[0-9]{1,2})?$/;
    if ($(this).attr("data-readonly") !== "true" && !$.isNumeric($(this).val())) {
        $(this).val('');
    } else {
        if ($(this).val().indexOf('-') > -1) {
            $(this).val('');
        }
    }
})

function ShowLoader() {
$('#loader').removeAttr('hidden');
}
function HideLoader() {
$('#loader').attr('hidden', true);
}
