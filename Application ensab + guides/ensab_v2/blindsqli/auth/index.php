<?php 
session_start();
require_once "../../includes/config.php";
include "header.php";
if(isset($_POST["user_id"]) && isset($_POST["submit"])){
    $user_id = $_POST['user_id'];
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ensab";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $query = "SELECT * FROM users WHERE id = '$user_id'";
    
    $result = $conn->query($query);
    if ($result === false) {
        
    }
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $error = "User found";
        }
    } else {
        $error = "User not found";
    }
    $conn->close();
}
?>

<body>
    <section class="mt-100" style="margin-top: 200px">
        <div class="container-fluid">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4 offset-md-4">
                        <div class="card shadow">
                            <div class="card-header">
                                <h4 class="text-center">Blind sql injection with time delays and information retrieval
</h4>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="index.php">
                                    
                                    <table>
                                        <tr><td><p>User id :</p></td><td><input type="text" name="user_id" style="width: 350px"></td></tr>
                                    </table>
                                    <?php 
                                        if (isset($error)){
                                            echo $error;
                                        } 
                                        ?>
                                        <br>
                                    <button type="submit" name="submit" class="btn btn-primary text-center w-100 mb-3">Submit</button>
                                    <a href="../../" class="btn btn-warning w-100">Back to Home</a>
                                </form>
                                
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
<?php ?>