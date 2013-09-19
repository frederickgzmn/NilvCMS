$(function () {

	var data = [3,2];
	var series = 2;
	/*for( var i = 0; i<series; i++)
	{
		data[i] = { label: "Series "+(i+1), data: Math.floor(Math.random()*100)+1 }
	}*/

	$.plot($("#donut-chart"), data,
	{
		colors: ["green", "#222", "#777", "#AAA"],
	        series: {
	            pie: { 
	                innerRadius: 0.5,
	                show: true
	            }
	        }
	});
	
});