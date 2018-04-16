<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css"/>
<link rel="stylesheet" type="text/css" href="includes/css/custom.css"/>
<title>Insight | Clicks Chart</title>
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
			$startDate = '01/01/2017';
		}
		
		$chartLabels = $request->getChartLabels();
	?>
	<div class="container">
		<div class="row space">
			<div class="col-md-3">
				<form name= "range" id ="range" action ="" method="post">
					<label>Date Range</label>
					<input type="text" name="daterange" class="form-control" value="<?php $startDate.' - '.$endDate; ?>" />
				</form>
			</div>
			<div class="col-md-9">
				<?php 
					if(isset($sDate) && !empty($sDate) && isset($eDate) && !empty($eDate))
						echo '<a href="index.php?startDate='.$sDate.'&endDate='.$eDate.'" class="btn btn-primary linkBtn">Table View</a>';
					else
						echo '<a href="index.php" class="btn btn-primary linkBtn">Table View</a>';
				?>
			</div>
		</div>
		
		<div class="row space">
			<div class="col-md-12">
				<div class="summary-chart">
					<div class="row">
						<div class="col-md-6">
							<h5 class="weight-600-Chart size-30">Clicks</h5> &nbsp;&nbsp;<span class="count-category-Chart size-30">(<?php echo $request->getClicks(); ?>)</span>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="chart-div-big">
								<canvas id="clicks-chart"></canvas>
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
<script type="text/javascript" src="includes/js/chartInfo.js"></script>
<script type="text/javascript" src="includes/js/custom.js"></script>
</html>