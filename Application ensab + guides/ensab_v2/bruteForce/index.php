<!DOCTYPE html>
<html>
<head>
    <title>Page d'accueil - Attaque par force brute</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        body{
            font-family: 'Montserrat', sans-serif;
        }
    </style>
</head>
<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card my-2">
                    <div class="card-header" style="padding: 0;">
                    <!--    <h1 class="text-center">Bienvenue sur notre site d'attaque Par Force Brute</h1> -->
                        <img src="assets/img/brute-force-attack.png" alt="Bienvenue sur notre site d'attaque Par Force Brute" width="100%" class="img-thumbnail">
                    </div>
                    <div class="card-body w-100">
                        <p class="text-justify">L'attaque par force brute est une technique de piratage visant à deviner un mot de passe en essayant de multiples combinaisons jusqu'à ce que le mot de passe correct soit trouvé. Notre site vous permet de vous exercer à cette attaque dans un environnement contrôlé.</p>
                        <p class="text-center">Choisissez le niveau de sécurité :</p>
                        <table class="table table-bordered">
                            <tr class="text-center">
                                <th> <a href="auth/low/" class="btn btn-danger">Sécurité Faible</a></th>
                                <th><a href="auth/medium/" class="btn btn-warning">Sécurité Moyen</a></th>
                                <th><a href="auth/high" class="btn btn-success">Sécurité Élevé</a></th>  
                            </tr>
                        </table>
                        <hr>
                        <a href="../" class="btn btn-primary w-100">Back to Home</a>
                    </div>
                    <div class="card-footer text-center">
                        &copy; Developed by <a href="https://www.mokaddemhicham.tech">mokaddemhicham</a>, All Rights Reserved <script> document.write(new Date().getFullYear()) </script>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
