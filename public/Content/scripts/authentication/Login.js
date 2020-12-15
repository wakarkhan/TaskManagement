$(document).ready(function(){
	$('.btn-sign-in').click(function (e) {
		if(ValidateData()) {
			$('#frmUserAddEdit').submit();
		}
	})

	$.ajaxSetup({
	  headers: {
	    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	  }
	});
});

function ValidateData() {
   var result = true;
   $('form .require').each(function () {
        if ($(this).val().trim() == '') {
            result = false;
            $(this).addClass('required-valid');
        } else {
            $(this).removeClass('required-valid');
      }
    });

    
    FocusOnValidation();
  
    return result;
}


function FocusOnValidation() {
    if ($(".required-valid:visible").length > 0) {
        $('html, body').animate({
            scrollTop: $(".required-valid:visible").first().offset().top - 70
        }, 1000);
        $('.required-valid:visible').first().focus();
    }
}