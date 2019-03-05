$(function () {

	/* Varibales */
	var formData = null;
	var message = new Array();
	var messageBox = $('#messageBox');
	var formLogin = $('#formLogin');
	var formReg = $('#formRegister');
	var maiExist = $('input[name=usermail]');
	var spinnerSelector = $('#spinner');
	var spinner = '<i class="fa fa-spinner fa-spin fa-lg fa-fw d-block mx-auto text-primary mt-3"></i><span class="sr-only">Loading...</span>';

	/* Functions */
	
	// JS Message
	var message = function (msg, type) {
		var box;
		switch (type) {
			case 'error':
				return box = '<div class="notify-box">' +
					'<noscript>Sorry, your browser does not support JavaScript!</noscript>' +
					'<div class="error d-flex align-items-center">' +
					'<img src="' + baseurl + 'assets/images/error.png" alt="Error-Image" class="img-fluid">' +
					'<div>' + msg + '<div>' +
					'</div>' +
					'</div>';
			case 'success':
				return box = '<div class="notify-box">' +
					'<noscript>Sorry, your browser does not support JavaScript!</noscript>' +
					'<div class="success d-flex align-items-center">' +
					'<img src="' + baseurl + 'assets/images/success.png" alt="Success-Image" class="img-fluid">' +
					'<p>' + msg + '</p>' +
					'</div>' +
					'</div>';
			case 'info':
				return box = '<div class="notify-box">' +
					'<noscript>Sorry, your browser does not support JavaScript!</noscript>' +
					'<div class="info d-flex align-items-center">' +
					'<img src="' + baseurl + 'assets/images/info.png" alt="Success-Image" class="img-fluid">' +
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

	//
	var fetchSubCategories = function (id) {

		$('#categoryModal').modal('toggle');

		$.ajax({
			url: baseurl + 'public/post-ad/handler/fetch_modal',
			type: 'GET',
			dataType: 'HTML',
			data: {
				categoryid: id
			},
			beforeSend: function () {
				$('#modalSpinner').html(spinner);
			},
			success: function (data) {
				$('#modalSpinner').html('');
				$('#loadSubCategories').html(data);
			},
			fail: function () {
				console.log('Error');
			}
		});

		$('#categoryModal').on('hidden.bs.modal', function () {
			$('#loadSubCategories').html('');
		});
	};

	//
	var fetchSubLocations = function (id) {

		$('#locationModal').modal('toggle');

		$.ajax({
			url: baseurl + 'public/post-ad/handler/fetch_sub_location',
			type: 'GET',
			dataType: 'HTML',
			data: {
				locationid: id,
				categoryid: $('#categoryid').val()
			},
			beforeSend: function () {
				$('#modalSpinner').html(spinner);
			},
			success: function (data) {
				$('#modalSpinner').html('');
				$('#loadSubLocations').html(data);
			},
			fail: function () {
				console.log('Error');
			}
		});

		$('#locationModal').on('hidden.bs.modal', function () {
			$('#loadSubLocations').html('');
		});
	};


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

	
	// Sort Date
	$('#sortDate').on('change', function () {
		var url;
		var sortDate = $(this).val();
		var path = location.pathname.substr(location.pathname.indexOf('/') + 1);
		var query = location.search;
		if(query == "" || query == null) {
			url = baseurl + path + '?sortdate=' + sortDate;
			url = url.replace('?sortdate=' + sortDate, '?sortdate=' + sortDate);
			location.href = url;
		}
		else {
			var queryParams = new URLSearchParams(query);
			if(queryParams.has('sortdate')) {
				var value = queryParams.get('sortdate');
				url = baseurl + path + '?sortdate=' + sortDate;
				url = url.replace('?sortdate=' + value, '?sortdate=' + sortDate);
				location.href = url;
			}
			else {
				url = baseurl + path + query + '&sortdate=' + sortDate;
				url = url.replace('&sortdate=' + sortDate, '&sortdate=' + sortDate);
				location.href = url;
			}
		}
		
	});

	// Sort Price 
	$('#sortPrice').on('change', function () {
		var sortPrice = $(this).val();
		var path = location.pathname.substr(location.pathname.indexOf('/') + 1);
		var query = location.search;
		if(query == "" || query == null) {
			url = baseurl + path + '?sortprice=' + sortPrice;
			url = url.replace('?sortprice=' + sortPrice, '?sortprice=' + sortPrice);
			location.href = url;
		}
		else {
			var queryParams = new URLSearchParams(query);
			if(queryParams.has('sortprice')) {
				var value = queryParams.get('sortprice');
				url = baseurl + path + '?sortprice=' + sortPrice;
				url = url.replace('?sortprice=' + value, '?sortprice=' + sortPrice);
				location.href = url;
			}
			else {
				url = baseurl + path + query +  '&sortprice=' + sortPrice;
				url = url.replace('&sortprice=' + sortPrice, '&sortprice=' + sortPrice);
				location.href = url;
			}
		}
	});

	$('div[data-action="category"]').on("click", function () {
		var id = $(this).data('id');
		fetchSubCategories(id);
	});

	$('div[data-action="location"]').on("click", function () {
		var id = $(this).data('id');
		fetchSubLocations(id);
	});

	

	var btnActions = {
		category: function (event) {
			event.preventDefault();
			$('#categoryModal').modal('toggle');
		},
		location: function (event) {
			event.preventDefault();
			$('#locationModal').modal('toggle');
		}
	};

	$(document).on("click", 'button[data-action]', function (event) {
		var link = $(this);
		var action = link.data("action");

		if (typeof btnActions[action] === "function") {
			btnActions[action].call(this, event);
		}
	});

	$("[data-toggle=tooltip]").tooltip();
}); // End of document ready
