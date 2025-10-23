<?php 
 
 session_start(); 

// changing the path of config file
require '../includes/config.php';
include '../includes/display_errors.php';


if (isset($_SESSION ['etudiant_panel'])) {

	header("location: ./user/login.php") ;
  
  
  }
  if (isset($_SESSION ['etudiant_panel'])) {
  
	$user = $_SESSION ['etudiant_panel'];
  
  }
  
?>

<!DOCTYPE html>
<html lang="fr" class="no-js">
	<head>
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="shortcut icon" href="vendor/img/fav.png">
		<meta name="author" content="ENSAB">
		<meta name="description" content="Pre inscription">
		<meta name="keywords" content="ENSAB">
		<meta charset="UTF-8">
		
		<title>ENSAB</title>

			<!--
			CSS
			============================================= -->
			<link rel="stylesheet" href="../vendor/css/linearicons.css">
			<link rel="stylesheet" href="../vendor/css/font-awesome.min.css">
			<link rel="stylesheet" href="../vendor/css/bootstrap.css">
			<link rel="stylesheet" href="../vendor/css/style.min.css">
            <link href="../vendor/css/dt.css" rel="stylesheet" type="text/css" />


			
			<script src="../vendor/js/dt.js" type="text/javascript"></script>
		</head>
		<body>

			  <header id="header" id="home">
			    <div class="container">
			    	<div class="row header-top align-items-center">
			    		<div class="col-lg-8 menu-top-left d-flex">
							<a href="">
								<img class="img-fluid" src="ENSA.png" alt="" width="240">	
							</a>			    			
			    		</div>
			    	</div>
			    </div>	
			    	<hr>
			    <div class="container">	
			    	<div class="row align-items-center justify-content-center d-flex">
				      <nav id="nav-menu-container">
				        <ul class="nav-menu">
				          <li class="menu-active"><a href="">Accueil</a></li>
				          <li><a href="mailto:#">Contact</a></li>
				         
					
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
							


<h3 class="h3"> Creation de Compte</h3> <hr>

<div class="col-md-12">



<body>
  <form enctype="multipart/form-data" action="inscrire.php" method="POST">
    
  <div class="col-md-12">

<label>Nom:</label>

<div class="form-group">

  <input name="nom" type="text" placeholder="" class="form-control" required="required" />

</div>

</div>

<div class="col-md-12">

<label>Prenom:</label>

<div class="form-group">

  <input name="prenom" type="text" placeholder="" class="form-control" required="required" />

</div>

</div>

<div class="col-md-12">

<label>CNE (MASSAR):</label>

<div class="form-group">

  <input name="username" type="text" placeholder="" class="form-control" required="required" />

</div>

</div>



<div class="col-md-12">

<label>Email:</label>

<div class="form-group">

<input name="email" type="email" class="form-control" required="required">

</div>

</div>


<div class="col-md-12">
<label>Photo:</label>

<div class="form-group">
    <input type="file" name="uploaded_file"></input>
    

    </div>
</div>


<div class="col-md-12">

<div class="form-group">

  <label class="col-form-label">Date de naissance:</label>

  <input name="date_n" type="date" class="form-control" id="datepicker" required="required">

</div>

</div>
<script>
$('#datepicker').datepicker({
    uiLibrary: 'bootstrap4'
});
</script>





<script type="text/javascript">

var check = function() {

if (document.getElementById('password').value ==

document.getElementById('password2').value) {

document.getElementById('message').style.color = 'green';

document.getElementById('message').innerHTML = 'Confirme!';

} else {

document.getElementById('message').style.color = 'red';

document.getElementById('message').innerHTML = 'Confirmation..';

}

}

</script>



<div class="col-md-12">

<label>Mot de passe:</label>

<div class="form-group">

  <input name="password" type="password" id="password" class="form-control"  required="required">

</div>

</div>



<div class="col-md-12">

<label>Confirmez le mot de passe:</label>

