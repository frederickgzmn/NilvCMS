/*$.validator.setDefaults({
	submitHandler: function() { alert("submitted!"); }
});
*/

$(document).ready(function() {
	// validate the comment form when it is submitted
	/*$("#form_config").validate();
	*/
	
	/*
	// validate signup form on keyup and submit
	$("#form_config").validate({
		rules: {
			titulo: "required",
			slogan: "required",
			idiomat: "required",
			estadoweb: "required",
			perfilon: "required",
			notificmsg: "required",
			statregister: "required",
			meta_p: {
				required: true,
				minlength: 2
			},
			emailsis: {
				required: true,
				email: true
			},
			emailcon: {
				required: true,
				email: true
			}
		},
		messages: {
			titulo: "Por favor, ingrese un titulo",
			slogan: "Por favor, ingrese un Slogan",
			idiomat: "Por favor, seleccione un Idioma",
			estadoweb: "Por favor, seleccione un Estado",
			perfilon: "Por favor, seleccione activar o desactivar",
			notificmsg: "Por favor, seleccione activar o desactivar",
			statregister: "Por favor, seleccione activar o desactivar",
			meta_p: {
				required: "Por favor, ingrese minimo una meta",
				minlength: "No se aceptan metas de solo 2 caracteres"
			},
			emailsis: "Por favor, ingrese un correo valido",
			emailcon: "Por favor, ingrese un correo valido"
		},
		submitHandler: function(form) {
			$.each($('.preg_conf'),function(){
				alert($(this).attr("name"));
			});
			// some other code
			// maybe disabling submit button
			// then:
			//$(form).submit();
		}
	});
	
	// validate signup form on keyup and submit
	$("#form_config_2").validate({
		rules: {
			perfilon: "required",
			notificmsg: "required",
			statregister: "required"
		},
		messages: {
			perfilon: "Por favor, seleccione activar o desactivar",
			notificmsg: "Por favor, seleccione activar o desactivar",
			statregister: "Por favor, seleccione activar o desactivar",
		},
		submitHandler: function(form) {
			$.each($('.preg_conf_2'),function(){
				alert($(this).attr("name"));
			});
		
			// some other code
			// maybe disabling submit button
			// then:
			//$(form).submit();
		}
	});*/
	
});