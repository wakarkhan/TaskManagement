$(document).ready(function(){
	$('.btn-sign-in').click(function (e) {
		if(ValidateData()) {
			checkLogin();
		}
	})

	$.ajaxSetup({
	  headers: {
	    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	  }
	});
});

function checkLogin() {
	$.ajax({
		url:'/authentication/checkLogin',
		type:'POST',
		beforeSend:function () {
			///ShowLoader();
		},
		data:{userID:userID_},
		success:function (res) {
		  if (res == 'Success') {
           //    Swal.fire({
           //      title: "User Deletion",
           //      text: "Deleted successfully.",
           //      icon: 'success',
           //      timer:3000
           //    }).then((result) => {
              //   location.reload();
              // });
          } else {
            Swal.fire({
                title: "User Deletion",
                text: "Something went wrong. Please try again later.",
                icon: 'error',
                timer:3000
              }).then((result) => {
                location.reload();
              });             
           }
		},
		error:function (e) {
			Swal.fire({
                title: "User Deletion",
                text: "Something went wrong. Please try again later.",
                icon: 'error',
                timer:3000
              }).then((result) => {
                location.reload();
            }); 
		}
	});
}


function ValidateData() {
   var result = true;
   $('form .require').each(function () {
        if ($(this).val().trim() == '') {
            result = false;
            $(this).parent().addClass('required-valid');
        } else {
            $(this).parent().removeClass('required-valid');
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

