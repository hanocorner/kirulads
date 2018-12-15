$(function () {

	/* Varibales */
	var form, formData = null;
	var messageBox = $('#messageBox');

	/* Functions */

	// Function to create new user
	var create_user = function (fm) {
		formData = new FormData(fm);
		$.ajax({
			url: $('#formRegister').attr("action"),
			type: $('#formRegister').attr("method"),
			dataType: 'JSON',
			data: formData,
			processData: false,
			contentType: false,
			success: function (response) {
				messageBox.html(response.message);
			},
			fail: function () {
				console.log('Error');
			}
		});
	}


	/* Binding */

    // Create
    form = $('#formRegister');
	form.on("submit", function (event) {
		event.preventDefault();
		create_user(this);
	});

}); // End of document ready
