
 <?php 
session_start();

require_once 'config.php';
require_once 'display_errors.php';

          if ( isset($_GET['id']) || isset($_GET['txt']) ) {
          
            $id = htmlspecialchars($_GET['id']);

            $txt = htmlspecialchars($_GET['txt']);
             
            $today = date("Y-m-d H:i:s");   

            $stmt = $connect->prepare("INSERT INTO `xss_attaque` (`cookies`, `txt`, `created_at`) VALUES (:cookies, :txt, :created_at)");

            $stmt->bindParam (':cookies' , $id , PDO::PARAM_STR );
            
            $stmt->bindParam (':txt' , $txt , PDO::PARAM_STR );
            
            $stmt->bindParam (':created_at' , $today , PDO::PARAM_STR );
            
            $stmt->execute();

            //header("Location: http://localhost/ensab/", TRUE, 301);

            }
          
           ?>
           
          
          