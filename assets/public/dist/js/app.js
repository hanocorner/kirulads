$(function(){var e=null,a=$("#messageBox");$("#formRegister").on("submit",function(t){t.preventDefault(),e=new FormData(this),$.ajax({url:$("#formRegister").attr("action"),type:$("#formRegister").attr("method"),dataType:"JSON",data:e,processData:!1,contentType:!1,success:function(t){a.html(t.message)},fail:function(){console.log("Error")}})})});