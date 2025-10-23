<?php 
session_start();
require_once "../../database/config.php";
require_once "token.php";

if(isset($_SESSION['user'])){
    header("location: index.php");
} else{



if(isset($_POST['connexion']) && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['_token'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $token = $_POST['_token'];
    
    // Anti-CSRF
	if (array_key_exists ("_token", $_SESSION)) {
		$session_token = $_SESSION[ '_token' ];
	} else {
		$session_token = "";
	}

    if(checkToken($token, $session_token)){
        $db = Database::connect();
        $req = $db->prepare("SELECT users.*, roles.role FROM users INNER JOIN roles ON users.role = roles.id WHERE username = ? AND password = ?");
        $req->execute([$username,$password]);

        if($req->rowCount() > 0){

            $user = $req->fetch(PDO::FETCH_ASSOC);
            $_SESSION['user'] = $user;
            header('location: index.php');
        }else{
            $error =  "<div class='alert alert-danger mt-3' role='alert'>
            Nom d'utilisateur ou mot de passe incorrect. Veuillez vérifier vos informations de connexion et réessayer.
        </div>";
        }
    }else{
        $error =  "<div class='alert alert-danger mt-3' role='alert'>
        Le token n'est pas valide. Veuillez réessayer.
    </div>";
    }
}
include "header.php";
generateSessionToken();
?>

<body>
    <section class="mt-100">
        <div class="container-fluid">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4 offset-md-4">
                        <div class="card shadow">
                            <div class="card-header">
                                <h4 class="text-center">LOGIN : Medium</h4>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="login.php">
                                    <input class="form-control my-4" type="text" name="username" placeholder="Username" required>
                                    <input class="form-control my-4" type="password" name="password" placeholder="Password" required>
                                    <?php echo tokenField(); ?>
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