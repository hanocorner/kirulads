$(function () {

	/* Varibales */
	var formData = null;
	var messageBox = $('#messageBox');
	var formLogin = $('#formLogin');
	var formReg = $('#formRegister');
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

}); // End of document ready
