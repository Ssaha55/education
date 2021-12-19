<?php

		if(isset($_POST['regSubmit']))

		{

			$regName = $_POST['regName'];

			$regEmail = $_POST['regEmail'];

			$regPhone = $_POST['regPhone'];

			$regPassword = $_POST['regPassword'];

			$regPassword = md5($regPassword);



			function regOpenCon()

			{

				$dbhost = "localhost";

				$dbuser = "smartedu1";

				$dbpass = "smartedu123";

				$db = "smartedu1";

				$conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);

				return $conn;

			}

			

			function regCloseCon($conn)

			{

				$conn -> close();

			}



			$conn = regOpenCon();

			$regQuery = "INSERT INTO users(name,email,mobile,password) VALUES('".$regName."','".$regEmail."','".$regPhone."','".$regPassword."')";

			$result = mysqli_query($conn,$regQuery);

			if($result)

			{

				echo '

					<script>

					alert("Registration Successful");

					</script>

				';

			}

		}



		if(isset($_POST['login']))

		{

			$loginEmail = $_POST['loginEmail'];

			$loginPassword = $_POST['loginPassword'];

			$loginPassword = md5($loginPassword);

			function loginOpenCon()

			{

				$dbhost = "localhost";

				$dbuser = "smartedu1";

				$dbpass = "smartedu123";

				$db = "smartedu1";

				$conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);

				return $conn;

			}

			

			function loginCloseCon($conn)

			{

				$conn -> close();

			}



			$conn = loginOpenCon();

			$loginQuery = "SELECT * FROM users WHERE email='".$loginEmail."' AND password='".$loginPassword."'";

			$result = mysqli_query($conn,$loginQuery);

			if($result)

			{

				$result = mysqli_fetch_array($result);

				if($result['email'] == $loginEmail && $result['password'] == $loginPassword)

				{

					$_SESSION['user_id'] = $result['id'];

					echo '

						<script>

						location.href="dashboard.php";

						</script>

					';

				}

			}

		}

	?>

<!DOCTYPE html>

<html lang="en">



    <!-- Basic -->

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">   

   

    <!-- Mobile Metas -->

    <meta name="viewport" content="width=device-width, initial-scale=1">

 

     <!-- Site Metas -->

    <title>Restinphilipdbs</title>  

    <meta name="keywords" content="">

    <meta name="description" content="">

    <meta name="author" content="">



    <!-- Site Icons -->

    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />

    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">



    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- Site CSS -->

    <link rel="stylesheet" href="style.css">

    <!-- ALL VERSION CSS -->

    <link rel="stylesheet" href="css/versions.css">

    <!-- Responsive CSS -->

    <link rel="stylesheet" href="css/responsive.css">

    <!-- Custom CSS -->

    <link rel="stylesheet" href="css/custom.css">



    <!-- Modernizer for Portfolio -->

    <script src="js/modernizer.js"></script>



    <!--[if lt IE 9]>

      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>

      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

    <![endif]-->



</head>

<body class="host_version"> 



	<!-- Modal -->

	<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

	  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

		<div class="modal-content">

			<div class="modal-header tit-up">

				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

				<h4 class="modal-title">Student Login</h4>

			</div>

			<div class="modal-body customer-box">

				<!-- Nav tabs -->

				<ul class="nav nav-tabs">

					<li><a class="active" href="#Login" data-toggle="tab">Login</a></li>

					<li><a href="#Registration" data-toggle="tab">Registration</a></li>

				</ul>

				<!-- Tab panes -->

				<div class="tab-content">

					<div class="tab-pane active" id="Login">

						<form role="form" class="form-horizontal" action="" method="post">

							<div class="form-group">

								<div class="col-sm-12">

									<input class="form-control" id="email1" placeholder="Email" type="email" name="loginEmail">

								</div>

							</div>

							<div class="form-group">

								<div class="col-sm-12">

									<input class="form-control" id="exampleInputPassword1" placeholder="Password" type="password" name="loginPassword">

								</div>

							</div>

							<div class="row">

								<div class="col-sm-10">

									<button type="submit" class="btn btn-light btn-radius btn-brd grd1" name="login">

										Submit

									</button>

									<!--<a class="for-pwd" href="javascript:;">Forgot your password?</a>-->

								</div>

							</div>

						</form>

					</div>

					<div class="tab-pane" id="Registration">

						<form role="form" class="form-horizontal" action="" method="post">

							<div class="form-group">

								<div class="col-sm-12">

									<input class="form-control" placeholder="Name" type="text" name="regName">

								</div>

							</div>

							<div class="form-group">

								<div class="col-sm-12">

									<input class="form-control" id="email" placeholder="Email" type="email" name="regEmail">

								</div>

							</div>

							<div class="form-group">

								<div class="col-sm-12">

									<input class="form-control" id="mobile" placeholder="Mobile" type="tel" name="regPhone">

								</div>

							</div>

							<div class="form-group">

								<div class="col-sm-12">

									<input class="form-control" id="password" placeholder="Password" type="password" name="regPassword">

								</div>

							</div>

							<div class="row">							

								<div class="col-sm-10">

									<button type="submit" class="btn btn-light btn-radius btn-brd grd1" name="regSubmit">

										Save &amp; Continue

									</button>

									<button type="button" class="btn btn-light btn-radius btn-brd grd1">

										Cancel</button>

								</div>

							</div>

						</form>

					</div>

				</div>

			</div>

		</div>

	  </div>

	</div>



    <!-- LOADER -->

	<div id="preloader">

		<div class="loader-container">

			<div class="progress-br float shadow">

				<div class="progress__item"></div>

			</div>

		</div>

	</div>

	<!-- END LOADER -->	

	

	<!-- Start header -->

	<header class="top-navbar">

		<nav class="navbar navbar-expand-lg navbar-light bg-light">

			<div class="container-fluid">

				<a class="navbar-brand" href="index.php" style="color:white;">

					<!--<img src="images/logo.png" alt="" />-->

					RestinPhilipDBS

				</a>

				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-host" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">

					<span class="icon-bar"></span>

                    <span class="icon-bar"></span>

                    <span class="icon-bar"></span>

				</button>

				<div class="collapse navbar-collapse" id="navbars-host">

					<ul class="navbar-nav ml-auto">

						<li class="nav-item active"><a class="nav-link" href="index.php">Home</a></li>

						<li class="nav-item"><a class="nav-link" href="about.php">About Us</a></li>

						<li class="nav-item"><a class="nav-link" href="admin/index.php">Admin Login</a></li>

					</ul>

					<?php

						if(isset($_SESSION['user_id'])){

						?>

							<ul class="nav navbar-nav navbar-right">

                        		<li>

									<?php  

										if(!empty($_SESSION['user_id']))

										{

										?>

											<a class="hover-btn-new log orange" href="dashboard.php" ><span>Dashboard</span></a>

											<a class="hover-btn-new log orange" href="logout.php" ><span>Logout</span></a>

										<?php

										}

									?>

								</li>

                    		</ul>

						<?php

						}

						else{

						?>

							<ul class="nav navbar-nav navbar-right">

								<li><a class="hover-btn-new log orange" href="#" data-toggle="modal" data-target="#login"><span>Login/SignUp</span></a></li>

							</ul>

						<?php

						}

					?>

				</div>

			</div>

		</nav>

	</header>

	<!-- End header -->