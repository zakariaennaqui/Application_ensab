<?php session_start();



include '../includes/config.php';



if (isset($_SESSION ["etudiant_panel"])) {


    header("location: ./user/index.php");

    die();

}





else {

	header("location: ../auth/inscrire.php");

    die();

}



 ?>