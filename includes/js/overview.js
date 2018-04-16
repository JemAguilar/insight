$('#reports').DataTable();

new Chart(document.getElementById("clicks-chart"), {
	type: 'line',
	data: {
		labels: [1,2,3,4,5],
		datasets: [{ 
			data: [5,5,4,2,0],
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
					display : false
				},
			}],
			xAxes: [{
				gridLines : {
					display : false
				},
				ticks: {
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

new Chart(document.getElementById("conversions-chart"), {
	type: 'line',
	data: {
		labels: [1,2,3,4,5],
		datasets: [{ 
			data: [5,5,4,2,0],
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
					display : false
				},
			}],
			xAxes: [{
				gridLines : {
					display : false
				},
				ticks: {
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
		labels: [1,2,3,4,5],
		datasets: [{ 
			data: [5,5,4,2,0],
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
					display : false
				},
			}],
			xAxes: [{
				gridLines : {
					display : false
				},
				ticks: {
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
		labels: [1,2,3,4,5],
		datasets: [{ 
			data: [5,5,4,2,0],
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
					display : false
				},
			}],
			xAxes: [{
				gridLines : {
					display : false
				},
				ticks: {
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
		labels: [1,2,3,4,5],
		datasets: [{ 
			data: [5,5,4,2,0],
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
					display : false
				},
			}],
			xAxes: [{
				gridLines : {
					display : false
				},
				ticks: {
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
