$(document).ready(function() {
	$('.form_search_to_table').trigger( "submit" );
});
$(document).on('click', '.pagination li a', function(e){
	var page=parseInt($(this).data("ci-pagination-page"));
	if(!isNaN(page)){
		var form_search=$(this).parents("ul").attr("dataFormulario");
		$("#"+form_search+" #page").val(page);
		$('#'+form_search).trigger( "submit" );
	}
	e.preventDefault();
});
$(document).on('change', '.form_search_to_table', function(event){
	var id_form=$(this).attr("id");
	$("#"+id_form+" #page").val(1);
	$(this).trigger( "submit" );
});
$(document).on('click', '.btn-search', function(event){
	var id_form=$(this).parents("form").attr("id");
	$("#"+id_form+" #page").val(1);
});
$(document).on('submit', '.form_search_to_table', function(event){
	var btn_search=$(this).find(".btn-search");
	var id_form=$(this).parents("form").attr("id");
	var url=$(this).attr("data-url");
	var controller=$(this).attr("data-controller");
	var view_result=$(this).attr("data-view");
	var view_msg=$(this).attr("data-msg");
	var formData=new FormData(this);
	NProgress.start();
	$(btn_search).attr("disabled","disabled");
	$(btn_search).html('<span class="glyphicon glyphicon-refresh"></span> Buscando..');
	formData.append("idForm",$(this).attr("id"));
	$.ajax({                                      
		url: url+controller+"/"+parseInt($(this).find("#page").val()),    //the script to call to get data          
		type: 'POST',
		data: formData,
		cache: false,
		processData: false,
		contentType: false,
		dataType: 'json',
		success: function(res){
			if(res.error==0){
				$('#'+view_result).html(res.view_result);
			}else{
				$('#'+view_msg).html(res.mensaje);
			}
			$(btn_search).removeAttr("disabled");
			$(btn_search).html('<span class="glyphicon glyphicon-search"></span> Buscar');
			NProgress.done();
		},
		error: function(XMLHttpRequest, textStatus, errorThrown) { 
			$('#'+view_msg).html('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">×</button>'+XMLHttpRequest.responseText+'</div>');
			NProgress.done();
		}
	});
	event.preventDefault();
});
