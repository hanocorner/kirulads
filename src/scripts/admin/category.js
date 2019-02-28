$(function () {

	/* Varibales */

	var hulla = new hullabaloo();
	var spinner = '<i class="fa fa-spinner fa-spin fa-lg fa-fw d-block mx-auto text-white"></i><span class="sr-only">Loading...</span>';
	var bootstrapSpinner = '<div class="d-flex justify-content-center mt-2"> <div class="spinner-border text-primary" role="status"><span class="sr-only">Loading...</span></div></div>';
	var formData = null;
	var rows = $('#rowCount').find(":selected").text();
	var formAddCategory = $('#formAddCategory');

	// Populating the customers grid 
	var populateParentCategory = function () {

		$.ajax({
			url: baseurl + 'admin/category/populate-parent',
			type: 'GET',
			dataType: 'JSON',
			data: {
				subcat: true
			},
			success: function (data) {
				$.each(data, function (i, value) {
					$('#pCategory').append($('<option>').text(value.name).attr('value', value.catid));
				});
			},
			fail: function (jqXHR, textStatus, errorThrown) {
				console.log(errorThrown);
			}
		});
	};

	//
	var populateTable = function (pg, rw) {
        var dataTable = $('#dataTableCategory');
		$.ajax({
			url: baseurl + 'admin/category/populate-table',
			type: 'GET',
			dataType: 'html',
			data: {
                page:pg,
                rows:rw
            },
            beforeSend: function () {
				$('#dataTableCategory').html(bootstrapSpinner);
			},
			success: function (data) {
				$('#dataTableCategory').html('');
				$('#dataTableCategory').html(data);
			},
			fail: function (jqXHR, textStatus, errorThrown) {
				console.log(errorThrown);
			}
		});
	};

	//
	var addCategory = function () {
		formData = new FormData();
		var x = formAddCategory.serializeArray();
        $.each(x, function(i, field){
            formData.append(field.name, field.value);
		});
		$.ajax({
			url: formAddCategory.attr("action"),
			type: formAddCategory.attr("method"),
			dataType: 'JSON',
			data: formData,
			processData: false,
			contentType: false,
            beforeSend: function () {
				$('#addCat').html(spinner);
			},
			success: function (response) {
				$('#addCat').html('').text('Submit');
				if (response.auth) {
					hulla.send(response.message, 'success');
					populateTable(1, rows);
					formAddCategory.trigger('reset');
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
	$('#categoryType').on('change', function () {
		if (this.value == 1) {
			$('#pCategory').prop('disabled', false);
			populateParentCategory();
		} else {
			$('#pCategory').prop('disabled', 'disabled');
			$('#pCategory option').remove();
			$('#categoryId').val(0);
		}

	});

	// Parent Category
	$('#pCategory').on('change', function () {
		$('#categoryId').val(this.value);
	});

	
	$(document).on("click", '#addCat', function (e) {
		e.preventDefault();
		addCategory();
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
