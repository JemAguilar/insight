<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css"/>
<link rel="stylesheet" type="text/css" href="includes/css/custom.css"/>
<title>Insight | Individual Payout Chart</title>
</head>
<body>
	<?php
		require_once('includes/Request.php');

		if(isset($_GET['startDate']) && !empty($_GET['startDate']) && isset($_GET['endDate']) && !empty($_GET['endDate']))
		{
			$sDate = date_format(date_create($_GET['startDate']),'Y-m-d');
			$eDate = date_format(date_create($_GET['endDate']),'Y-m-d');
			$startDate = $_GET['startDate'];
			$endDate = $_GET['endDate'];
			$request = new Request($sDate,$eDate);
		}
		
		if(isset($_POST['daterange']))
		{
			$sDate = date_format(date_create(trim(explode('-',$_POST['daterange'])[0])),'Y-m-d');
			$eDate = date_format(date_create(trim(explode('-',$_POST['daterange'])[1])),'Y-m-d');
			$startDate = trim(explode('-',$_POST['daterange'])[0]);
			$endDate = trim(explode('-',$_POST['daterange'])[1]);
			$request = new Request($sDate,$eDate);
		}
		
		if(!isset($_GET['startDate']) && empty($_GET['startDate']) && !isset($_GET['endDate']) && empty($_GET['endDate']) && !isset($_POST['daterange']))
		{
			$request = new Request;
			$endDate = date_format(date_create(date('Y-m-d')),'m/d/Y');
			$startDate = '01/01/2017';
		}
		
		$chartLabels = $request->getChartLabels();
	
	echo $request->getIPChartDatas();
	?>
	<div class="container">
		<div class="row space">
			<div class="col-md-3">
				<form name= "range" id ="range" action ="" method="post">
					<label>Date Range</label>
					<input type="text" name="daterange" class="form-control" value="<?php echo $startDate.' - '.$endDate; ?>" />
				</form>
			</div>
			<div class="col-md-9">
				<?php 
					if(isset($startDate) && !empty($endDate) && isset($startDate) && !empty($endDate))
						echo '<a href="overview.php?startDate='.$startDate.'&endDate='.$endDate.'" class="btn btn-primary linkBtn">Table View</a>';
					else
						echo '<a href="overview.php" class="btn btn-primary linkBtn">Table View</a>';
				?>
			</div>
		</div>
	
		<div class="row space">
			<div class="col-md-12">
				<div class="summary-chart">
					<div class="row">
						<div class="col-md-6">
							<h5 class="weight-600-Chart size-30">Individual Payout</h5> &nbsp;&nbsp;
							<span class="count-category-Chart size-30">
							(<?php 
								if($request->getConversions() != 0)
									echo '$'.number_format($request->getRevenue() / $request->getConversions(),2); 
								else
									echo '$'.number_format(0,2);
							?>)
							</span>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="chart-div-big">
								<canvas id="ip-chart"></canvas>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<script>
	$(document).ready(function() {
		
		new Chart(document.getElementById("ip-chart"), {
			type: 'line',
			data: {
				labels: [0,<?php echo "'".$chartLabels."'" ?>],
				datasets: [{ 
					data: [0,<?php echo $request->getIPChartDatas();?>],
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
	});
	
</script>
</html>
