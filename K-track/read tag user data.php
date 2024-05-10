<?php
    require 'database.php';
    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
     
    $pdo =Database::connect();
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql = "SELECT * FROM table_rfid where id = ?";
	$q = $pdo->prepare($sql);
	$q->execute(array($id));
	$data = $q->fetch(PDO::FETCH_ASSOC);
	Database::disconnect();
	
	$msg = null;
	if (!isset($data['name']) || null === $data['name']) {
		$msg = "The ID of your Card / KeyChain is not registered !!!";
		$data['id']=$id;
		$data['name']="--------";
		$data['gender']="--------";
		$data['email']="--------";
		$data['mobile']="--------";
	} else {
		$msg = null;
	}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    	<link   href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    	<script src="bootstrap/js/bootstrap.min.js"></script>
	<script src="jquery.min.js"></script>
	<style>
		td.lf {
			padding-left: 15px;
			padding-top: 12px;
			padding-bottom: 12px;
		}
	</style>
</head>
	<body>
		<div class="mt-3 mb-3">
			<form>
				<table class="table">
					<tbody>
						<tr class="text-center w-100" color="#FFFFFF">
							<td>
								<div class="text-center bg-blues py-3 text-white">
									User Data
								</div>
							</td>
						<tr>
							<td scope="col" class="lf">
								<div class="d-flex justify-content-around">
									<div class="col-6">
										<p class="text-center">ID	:</p>
									</div>
									<div class="col-6">
										<p class="text-center"><?php echo $data['id'];?></p>
									</div>
								</div>
							</td>
						</tr>
						<tr>
							<td scope="col" class="lf">
								<div class="d-flex justify-content-around">
									<div class="col-6">
										<p class="text-center">Name	:</p>
									</div>
									<div class="col-6">
										<p class="text-center"><?php echo $data['name'];?></p>
									</div>
								</div>
							</td>
						</tr>
						<tr>
							<td scope="col" class="lf">
								<div class="d-flex justify-content-around">
									<div class="col-6">
										<p class="text-center">Gender	:</p>
									</div>
									<div class="col-6">
										<p class="text-center"><?php echo $data['gender'];?></p>
									</div>
								</div>
							</td>
						</tr>
						<tr>
							<td scope="col" class="lf">
								<div class="d-flex justify-content-around">
									<div class="col-6">
										<p class="text-center">Email	:</p>
									</div>
									<div class="col-6">
										<p class="text-center"><?php echo $data['email'];?></p>
									</div>
								</div>	
							</td>
						</tr>
						<tr>
							<td scope="col" class="lf">
								<div class="d-flex justify-content-around">
									<div class="col-6">
										<p class="text-center">Mobile Number	:</p>
									</div>
									<div class="col-6">
										<p class="text-center"><?php echo $data['mobile'];?></p>
									</div>
								</div>
							</td>
						</tr>
					</tbody>
				</table>
			</form>
		</div>
		<p style="color:red;" class="text-center"><?php echo $msg;?></p>
	</body>
</html>