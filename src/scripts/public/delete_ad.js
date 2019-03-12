function delete_ad(slug) {
    $.ajax({
        url: baseurl + 'public/post-ad/handler/delete_ad',
		type: 'GET',
		dataType: 'JSON',
		data: { slug:slug },
        success: function (response) {
            if(response.auth) {
                location.href = response.url;
            }
            else {
                console.log(response.message);
                
            }
            
        },
        fail: function () {
            console.log('Error');
        }
    });
}