<?php
    require 'database.php';
	$pdo = Database::connect();
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
		if ( !empty($_POST)) {
			// keep track post values
			$name = $_POST['name'];
			$id = $_POST['id'];
			$gender = $_POST['gender'];
			$email = $_POST['email'];
			$mobile = $_POST['mobile'];
			
			// insert data
			$upate = "UPDATE `table_rfid` SET `name`='$name',`id`='$id',
			`gender`='$gender',`email`='$email',`mobile`='$mobile' WHERE id='$id'";
			$stmt = $pdo->prepare($upate);
			// execute the query
			$stmt->execute();
		}
    }
     
	$sql = "SELECT * FROM table_rfid where id = ?";
	$q = $pdo->prepare($sql);
	$q->execute(array($id));
	$data = $q->fetch(PDO::FETCH_ASSOC);
	Database::disconnect();
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
		}
		
		textarea {
			resize: none;
		}

		ul.topnav {
			list-style-type: none;
			margin: auto;
			padding: 0;
			overflow: hidden;
			background-color: #4CAF50;
			width: 70%;
		}

		ul.topnav li {float: left;}

		ul.topnav li a {
			display: block;
			color: white;
			text-align: center;
			padding: 14px 16px;
			text-decoration: none;
		}

		ul.topnav li a:hover:not(.active) {background-color: #3e8e41;}

		ul.topnav li a.active {background-color: #333;}

		ul.topnav li.right {float: right;}

		@media screen and (max-width: 600px) {
			ul.topnav li.right, 
			ul.topnav li {float: none;}
		}

		.btn-marons{
			background-color: #ff6600;
			color: white;
		}

		.btn-outline-marons{
			border: 1px solid #ff6600;
			color: #ff6600;
		}

		.btn-outline-marons:hover{
			background-color:  #954B1B;
			color: white;
		}

		.btn-marons:hover{
			background-color: #954B1B;
			color: white;
		}
		</style>
		
		<title>Edit : K-track</title>
		
	</head>
	
	<body class="bg-light d-flex flex-column justify-content-between w-100 h-100 position-absolute">
		<div class="container">

			<div class="">
				<div class="row">
					<h2 class="text-center">K-track</h2>
					<p id="defaultGender" hidden><?php echo $data['gender'];?></p>
				</div>
		 
				<form class="container pt-3" action="user data edit tb.php?id=<?php echo $id?>" method="post">
					<h3 align="center" class="pb-2">Edit User Data</h3>
					<div class="row border px-3 py-4 rounded">
						<div class="col-12 mb-3">
							<label for="exampleInputEmail1" class="form-label">ID</label>
							<input name="id" type="text" class="form-control" placeholder="" value="<?php echo $data['id'];?>" readonly>
						</div>
						<div class="col-12 mb-3">
							<label for="exampleInputPassword1" class="form-label">Name</label>
							<input id="div_refresh" name="name" type="text" class="form-control" placeholder="" value="<?php echo $data['name'];?>" required>
						</div>
						<div class="col-md-6 col-lg-6 col-12 mb-3">
							<label for="email" class="form-label">Email Address</label>
							<input name="email" type="text" class="form-control" value="<?php echo $data['email'];?>" placeholder="" required>
						</div>
						<div class="col-md-6 col-lg-6 col-12 mb-3">
							<label for="mobile" class="form-label">Mobile Number</label>
							<input name="mobile" type="text" value="<?php echo $data['mobile'];?>" class="form-control" placeholder="" required>
						</div>
						<div class="col-12 mb-3">
								<label class="form-label">Gender</label>
								<select class="form-select" name="gender" id="mySelect">
									<option value="Male">Male</option>
									<option value="Female">Female</option>
								</select>
						</div>
						<div class="col-md-6 col-lg-6 col-12 mb-3">
							<button type="submit" class="btn btn-marons w-100">Update</button>
						</div>
						<div class="col-md-6 col-lg-6 col-12 mb-3">
							<a class="btn btn-outline-marons w-100" href="user data.php">Back</a>
						</div>
					</div>
				</form>
			</div>               
		</div> <!-- /container -->	
		
		<script src="bootstrap/js/bootstrap.min.js"></script>
		<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
		<script>
			var g = document.getElementById("defaultGender").innerHTML;
			if(g=="Male") {
				document.getElementById("mySelect").selectedIndex = "0";
			} else {
				document.getElementById("mySelect").selectedIndex = "1";
			}
		</script>
	</body>
</html>