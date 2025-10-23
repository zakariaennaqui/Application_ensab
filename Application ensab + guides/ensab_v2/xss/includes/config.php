<?php 
	 define( '', 'http://localhost/ensab/'); 
	 define( 'ENCRYPTION_KEY', '9b96db69fd31f66a31fc28a532da2b53'); 
 
	 $db_hostname = "localhost"; 
	 $db_userdata = "root"; 
	 $db_password = ""; 
	 $db_dataname = "ensab"; 
	 $INSTALL = true; 
	  
	 try { 
		
	 //create database connection
		$db=new mysqli("$db_hostname","$db_userdata","$db_password");
		$db->select_db("$db_dataname");
		$connect =  new PDO("mysql:host=$db_hostname; dbname=$db_dataname", $db_userdata,$db_password); 
	 } 
 
	 catch (PDOException $e) { 
	 if ($INSTALL == false) { 
	 include 'installation/index.php'; 
	 die(); 
	 } else { 
	 die("Database Exception, contact le webmaster"); } 
	 } 
 
	//$connect->query("set names'utf8' "); 
 
?>