<?php 
	 define( '', 'http://localhost/ensab_v2/'); 
	 define( 'ENCRYPTION_KEY', '9c065de402c4319440d3447d021fc598'); 
 
	 $db_hostname = "localhost"; 
	 $db_userdata = "root"; 
	 $db_password = ""; 
	 $db_dataname = "ensab"; 
	 $INSTALL = true; 
 
	 try { 
	 $db=new mysqli("$db_hostname","$db_userdata","$db_password"); 
	$db->select_db("$db_dataname");	 $connect =  new PDO("mysql:host=$db_hostname; dbname=$db_dataname", $db_userdata,$db_password); 
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