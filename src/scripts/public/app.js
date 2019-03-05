$(function () {

    var navBar = $('#mobNavBar');

    $('#navBarToggler').on("click", function () {
		navBar.addClass('open-navbar');
    });
    
    $('#closeNavBar').on("click", function () {
		navBar.removeClass('open-navbar');
    });

    // Location
    var populateLocationModal = function (id, url, query) {
      if(query == '' || query == null){
        q = '';
      }
      else {
        q = query;
      }

      $.ajax({
        url: baseurl + 'base/populate-sub-location',
        type: 'GET',
        dataType: 'HTML',
        data: {
          locationid: id,
          category: url[3],
          query: q
        },
        beforeSend: function () {
          console.log('Loading...');
          
        },
        success: function (data) {
          $('#modalSpinner').html('');
          $('#loadSubLocation').html(data);
        },
        fail: function () {
          console.log('Error');
        }
      });
  
      $('#locationModal').on('hidden.bs.modal', function () {
        $('#loadSubLocation').html('');
      });
    };

    // Category 
    var populateCategoryModal = function (id, url, query) {
      if(query == '' || query == null){
        q = '';
      }
      else {
        q = query;
      }
      $.ajax({
        url: baseurl + 'base/populate-sub-category',
        type: 'GET',
        dataType: 'HTML',
        data: {
          categoryid: id,
          location: url[2],
          query: q
        },
        beforeSend: function () {
          $('#mainCategories').hide();
        },
        success: function (data) {
          $('#loadSubCategories').show().html(data);
        },
        fail: function () {
          console.log('Error');
        }
      });
  
      $('#categoryModal').on('hidden.bs.modal', function () {
        $('#loadSubCategories').hide();
        $('#mainCategories').show();
      });
    };
   
    /** Binding */

    $('a[data-action="location"]').on("click", function (event) {
      event.preventDefault();
      var id = $(this).data('id');
      var url = location.pathname.split("/");
      var query = location.search;
      populateLocationModal(id, url, query);
    });

    $('a[data-action="category"]').on("click", function (event) {
      event.preventDefault();
      var id = $(this).data('id');
      var url = location.pathname.split("/");
      var query = location.search;
      populateCategoryModal(id, url, query);
    });
});

