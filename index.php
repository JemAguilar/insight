<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css"/>
<link rel="stylesheet" type="text/css" href="includes/css/custom.css"/>
<title>Insight | Login</title>
</head>
<body>
	<?php
		$errText = array();
		if(isset($_POST['login']))
		{
			$username = $_POST['username'];
			$password = $_POST['password'];
			if(empty($username) || empty($password))
				$errText[] = "Username/Password cannot be blank.";
			else
			{
				if($username !== 'jeminsight' || $password !== '@jemInsight')
					$errText[] = "Incorrect Username/Password.";
				else
					header('Location: overview.php');
			}
		}
	?>
	<div class="container">
		<div class="row">
			<div class="Absolute-Center is-Responsive">
			<div id="login">Login</div>
				<div class="col-sm-12 col-md-10 col-md-offset-1">
					<form action="" id="loginForm" method="POST">
						<?php if(!empty($errText)) { ?>
							<div class="alert alert-danger">
								<?php 
									foreach($errText as $err)
										echo $err.'<br/>';
								?>
							</div>
						<?php } ?>
						<div class="form-group input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
							<input class="form-control" type="text" name='username' placeholder="username"/>          
						</div>
						<div class="form-group input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
							<input class="form-control" type="password" name='password' placeholder="password"/>     
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-primary btn-block" name="login">Login</button>
						</div>
					</form>        
				</div>  
			</div>    
		</div>
	</div>
</body>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
</html>