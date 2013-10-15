$(document).ready(function() {
	$(".volver").click(function(){
		window.location.href = "tablero";
	});

});

$(function () {
	//Agregando nota
	$("#agregarnota").click(function(){
		$.post("../process/Nilv_notas_person/1","notas="+$("#notas").val(),function(data){
			//$("#notas_list").html(data);
			if(data=="agregada"){
				$("#alert_nota").show(800);
			}else{
				$("#alert_nota").html("Ha ocurrido un error al agregar la nota");
				$("#alert_nota").show(800);
			}
			
			setTimeout(function () {
				$(".alert").hide(1000);
			}, 4000);
		});	
	});
	
	//Agregando nota
	$("#boton_cambio_clave").click(function(){
		$.post("../process/Nilv_cambio_clave/1","passwd="+$("#passwd").val()+"&&passwd2="+$("#passwd2").val(),function(data){
			$("#alertas").html(data);
			
			setTimeout(function () {
				$(".alert").hide(1000);
			}, 4000);
		});	
	});
	
	/*
	//Agregando nota
	$("#privileg").change(function(){
		$.post("../process/Nilv_cambio_clave/1","passwd="+$("#passwd").val()+"&&passwd2="+$("#passwd2").val(),function(data){
			$("#alertas").html(data);
			
			setTimeout(function () {
				$(".alert").hide(1000);
			}, 4000);
		});	
	});*/
	
	//limpiando todo para agregar un nuevo componente
	$("#boton_nuevo_cat,#boton_nuevo_grup,#boton_nuevo_priv").click(function(){
		$(".nuevo_todo").val("");
		$("#privilegios").hide(500);
	});
	
	//Agregando grupos
	$("#boton_agregar_grup").click(function(){
		$.post("../process/Nilv_modif_insert_grupos/insertar","nombre="+$("#codigo_grup").val(),function(data){
			$("#alertas_grupo").html(data);
			
			setTimeout(function () {
				$(".alert").hide(1000);
				location.reload();
			}, 4000);
		});	
	});
	
	//Modificar grupos
	$("#boton_modific_grup").click(function(){
		$.post("../process/Nilv_modif_insert_grupos/modificar","nombre="+$("#codigo_grup").val()+"&&codigo="+$("#grup_modific").val(),function(data){
			$("#alertas_grupo").html(data);
			
			setTimeout(function () {
				$(".alert").hide(1000);
				location.reload();
			}, 4000);
		});	
	});
	
	//Agregando privilegios
	$("#boton_agregar_priv").click(function(){
		$.post("../process/Nilv_modif_insert_priv/insertar","nombre="+$("#codigo_priv").val(),function(data){
			$("#alertas_priv").html(data);
			
			setTimeout(function () {
				$(".alert").hide(1000);
				location.reload();
			}, 4000);
		});	
	});
	
	//Agregando privilegios
	$("#boton_modific_priv").click(function(){
		$.post("../process/Nilv_modif_insert_priv/modificar","nombre="+$("#codigo_priv").val()+"&&codigo="+$("#priv_modific").val(),function(data){
			$("#alertas_priv").html(data);
			
			setTimeout(function () {
				$(".alert").hide(1000);
				location.reload();
			}, 4000);
		});	
	});
	
	//Agregando categoria
	$("#boton_agregar_cat").click(function(){
		$.post("../process/Nilv_modif_insert_cat/insertar","nombre="+$("#codigo_cat").val(),function(data){
			$("#alertas_cat").html(data);
			
			setTimeout(function () {
				$(".alert").hide(1000);
				location.reload();
			}, 4000);
		});	
	});
	
	//Agregando categoria
	$("#boton_modific_cat").click(function(){
		$.post("../process/Nilv_modif_insert_cat/modificar","nombre="+$("#codigo_cat").val()+"&&codigo="+$("#cat_modific").val(),function(data){
			$("#alertas_cat").html(data);
			
			setTimeout(function () {
				$(".alert").hide(1000);
				location.reload();
			}, 4000);
		});	
	});
	
	//Eliminar categoria
	$(".cat_delete").click(function(){
		if(confirm("Esta seguro de querer eliminar esta categoria?")){				
			$.post("../process/Nilv_delete_cat","codigo="+$(this).attr("id"),function(data){
				$("#alertas_cat").html(data);
				
				setTimeout(function () {
					$(".alert").hide(1000);
					location.reload();
				}, 4000);
			});
		}
	});	
	//Eliminar Privilegio
	$(".priv_delete").click(function(){
		if(confirm("Esta seguro de querer eliminar este privilegio?")){				
			$.post("../process/Nilv_delete_priv","codigo="+$(this).attr("id"),function(data){
				$("#alertas_priv").html(data);
				
				setTimeout(function () {
					$(".alert").hide(1000);
					location.reload();
				}, 4000);
			});
		}
	});	
	//Eliminar categoria
	$(".grup_delete").click(function(){
		if(confirm("Esta seguro de querer eliminar este grupo?")){				
			$.post("../process/Nilv_delete_grupo","codigo="+$(this).attr("id"),function(data){
				$("#alertas_grupo").html(data);
				
				setTimeout(function () {
					$(".alert").hide(1000);
					location.reload();
				}, 4000);
			});
		}
	});
	
	//Modificando Grupos
	$(".grupos_edit").click(function(){
		//Cargando los datos para ser editados
		$("#codigo_grup").val($(this).attr("title"));
		$("#grup_modific").val($(this).attr("id"));
		$("#privilegios").hide(500);
		$.post("../process/Nilv_rel_priv_grup_select","codigo="+$("#grup_modific").val(),function(data){
			$(".privileg_grup").attr("checked",false);
			$.each(data.split("_"),function(index,value){
				if(value!=""){
					$("#"+value).attr("checked",true);
				}
			});
		$("#privilegios").show(1200);
		});
		
	});
	//Modificando categorias
	$(".cat_edit").click(function(){
		//Cargando los datos para ser editados
		$("#codigo_cat").val($(this).attr("title"));
		$("#cat_modific").val($(this).attr("id"));
	});
	
	//Modificando Privilegios
	$(".priv_edit").click(function(){
		//Cargando los datos para ser editados
		$("#codigo_priv").val($(this).attr("title"));
		$("#priv_modific").val($(this).attr("id"));
	});
	
	//Modificando categorias
	$(".privileg_grup").click(function(){
		if($(this).is(":checked")){
			//Agregando privilegio a grupo
			$.post("../process/Nilv_rel_priv_grup","codigo="+$("#grup_modific").val()+"&&codigo_priv="+$(this).attr("id"),function(data){
				if(data=="insed"){
					$("#alertas_priv").html('<div class="alert alert-success">Privilegio Asignado Correctamente</div>');
					setTimeout(function () {
						$(".alert").hide(1000);
					}, 4000);
				}
			});
		}else{
			//Eliminar privilegio a grupo
			$.post("../process/Nilv_rel_priv_grup_delete","codigo="+$("#grup_modific").val()+"&&codigo_priv="+$(this).attr("id"),function(data){
				if(data=="deleted"){
					$("#alertas_priv").html('<div class="alert alert-success">Privilegio Eliminado del grupo</div>');
				setTimeout(function () {
					$(".alert").hide(1000);
				}, 4000);
				}
			});
		}
	});
	
	//Agregar usuarios vista
	$("#boton_agregar_user").click(function(){
		$("#user_registro_actualiz").hide(500);
		$("#codigo_priv").attr("disabled","disabled");
		$("#user_registro_actualiz").show(1200);
	});
});