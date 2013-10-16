$(document).ready(function() {
//Agregar usuarios vista
$("#boton_agregar_user_vista").click(function(){
	$("#user_registro_actualiz").hide(500);
	$("#boton_modific_user").hide();
	$("#boton_agregar_user").show();
	$("#codigo_user").val("");
	$("#nombre_user").val("");
	$("#apellido_user").val("");
	$("#email_user").val("");
	$("#grupo_user").val("");
	$("#user_registro_actualiz").show(1200);
});

$("#boton_limpiar_user").click(function(){
	$("#nombre_user").val("");
	$("#apellido_user").val("");
	$("#email_user").val("");
	$("#grupo_user").val("");
	$('#grupo_user option[value="1"]').prop('selected', true);
});

$(".usuario_edit").click(function(){
	$("#boton_agregar_user").hide();
	$("#boton_modific_user").show();
		
	$("#user_registro_actualiz").hide(500);
	if($(this).attr("id")!=""){		
		$.post("../process/Nilv_usuarios_select","codigo="+$(this).attr("id"),function(data){
			var arraydata = data.split("]");
			
			$("#codigo_user").val(arraydata[0]);
			$("#nombre_user").val(arraydata[1]);
			$("#apellido_user").val(arraydata[2]);
			$("#email_user").val(arraydata[3]);
			$("#firma_user").val(arraydata[4]);
			$('#grupo_user option[value="'+arraydata[5]+'"]').prop('selected', true);
			
			$("#user_registro_actualiz").show(1200);
		});
	}
});

$("#boton_agregar_user").click(function(){
	$("#user_registro_actualiz").hide(500);
	$.post("../process/Nilv_insertar_usuario","formulario_actu_reg=nuevo_form&&codigo="+$("#codigo_user").val()+"&&nombre="+$("#nombre_user").val()+"&&apellido="+$("#apellido_user").val()+"&&email="+$("#email_user").val()+"&&grupo="+$("#grupo_user").val(),function(data){
		$("#alertas_user_insert_act").html(data);
		$("#boton_agregar_user").hide();
		
		$("#user_alert_ver").show(500);
		$("#alertas_user_insert_act").show(500);
		
		setTimeout(function () {
			$(".alert").hide(1000);
			$("#user_alert_ver").hide(1000);
			location.reload();
		}, 4000);
	});
});

$("#boton_modific_user").click(function(){
	$("#user_registro_actualiz").hide(500);
	$.post("../process/Nilv_insertar_usuario","formulario_actu_reg=actual_form&&codigo="+$("#codigo_user").val()+"&&nombre="+$("#nombre_user").val()+"&&apellido="+$("#apellido_user").val()+"&&email="+$("#email_user").val()+"&&grupo="+$("#grupo_user").val(),function(data){
		$("#alertas_user_insert_act").html(data);
		$("#boton_modific_user").hide();
		
		$("#user_alert_ver").show(500);
		$("#alertas_user_insert_act").show(500);
		
		setTimeout(function () {
			$(".alert").hide(1000);
			$("#user_alert_ver").hide(1000);
			location.reload();
		}, 4000);
	});
});

});