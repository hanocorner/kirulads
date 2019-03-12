function delete_ad(e){$.ajax({url:baseurl+"public/post-ad/handler/delete_ad",type:"GET",dataType:"JSON",data:{slug:e},success:function(e){e.auth?location.href=e.url:console.log(e.message)},fail:function(){console.log("Error")}})}
//# sourceMappingURL=maps/delete_ad.js.map
