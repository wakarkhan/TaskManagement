$(document).ready(function(){
  $('.chkbox-p').click(function() {
    var chkInput = $(this).find('.chkviews');
    if(chkInput[0].checked){
        chkInput[0].checked = false;
    }else{
        chkInput[0].checked = true;
    }
  })

	$('.btnSaveUser').click(function(e) {
		e.preventDefault();
		if(ValidateData()){
      //SET ROLES INTO ARRAY:
      var rolesArray = [];  
      var countRoles = $('.chkviews:checked').length;
      var jsonRoleArray;
      if(countRoles > 0) {
        $('.chkviews').each(function(i,e) {
          var isView = 0;

          if($(e).prop('checked')){
                isView = 1;
          }

          rolesArray.push({
            MenuDetailID : parseInt($(e)[0].id.split("_")[1]),
            IsView : isView
          });

        });

        if(rolesArray.length > 0) {
            jsonRoleArray = JSON.stringify(rolesArray);
          }

      }
      $('#txtRoles').val(jsonRoleArray);

			$('#frmUserAddEdit').submit();
		}
	});

  $('.btnCancelUser').click(function(e) {
       Swal.fire({
        title: 'Are you sure?',
        text: "You want to discard changes.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes'
      }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = '/user';
        }
      });
  });

  $('#sltRole').change(function(e) {
      if($('#sltRole option:selected').text() == 'Administrator') {
        $('.chkviews').attr('checked',true);
      } else {
        $('.chkviews').attr('checked',false);
        $('.chkviews').slice(-3).attr('checked',true);
      }
  })

  $('#btnUpdatePass').click(function() {
    if(ValidatePasswords()) {
        $.ajax({
            url: '/user/updateUserPassword',
            type: 'POST',
            beforeSend:function() {
              ShowLoader();
            },
            data: {
              _token   : $('#frmPasswordChange input[name=_token]').val(),
              userID   : $('#UserID').val(),
              password : $('#txtNewPassword').val()
            },
            success:function(res) {
              HideLoader();
              $('#btnClosePassModel').click();          

              if (res == 'Success') {
                  Swal.fire({
                    title: "User Password",
                    text: "Save successfully.",
                    icon: 'success',
                    timer:2000
                  });
              }
              else {
                Swal.fire({
                    title: "User Password",
                    text: "Something went wrong. Please try again later.",
                    icon: 'error',
                    timer:2000
                  });               
              }
            },
            error:function(e) {
              HideLoader();
              console.log(e);
              $('#btnClosePassModel').click();

              Swal.fire({
                    title: "User Password",
                    text: "Something went wrong. Please try again later.",
                    icon: 'error',
                    timer:2000
                  });
            }
        });
    }
  })
   
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
            HideLoader();
            var res = xhr.responseText;           
            if (res == 'Success') {
                Swal.fire({
                  title: "User",
                  text: "Save successfully.",
                  icon: 'success',
                  timer:3000
                }).then((result) => {
                  window.location.href = "/user";
                });
            }
            else {
              Swal.fire({
                  title: "User",
                  text: "Something went wrong. Please try again later.",
                  icon: 'error',
                  timer:3000
                }).then((result) => {
                  window.location.href = "/user";
                });               
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
            if(this.id == 'txtPhone') {
               if ($(this).val().trim().length < 11) {
                    result = false;
                    $(this).addClass('required-valid');
                    Swal.fire({
                      icon: 'error',
                      text: 'Please type correct phone.',
                      timer:2000
                    }).then((result) => {
                      FocusOnValidation();
                    })
                }
            }
            else if (this.id == 'txtEmail') {
                if (isEmail($(this).val().trim())) {
                    $(this).removeClass('required-valid');
                } else {
                    result = false;
                    Swal.fire({
                      icon: 'error',
                      text: 'Please type correct email.',
                      timer:2000
                    }).then((result) => {
                      FocusOnValidation();
                    });               
                    $(this).addClass('required-valid');
                }
            }
            else {
                $(this).removeClass('required-valid');
            }
      }
    });

   if(result) {
      //CHECK PASSWORDS IF SAME:
      if(mode_ == 'Add'){
         if($('#txtPassword').val() != $('#txtConfPassword').val()){
             Swal.fire({
              icon: 'error',
              text: 'Passwords did not match.',
              timer:2000
            }).then((result) => {
              $('html, body').animate({
                scrollTop: $("#txtPassword").offset().top - 70
              }, 1000);
              $('#txtPassword').first().focus();
            });
            return;
         }
      }
    

     if($('.chkviews:checked').length == 0) {
        result = false;
          Swal.fire({
          icon: 'error',
          text: 'Please selected privileges.',
          timer:2000
        }).then((result) => {
          $('html, body').animate({
            scrollTop: $(".chkviews:visible").first().offset().top - 70
          }, 1000);
          $('.chkviews:visible').first().focus();
        });
     }
   }else{
      FocusOnValidation();
   }
  
    return result;
}


function isEmail(email) {
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email);
}

function ValidatePasswords() {
  var result = true;
  $('#frmPasswordChange .require').each(function () {
    if ($(this).val().trim() == '') {
      result = false;
      $(this).addClass('required-valid');
    } else {
      $(this).removeClass('required-valid');
    }
  });

  if(result){
    if($('#txtNewPassword').val() != $('#txtNewConfPassword').val()) {
      result = false;
      Swal.fire({
        icon: 'error',
        text: 'Passwords did not match.',
        timer:2000
      }).then((result) => {
        $('#txtNewPassword').focus();
      });
    }
  }

  return result;
}
