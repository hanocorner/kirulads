$(function () {

	var formData = null;
	var message = new Array();
	var messageBox = $('#messageBox');
	var formSubmitAd = $('#formSubmitAdDetail');
	var formUpdateAd = $('#formUpdateAdDetail');

	var quill = new Quill('#editor1', {
		theme: 'snow'
	});

	// 
	var message = function (msg, type) {
		var box;
		switch (type) {
			case 'error':
				return box = '<div class="notify-box">' +
					'<noscript>Sorry, your browser does not support JavaScript!</noscript>' +
					'<div class="error d-flex align-items-center">' +
					'<i class="fa fa-times-circle fa-fw fa-lg" aria-hidden="true"></i>' +
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

	// Submit Ad Image 
	var imageReader = function (input) {
		var file = input.files[0];
		// Message array
		message['allowedTypes'] = "Not a valid image format, Please upload following file type jpg|jpeg|png|gif ";
		message['height'] = "Height is too large, Please upload an image less than 2048px";
		message['width'] = "Width is too large, Please upload an image less than 2048px";
		message['fileSize'] = "File size is too large, Please upload an image less than 2MB";
		message['maxfilecount'] = "Sorry You cannot upload more than 5 photos";

		// Regular Expression to validate image allowed types
		var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.png|.gif)$");
		if (!regex.test(input.value.toLowerCase())) {
			alert(message['allowedTypes']);
			return false;
		}
		// File size MAX 5MB
		if (file.size > 5242880) {
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

				image.onload = function () {
					if ($('.ad-image').length > 5) {
						alert(message['maxfilecount']);
						return false;
					}

					var formAdImg = $('#formSubmitAdImg');
					var formData = new FormData();
					formData.append('path_string', $('input[name=path_string]').val());

					// Attach file
					formData.append('adimg', $('input[type=file]')[0].files[0]);

					$.ajax({
						url: formAdImg.attr("action"),
						type: formAdImg.attr("method"),
						dataType: 'JSON',
						data: formData,
						processData: false,
						contentType: false,
						beforeSend: function () {
							$('#btnLabelImg').html('<i class="fa fa-refresh fa-spin fa-lg fa-fw"></i><span class="sr-only">Loading...</span>');
						},
						success: function (response) {
							var image = baseurl + response.base_uri + '/thumb/' + response.image_name;
							var adDiv =
								'<div class="ad-image mb-3" id="adImage" data-image="' + response.image_name + '" data-id="' + response.data_id + '">' +
								'<div class="image">' +
								'<img src="' + image + '" class="img-fluid" alt="" id="imageAd">' +
								'</div>' +
								'<div class="img-controls">' +
								'<div class="add-image">' +
								'<div class="form-check mb-2">' +
								'<input class="form-check-input" type="radio" name="mainImage" id="mainImage" data-image="' + response.image_name + '">' +
								'<label class="form-check-label text-muted" for="exampleRadios1">Main Image</label>' +
								'</div>' +
								'<button type="button" data-image="' + response.image_name + '" class="btn btn-sm btn-del-img btn-outline-danger" id="removeImg"><i class="fa fa-minus-circle fa-fw"></i> Remove</button>' +
								'</div>' +
								'</div>' +
								'</div>';
							$('#btnLabelImg').html('Add a photo');
							if (response.status) {
								$('#adDivImg').append(adDiv);
							} else {
								messageBox.html(message(response.message, 'error'));
							}
							$('input[name=adimg]').val('');
							formData.delete('adimg');

							var imgArray = $('.ad-image').map(function () {
								return $(this).data('image');
							}).get().join(',');

							$('#setSubImg').val(imgArray);

							//var checkedNum = $('input[name="mainImage[]"]:checked').length;
							if ($('input[name="mainImage"]:checked').length === 0) {
								$('input[name="mainImage"]').prop('checked', true);
								setFeatured(response.image_name);
								console.log('checked');
							}
						},
						fail: function () {
							console.log('Error');
						}
					});
					return true;
				};
			}
			reader.readAsDataURL(input.files[0]);
		}

	};

	//
	var validate = function () {

		bootstrapValidate('#titleName', 'regex:^([-A-Za-z0-9 ]){1,100}$:You can only use alphabhatical, numerical, dash & hypen only|max:100:Maximum characters reached');

		//bootstrapValidate('#editor1', 'regex:^([-A-Za-z0-9 ]){1,5000}$:You can only use alphabhatical, numerical, dash & hypen only');
		bootstrapValidate('#priceField', 'numeric:Price field has to be a numeric value');
	};

	// Function to submit Ad
	var submitAd = function (formid) {
		

		if ($('#adImage').length == 0) {
			messageBox.html(message('Please upload one or more photo(s) for your ad', 'error'));
			return false;
		}

		if ($('#titleName').val() == '' || $('#titleName').val() == null) {
			$('#titleName').addClass('is-invalid');
			messageBox.html(message('Title field is required', 'error'));
			return false;
		}

		if ($('input:radio[name=condition]').length == 0) {
			messageBox.html(message('Please select your item condition', 'error'));
			return false;
		}

		if ($('#priceField').val() == '' || $('#priceField').val() == null) {
			$('#priceField').addClass('is-invalid');
			messageBox.html(message('Price field is required', 'error'));
			return false;
		}

		formData = new FormData(formid);
		formData.append('temp_path_string', $('input[name=path_string]').val());
		formData.append("editor1", quill.root.innerHTML);

		$.ajax({
			url: formSubmitAd.attr("action"),
			type: formSubmitAd.attr("method"),
			dataType: 'JSON',
			data: formData,
			processData: false,
			contentType: false,
			beforeSend: function () {
				$('#publishAd').html('<i class="fa fa-refresh fa-spin fa-fw"></i>');
			},
			success: function (response) {
				$('#publishAd').html('Post Ad');
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
	};

	// Function to Update ad
	var update_ad = function () {
		if ($('#adImage').length == 0) {
			messageBox.html(message('Please upload one or more photo(s) for your ad', 'error'));
			return false;
		}

		if ($('#titleName').val() == '' || $('#titleName').val() == null) {
			$('#titleName').addClass('is-invalid');
			messageBox.html(message('Title field is required', 'error'));
			return false;
		}

		if ($('input:radio[name=condition]').length == 0) {
			messageBox.html(message('Please select your item condition', 'error'));
			return false;
		}

		// if ($('#editor1').val() == '' || $('#editor1').val() == null) {
		// 	//$('#editor1').addClass('is-invalid');
		// 	messageBox.html(message('Description field is required', 'error'));
		// 	return false;
		// }

		if ($('#priceField').val() == '' || $('#priceField').val() == null) {
			$('#priceField').addClass('is-invalid');
			messageBox.html(message('Price field is required', 'error'));
			return false;
		}

		formData = new FormData();

		var x = formUpdateAd.serializeArray();
		$.each(x, function (i, field) {
			formData.append(field.name, field.value);
		});

		formData.append('path_string', $('input[name=path_string]').val());
		//formData.append('path_string', $('input[name=path_string]').val());
		formData.append("editor1", quill.getText());

		$.ajax({
			url: formUpdateAd.attr("action"),
			type: formUpdateAd.attr("method"),
			dataType: 'JSON',
			data: formData,
			processData: false,
			contentType: false,
			beforeSend: function () {
				$('#publishAd').html('<i class="fa fa-refresh fa-spin fa-fw"></i>');
			},
			success: function (response) {
				$('#publishAd').html('Post Ad');
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
	};
	// Function
	var removeImage = function (imageName) {
		$.ajax({
			url: baseurl + 'image/delete',
			type: 'POST',
			dataType: 'JSON',
			data: {
				path_string: $('input[name=path_string]').val(),
				image: imageName
			},
			success: function (data) {
				console.log(data);
			},
			fail: function () {
				console.log('Error');
			}
		});


	};

	//
	var setFeatured = function (imageName) {
		$.ajax({
			url: baseurl + 'image/featured',
			type: 'POST',
			dataType: 'JSON',
			data: {
				image: imageName
			},
			success: function (data) {
				console.log(data);
			},
			fail: function () {
				console.log('Error');
			}
		});
	};

	/** Binding  */

	

	// 
	validate();

	// Form On Submit
	formSubmitAd.on("submit", function (event) {
		event.preventDefault();
		submitAd(this);
	});

	$('#updateAdBtn').on('click', function () {
		event.preventDefault();
		update_ad();
	});

	// 
	$("#myAdImg").change(function () {
		imageReader(this);
	});

	// 
	$('#adDivImg').on('change', '#mainImage', function () {
		setFeatured($(this).data('image'));
	});

	// Remove one particular image from temp location as well as div
	$('#adDivImg').on('click', '#removeImg', function () {
		removeImage($(this).data('image'));
		$(this).parentsUntil('#adDivImg').remove();
	});


});
