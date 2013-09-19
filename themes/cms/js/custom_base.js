$(document).ready(function() {
	$(".volver").click(function(){
		window.location.href = "tablero";
	});

});

$(function () {
	$.post("../process/Nilv_setting_jquery/1","hola=holamundo",function(data2){
		var datos = data2.split(",");
		var data = [datos[0]*1,datos[1]*1];
		var series = 2;
		/*for( var i = 0; i<series; i++)
		{
			data[i] = { label: "Series "+(i+1), data: Math.floor(Math.random()*100)+1 }
		}*/

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
	
	$("#agregarnota").click(function(){
		$.post("../process/Nilv_notas_person/1","notas="+$("#notas").val(),function(data){
			$("#notas_list").html(data);
			window.location.href = "tablero";
		});	
	});
	
});