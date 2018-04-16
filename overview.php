<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css"/>
<link rel="stylesheet" type="text/css" href="includes/css/custom.css"/>
<title>Insigh | Overview</title>
</head>
<body>
	<?php
		require_once('includes/Request.php');

		if(isset($_POST['daterange']))
		{
			$sDate = date_format(date_create(trim(explode('-',$_POST['daterange'])[0])),'Y-m-d');
			$eDate = date_format(date_create(trim(explode('-',$_POST['daterange'])[1])),'Y-m-d');
			$startDate = trim(explode('-',$_POST['daterange'])[0]);
			$endDate = trim(explode('-',$_POST['daterange'])[1]);
			$request = new Request($sDate,$eDate);
		}
		else
		{
			$request = new Request;
			$endDate = date_format(date_create(date('Y-m-d')),'m/d/Y');
			$startDate = '04/01/2018';
		}
	?>
	<div class="container">
		<div class="row space">
			<div class="col-md-3">
				<form name= "range" id ="range" action ="" method="post">
					<label>Date Range</label>
					<input type="text" name="daterange" class="form-control" value="<?php $startDate.' - '.$endDate; ?>" />
				</form>
			</div>
		</div>
	
		<div class="row space">
			<div class="col-md-12">
				<div class="summary-chart">
					<div class="row">
						<div class="col-md-12">
							<p class="note"><strong> <span style="color:red">*</span> Note:</strong> Select the Graph to see the information.</p>
						</div>
					</div>
					<div class="row">
						<div class="col-md-1"></div>
						<div class="col-md-2">
							<a href="clicks.php" class="linkBtn">
								<h5 class="weight-600">Clicks</h5>
								<span class="count-category"><?php echo $request->getClicks(); ?></span>
								<div class="chart-div">
									<canvas id="clicks-chart"></canvas>
								</div>
							</a>
						</div>
						<div class="col-md-2">
							<a href="conversions.php" class="linkBtn">
								<h5 class="weight-600">Conversions</h5>
								<span class="count-category"><?php echo $request->getConversions(); ?></span>
								<div class="chart-div">
									<canvas id="conversions-chart"></canvas>
								</div>
							</a>
						</div>
						<div class="col-md-2">
							<a href="revenues.php" class="linkBtn">
								<h5 class="weight-600">Revenue</h5>
								<span class="count-category"><?php echo '$'.number_format($request->getRevenue(),2); ?></span>
								<div class="chart-div">
									<canvas id="revenue-chart"></canvas>
								</div>
							</a>
						</div>
						<div class="col-md-2">
							<a href="individual.php" class="linkBtn">
								<h5 class="weight-600">Individual Payout</h5>
								<span class="count-category">
									<?php 
										if($request->getConversions() != 0)
											echo '$'.number_format($request->getRevenue() / $request->getConversions(),2); 
										else
											echo '$'.number_format(0,2);
									?>
								</span>
								<div class="chart-div">
									<canvas id="ip-chart"></canvas>
								</div>
							</a>
						</div>
						<div class="col-md-2">
							<a href="epc.php" class="linkBtn">
								<h5 class="weight-600">Earnings per Click</h5>
								<span class="count-category">
									<?php 
										if($request->getClicks() != 0)
											echo '$'.number_format($request->getRevenue() / $request->getClicks(),2); 
										else
											echo '$'.number_format(0,2);
									?>
								</span>
								<div class="chart-div">
									<canvas id="epc-chart"></canvas>
								</div>
							</a>
						</div>
						<div class="col-md-1"></div>
					</div>
				</div>
			</div>
		</div>
		<div class="row space">
			<div class="col-md-12">
				<?php
					if(!empty($request->datas))
					{
						echo '<table id="reports" class="table table-striped table-bordered" style="width:100%">';
							echo '<thead>';
								echo '<tr>';
									echo '<th>OFFER</th>';
									echo '<th>CLICKS</th>';
									echo '<th>CONVERSIONS</th>';
									echo '<th>REVENUE</th>';
									echo '<th>INDIVIDUAL PAYOUT</th>';
									echo '<th>EARNINGS PER CLICK</th>';
								echo '</tr>';
							echo '</thead>';
							echo '<tbody>';
								foreach($request->datas as $data)
								{
									echo '<tr>';
										echo '<td>'.$data['offerName'].'</td>';
										echo '<td>'.$data['clicks'].'</td>';
										echo '<td>'.$data['conversions'].'</td>';
										echo '<td>'.number_format($data['payout'],2).'</td>';
										echo '<td>'.number_format($data['ipc'],2).'</td>';
										echo '<td>'.number_format($data['epc'],2).'</td>';
									echo '</tr>';
								}
							echo '</tbody>';
						echo '</table>';
					}
					else
						echo 'No records to show.';
				?>
			</div>
		</div>
	</div>
</body>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<script>
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

	$('input[name="daterange"]').daterangepicker({

		"minDate": "01/01/2017"
		}, 
		function(start, end, label) {
			console.log('New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')');
		}
	);

	$('body').on('click','.applyBtn',function(e){
		$("#range").submit();
	});	
</script>
</html>
