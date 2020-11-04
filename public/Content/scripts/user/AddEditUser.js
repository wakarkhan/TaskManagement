$(function () {

  $('.chkbox-p').click(function(){
    var chkInput = $(this).find('.chkview')
    if(chkInput[0].checked){
        chkInput[0].checked = false;
    }else{
        chkInput[0].checked = true;
    }
  })

	$('#btnSaveUser').click(function(e){
		e.preventDefault();
		if(ValidateData()){
			$('#frmUserAddEdit').submit();
		}
	});
   
});

$('#frmUserAddEdit').on('submit', function (e) {
    ShowLoader();
    var form = e.target;    
    e.preventDefault();
    e.stopImmediatePropagation();
    var xhr = new XMLHttpRequest();
    xhr.open(form.method, form.action);
    xhr.onreadystatechange = function (data) {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var res = xhr.responseText;
            console.log(res);             
            if (res == 'Success') {
                HideLoader();
                swal({
                    title: "User",
                    text: "Save successfully.",
                    icon: "success",
                    timer: 2000,
                    button: "Ok!",
                }).then(function () {
                    window.location.href = "/user";
                })
            }
            else {
                swal({
                      title: "User",
                      text: "Something went wrong. Please try again later.",
                      icon: "warning",
                      button: "Ok!",
                  }).then(function () {
                      window.location.href = "/user";
                  })
                console.log(res);
                HideLoader();
            }
        }
    };
    xhr.send(new FormData(form));
});

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