<div class="form-group">

  <input name="password2" id="password2" type="password" class="form-control"  onkeyup='check();' required="required">

  <span id='message'></span>

</div>

</div>




<div class="col-md-12">

<input type="submit" class="btn btn-primary btn-lg btn-block text-center" value="Creer Compte"></input>

</div>
  </form>
</body>
</html>



<?PHP
  if(!empty($_FILES['uploaded_file']))
  {
        
    $username = htmlspecialchars($_POST['username']);
    $date_n = htmlspecialchars($_POST['date_n']);
    $email = htmlspecialchars($_POST['email']);
    $password = $_POST['password'];
    $today = date("Y-m-d H:i:s"); 
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);



    $stmt_inscription = $connect->prepare("SELECT * FROM users WHERE username=:username or email=:email");

    $stmt_inscription->bindParam (':username' , $username , PDO::PARAM_STR );

    $stmt_inscription->bindParam (':email' , $email , PDO::PARAM_STR );

    $stmt_inscription->execute();





    
  
if ($stmt_inscription->rowCount() <= 0) {

// solution le probleme des images

  $path = "../uploads/";
  $base_name = basename( $_FILES['uploaded_file']['name']);
    $path = $path . $base_name;

    if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $path)) {
        $stmt = $connect->prepare("INSERT INTO `fichiers` (`username`,  `file`, `created_at`, `updated_at`) VALUES (:username, :file, :created_at, :updated_at)");

        $stmt->bindParam (':username' , $username , PDO::PARAM_STR );

        $stmt->bindParam (':file' , $path , PDO::PARAM_STR );

        $stmt->bindParam (':created_at' , $today , PDO::PARAM_STR );

        $stmt->bindParam (':updated_at' , $today , PDO::PARAM_STR );

        $stmt->execute();
      
    } else{
        echo "There was an error uploading the file, please try again!";
    }

   // Correction du probleme d'insertion des images
    $stmt1 = $connect->prepare("INSERT INTO `users` (`username`,  `nom`,  `prenom`,  `email`, `password`, `date_n`, `u_student`, `u_admin`, `created_at`, `updated_at`, `image`) VALUES (:username, :nom, :prenom, :email, :password, :date_n, 1, 0, :created_at, :updated_at, :image)");
    
    $stmt1->bindParam (':username' , $username , PDO::PARAM_STR );
    $stmt1->bindParam (':nom' , $nom , PDO::PARAM_STR );
    $stmt1->bindParam (':prenom' , $prenom , PDO::PARAM_STR );
    $stmt1->bindParam (':password' , $password , PDO::PARAM_STR );
    $stmt1->bindParam (':date_n' , $date_n , PDO::PARAM_STR );
    $stmt1->bindParam (':email' , $email , PDO::PARAM_STR );
    $stmt1->bindParam (':created_at' , $today , PDO::PARAM_STR );
    $stmt1->bindParam (':updated_at' , $today , PDO::PARAM_STR );
    $stmt1->bindParam (':image' , $path , PDO::PARAM_STR );
    $stmt1->execute();
  
  
  
    $_SESSION ['etudiant_panel'] = $username;
  
    $_SESSION ['email'] = $email;
  
    $token_rand = md5(uniqid(rand()));
  
    $_SESSION ['token'] = $token_rand;
  
    

    


    
  
    if (isset($stmt1)) {
  
        die("<div class='alert alert-success' style='margin: auto;'>
    
        <h3>Votre Compte a ete creer avec success !</h3>
     
        <p>s'il vous plait se connecter a votre compte to commencer l'inscription..!</p>
     
        <br>
        <meta http-equiv='refresh' content='6; url = ../index.php' />
        <a class='btn btn-warning mb-3' href='../index.php'>Se Connecter</a>");
    
    
    
      }

    
  }else 
  
  echo "<div class='alert alert-danger center' style='width: 90%; margin: auto;'><p>CNE ou Email utiliser deja existe</p></div><br><br>"; 
  
  
    
  }
?>