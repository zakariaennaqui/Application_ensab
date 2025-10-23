
<?php 


include './header.php';

$username = $_GET['username'];
$note = $_GET['note'];
$today = date("Y-m-d H:i:s"); 

 $stmt1 = $connect->prepare("INSERT INTO `notes` (`username`, `note`, `created_at`, `updated_at`) VALUES (:username, :note, :created_at, :updated_at)");
 $stmt1->bindParam (':username' , $username , PDO::PARAM_STR );
 $stmt1->bindParam (':note' , $note , PDO::PARAM_STR );
 $stmt1->bindParam (':created_at' , $today , PDO::PARAM_STR );
 $stmt1->bindParam (':updated_at' , $today , PDO::PARAM_STR );
 $stmt1->execute();
 
 die("
 
 <div class='container'>
                     <div class='row justify-content-between align-items-center'>
 
 
 
                         <div class='col-md-8 offset-md-2 bk-right'>
                             
 <div class='alert alert-success' style='margin: auto;'>
    
 <h3>la note de l'etudiant $username est : $note  </h3>

 <br>
 <meta http-equiv='refresh' content='6; url = notes.php' />
 <a class='btn btn-warning mb-3' href='notes.php'>Retour</a>");
 ?>


