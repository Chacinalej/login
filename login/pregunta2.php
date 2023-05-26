<?php
require_once "config.php";

session_start();
$rec_user = $_SESSION['username'];
if($rec_user == false){
  header('Location: login.php');
  exit; 
}
 
 if(isset($_POST['quest2'])){

    $answer2= $_POST["answ2"];

    if (!empty($_POST["answ2"])) {
         $sql = $link->query("SELECT id, username, answer2  FROM users WHERE username = '$rec_user' AND answer2 = '$answer2'");

         if ($datos = $sql->fetch_assoc()) {
            session_start();
                            
            $_SESSION["loggedin"] = true;
            $_SESSION["id"] = $datos['id'];
            $_SESSION["username"] = $rec_user;                            
                            
              header("location: reset-password.php");
            
            } else{
                echo "Incorrecto";
            }
         }

    }
       
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="stylesheet" href="styles.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Recuperar Contraseña</h2>
        <p>Por favor responda la pregunta.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

             <?php 
                    require_once "config.php";
                    $query = "SELECT * FROM users WHERE username='$rec_user'";
                    $result = $link->query($query); 
                    $row = $result->fetch_assoc();
                    $pregunta = $row["question2"];
                        
            ?>
            <div class="form-group">
               <?php echo "<h1>¿".$pregunta."?</h1>"; ?>
                <input type="text" name="answ2" class="form-control">
              
            </div>    
           
            <div class="form-group">
                <input type="submit" class="btn btn-primary" name="quest2"value="Responder">
            </div>
            <a class="btn btn-link" href="index.php">Cancelar</a>
        </form>
    </div>    
</body>
</html>