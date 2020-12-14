$(document).ready(function(){
	$('.btnDeleteUser').click(function(e) {
		var userID_ = $(e.currentTarget).attr('data-id');
		var name_   = $(e.currentTarget).attr('data-name');

		Swal.fire({
        title: 'Are you sure?',
        html: "You want to delete selected user <b>(" + name_ + ")</b>",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#4e555b',
        confirmButtonText: 'Yes, Delete!'
    }).then((result) => {
        if (result.isConfirmed) {
        	$.ajax({
        		url:'/user/deleteUser',
        		type:'POST',
        		beforeSend:function () {
        			ShowLoader();
        		},
        		data:{userID:userID_},
        		success:function (res) {
        		  if (res == 'Success') {
	                  Swal.fire({
	                    title: "User Deletion",
	                    text: "Deleted successfully.",
	                    icon: 'success',
	                    timer:3000
	                  }).then((result) => {
		                location.reload();
		              });
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
        		error:function () {
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
    });
	});
});
