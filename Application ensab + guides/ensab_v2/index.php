

<!DOCTYPE html>
<html lang="fr" class="no-js">
	<head>
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="shortcut icon" href="vendor/img/fav.png">
		<meta name="author" content="ENSA">
		<meta name="description" content="Découvre les résultats des examens">
		<meta name="keywords" content="ENSA">
		<meta charset="UTF-8">
		
		<title>ENSA</title>

			<!--
			CSS
			============================================= -->
			<link rel="stylesheet" href="vendor/css/linearicons.css">
			<link rel="stylesheet" href="vendor/css/font-awesome.min.css">
			<link rel="stylesheet" href="vendor/css/bootstrap.css">
			<link rel="stylesheet" href="vendor/css/style.min.css">

			<link href="carte/css/carte.css" rel="stylesheet">

			<script src="carte/js/jquery-1.11.3.min.js"></script>
			<script src="carte/js/js.js"></script>



		</head>
		<body>

		<?php 

  if (isset($_SESSION ['admin_panel'])) {

	header("location: admin/index.php") ;
  
	die('Stop using NoRedirect Tools!');
  
  }



  if (isset($_POST['user'])) {


	header ("location: ./auth/inscrire.php");   
 
	echo "<meta http-equiv='refresh' content='0; url = ./query_string/index.php' />";      
 
 }

 if (isset($_POST['btn1'])) {
 
 
	 header ("location: ./query_string/index.php");   
  
	 echo "<meta http-equiv='refresh' content='0; url = ./query_string/index.php' />";      
  
  }

 if (isset($_POST['btn2'])) {
	
 
	header ("location: ./upload_file/user/login.php");   
 
	echo "<meta http-equiv='refresh' content='0; url = ./upload_file/inscrire.php' />";      
 
 }
 if (isset($_POST['btn3'])) {
 
 
	 header ("location: ./sql_injection/login.php");   
  
	 echo "<meta http-equiv='refresh' content='0; url = ./sql_injection/login.php' />";      
  
  }
  if (isset($_POST['btn4'])) {
  
  
	  header ("location: ./xss/index.php");   
   
	  echo "<meta http-equiv='refresh' content='0; url = ./xss/index.php' />";      
   
   }

   if (isset($_POST['btn5'])) {
  
  
	header ("location: ./bruteForce/index.php");   
 
	echo "<meta http-equiv='refresh' content='0; url = ./bruteForce/index.php' />";      
 
 	}

	if (isset($_POST['btn6'])) {
		header ("location: ./blindsqli/index.php");   	
		echo "<meta http-equiv='refresh' content='0; url = ./blindsqli/index.php' />";      
	}
 
 ?>

			  <header id="header" id="home">
			    <div class="container">
			    	<div class="row header-top align-items-center">
			    		<div class="col-lg-12 menu-top-left d-flex justify-content-between">
							<a href="#">
								<!-- changing the src of the img from ensa.png to ./vendor/img/ensa.png -->
								<img class="img-fluid" src="./vendor/img/ensa.png" alt="" width="240">	
							</a>	
							<a href="#">
								<!-- changing the src of the img from ensa.png to ./vendor/img/ensa.png -->
								<img class="img-fluid" src="./vendor/img/uhp.png" alt="" width="240">	
							</a>			    			
			    		</div>
			    	</div>
			    </div>	
			    	<hr>
			    <div class="container">	
			    	<div class="row align-items-center justify-content-center d-flex">
				      <nav id="nav-menu-container">
				        <ul class="nav-menu">
						<li class="menu-active"><a href="index.php">Accueil</a></li>
						
						<li><a href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
								ENSA MENU</a>
							<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
								<li><a class="dropdown-item" href="#">ENSA</a></li>
								<li><a class="dropdown-item" href="#">TEST</a></li>

							</ul>
						
						</li>
							

											</ul>
				      </nav><!-- #nav-menu-container -->		    		
			    	</div>
			    </div>
			  </header><!-- #header -->


			<section class="section-gap relative mt-20">
				<div class=" overlay-bg"></div>
				<div class="container">
					<div class="row justify-content-between align-items-center">


						<div class="col-md-8 offset-md-2 bk-right">
						
					<?php  $e1= substr(sha1("creation_compte"), 0, 24);?>
<h4 class="mb-40 text-center">ENSAB Sécurité WEB APP </h4>
<div class="card-body text-center">

<a href="./installation"><button class="btn btn-primary" data-toggle="tooltip">Installation BBD</button></a>
<hr>
						




<div class="alert alert-success" role="alert">
  <h4 class="alert-heading">Listes des Attaques</h4>
    <hr>
	<form  action="" method="post">
			<div class="container">
				<div class="text-center">

						<button type="submit" name="user" class="btn btn-success  btn-lg btn-block" data-toggle="tooltip">Creation de compte</button>
						<hr><button type="submit" name="btn1" class="btn btn-danger  btn-lg btn-block" data-toggle="tooltip">Query string attack</button>
						<hr>
						<button type="submit" name="btn2" class="btn btn-danger  btn-lg btn-block" data-toggle="tooltip">Upload File Attack</button>
						<hr>
						<button type="submit" name="btn3" class="btn btn-danger  btn-lg btn-block" data-toggle="tooltip">SQL Injection Attack</button>
						<hr>
						<button type="submit" name="btn4" class="btn btn-danger  btn-lg btn-block" data-toggle="tooltip">XSS Attack</button>
						<hr>
						<button type="submit" name="btn5" class="btn btn-danger  btn-lg btn-block" data-toggle="tooltip">Brute Force Attack</button>
						<hr>
						<button type="submit" name="btn6" class="btn btn-danger  btn-lg btn-block" data-toggle="tooltip">Blind SQL Injection Attack</button>
				</div>
  
			</div>
    </form>
</div>

              

</div>

	</div>
				

<?php include 'footer.php'; ?>