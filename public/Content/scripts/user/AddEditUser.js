$(function () {

	$('#btnSaveUser').click(function(e){
		e.preventDefault();
		if(ValidateData()){
			alert('yes');
		}
	});
   
  })

function ValidateData() {
   var result = true;
   $('#frmUserAddEdit .require').each(function () {
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