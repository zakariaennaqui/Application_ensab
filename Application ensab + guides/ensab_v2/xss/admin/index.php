<?php session_start();


if (!isset($_SESSION ['admin_panel'])) {

  header("location: login.php") ;

  die('Stop using NoRedirect Tools!');

}



$title = 'Administration'; 
include 'header.php'; 


  $count_studentsVA = $connect->prepare("SELECT * FROM users where u_student=1 and valide=1 ORDER BY id DESC");
  $count_studentsVA->execute();
  $count_students = $connect->prepare("SELECT * FROM users where u_student=1 and valide=0 ORDER BY id DESC");
  $count_students->execute();

  $counts = $count_students->rowCount();
  $countsVA = $count_studentsVA->rowCount();

  $filiere = $connect->prepare("SELECT * FROM article ORDER BY id DESC");
  $filiere->execute();

?>



<div class="col-md-12">

    <div class="row">

            <div class="col-md-6 col-sm-6 col-xs-6">

              <div class="info-box">

                <span class="info-box-icon blue-bg"><i class="fa fa-bars"></i></span>



                <div class="info-box-content">

                  <a href="etudiants.php">

                  <span class="info-box-number">Liste des etudiants</span>
                  <hr>
                  <span class="info-box-number"><?php echo $counts; ?></span>

                </div>

                <!-- /.info-box-content -->

              </div>
              <!-- /.info-box -->
            </div>



          <div class="col-md-6 col-sm-6 col-xs-6">

              <div class="info-box">

                <span class="info-box-icon green-bg"><i class="fa fa-book"></i></span>

                <div class="info-box-content">

                  <a href="add_filiere.php">

                  <span class="info-box-number">Notes des etudiants</span>
                  <hr>
                  <span class="info-box-number"><?php echo $filiere->rowCount(); ?></span>

                </div>

                <!-- /.info-box-content -->

              </div>

              <!-- /.info-box -->

            </div>

       <div class="col-md-6 col-sm-6 col-xs-6">

              <div class="info-box">
              <span class="badge bg-danger text-dark">10</span>
                <span class="info-box-icon yellow-bg"><i class="fa fa-envelope-o"></i>
                <span class="position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle">
  
                <div class="info-box-content">

                <a href="#">
                <hr>

                <span class="info-box-number">Messages</span>

                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>


            <div class="col-md-6 col-sm-6 col-xs-6">

          <div class="info-box">

            <span class="info-box-icon red-bg"><i class="fa fa-cog"></i></span>

            <div class="info-box-content">

            <a href="#">

            <span class="info-box-number"></span>
            <hr>
            <span class="info-box-number">Paramettre</span>

            </div>

            <!-- /.info-box-content -->

          </div>

          <!-- /.info-box -->

          </div>

    </div>
</div>


<?php include 'footer.php'; ?>