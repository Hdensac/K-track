<?php
    require 'database.php';
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     
    if (!empty($_GET['id'])) {
        $id = $_REQUEST['id'];
        if (isset($_POST['button'])) {
            // delete data
            $sql = "DELETE FROM table_rfid  WHERE id = '$id'";
            $q = $pdo->prepare($sql);
            $q->execute();
            header("Location: user data.php");
        }
    }
    Database::disconnect(); 
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<title>Delete : K-track</title>
    <style>
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

        .bg-marons{
			background-color: #ff6600;
		}

		.btn-marons{
			background-color: #ff6600;
			color: white;
		}

		.btn-marons:hover{
			background-color: #954B1B;
			color: white;
		}
    </style>
</head>
 
<body class="d-flex flex-column justify-content-between w-100 h-100 position-absolute">

    <div class="container-fluid w-100 h-100 position-absolute row justify-content-center align-items-center">

        <div class="">
            <div class="row pb-2">
                <h2 class="text-center">K-track</h2>
            </div>      
                
            <form class="border px-3 py-3 rounded container w-50" action="user data delete page.php?id=<?php echo $id?>" method="post">
                <h3 class="pb-2 text-center">Delete User</h3>
                <div class="row">
                    <div class="col-12 mb-3">
                        <p class="bg-maron w-100 text-center">Are you sure to delete ?</p>
                    </div>
                    <div class="col-md-6 col-lg-6 col-12 mb-3">
                        <button type="submit" name="button" class="btn btn-danger w-100">Yes</button>
                    </div>
                    <div class="col-md-6 col-lg-6 col-12 mb-3">
                        <a class="btn w-100 btn-marons" href="user data.php">No</a>
                    </div>
                </div>
            </form>
        </div> 
    </div>       
    
    <script src="bootstrap/js/bootstrap.min.js"></script>
	<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
  </body>
</html>