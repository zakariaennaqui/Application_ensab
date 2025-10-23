<?php 
require '../includes/config.php';
include '../includes/display_errors.php';

?>
<!DOCTYPE html>
<html lang="fr" class="no-js">
	<head>
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="shortcut icon" href="vendor/img/fav.png">
		<meta name="author" content="ENSAB">
		<meta charset="UTF-8">
		<title><?php echo $title; ?></title>

			<link rel="stylesheet" href="../vendor/css/linearicons.css">
			<link rel="stylesheet" href="../vendor/css/font-awesome.min.css">
			<link rel="stylesheet" href="../vendor/css/bootstrap.css">
			<link rel="stylesheet" href="../vendor/css/style.min.css">
			
		</head>
		<body>

			  <header id="header" id="home">
			    <div class="container">
			    	<div class="row header-top align-items-center">
			    		<div class="col-lg-8 menu-top-left d-flex">
							<a href="#">
								<img class="img-fluid" src="./ENSA.png" alt="" width="240">	
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
				          
						  <?php if (isset($_SESSION ["admin_panel"])) { ?>
													<li><a href="etudiants.php">lites des etudiants</a></li>
													<li><a href="notes.php">notes</a></li>
													<li><a href="logout.php">Déconnecter</a></li>
						  <?php } ?>
				        </ul>
				      </nav>
			    	</div>
			    </div>
			  </header>


<section class="mt-30">
<div class="container-fluid">	