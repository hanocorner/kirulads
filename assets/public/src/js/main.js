$(function () {

	/* Varibales */
	var formData = null;
	var message = new Array();
	var messageBox = $('#messageBox');
	var formLogin = $('#formLogin');
	var formReg = $('#formRegister');
	var formSubmitAd = $('#formSubmitAd');
	var maiExist = $('input[name=usermail]');


	/* Functions */

	//
	var message = function (msg, type) {
		var box;
		switch (type) {
			case 'error':
				return box = '<div class="notify-box">' +
					'<noscript>Sorry, your browser does not support JavaScript!</noscript>' +
					'<div class="error d-flex align-items-center">' +
					'<img src="' + baseurl + 'assets/public/dist/images/error.png" alt="Error-Image" class="img-fluid">' +
					'<div>' + msg + '<div>' +
					'</div>' +
					'</div>';
			case 'success':
				return box = '<div class="notify-box">' +
					'<noscript>Sorry, your browser does not support JavaScript!</noscript>' +
					'<div class="success d-flex align-items-center">' +
					'<img src="' + baseurl + 'assets/public/dist/images/success.png" alt="Success-Image" class="img-fluid">' +
					'<p>' + msg + '</p>' +
					'</div>' +
					'</div>';
			case 'info':
				return box = '<div class="notify-box">' +
					'<noscript>Sorry, your browser does not support JavaScript!</noscript>' +
					'<div class="info d-flex align-items-center">' +
					'<img src="' + baseurl + 'assets/public/dist/images/info.png" alt="Success-Image" class="img-fluid">' +
					'<p>' + msg + '</p>' +
					'</div>' +
					'</div>';


			default:
				return 'Unable to display Message';
		}
	}

	// Function to create new user
	var create_user = function (fm) {

		formData = new FormData(fm);

		$.ajax({
			url: formReg.attr("action"),
			type: formReg.attr("method"),
			dataType: 'JSON',
			data: formData,
			processData: false,
			contentType: false,
			beforeSend: function () {
				messageBox.html(message('Processing...', 'info'));
			},
			success: function (response) {
				if (response.auth) {
					messageBox.html(message(response.message, 'success'));
					location.href = response.url;
				} else {
					$('input[name=csrf_test_name]').val(response.csrf);
					messageBox.html(message(response.message, 'error'));
				}
			},
			fail: function () {
				console.log('Error');
			}
		});
	}

	// User Login
	var login = function (fm) {

		formData = new FormData(fm);

		$.ajax({
			url: formLogin.attr("action"),
			type: formLogin.attr("method"),
			dataType: 'JSON',
			data: formData,
			processData: false,
			contentType: false,
			beforeSend: function () {
				messageBox.html(message('Processing...', 'info'));
			},
			success: function (response) {
				if (response.auth) {
					messageBox.html(message(response.message, 'success'));
					location.href = response.url;
				} else {
					$('input[name=csrf_test_name]').val(response.csrf);
					messageBox.html(message(response.message, 'error'));
				}
			},
			fail: function () {
				console.log('Error');
			}
		});
	}

	// Email 
	var email_availability = function (input) {

		var msg = $('#emailExist');
		var submitBtn = $('#emailExist');
		$.ajax({
			url: baseurl + 'public/user/register/check-email',
			type: formReg.attr("method"),
			dataType: 'JSON',
			data: {
				mail: input
			},
			success: function (response) {
				if (response.auth) {
					maiExist.css('border-color', '#ced4da');
					msg.html('');
					submitBtn.prop("disabled", false).css('cursor', 'pointer');
					return true;
				} else {
					maiExist.css('border-color', 'red');
					msg.html(response.message);
					submitBtn.prop("disabled", true).css('cursor', 'not-allowed');
				}
			},
			fail: function () {
				console.log('Error');
			}
		});
	}

	var imageReader = function (input) {
		var file = input.files[0];
		// Message array
		message['allowedTypes'] = "Not a valid image format, Please upload following file type jpg|jpeg|png|gif ";
		message['height'] = "Height is too large, Please upload an image less than 1024px";
		message['width'] = "Width is too large, Please upload an image less than 1024px";
		message['fileSize'] = "File size is too large, Please upload an image less than 2MB";

		// Regular Expression to validate image allowed types
		var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.png|.gif)$");
		if (!regex.test(input.value.toLowerCase())) {
			alert(message['allowedTypes']);
			return false;
		}
		// File size MAX 2MB
		if (file.size > 2000000) {
			alert(message['fileSize']);
			return false;
		}
		if (input.files && input.files[0]) {
			var reader = new FileReader();

			reader.onload = function (e) {
				//Initiate the JavaScript Image object.
				var image = new Image();

				//Set the Base64 string return from FileReader as source.
				image.src = e.target.result;

				//Validate the File Height and Width.
				image.onload = function () {
					var height = this.height;
					var width = this.width;
					if (width > 1024) {
						alert(message['width']);
						return false;
					} else if (height > 1024) {
						alert(message['height']);
						return false;
					}
					$('#imageAd').attr('src', e.target.result);
					return true;
				};
			}
			reader.readAsDataURL(input.files[0]);
		}
		$('#removeImg').on('click', function () {
			$('#imageAd').attr('src', baseurl + 'assets/public/dist/images/no-image.png');
			$("#myAdImg").val('');
		});
	};

	// Function to submit Ad
	var submitAd = function (formid) {

		formData = new FormData(formid);

		$.ajax({
			url: formSubmitAd.attr("action"),
			type: formSubmitAd.attr("method"),
			dataType: 'JSON',
			data: formData,
			processData: false,
			contentType: false,
			beforeSend: function () {
				messageBox.html(message('Processing...', 'info'));
			},
			success: function (response) {
				if (response.auth) {
					messageBox.html(message(response.message, 'success'));
					location.href = response.url;
				} else {
					$('input[name=csrf_test_name]').val(response.csrf);
					messageBox.html(message(response.message, 'error'));
				}
			},
			fail: function () {
				console.log('Error');
			}
		});
	}

	/* Binding */

	// Create

	maiExist.on('keyup', function () {
		var mail = maiExist.val();
		if (mail.length > 12) {
			email_availability(mail);
		}

	});

	formReg.on("submit", function (event) {
		event.preventDefault();
		create_user(this);
	});

	formLogin.on("submit", function (event) {
		event.preventDefault();
		login(this);
	});

	// Form On Submit
	formSubmitAd.on("submit", function (event) {
		event.preventDefault();
		submitAd(this);
	});
	
	$("#myAdImg").change(function () {
		imageReader(this);
	});

}); // End of document ready
