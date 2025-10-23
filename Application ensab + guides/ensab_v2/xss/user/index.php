

<?php 
session_start();

require '../includes/config.php';
include '../includes/display_errors.php';
  

if (!isset($_SESSION ['etudiant_panel'])) {

  header("location: login.php") ;

  die('Stop using NoRedirect Tools!');

}
if (isset($_SESSION ['etudiant_panel'])) {

  $user = $_SESSION ['etudiant_panel'];

}


$title = 'Mon Compte';

 include '../header.php'; 

 $stmt_for_check = $connect->prepare("SELECT * FROM users WHERE username=:username");
 $stmt_for_check->bindParam (':username' , $user , PDO::PARAM_STR );
 $stmt_for_check->execute();
 
 $st = $connect->prepare("SELECT * FROM fichiers WHERE username=:username");
 $st->bindParam (':username' , $user , PDO::PARAM_STR );
 $st->execute();
 
 $rowST = $st->fetch();
 $row = $stmt_for_check->fetch();
 
 $id_row = $row['id'];
 $nom1 = $row ['nom'];
 $prenom1 = $row ['prenom'];
 $phone1 = $row ['phone'];
 $email1 = $row ['email'];
 $date_ns = $row ['date_n'];
 $address1 = $row ['address'];
 $ville1 = $row ['ville'];
 $note1 = $row ['note_bac'];
 $cni1 = $row ['cni'];
 $cne1 = $row ['username'];
 $my_fid = $row ['filiere_id']; 
 $etape = $row['etape'];

 
 $the_image = $rowST ['file']; 

 $stmt_check = $connect->prepare("SELECT * FROM article where id=:f_id");
 $stmt_check->bindParam (':f_id' , $my_fid , PDO::PARAM_STR );
 $stmt_check->execute();

 if ($stmt_check->rowCount() == 1) {

   $rowget = $stmt_check->fetch();
   $my_f1 = $rowget['name'];

 }
?>
          

<div class="col-md-8 offset-md-2 bk-right">
  <?php
  
if (isset($_POST['submit'])){

  $_token = htmlspecialchars($_POST['_token']);
  $nom = htmlspecialchars($_POST['nom']);
  $type_bac = htmlspecialchars($_POST['type_bac']);
  $cni = htmlspecialchars($_POST['cni']);
  $prenom = htmlspecialchars($_POST['prenom']);
  $phone = htmlspecialchars($_POST['phone']);
  $birthday = htmlspecialchars($_POST['date_n']);
  $address = htmlspecialchars($_POST['address']);
  $ville = htmlspecialchars($_POST['ville']);
  $today = date("Y-m-d H:i:s");


if ($stmt_for_check->rowCount() == 1) {

$stmt_update = $connect->prepare("UPDATE users SET nom=:nom, prenom=:prenom ,cni=:cni, phone=:phone, date_n=:date_n, address=:address, ville=:ville, updated_at=:updated_at WHERE id=$id_row");

  $stmt_update->bindParam (':nom' , $nom , PDO::PARAM_STR );
  $stmt_update->bindParam (':prenom' , $prenom , PDO::PARAM_STR );
  $stmt_update->bindParam (':cni' , $cni , PDO::PARAM_STR );
  $stmt_update->bindParam (':phone' , $phone , PDO::PARAM_STR );
  $stmt_update->bindParam (':date_n' , $birthday , PDO::PARAM_STR );
  $stmt_update->bindParam (':address' , $address , PDO::PARAM_STR );
  $stmt_update->bindParam (':ville' , $ville , PDO::PARAM_STR );
  $stmt_update->bindParam (':updated_at' , $today , PDO::PARAM_STR );

$stmt_update->execute();


if (isset($stmt_update)) { 

echo "<div class='alert alert-success center' style='width: 90%; margin: auto;'><p>votre information personnel éte enregistrer</p></div><br><br>
<meta http-equiv='refresh' content='5; url = index.php?etat=$e2' />"; 
}
}else 
 echo "<div class='alert alert-danger center' style='width: 90%; margin: auto;'><p>Erreur, Ressayer plus tard..</p></div><br><br>"; 
}
?>

<form id="formID" method="post" action="" class="row">
<div class="col-md-6">
<img src="../uploads/<?php if (empty($the_image)) {echo 'no_image.png';} else {echo "../".$the_image;}  ?>" class="img-thumbnail"  width="150px">
</div>
<div class="col-md-6">
  <label><?php if (empty($nom1)) {echo 'CNE :';} else {echo 'CNE :';}  ?></label> <span class="text-primary"><?php echo $cne1; ?></span><br><br>

  <label><?php if (empty($nom1)) {echo '';} else {echo 'Nom Complete:';}  ?></label> <span class="text-primary"><?php echo $nom1.' '.$prenom1; ?></span><br><br>

  <label><?php if (empty($my_f1)) {echo '';} else {echo 'Filiere:';}  ?></label> <span class="text-danger"><?php echo $my_f1; ?></span><br><br>
</div>

</from>

        <div class="col-md-12 col-sm-12 col-xs-12">

          <div class="info-box">

            <span class="info-box-icon bg-red"><i class="fa fa-book"></i></span>


            <div class="info-box-content">
 
              <a href="#">

              <span class="info-box-text">Consulter mes Notes</span>

              <span class="info-box-number">securite</span>

            </div>

            <!-- /.info-box-content -->

          </div>

          <!-- /.info-box -->

        </div>

        <div class="col-md-12 col-sm-12 col-xs-12">

        <div class="info-box">

            <span class="info-box-icon blue-bg"><i class="fa fa-envelope-o"></i></span>

              <div class="info-box-content">

                <a href="#">

                <span class="info-box-number">Contacter L'administration</span>
                <hr>
                <span class="info-box-number">10</span>

              </div>

              <!-- /.info-box-content -->

          </div>

            <!-- /.info-box -->

        </div>
        

  </div>

</div>

