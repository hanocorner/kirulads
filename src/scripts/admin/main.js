$(function () {
	var message = new Array();
	var messageBox = $('#messageBox');
    var adminLogin = $('#adminLogin');
    var spinner = '<i class="fa fa-spinner fa-spin fa-lg fa-fw d-block mx-auto text-primary mt-3"></i><span class="sr-only">Loading...</span>';
    var rows = $('#rowCount').find(":selected").text();
    var formRComment = $('#formAdReject');

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

    // Executing functions according to url
	var urlBasedAction = function () {
		return window.location.pathname.split('/');
    };
    
	// User Login
	var login = function (fm) {

		formData = new FormData(fm);

		$.ajax({
			url: adminLogin.attr("action"),
			type: adminLogin.attr("method"),
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
					//$('input[name=csrf_test_name]').val(response.csrf);
					messageBox.html(message(response.message, 'error'));
				}
			},
			fail: function () {
				console.log('Error');
			}
		});
	};

    //
	var fetchAllAds = function (pg, rw) {
        $.ajax({
			url: baseurl + 'admin/dashboard/ads/fetch-all',
			type: 'GET',
            dataType: 'html',
            data: {
                page:pg,
                rows:rw,
                sort:$('#sortAds').find(":selected").val()
            },
			beforeSend: function () {
				$('#allData').html(spinner);
			},
			success: function (data) {
				$('#allData').html('');
				$('#allData').html(data);
			},
			fail: function (jqXHR, textStatus, errorThrown) {
				console.log(errorThrown);
			}
		});
    };
    
    //
    var rejectAdComment = function () {
        formData = new FormData();

        var x = formRComment.serializeArray();
        $.each(x, function(i, field){
            formData.append(field.name, field.value);
        });

        $.ajax({
			url: formRComment.attr("action"),
			type: formRComment.attr("method"),
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
					//location.href = response.url;
				} else {
					messageBox.html(message(response.message, 'error'));
				}
			},
			fail: function (jqXHR, textStatus, errorThrown) {
				console.log(errorThrown);
			}
		});
    };

    // Approve Specific Ad
    var approveAd = function (id) {
        $.ajax({
			url: baseurl + 'admin/dashboard/ads/approve',
			type: 'GET',
            dataType: 'JSON',
            data: { id: id },
			beforeSend: function () {
				$('#approveBtn').html('Processing...');
			},
			success: function (response) {
                if (response.auth) {
                    $('#approveBtn').html('');
                    $('#approveBtn').html(response.message);
					window.close();
				} else {
                    $('#approveBtn').html(response.message);
                    $('#approveBtn').addClass('btn-danger');
                    alert(response.message);
				}
			},
			fail: function (jqXHR, textStatus, errorThrown) {
				console.log(errorThrown);
			}
		});
    };

    /* Binding */
    var uri = urlBasedAction();

	/** */
	adminLogin.on("submit", function (event) {
		event.preventDefault();
		login(this);
    });

    // Load Ad Data
	if (uri[2] == 'ads' && uri[3] == 'all') {
        fetchAllAds(1, rows);
        
        $('#rowCount').on('change', function () {
            fetchAllAds(1, this.value);
        });

        $('#sortAds').on('change', function () {
            fetchAllAds(1, rows);
            $('#currentPage').text($('#sortAds').find(":selected").text());
        });

        var btnActions = {
            pagination: function (e) {
                e.preventDefault();
                var page = $(this).data("ci-pagination-page");
                fetchAllAds(page, $(this).data("rows"));
            },
            reload: function (e) {
                e.preventDefault();
                $('#rowCount option').prop('selected', function() {
                    return this.defaultSelected;
                });
                fetchAllAds(1, rows);
            }
        };
    
        $(document).on("click", 'a[data-action]', function (event) {
            var link = $(this);
            var action = link.data("action");
    
            if (typeof btnActions[action] === "function") {
                btnActions[action].call(this, event);
            }
        });
	}
    
    if(uri[2] == 'ads' && uri[3] == 'view' && uri[4] != '') {
        $('.modal').on("click", '#rComment', function (event) {
            event.preventDefault();
            rejectAdComment();
        });

        $(document).on("click", '#approveBtn', function (event) {
            event.preventDefault();
            approveAd($('#approveBtn').data('id'));
        });
       
    }
    
    
});
