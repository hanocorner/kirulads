$(function(){var t=new hullabaloo,e=null,n=$("#rowCount").find(":selected").text(),o=$("#formAddCategory"),i=function(a,t){$("#dataTableCategory");$.ajax({url:baseurl+"admin/category/populate-table",type:"GET",dataType:"html",data:{page:a,rows:t},beforeSend:function(){$("#dataTableCategory").html('<div class="d-flex justify-content-center mt-2"> <div class="spinner-border text-primary" role="status"><span class="sr-only">Loading...</span></div></div>')},success:function(a){$("#dataTableCategory").html(""),$("#dataTableCategory").html(a)},fail:function(a,t,e){console.log(e)}})};i(1,n),$("#rowCount").on("change",function(){i(1,this.value)}),$("#categoryType").on("change",function(){1==this.value?($("#pCategory").prop("disabled",!1),$.ajax({url:baseurl+"admin/category/populate-parent",type:"GET",dataType:"JSON",data:{subcat:!0},success:function(a){$.each(a,function(a,t){$("#pCategory").append($("<option>").text(t.name).attr("value",t.catid))})},fail:function(a,t,e){console.log(e)}})):($("#pCategory").prop("disabled","disabled"),$("#pCategory option").remove(),$("#categoryId").val(0))}),$("#pCategory").on("change",function(){$("#categoryId").val(this.value)}),$(document).on("click","#addCat",function(a){a.preventDefault(),function(){e=new FormData;var a=o.serializeArray();$.each(a,function(a,t){e.append(t.name,t.value)}),$.ajax({url:o.attr("action"),type:o.attr("method"),dataType:"JSON",data:e,processData:!1,contentType:!1,beforeSend:function(){$("#addCat").html('<i class="fa fa-spinner fa-spin fa-lg fa-fw d-block mx-auto text-white"></i><span class="sr-only">Loading...</span>')},success:function(a){$("#addCat").html("").text("Submit"),a.auth?(t.send(a.message,"success"),i(1,n),o.trigger("reset"),e=null):t.send(a.message,"danger")},fail:function(a,t,e){console.log(e)}})}()});var c={pagination:function(a){a.preventDefault();var t=$(this).data("ci-pagination-page");i(t,10)},reload:function(a){a.preventDefault(),i(1,10)}};$(document).on("click","a[data-action]",function(a){var t=$(this).data("action");"function"==typeof c[t]&&c[t].call(this,a)})});
//# sourceMappingURL=maps/category.js.map