new Chart(document.getElementById("clicks-chart"), {
	type: 'line',
	data: {
		labels: [<?php echo "'".$chartLabels."'" ?>],
		datasets: [{ 
			data: [<?php echo $request->getClicksChartDatas();?>],
			fill: '#f4f4f6',
			borderColor:'#7d7d7d',
			pointRadius:0,
		}]
	},
	options: {
		responsive:true,
		bezierCurve : false,
		legend: {
			display: false,
		},
		scales:
		{
			yAxes: [{
				gridLines : {
					display : false
				},
				ticks: {
					min: 0, // it is for ignoring negative step.
					beginAtZero: true,
				}
			}],
			xAxes: [{
				gridLines : {
					display : false
				},
			}]
		},
		title: {
			display: false,
		},
		elements: {
			line: {
				tension: 0, // disables bezier curves
			}
		},
		animation: {
			duration: 0, // general animation time
		},
		hover: {
			animationDuration: 0, // duration of animations when hovering an item
		},
		responsiveAnimationDuration: 0, // animation duration after a resize
	}
});


new Chart(document.getElementById("conversion-chart"), {
	type: 'line',
	data: {
		labels: [<?php echo "'".$chartLabels."'" ?>],
		datasets: [{ 
			data: [<?php echo $request->getConversionsChartDatas();?>],
			fill: '#f4f4f6',
			borderColor:'#7d7d7d',
			pointRadius:0,
		}]
	},
	options: {
		responsive:true,
		bezierCurve : false,
		legend: {
			display: false,
		},
		scales:
		{
			yAxes: [{
				gridLines : {
					display : false
				},
				ticks: {
					min: 0, // it is for ignoring negative step.
					beginAtZero: true,
				}
			}],
			xAxes: [{
				gridLines : {
					display : false
				},
			}]
		},
		title: {
			display: false,
		},
		elements: {
			line: {
				tension: 0, // disables bezier curves
			}
		},
		animation: {
			duration: 0, // general animation time
		},
		hover: {
			animationDuration: 0, // duration of animations when hovering an item
		},
		responsiveAnimationDuration: 0, // animation duration after a resize
	}
});

		
new Chart(document.getElementById("revenue-chart"), {
	type: 'line',
	data: {
		labels: [<?php echo "'".$chartLabels."'" ?>],
		datasets: [{ 
			data: [<?php echo $request->getRevenueChartDatas();?>],
			fill: '#f4f4f6',
			borderColor:'#7d7d7d',
			pointRadius:0,
		}]
	},
	options: {
		responsive:true,
		bezierCurve : false,
		legend: {
			display: false,
		},
		scales:
		{
			yAxes: [{
				gridLines : {
					display : false
				},
				ticks: {
					min: 0, // it is for ignoring negative step.
					beginAtZero: true,
				}
			}],
			xAxes: [{
				gridLines : {
					display : false
				},
			}]
		},
		title: {
			display: false,
		},
		elements: {
			line: {
				tension: 0, // disables bezier curves
			}
		},
		animation: {
			duration: 0, // general animation time
		},
		hover: {
			animationDuration: 0, // duration of animations when hovering an item
		},
		responsiveAnimationDuration: 0, // animation duration after a resize
	}
});

new Chart(document.getElementById("ip-chart"), {
	type: 'line',
	data: {
		labels: [<?php echo "'".$chartLabels."'" ?>],
		datasets: [{ 
			data: [<?php echo $request->getIPChartDatas();?>],
			fill: '#f4f4f6',
			borderColor:'#7d7d7d',
			pointRadius:0,
		}]
	},
	options: {
		responsive:true,
		bezierCurve : false,
		legend: {
			display: false,
		},
		scales:
		{
			yAxes: [{
				gridLines : {
					display : false
				},
				ticks: {
					min: 0, // it is for ignoring negative step.
					beginAtZero: true,
				}
			}],
			xAxes: [{
				gridLines : {
					display : false
				},
			}]
		},
		title: {
			display: false,
		},
		elements: {
			line: {
				tension: 0, // disables bezier curves
			}
		},
		animation: {
			duration: 0, // general animation time
		},
		hover: {
			animationDuration: 0, // duration of animations when hovering an item
		},
		responsiveAnimationDuration: 0, // animation duration after a resize
	}
});

new Chart(document.getElementById("epc-chart"), {
	type: 'line',
	data: {
		labels: [<?php echo "'".$chartLabels."'" ?>],
		datasets: [{ 
			data: [<?php echo $request->getEPCChartDatas();?>],
			fill: '#f4f4f6',
			borderColor:'#7d7d7d',
			pointRadius:0,
		}]
	},
	options: {
		responsive:true,
		bezierCurve : false,
		legend: {
			display: false,
		},
		scales:
		{
			yAxes: [{
				gridLines : {
					display : false
				},
				ticks: {
					min: 0, // it is for ignoring negative step.
					beginAtZero: true,
				}
			}],
			xAxes: [{
				gridLines : {
					display : false
				},
			}]
		},
		title: {
			display: false,
		},
		elements: {
			line: {
				tension: 0, // disables bezier curves
			}
		},
		animation: {
			duration: 0, // general animation time
		},
		hover: {
			animationDuration: 0, // duration of animations when hovering an item
		},
		responsiveAnimationDuration: 0, // animation duration after a resize
	}
});