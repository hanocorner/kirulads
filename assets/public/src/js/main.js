$(function () {

	/* Varibales */
	var formData = null;
	var messageBox = $('#messageBox');
	var formLogin = $('#formLogin');
	var formReg = $('#formRegister');
	/* Functions */

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
			success: function (response) {
				if(response.auth) {
					location.href = response.url;
				}
				else {
					$('input[name=csrf_test_name]').val(response.csrf);
					messageBox.html(response.message);
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
			success: function (response) {
				if(response.auth) {
					location.href = response.url;
				}
				else {
					$('input[name=csrf_test_name]').val(response.csrf);
					messageBox.html(response.message);
				}				
			},
			fail: function () {
				console.log('Error');
			}
		});
	}


	/* Binding */

    // Create
    
	formReg.on("submit", function (event) {
		event.preventDefault();
		create_user(this);
	});

	formLogin.on("submit", function (event) {
		event.preventDefault();
		login(this);
	});

}); // End of document ready
