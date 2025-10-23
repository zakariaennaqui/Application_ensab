<?php session_start();

 
require_once '../includes/config.php';
require_once '../includes/display_errors.php';



if (!isset($_SESSION ['admin_panel'])) {
  header("location: login.php") ;
  die('Stop using NoRedirect Tools!');
}

if (isset($_POST['btn1'])) {

  $username = $_POST['username'];
  $nom = htmlspecialchars($_POST['nom']);
  $note = htmlspecialchars($_POST['note']);

	header ("location: ./ajout_note.php?username=$username&note=$note");   
     
 
 }
$title = 'Filieres';
 include 'header.php'; ?>

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

 
<div class="container">
					<div class="row justify-content-between align-items-center">



						<div class="col-md-8 offset-md-2 bk-right">
							


<h3 class="h3"> Ajouter note</h3> <hr>

<div class="col-md-12">



<?php if(isset($_GET['alert'])) { ?>

  <?php if($_GET['alert'] == 'error') { ?>

  <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
    <strong>Erreur! réessayer..</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>

  <?php } ?>

  <?php if($_GET['alert'] == 'delete') { ?>

  <div class="alert alert-primary alert-dismissible fade show text-center" role="alert">
    <strong>Supprimer avec succès.</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>

  <?php } ?>

  <?php if($_GET['alert'] == 'success') { ?>
  <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
    <strong>Ajouter avec succès.</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <?php } ?>



<?php } ?>



<div class="card">
  <h5 class="card-header">Les notes des etudiants</h5>
  <div class="card-body">


<form  action="" method="post">

<div class="col-md-12">

<label class="">L'etudiant : <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;">(*)</span></label>

<div class="input-group">   

  <select name="username" class="form-control validate[required]">

<option selected="selected" value="">Choisir un etudiant</option>

<?php 

$stmt_find_student = $connect->prepare("SELECT * FROM users");

$stmt_find_student->execute();



while ($find_student_row = $stmt_find_student->fetch()) {

  $user = $find_student_row ['username'];
  $nom = $find_student_row ['nom'];
  $prenom = $find_student_row ['prenom'];


echo '<option value="'.$user.'&nom='.$nom.'">'.$nom.' '.$prenom.'</option>';

} 



?>

</select>

</div>
</div>



<div class="col-md-12">

<label class="">Note : <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;">(*)</span></label>

<div class="input-group">

    <span class="input-group-addon"><i class="glyphicon glyphicon-list-alt"></i></span>

    <input name="note" type="text" placeholder="" class="form-control validate[required]" value="<?php echo htmlspecialchars(!empty($_POST['note'])) ? htmlspecialchars($_POST['note']) : ''?>" />

    </div>
</div>


  <div class="table-responsive">
  
  </div>
  </div>
         
<div class="col-md-12">

<button type="submit" name="btn1" class="btn btn-warning mb-2 centre"><i class="fa fa-plus"></i> Valider</button>
<div class="clearfix"></div>



</div> 

</form>
</div>
</div>
  



<?php include 'footer.php'; ?>