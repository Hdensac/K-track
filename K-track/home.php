<?php
	$Write="<?php $" . "UIDresult=''; " . "echo $" . "UIDresult;" . " ?>";
	file_put_contents('UIDContainer.php',$Write);
?>

<!DOCTYPE html>
<html lang="en">
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta charset="utf-8">
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<style>
		html {
			font-family: Arial;
			display: inline-block;
			margin: 0px auto;
			text-align: center;
		}

		.nav-links{
			display: block;
			padding: 0.5rem 1rem;
			font-size: var(--bs-nav-link-font-size);
			font-weight: var(--bs-nav-link-font-weight);
			color: #954B1B;
			text-decoration: none;
			background: none;
			border: 0;
			transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out;
		}

		.nav-links:hover, .nav-links:focus{
			color: #ff6600;
		}

		.nav-links.active{
			color: #ff6600;
		}

		.nav-links:focus-visible {
			outline: 0;
			box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
		}
		
		.nav-links.disabled, .nav-links:disabled {
			color: #ff6600;
			pointer-events: none;
			cursor: default;
		}

		.text-maron{
			color: #954B1B;
		}
		

		.text-marons{
			color: #ff6600;
			padding-top: 0.3125rem;
			padding-bottom: 0.3125rem;
			margin-right: 1rem;
			font-size: 1.25rem;
			text-decoration: none;
			white-space: nowrap;
		}
		.text-marons:hover, .text-marons:focus {
			color: #ff6600;
		}

		.bg-blues{
			background-color: #264A67;
		}

		.text-blues{
			color: #264A67;
		}

		.btn-marons{
			background-color: #ff6600;
		}

		.btn-marons:hover{
			background-color: #954B1B;
		}

		.O{
			padding: 0px;
			margin: 0px;
			height: 80px;
			width: 150px;
		}

		.border-blues{
			border-right: 1px solid #264A67;
		}

		.nav-linkss{
			display: block;
			padding: 0.5rem 1rem;
			font-size: var(--bs-nav-link-font-size);
			font-weight: var(--bs-nav-link-font-weight);
			color: #4f6980;
			text-decoration: none;
			background: none;
			border: 0;
			font-weight: 500;
			transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out;
		}

		.nav-linkss:hover, .nav-linkss:focus{
			color: #264A67;
			font-weight: bold;
		}

		.nav-linkss.active{
			font-weight: bold;
			color: #264A67;
		}

		.nav-linkss:focus-visible {
			outline: 0;
			box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
		}
		
		.nav-linkss.disabled, .nav-linkss:disabled {
			color: #ff6600;
			pointer-events: none;
			cursor: default;
		}

		@media (max-width: 575.98px) {
			.border-sm-l{
				border-left: 1px solid #264A67;
			}
			.border-sm-r{
			border-right: 1px solid #264A67;
			}
			.border-sm-t{
			border-top: 1px solid #264A67;
			}
			.border-sm-b{
			border-bottom: 1px solid #264A67;
			}
		}

		@media (min-width: 576px) {
			.border-sm-l{
				border-left: 1px solid #264A67;
			}
			.border-sm-r{
			border-right: 1px solid #264A67;
			}
			.border-sm-t{
			border-top: 1px solid #264A67;
			}
			.border-sm-b{
			border-bottom: 1px solid #264A67;
			}
		}

		@media (min-width: 768px) {
			.border-md-l{
      			border-left: 1px solid #264A67;
			}
			.border-md-r{
				border-right: 1px solid #264A67;
			}
			.border-md-t{
				border-top: 1px solid #264A67;
			}
			.border-md-b{
				border-bottom: 1px solid #264A67;
			}
		}

		@media (min-width: 992px) {
			.border-lg-l{
				border-left: 1px solid #264A67;
			}
			.border-lg-r{
			border-right: 1px solid #264A67;
			}
			.border-lg-t{
			border-top: 1px solid #264A67;
			}
			.border-lg-b{
			border-bottom: 1px solid #264A67;
			}
		}

		@media (min-width: 1200px) {
			.border-xl-l{
				border-left: 1px solid #264A67;
			}
			.border-xl-r{
			border-right: 1px solid #264A67;
			}
			.border-xl-t{
			border-top: 1px solid #264A67;
			}
			.border-xl-b{
			border-bottom: 1px solid #264A67;
			}
		}

		.hover{
			margin-bottom: 10px;
			transition: all 0.2s;
		}

		.hover:hover{
			box-shadow: 0px 40px 50px -60px #264A67;
			margin-bottom: 20px;
		}
		</style>
		
		<title>K-track</title>
	</head>
	
	<body class="d-flex flex-column justify-content-between w-100 h-100 position-absolute">
		<nav class="navbar navbar-expand-sm navbar-light bg-white pe-4 ps-4">
			<div class="container">
				<a class="navbar-brand text-marons fw-bold" href="home.php">
					<img src="logo.png" class="O" alt="">
				</a>
				<button
					class="navbar-toggler d-lg-none"
					type="button"
					data-bs-toggle="collapse"
					data-bs-target="#collapsibleNavId"
					aria-controls="collapsibleNavId"
					aria-expanded="false"
					aria-label="Toggle navigation"
				>
					<span class="navbar-toggler-icon"></span>
				</button>
			</div>
			<div class="collapse navbar-collapse" id="collapsibleNavId">
				<ul class="navbar-nav me-auto mt-2 mt-lg-0">
					<li class="nav-item">
						<a class="nav-linkss active fw-bold" href="home.php">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-linkss fw-medium " href="../K-track/log.php">UserData</a>
					</li>
					<li class="nav-item">
						<a class="nav-linkss fw-medium " href="../K-track/logi.php">Registration</a>
					</li>
					<li class="nav-item">
						<a class="nav-linkss fw-medium " href="login.php">ReadTagID</a>
					</li>
					<li class="nav-item">
						<a class="nav-linkss fw-medium" href="../KHC_Track/login.html">Localisation</a>
					</li>
                                        <li class="nav-item">
                                                <a class="nav-linkss" href="Login.php">historique</a>
                                        </li>
				</ul>
			</div>
		</nav>

		<div class="container-fluid bg-light">
			<div class="row hover ">
				<div class="col-md-6 d-flex flex-column ps-5 justify-content-center">
					<h3 class="text-start text-blues h1">Tracking</h3>
					<p class="text-muted display-5 text-start">Zoro est incroyablement fort au combat, mais il est notoirement mauvais en orientation. Il peut se perdre en allant tout droit....</p>
					<a class="btn btn-marons py-2 px-2 w-25 text-white"  href="../K-tracking/logi.php">
						Rejoins nous
					</a>
				</div>
				<div class="col-md-6">
					<img src="smart.png" class="img-fluid" alt="">
				</div>
			</div>
			<div class="hover">
				<img src="15.png" class="img-fluid " alt="">
			</div>
		</div>

		<footer class="bg-white text-white text-center text-lg-start">
			<!-- Grid container -->
			<div class="container p-4">
				<!--Grid row-->
				<div class="row">
				<!--Grid column-->
				<div class="col-lg-6 col-md-12 mb-4 mb-md-0 border-lg-r border-xl-r">
					<a class="navbar-brand text-marons fw-bold" href="#">
						<img src="logo.png" class="O" alt="">
					</a>

					<p class="text-dark">
					Shinji Ikari du manga et de l'anime "Neon Genesis Evangelion". 
					Shinji est souvent décrit comme étant incapable de trouver son chemin même en suivantune direction simple. 
					Son manque de sens de l'orientation est souvent utilisé comme source de comédie dans la série.
					</p>
				</div>
				<!--Grid column-->

				<!--Grid column-->
				<div class="col-lg-6 col-md-12 mb-4 mb-md-0 ">
					<h5 class="text-uppercase text-marons text-center">Liens</h5>

					<ul class="navbar-nav d-flex flex-row flex-wrap  me-auto mt-2 pt-3 mt-lg-0">
						<li class="nav-item">
							<a class="nav-linkss active" href="../K-track/home.php">Home</a>
						</li>
						<li class="nav-item">
							<a class="nav-linkss" href="../K-track/log.php">UserData</a>
						</li>
						<li class="nav-item">
							<a class="nav-linkss" href="../K-track/logi.php">Registration</a>
						</li>
						<li class="nav-item">
							<a class="nav-linkss" href="../K-track/read tag.php">ReadTagID</a>
						</li>
						<li class="nav-item">
							<a class="nav-linkss" href="../KHC_Track/login.html">Localisation</a>
						</li>
                                                <li class="nav-item">
                                                <a class="nav-linkss" href="Login.php">historique</a>
                                        </li>
					</ul>
				</div>
				<!--Grid column-->
				</div>
				<!--Grid row-->
			</div>
			<!-- Grid container -->
		</footer>
		<script src="bootstrap/js/bootstrap.min.js"></script>
		<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
	</body>
</html>
