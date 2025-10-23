



<?php session_start();



if (isset($_SESSION ['admin_panel'])) {

  header("location: index.php") ;

  die();

}





$title = 'LOGIN'; include 'header.php'; 



if (isset($_POST['submit'])) {


  $_token = htmlspecialchars($_POST['_token']);

  $username = $_POST['username'];

  $password = $_POST['password'];

  

  if ($_token == ENCRYPTION_KEY) {

    $sql="SELECT * FROM users WHERE username = '$username' AND password = '$password'"; //quary
    $result=$db->query($sql);
    $num_rows=$result->num_rows;
    for($i=0;$i<$num_rows;$i++)
    {   $row=$result->fetch_row();
   }
 
   if(mysqli_num_rows($result) >= 0)  //checking the username and password if right
    {

          $rand = md5(uniqid(rand()));

          $_SESSION ['admin_panel'] = $rand;

          header("location: index.php");

         // echo $sql;
          
         // echo "Connecter";
  

      } else {
      

        header("location: login.php?alert=error&msg=username or password incorrect");



      }

    }

  

  }

?>







<div class="col-md-12">

<div class="row">



        

            <div class="col-md-4 offset-md-4 bk-right">

                <h4 class="mb-50 text-center">LOGIN</h4>







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


                  <input class="form-control" type="text" name="username" placeholder="Username" required>

                  <input class="form-control" type="password" name="password" placeholder="Password" required>



                  <button type="submit" name="submit" class="btn btn-primary text-center">Login</button>



                </form>

            </div>



</div>

</div>





<?php include 'footer.php'; ?>