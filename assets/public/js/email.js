function mail(a,l){$.ajax({url:baseurl+"public/post-ad/handler/send-ad-mail",type:"GET",dataType:"JSON",data:{token:l,email:a},success:function(a){console.log(a)},fail:function(){console.log("Error")}})}
//# sourceMappingURL=maps/email.js.map
