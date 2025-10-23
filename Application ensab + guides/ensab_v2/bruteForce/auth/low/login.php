<?php 
session_start();
require_once "../../../includes/config.php";
if(isset($_SESSION['user'])){
    header("location: index.php");
} else{

//$error = "";

if(isset($_POST['connexion']) && isset($_POST['username']) && isset($_POST['password'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $db = $connect;
    $req = $db->prepare("SELECT * from users WHERE username = ? AND password = ?");
    $req->execute([$username,$password]);

    if($req->rowCount() > 0){

        $user = $req->fetch(PDO::FETCH_ASSOC);
        $_SESSION['user'] = $user;
        header('location: index.php');
    }else{
        $error =  "<div class='alert alert-danger' role='alert'>
        Nom d'utilisateur ou mot de passe incorrect. Veuillez vérifier vos informations de connexion et réessayer.
      </div>";
    }
}
include "header.php";
?>

<body>
    <section class="mt-100">
        <div class="container-fluid">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4 offset-md-4">
                        <div class="card shadow">
                            <div class="card-header">
                                <h4 class="text-center">LOGIN : Low</h4>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="login.php">
                                    <!-- <input type="hidden" name="_token" value="521f35465e2b992f50285b16a8f4ea21"> -->
                                    <input class="form-control my-4" type="text" name="username" placeholder="Username" required>
                                    <input class="form-control my-4" type="password" name="password" placeholder="Password" required>
                                    <button type="submit" name="connexion" class="btn btn-primary text-center w-100 mb-3">Login</button>
                                    <a href="../../" class="btn btn-warning w-100">Back to Home</a>
                                </form>
                                
                                <?php 

                                if (isset($error)){
                                    echo $error;
                                } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
<?php }?>