$(document).ready(function() {
	$(".volver").click(function(){
		window.location.href = "tablero";
	});

});

$(function () {
	$.post("../process/Nilv_setting_jquery/1","setting=datos",function(data2){
		var datos = data2.split(",");
		var data = [datos[0]*1,datos[1]*1];
		var series = 2;

		$.plot($("#donut-chart"), data,
		{
			colors: ["#FF9900", "green", "#777", "#AAA"],
				series: {
					pie: { 
						innerRadius: 0.5,
						show: true
					}
				}
		});
	});
	
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
	
});