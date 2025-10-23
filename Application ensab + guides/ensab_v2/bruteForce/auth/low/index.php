<?php
session_start();
require_once "../../../includes/config.php";
	if(isset($_SESSION['user'])){
    $user = $_SESSION['user'];

include "header.php";
?>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title mb-4 text-center">Bonjour <?php  echo  $user['nom'] . " " . $user['prenom']; ?></h3>
                        <ul class="list-group">
                            <?php
                            echo '<li class="list-group-item">Nom: ' . $user['nom'] . '</li>';
                            echo '<li class="list-group-item">Prénom: ' . $user['prenom'] . '</li>';
                            echo '<li class="list-group-item">Nom d\'utilisateur: ' . $user['username'] . '</li>';
                            echo '<li class="list-group-item">Email: ' . $user['email'] . '</li>';
                            echo '<li class="list-group-item">Date de création: ' . $user['created_at'] . '</li>';
                            ?>
                        </ul>
                        <div class="text-center mt-4">
                            <a href="logout.php" class="btn btn-outline-danger">Déconnexion</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<?php }else{
	header("location: login.php");
} ?>