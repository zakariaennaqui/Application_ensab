<?php 
session_start();
/*
  require '../../includes/config.php';
  include '../../includes/display_errors.php';*/
  include '../header.php'; 
if (isset($_SESSION ['etudiant_panel'])) {

  header("location: index.php") ;

  die();

}


$title = 'Se Connecter';



if (isset($_POST['submit'])) {

  $_token = htmlspecialchars($_POST['_token']);

  $username = htmlspecialchars($_POST['username']);

  $password = htmlspecialchars($_POST['password']);

  if ($_token == ENCRYPTION_KEY) {

      $stmt_login = $connect->prepare("SELECT * FROM users WHERE username=:username and u_student=1");

      $stmt_login->bindParam (':username' , $username , PDO::PARAM_STR );

      $stmt_login->execute();

  
      if ($stmt_login->rowCount() == 1) {

  

        $etudiant_fetch = $stmt_login->fetch();
        
        $user = $etudiant_fetch ['username'];
        $email = $etudiant_fetch ['email'];
/*
        if (password_verify($password, $etudiant_fetch['password']))
        on utilise la fonction password_verify pour comparer un password avec son hash qu'il doit 
        exist dans la bdd, et doit aussi hash avec la fonction password_hash en premier lieu
*/
        if ($password == $etudiant_fetch['password']) {

  

          $rand = md5(uniqid(rand()));

          $_SESSION ['etudiant_panel'] = $user;

          $_SESSION ['email'] = $email;

          $token_rand = md5(uniqid(rand()));
    
          $_SESSION ['token'] = $token_rand;
    


          header("location: index.php");

            die();

  

        } else {
          echo "hello";
          header("location: login.php?alert=error&msg=Mot de passeest incorrect");

            die();

        }

  

      } else {

        header("location: login.php?alert=error&msg=Vérifiez que votre nom d'utilisateur est correct");

            die();

      }

  

  

  } else {

    die();

  }

  

  }

?>







<div class="col-md-12">

<div class="row">

              <div class="col-md-4 offset-md-4 bk-right">

                <h4 class="mb-50 text-center">Se Connecter</h4>
                

<?php if(isset($_GET['alert'])) { ?>



  <?php if($_GET['alert'] == 'error') { ?>



  <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">

    <strong><?php echo $_GET['msg']; ?></strong>

    <button type="button" class="close" data-dismiss="alert" aria-label="Close">

      <span aria-hidden="true">&times;</span>

    </button>

  </div>



  <?php } ?>



<?php } ?>



                <form method="POST" accept-charset="UTF-8">

                  

                  <input type="hidden" name="_token" value="<?php echo ENCRYPTION_KEY; ?>">



                  <input class="form-control" type="text" name="username" placeholder="CNE(massar)" required>

                  <input class="form-control" type="password" name="password" placeholder="mot de passe" required>



                  <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block text-center">Connexion</button>
                  <p style="text-align:center;">Si vous n'avez pas de compte </p>



                  <a style="text-align:center;" href="../../auth/inscrire.php" >Creer Compte</a>
                </form>
            </div>

</div>

</div>


<?php include 'footer.php'; ?>