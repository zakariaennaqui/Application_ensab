<?php session_start();

require_once '../includes/config.php';
require_once '../includes/display_errors.php';


if (!isset($_SESSION ['admin_panel'])) {
  header("location: login.php") ;
  die('Stop using NoRedirect Tools!');
}

$title = 'Profile'; include 'header.php'; ?>

<link rel="stylesheet" href="../vendor/datatables/dataTables.bootstrap4.min.css">

<link rel="stylesheet" href="../vendor/css/style.css">

<script src="../vendor/datatables/jquery.dataTables.min.js"></script>
<script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <script type="text/javascript" class="init">
  $(document).ready(function() {
    $("#example").dataTable({ "language": { "url": "../vendor/datatables/lang/fr.json" }
    });
  });
  </script>

<link rel="stylesheet" href="../vendor/datepicker/css/bootstrap-datepicker.css">
<script src="../vendor/datepicker/js/bootstrap-datepicker.js"></script>


<script type="text/javascript">
$('.datepicker').datepicker({
    format: 'dd/mm/yyyy',
    startDate: '-3d'
});
</script>

 <?php
          
if (isset($_GET['id'])) {

    $id = htmlspecialchars($_GET['id']);
    
    $stmt_for_check = $connect->prepare("SELECT * FROM users WHERE id=:id AND u_student=1");
    $stmt_for_check->bindParam (':id' , $id , PDO::PARAM_STR );
    $stmt_for_check->execute();
    
    $row = $stmt_for_check->fetch();
    $counts = $stmt_for_check->rowCount();

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
    $the_image = $row ['image'];
    $etape = $row['etape'];




    $stmt_f = $connect->prepare("SELECT * FROM fichiers WHERE username=:username");
    $stmt_f->bindParam (':username' , $cne1 , PDO::PARAM_STR );
    $stmt_f->execute();
    $row2 = $stmt_f->fetch();
    $id_f = $row2['id'];
    $pdf1 = $row2['pdf_file'];
    $the_bac = $row ['bac']; 
    $the_cniv = $row ['cni_v']; 
    $the_cnir = $row ['cni_r']; 



    
    $stmt_f = $connect->prepare("SELECT * FROM article WHERE id=:id");
    $stmt_f->bindParam (':id' , $my_fid , PDO::PARAM_STR );
    $stmt_f->execute();
    $row3 = $stmt_f->fetch();
    $name_f = $row3['name'];
  }
    if($counts==0){
?>
<div class='alert alert-danger'>

<h2 style="font-size: 40px;">Erreur!</h2>
<hr>
<p>erreur cette utilisateur n'existe pas ou le compte a ete suprimer</p>

</div>

<?php
    }else{


 ?>
 



<div class="col-md-8 offset-md-2 bk-right">
<div class="panel panel-info">
    <div class="panel-heading center">
      <img src="../uploads/<?php if (empty($the_image)) {echo 'no_image.png';} else {echo $the_image;}  ?>" class="img-thumbnail" width="150px">
      
      <h2><a  class="primary"><?php echo $nom1.' '.$prenom1; ?> </a></h2>

    </div>
    <div class="panel-body">

    <div class="clear"></div>
    
    <div class="container main" style="margin-top: 20px;"> 

    <h2 class="edit">information :</h2>

    <div class="col-md-6">
      <label>CNI :</label> <span class="text-primary"><?php echo $cni1; ?></span><br><br>
        
      <label>CNE :</label> <span class="text-primary"><?php echo $cne1; ?></span><br><br>
      
      <label>Date Naissance :</label> <span class="text-primary"><?php echo $date_ns; ?></span><br><br>
      <label>Address  :</label> <span class="text-primary"><?php echo $address1; ?></span><br><br>
    </div>
    <div class="col-md-6">
      <label>Tel :</label> <span class="text-primary"><?php echo $phone1; ?></span><br><br>
      <label>Email  :</label> <span class="text-primary"><?php echo $email1; ?></span><br><br>
      
    </div>

   <div class="clear"></div>


  </div>

</div>		
       
<?php  }  ?>
 

<?php include 'footer.php'; ?>