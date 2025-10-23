<?php 
	 
	 define( 'ENCRYPTION_KEY', '71392c3bbe7cee7b9013c84ac02a79b0'); 
 
	 $db_hostname = "localhost"; 
	 $db_userdata = "root"; 
	 $db_password = ""; 
	 $db_dataname = "moodle"; 
	 $INSTALL = true; 
 
	 try { 
	 $connect =  new PDO("mysql:host=$db_hostname; dbname=$db_dataname", $db_userdata,$db_password); 
	 } 
 
	 catch (PDOException $e) { 
	 if ($INSTALL == false) { 
	 include 'installation/index.php'; 
	 die(); 
	 } else { 
	 die("Database Exception, contact le webmaster"); } 
	 } 
 
	 $connect->query("set names'utf8' "); 
 
?>