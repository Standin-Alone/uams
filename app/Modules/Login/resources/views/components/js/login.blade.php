<script>
	$('#login_form').ready(function(){
		// e.preventDefault();
		$('#login_form').validate({
			errorClass: "invalid",
   			validClass: "valid",
			rules: {
				email: {
                	required: true,
					email: true,
           		},
            	password: {
                	required: true,
            	},
			},
			messages: {
				email: 	{
							required: '<div class="text-danger">*The email field is required!</div>',
							email: '<div class="text-danger">*Please enter a valid email address!</div>',
        				},
            	password: '<div class="text-danger">*The password field is required!</div>',
			},
			// Customize placement of created message error labels. 
			errorPlacement: function(error, element) {
				error.appendTo( element.parent().find(".error_msg"));
        	}
		});
	});
	$(document).on('submit', 'form#login_form', function(e){
		e.preventDefault();

		var route = "{{route('user.login')}}";
		var form_data = $(this);

		$("button.btn-log").attr("disabled", true);
        // $(".btn-log").text("Processing...");
		$(".btn-log").html('<span><i class="fas fa-spinner fa-pulse"></i></span>');

		$.ajax({
			headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        	},
			method: 'POST',
			url: route,
			data: form_data.serialize(),
			success: function(otp_mail_success ){
				console.log(otp_mail_success['uuid']);
				route = "{{route('otp_page',['uuid'=>':id'])}}".replace(':id', otp_mail_success['uuid']);

				// console.log(route);
				
				setTimeout(function(){
					$("button.btn-log").attr("disabled", false);
					$(".btn-log").html('<span id="submit-btn">SIGN ME IN</span>');
					Swal.fire({
					position: 'center',
					icon: 'success',
					title: otp_mail_success.message,
					showConfirmButton: true,
					}).then(function(){ 
						window.location.href = route;
					});
				}, 1500);	
          	},
			error: function(error_response){
				setTimeout(function(){
					$("button.btn-log").attr("disabled", false);
					$(".btn-log").html('<span id="submit-btn">SIGN ME IN</span>');
					$('span.error_email_pass').empty();
					$('#login_form')[0].reset();
					Swal.fire({
						icon: error_response.responseJSON['icon'],
						title: error_response.responseJSON['message'],
						showClass: {
							popup: 'animate__animated animate__fadeInDown'
						},
						hideClass: {
							popup: 'animate__animated animate__fadeOutUp'
						}
					}).then(function(){ 
						window.location.href = "{{ route('user.logout')}} ";
                    });
				}, 1500);
			}
		});
	});
</script>