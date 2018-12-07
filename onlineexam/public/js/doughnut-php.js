window.onload = function () {
 
var total = <?php echo $total ?>;
var visitorsData = {
	"Right vs Wrong ": [{
		click: visitorsChartDrilldownHandler,
		cursor: "pointer",
		explodeOnClick: false,
		innerRadius: "75%",
		legendMarkerType: "square",
		name: "Right vs Wrong",
		radius: "100%",
		showInLegend: true,
		startAngle: 90,
		type: "doughnut",
		dataPoints: <?php echo json_encode($DataPoints, JSON_NUMERIC_CHECK); ?>
	}],
	"Right": [{
		color: "#E7823A",
		name: "Right",
		type: "column",
		xValueType: "dateTime",
		dataPoints: <?php echo $score; ?>
	}],
	"$wrong_ans": [{
		color: "#546BC1",
		name: "Wrong",
		type: "column",
		xValueType: "dateTime",
		dataPoints: <?php echo $wrong_ans; ?>
	}]
};
 
var newVSReturningVisitorsOptions = {
	animationEnabled: true,
	theme: "light2",
	title: {
		text: "Right vs Wrong"
	},
	subtitles: [{
		text: "Click on Any Segment to Drilldown",
		backgroundColor: "#2eacd1",
		fontSize: 16,
		fontColor: "white",
		padding: 5
	}],
	legend: {
		fontFamily: "calibri",
		fontSize: 14,
		itemTextFormatter: function (e) {
			return e.dataPoint.name + ": " + Math.round(e.dataPoint.y / total * 100) + "%";  
		}
	},
	data: []
};
 
var visitorsDrilldownedChartOptions = {
	animationEnabled: true,
	theme: "light2",
	axisX: {
		labelFontColor: "#717171",
		lineColor: "#a2a2a2",
		tickColor: "#a2a2a2"
	},
	axisY: {
		gridThickness: 0,
		includeZero: false,
		labelFontColor: "#717171",
		lineColor: "#a2a2a2",
		tickColor: "#a2a2a2",
		lineThickness: 1
	},
	data: []
};
 
var chart = new CanvasJS.Chart("chartContainer", newVSReturningVisitorsOptions);
chart.options.data = visitorsData["New vs Returning Visitors"];
chart.render();
 
function visitorsChartDrilldownHandler(e) {
	chart = new CanvasJS.Chart("chartContainer", visitorsDrilldownedChartOptions);
	chart.options.data = visitorsData[e.dataPoint.name];
	chart.options.title = { text: e.dataPoint.name }
	chart.render();
	$("#backButton").toggleClass("invisible");
}
 
$("#backButton").click(function() { 
	$(this).toggleClass("invisible");
	chart = new CanvasJS.Chart("chartContainer", newVSReturningVisitorsOptions);
	chart.options.data = visitorsData["Right vs Wrong"];
	chart.render();
});