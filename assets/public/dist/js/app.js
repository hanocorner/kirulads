$(function(){var a=null,o=new Array,t=$("#messageBox"),s=$("#formLogin"),r=$("#formRegister"),i=$("#formSubmitAd"),n=$("input[name=usermail]"),l=$("#spinner"),c='<i class="fa fa-spinner fa-spin fa-lg fa-fw d-block mx-auto text-primary mt-3"></i><span class="sr-only">Loading...</span>';o=function(e,a){switch(a){case"error":return'<div class="notify-box"><noscript>Sorry, your browser does not support JavaScript!</noscript><div class="error d-flex align-items-center"><img src="'+baseurl+'assets/public/dist/images/error.png" alt="Error-Image" class="img-fluid"><div>'+e+"<div></div></div>";case"success":return'<div class="notify-box"><noscript>Sorry, your browser does not support JavaScript!</noscript><div class="success d-flex align-items-center"><img src="'+baseurl+'assets/public/dist/images/success.png" alt="Success-Image" class="img-fluid"><p>'+e+"</p></div></div>";case"info":return'<div class="notify-box"><noscript>Sorry, your browser does not support JavaScript!</noscript><div class="info d-flex align-items-center"><img src="'+baseurl+'assets/public/dist/images/info.png" alt="Success-Image" class="img-fluid"><p>'+e+"</p></div></div>";default:return"Unable to display Message"}};n.on("keyup",function(){var e,a,t,o=n.val();12<o.length&&(e=o,a=$("#emailExist"),t=$("#emailExist"),$.ajax({url:baseurl+"public/user/register/check-email",type:r.attr("method"),dataType:"JSON",data:{mail:e},success:function(e){if(e.auth)return n.css("border-color","#ced4da"),a.html(""),t.prop("disabled",!1).css("cursor","pointer"),!0;n.css("border-color","red"),a.html(e.message),t.prop("disabled",!0).css("cursor","not-allowed")},fail:function(){console.log("Error")}}))}),r.on("submit",function(e){e.preventDefault(),a=new FormData(this),$.ajax({url:r.attr("action"),type:r.attr("method"),dataType:"JSON",data:a,processData:!1,contentType:!1,beforeSend:function(){t.html(o("Processing...","info"))},success:function(e){e.auth?(t.html(o(e.message,"success")),location.href=e.url):($("input[name=csrf_test_name]").val(e.csrf),t.html(o(e.message,"error")))},fail:function(){console.log("Error")}})}),s.on("submit",function(e){e.preventDefault(),a=new FormData(this),$.ajax({url:s.attr("action"),type:s.attr("method"),dataType:"JSON",data:a,processData:!1,contentType:!1,beforeSend:function(){t.html(o("Processing...","info"))},success:function(e){e.auth?(t.html(o(e.message,"success")),location.href=e.url):($("input[name=csrf_test_name]").val(e.csrf),t.html(o(e.message,"error")))},fail:function(){console.log("Error")}})}),i.on("submit",function(e){e.preventDefault(),a=new FormData(this),$.ajax({url:i.attr("action"),type:i.attr("method"),dataType:"JSON",data:a,processData:!1,contentType:!1,beforeSend:function(){t.html(o("Processing...","info"))},success:function(e){e.auth?(t.html(o(e.message,"success")),location.href=e.url):($("input[name=csrf_test_name]").val(e.csrf),t.html(o(e.message,"error")))},fail:function(){console.log("Error")}})}),$("#myAdImg").change(function(){!function(e){var a=e.files[0];if(o.allowedTypes="Not a valid image format, Please upload following file type jpg|jpeg|png|gif ",o.height="Height is too large, Please upload an image less than 1024px",o.width="Width is too large, Please upload an image less than 1024px",o.fileSize="File size is too large, Please upload an image less than 2MB",!new RegExp("([a-zA-Z0-9s_\\.-:])+(.jpg|.jpeg|.png|.gif)$").test(e.value.toLowerCase()))return alert(o.allowedTypes);if(2e6<a.size)return alert(o.fileSize);if(e.files&&e.files[0]){var t=new FileReader;t.onload=function(a){var e=new Image;e.src=a.target.result,e.onload=function(){var e=this.height;return 1024<this.width?(alert(o.width),!1):1024<e?(alert(o.height),!1):($("#imageAd").attr("src",a.target.result),!0)}},t.readAsDataURL(e.files[0])}$("#removeImg").on("click",function(){$("#imageAd").attr("src",baseurl+"assets/public/dist/images/no-image.png"),$("#myAdImg").val("")})}(this)}),$.ajax({url:baseurl+"public/post-ad/handler/prepare-categories",type:"GET",dataType:"HTML",beforeSend:function(){l.html(c)},success:function(e){l.html(""),$("#loadCategories").html(e)},fail:function(){console.log("Error")}});var u={category:function(){var e;e=$(this).data("id"),$("#categoryModal").modal("toggle"),$.ajax({url:baseurl+"public/post-ad/handler/fetch_modal",type:"GET",dataType:"HTML",data:{categoryid:e},beforeSend:function(){$("#modalSpinner").html(c)},success:function(e){$("#modalSpinner").html(""),$("#loadSubCategories").html(e)},fail:function(){console.log("Error")}}),$("#categoryModal").on("hidden.bs.modal",function(){$("#loadSubCategories").html("")})},location:function(){var e;e=$(this).data("id"),$("#locationModal").modal("toggle"),$.ajax({url:baseurl+"public/post-ad/handler/fetch_sub_location",type:"GET",dataType:"HTML",data:{locationid:e,categoryid:$("#categoryid").val()},beforeSend:function(){$("#modalSpinner").html(c)},success:function(e){$("#modalSpinner").html(""),$("#loadSubLocations").html(e)},fail:function(){console.log("Error")}})}};$(document).on("click","div[data-action]",function(e){var a=$(this).data("action");"function"==typeof u[a]&&u[a].call(this,e)}),$.ajax({url:baseurl+"public/post-ad/handler/prepare-locations",type:"GET",dataType:"HTML",beforeSend:function(){$("#modalSpinner").html(c)},success:function(e){$("#modalSpinner").html(""),$("#loadLocations").html(e)},fail:function(){console.log("Error")}})});