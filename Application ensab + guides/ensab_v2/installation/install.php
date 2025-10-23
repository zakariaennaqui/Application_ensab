
 <!DOCTYPE html>
 <html xmlns="http://www.w3.org/1999/xhtml">
   <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <meta name="author" content="ING ENSA">
     <title>Installation de L'ENSAB pre inscription</title>
     <link rel="stylesheet" href="../vendor/css/bootstrap.css">

    <!--link rel="stylesheet" href="../vendor/css/bootstrap.css"  louja-->

        
  </head>
<body>
<?php 

if (version_compare(PHP_VERSION, "5.6.0", "<")) {
  print "Requires PHP 5.6.0 or newer.\n";
  exit;
}
 ?>

<div class="content col-md-8 offset-2">


<div class="card mt-5 mb-5">
  <!-- Adding UHP logo -->
  <div class="card-header text-white bg-light d-flex justify-content-between">
    <h5><img src="../vendor/img/ensa.png" width="250"></h5>
    <h5><img src="../vendor/img/uhp.png" width="250"></h5>
  </div>
  <div class="card-body">

<?php 

$etat = htmlspecialchars(@$_GET['etat']);

/*---------------------------------------------------------------------------------------*/

if ($etat == "start") {

if (!function_exists('fopen') OR !function_exists('fwrite') ) {
	 $error = 1;
}

if (function_exists('chmod') ) {
	@chmod('../uploads', 0777);
}

if (@$error == 1)  {
  echo "<div class='alert alert-warning' style='margin: auto;'>
      <h3>la création automatique du fichier ne fonctionne pas.</h3>
        <p>création automatique du fichier nécessite quelque fonctions, svp creer une repertoire dans le dossier principal de code sourse nomme [uploads]</p>
        
      
    </div>";
	 die();
}



	if (isset($_POST['submit'])) {
  
	  $db_hostname =  htmlspecialchars($_POST['db_host']);
	  $db_userdata =  htmlspecialchars($_POST['db_user']);
	  $db_password = htmlspecialchars($_POST['db_pass']);
	  $db_dataname = htmlspecialchars($_POST['db_name']);

    function generateRandomString($length = 10) {
        return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
    }
    function generateRandomString2($length = 15)
    {
        return substr(sha1(rand()), 0, $length);
    }
    
    $ENCRYPTION_KEY = generateRandomString2(32);
    $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
    $search = 'installation/install.php?etat=start' ;
    $SET_ = str_replace($search, '', $actual_link) ;



// check dababase
    try { 
   $connect =  new PDO("mysql:host=$db_hostname; dbname=$db_dataname", $db_userdata,$db_password); 
   } 
 
   catch (PDOException $e) { 

    header("location: install.php?etat=start&error=Could not open connection to database server. Please check your configuration");
    die();
   }

$filename = '../includes/config.php';

if (!file_exists($filename)) {
   die('config.php N\'exist pas!');
} 

	$fh = fopen('../includes/config.php', 'w');

		if ($fh) {
			$s = "<?php \n" 
          . "\t define( '', '$SET_'); \n"
          . "\t define( 'ENCRYPTION_KEY', '$ENCRYPTION_KEY'); \n"
				  . " \n" 
				  . "\t \$db_hostname = \"$db_hostname\"; \n"
				  . "\t \$db_userdata = \"$db_userdata\"; \n"
				  . "\t \$db_password = \"$db_password\"; \n"
          . "\t \$db_dataname = \"$db_dataname\"; \n"
				  . "\t \$INSTALL = true; \n"
				  . " \n"

				  . "\t try { \n"
				  . "\t \$db=new mysqli(\"\$db_hostname\",\"\$db_userdata\",\"\$db_password\"); \n"
          . "\t\$db->select_db(\"\$db_dataname\");"
				  . "\t \$connect =  new PDO(\"mysql:host=\$db_hostname; dbname=\$db_dataname\", \$db_userdata,\$db_password); \n"

				  . "\t } \n"
				  . " \n"

				  . "\t catch (PDOException \$e) { \n"
          . "\t if (\$INSTALL == false) { \n"

          . "\t include 'installation/index.php'; \n"
          . "\t die(); \n"

          . "\t } else { \n"
				  . "\t die(\"Database Exception, contact le webmaster\"); } \n"
				  . "\t } \n"
				  . " \n"

				  . "\t \$connect->query(\"set names'utf8' \"); \n"
				  . " \n"
				  
				  . "?>";
			fwrite($fh, $s);
			fclose($fh);
			
		}

//---> tables
 
require '../includes/config.php';

$tables = $connect->query("CREATE TABLE `notes` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(200) NULL DEFAULT NULL COLLATE 'utf8mb4_unicode_ci',
	`note` FLOAT NOT NULL DEFAULT '0',
  `created_at` TIMESTAMP NOT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  `deletet_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
)
COLLATE='utf8_unicode_ci'
ENGINE=InnoDB
AUTO_INCREMENT=1
;

CREATE TABLE `users` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(255) NULL DEFAULT NULL COLLATE 'utf8mb4_unicode_ci',
  `prenom` VARCHAR(255) NULL DEFAULT NULL COLLATE 'utf8mb4_unicode_ci',
  `cni` VARCHAR(200) NULL DEFAULT NULL COLLATE 'utf8mb4_unicode_ci',
  `username` VARCHAR(200) NULL DEFAULT NULL COLLATE 'utf8mb4_unicode_ci',
  `email` VARCHAR(200) NULL DEFAULT NULL COLLATE 'utf8mb4_unicode_ci',
  `password` VARCHAR(255) NULL DEFAULT NULL COLLATE 'utf8mb4_unicode_ci',
  `filiere_id` INT(11) NULL DEFAULT NULL,
  `note_bac` float NOT NULL,
  `phone` VARCHAR(255) NULL DEFAULT NULL COLLATE 'utf8mb4_unicode_ci',
  `date_n` VARCHAR(255) NULL DEFAULT NULL COLLATE 'utf8mb4_unicode_ci',
  `address` VARCHAR(255) NULL DEFAULT NULL COLLATE 'utf8mb4_unicode_ci',
  `ville` VARCHAR(255) NULL DEFAULT NULL COLLATE 'utf8mb4_unicode_ci',
  `image` VARCHAR(255) NULL DEFAULT NULL COLLATE 'utf8mb4_unicode_ci',
  `valide` TINYINT(1) NOT NULL DEFAULT '0',
  `etape` TINYINT(1) NOT NULL DEFAULT '0',
  `u_student` TINYINT(1) NOT NULL DEFAULT '0',
  `u_admin` TINYINT(1) NOT NULL DEFAULT '0',
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  `deleted_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `users_username_unique` (`username`),
  CONSTRAINT FK_filiere FOREIGN KEY (filiere_id)
  REFERENCES article(id)
)
COLLATE='utf8mb4_unicode_ci'
ENGINE=MyISAM
AUTO_INCREMENT=1
;
INSERT INTO `users` ( `nom`, `prenom`, `username`,  `email`, `password`, `valide`, `u_admin`, `created_at`, `updated_at`) VALUES 
('Mokaddem', 'Hicham', 'mokaddemhicham', 'admin@mokaddemhicham.tech', 'helloworld0101', 1, 1, '2023-11-14 20:56:15', '2023-11-14 20:56:15');

CREATE TABLE `fichiers` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(250) NOT NULL COLLATE 'utf8_unicode_ci',
  `file` VARCHAR(255) NOT NULL COLLATE 'utf8_unicode_ci',
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  `deletet_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
  )
COLLATE='utf8_unicode_ci'
ENGINE=InnoDB
AUTO_INCREMENT=1
;

");

header("location: install.php?etat=config");
die();

	
	}

	?>


<div class="row">

<div class="col-md-12">
<h5>Entrez les détails de connexion à votre base de données:</h5>
<hr>  


<?php if(isset($_GET['error'])) { ?>
  <div class='alert alert-danger'>
    <strong><?php echo $_GET['error']; ?></strong>
  </div>
<?php } ?>

<form id="formID" method="post" action="" class="row">


<div class="col-md-6">
  <label>Host (serveur) :</label>
        <div class="form-group">
            <input name="db_host" type="text" placeholder="" class="form-control" value="localhost"/>
        </div>
</div>        

<div class="col-md-6">
  <label>Nom d'utilisateur de la base :</label>
        <div class="form-group">
            <input name="db_user" type="text" class="form-control" />
        </div>
</div>       

<div class="col-md-6">
  <label>Mot de passe de la base :</label>
        <div class="form-group">
            <input name="db_pass" type="text" class="form-control" />
        </div>
</div>        


<div class="col-md-6">
  <label>Nom de la base :</label>
        <div class="form-group">
            <input name="db_name" type="text" class="form-control" />
        </div>
</div>        

<div class="col-md-12">
  <button type="submit" name="submit" class="btn btn-success btn-lg">Suivant</button> 
</div>     


</form>

</div>


</div>

<?php

}

/*----------------------------------------------------------------------------*/


elseif ($etat == "config") { 

$filename = '../includes/config.php';

if (!file_exists($filename)) {
   die('install error.. config.php not exists!');
} 
else {
    require '../includes/config.php';
}



?>

  <h3 class="h3">Ajouter un admin:</h3> <hr>

<div class="col-md-12">

  <form method="post" action="" class="row">

<?php


if (isset($_POST['submit'])) {
   
  $username = $_POST['username'] ;
  $email = $_POST['email'];
  //$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
  
  $password = $_POST['password'];
  $today = date("Y-m-d H:i:s"); 
  $stmt = $connect->prepare("INSERT INTO `users` (`username`,  `email`, `password`, `u_admin`, `valide`, `created_at`, `updated_at`) VALUES (:username, :email, :password, 1, 1, :created_at, :updated_at)");
  $stmt->bindParam (':username' , $username , PDO::PARAM_STR );
  $stmt->bindParam (':password' , $password , PDO::PARAM_STR );
  $stmt->bindParam (':email' , $email , PDO::PARAM_STR );
  $stmt->bindParam (':created_at' , $today , PDO::PARAM_STR );
  $stmt->bindParam (':updated_at' , $today , PDO::PARAM_STR );
  $stmt->execute();

    if (isset($stmt)) {

      $connect = null;
      
      header("location: install.php?etat=done");

      die();

    }

    

}


?>
    

        <div class="col-md-6">
          <label>Nom d'utilisateur:</label>
        <div class="form-group">
            <input name="username" type="text" placeholder="" class="form-control" required="required" />
        </div>
        </div>

        <div class="col-md-6">
          <label>Email:</label>
          <div class="form-group">
          <input name="email" type="text" class="form-control" required="required">
          </div>
        </div>


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


        <div class="col-md-6">
          <label>Mot de passe:</label>
        <div class="form-group">
            <input name="password" type="password" id="password" class="form-control" required="required">
        </div>
        </div>

        <div class="col-md-6">
          <label>Confirmez le mot de passe:</label>
        <div class="form-group">
            <input name="password2" id="password2" type="password" class="form-control" onkeyup='check();' required="required">
            <span id='message'></span>
        </div>
        </div>



        <div class="col-md-6">
          <button type="submit" name="submit" class="btn btn-success">Ajouter</button>
        </div>

        

    </form>
</div>
<?php

}




elseif ($etat == "done") { 


?>


<div class="col-md-12 text-center">

<div class="alert alert-info" role="alert">

<h4>ENSAB Bien installé :</h4>

      <p>vous pouvez maintenant commencer à gérer votre les pre-inscription!</p>
      
      <p><strong>Tres important:</strong> Supprimer le dossier "install"</p>
      <!-- changing that href from ../admin/login.php to ../ because there is no admin folder -->
      <p><a class='btn btn-warning' href='../'>Acceuil</a></p>

</div>
      

  
</div>

<?php

}

?>    


<div class="clearfix"></div><hr>
<p class="footer-text m-0 col-md-12 pb-30 ">
  Copyright &copy; <?php echo date("Y"); ?> All rights reserved <a href="#" target="_blank">ENSA BERRECHED</a> 
						</p>
    </div>

</div>



</div>		
                           

  </body>
</html>

