<?php 

require '../../includes/config.php';

include '../../includes/display_errors.php';

?>

<!DOCTYPE html>

<html lang="fr" class="no-js">

	<head>

		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<link rel="shortcut icon" href="vendor/img/fav.png">

		<meta name="author" content="ENSAB">

		<meta charset="UTF-8">

		<title><?php echo $title; ?></title>



			<link rel="stylesheet" href="../vendor/css/linearicons.css">

			<link rel="stylesheet" href="../vendor/css/font-awesome.min.css">

			<link rel="stylesheet" href="../vendor/css/bootstrap.css">
			
			<link rel="stylesheet" href="../vendor/css/tabs.css">

			<link rel="stylesheet" href="../vendor/css/style.min.css">

			<script src="../vendor/js/jquery-2.2.4.min.js"></script>

			

		</head>

		<body>



			  <header id="header" id="home">

			    <div class="container">

			    	<div class="row header-top align-items-center">

			    		<div class="col-lg-8 menu-top-left d-flex">

							<a href="#">

								<img class="img-fluid" src="../ENSA.png" alt="" width="240">	

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
								ENSA</a>
							
						
						</li>				         
						
						<li><a href="#">guide</a></li>
						<li><a href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
								Espace Etudiant</a>
							<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
								<li><a class="dropdown-item" href="./login.php">Se Connecter</a></li>
							</ul>
						
					

					
						<li><a href="logout.php">Déconnecter</a></li>

									
				</ul>

				      </nav>

			    	</div>

			    </div>

			  </header>





<section class="mt-30">

<div class="container-fluid">	