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
});