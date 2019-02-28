$(function () {

	/* Varibales */

	var hulla = new hullabaloo();
	var spinner = '<i class="fa fa-spinner fa-spin fa-lg fa-fw d-block mx-auto text-white"></i><span class="sr-only">Loading...</span>';
	var bootstrapSpinner = '<div class="d-flex justify-content-center mt-2"> <div class="spinner-border text-primary" role="status"><span class="sr-only">Loading...</span></div></div>';
	var formData = null;
	var rows = $('#rowCount').find(":selected").text();
	var formAddLocation = $('#formAddLocation');

	// Populating the customers grid 
	var populateParentLocation = function () {

		$.ajax({
			url: baseurl + 'admin/location/populate-parent',
			type: 'GET',
			dataType: 'JSON',
			data: {
				subcat: true
			},
			success: function (data) {
				$.each(data, function (i, value) {
					$('#pLocation').append($('<option>').text(value.name).attr('value', value.locid));
				});
			},
			fail: function (jqXHR, textStatus, errorThrown) {
				console.log(errorThrown);
			}
		});
	};

	//
	var populateTable = function (pg, rw) {
        
		$.ajax({
			url: baseurl + 'admin/location/populate-table',
			type: 'GET',
			dataType: 'html',
			data: {
                page:pg,
                rows:rw
            },
            beforeSend: function () {
				$('#dataTableLocation').html(bootstrapSpinner);
			},
			success: function (data) {
				$('#dataTableLocation').html('');
				$('#dataTableLocation').html(data);
			},
			fail: function (jqXHR, textStatus, errorThrown) {
				console.log(errorThrown);
			}
		});
	};

	//
	var addLocation = function () {
		formData = new FormData();
		var x = formAddLocation.serializeArray();
        $.each(x, function(i, field){
            formData.append(field.name, field.value);
		});
		$.ajax({
			url: formAddLocation.attr("action"),
			type: formAddLocation.attr("method"),
			dataType: 'JSON',
			data: formData,
			processData: false,
			contentType: false,
            beforeSend: function () {
				$('#addLoc').html(spinner);
			},
			success: function (response) {
				$('#addLoc').html('').text('Submit');
				if (response.auth) {
					hulla.send(response.message, 'success');
					populateTable(1, rows);
					formAddLocation.trigger('reset');
					formData = null;
				}
				else {
					hulla.send(response.message, 'danger');
				}
			},
			fail: function (jqXHR, textStatus, errorThrown) {
				console.log(errorThrown);
			}
		});
	};

	/* Binding functions to event handlers */

    populateTable(1, rows);

	$('#rowCount').on('change', function () {
		populateTable(1, this.value);
	});

	// Category type on change
	$('#locationType').on('change', function () {
		if (this.value == 1) {
			$('#pLocation').prop('disabled', false);
			populateParentLocation();
		} else {
			$('#pLocation').prop('disabled', 'disabled');
			$('#pLocation option').remove();
			$('#locationId').val(0);
		}

	});

	// Parent Category
	$('#pLocation').on('change', function () {
		$('#locationId').val(this.value);
	});

	
	$(document).on("click", '#addLoc', function (e) {
		e.preventDefault();
		addLocation();
	});

	var btnActions = {
		pagination: function (e) {
			e.preventDefault();
			var page = $(this).data("ci-pagination-page");
			populateTable(page, 10);
		},
		reload: function (e) {
			e.preventDefault();
			
			populateTable(1, 10);
		}
	};

	$(document).on("click", 'a[data-action]', function (event) {
		var link = $(this);
		var action = link.data("action");

		if (typeof btnActions[action] === "function") {
			btnActions[action].call(this, event);
		}
	});

});
