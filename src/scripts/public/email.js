function mail(email, string) {
    $.ajax({
        url: baseurl + 'public/post-ad/handler/send-ad-mail',
		type: 'GET',
		dataType: 'JSON',
		data: {
            token:string,
            email: email
        },
        success: function (response) {
            console.log(response);
            
        },
        fail: function () {
            console.log('Error');
        }
    });
}