<?php session_start();

require_once '../includes/config.php';
require_once '../includes/display_errors.php';


if (!isset($_SESSION ['admin_panel'])) {
  header("location: login.php") ;
  die('Stop using NoRedirect Tools!');
}

$title = 'Les étudiants'; include 'header.php'; ?>

<link rel="stylesheet" href="../vendor/datatables/dataTables.bootstrap4.min.css">
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

 
<div class="col-md-12">

<?php if(isset($_GET['alert'])) { ?>

  <?php if($_GET['alert'] == 'delete') { ?>

  <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
    <strong>Supprimer avec succès.</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>

  <?php } ?>

  <?php if($_GET['alert'] == 'valide') { ?>

<div class="alert alert-primary alert-dismissible fade show text-center" role="alert">
  <strong>vous etes valider l'inscription </strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

<?php } ?>


<?php if($_GET['alert'] == 'error') { ?>

<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
  <strong>error </strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

<?php } ?>
<?php } ?>



<div class="card">
  <h5 class="card-header">Les Etudiants</h5>
  <div class="card-body">
<?php

if (isset($_POST['delete'])) {

  $_token = htmlspecialchars($_POST['_token']);
  $id_delete = htmlspecialchars($_POST['id_delete']);

if ($_token == ENCRYPTION_KEY) {

  $stmt_for_img = $connect->prepare("SELECT * FROM users WHERE id=:id");
  $stmt_for_img->bindParam (':id' , $id_delete , PDO::PARAM_STR );
  $stmt_for_img->execute();
  $img_row = $stmt_for_img->fetch();

  
  $stmt_delete = $connect->prepare("DELETE FROM users WHERE id=:id");
  $stmt_delete->bindParam (':id' , $id_delete , PDO::PARAM_STR );
  $stmt_delete->execute();

      

     if (isset($stmt_delete)) {  

       if (!empty($img_row ['image'])) {
            unlink("../uploads/".$img_row ['image']);
      }

        header("location: etudiants.php?alert=delete") ;
     }
} else {
  die();
}
}



?>




<div class="table-responsive">
        <table id="example" class="table" style="width:100%">
        <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>Nom </th>
                <th>Prénom </th>
                <th>CNE</th>
                <th>Note</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

<?php $etudiants = $connect->query("SELECT * FROM users where u_student=1 AND valide=0 ORDER BY id DESC"); ?>

<?php while ($row = $etudiants->fetch()) { ?>

            <tr>

<td ><?php 

    if (!empty($row['image'])) {
      echo '<img src="../uploads/'.$row['image'].'" class="img-circle" width="35px" height="35px">';
    } else {
      echo '<img src="../uploads/no_image.png" class="img-circle" width="35px" height="35px">';
    } 
?></td>

                <td><?php echo htmlspecialchars($row['nom']); ?></td>
                <td><?php echo htmlspecialchars($row['prenom']); ?></td>
                <td><?php echo htmlspecialchars($row['username']); ?></td>

                <td><?php 


                  $stmt_check = $connect->prepare("SELECT * FROM notes WHERE username=:username");
                  $stmt_check->bindParam (':username' , $row['username'] , PDO::PARAM_STR );
                  $stmt_check->execute();

                  if ($stmt_check->rowCount() == 1) {

                    $rowget = $stmt_check->fetch();

                    echo '<span class="badge badge-primary">' . $rowget['note'] . '</span>';

                  } else { echo '-' ;}
                    


                ?></td>


                <td style="width:15%">
                
                  <a class="btn btn-primary btn-sm m-1" href="etudiants.php?valide=<?php echo $row['id'];  ?>"><i class="fa fa-check"></i></a>

                  <a class="btn btn-success btn-sm m-1" href="profile.php?id=<?php echo $row['id'];  ?>"><i class="fa fa-eye"></i></a>
                  
                  <button class="btn btn-danger btn-sm m-1" data-toggle="modal" data-target="#exampleModal_<?php echo $row['id']; ?>"><i class="fa fa-trash"></i></button>

                </td>
            </tr>

            <form method="POST" accept-charset="UTF-8">
</form>
<!-- Modal -->
<div class="modal fade" id="exampleModal_<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Supprimer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

<form method="POST" accept-charset="UTF-8">
<input type="hidden" name="_token" value="<?php echo ENCRYPTION_KEY; ?>">
<input type="hidden" name="id_delete" value="<?php echo $row['id']; ?>">

<button type="submit" name="delete" class="btn btn-danger btn-block" ><i class="fa fa-trash"></i> Supprimer</button>

</form>

      </div>
    </div>
  </div>
</div>


<?php } ?>

        </tbody>

    </table>
</div>
    

  </div>
</div>
        
</div> 




<?php include 'footer.php'; ?>