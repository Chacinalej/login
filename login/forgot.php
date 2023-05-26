<?php

require_once "config.php";
 
 if(isset($_POST['check-user'])){
        $rec_user = mysqli_real_escape_string($link, $_POST['rec_user']);
        $check_user = "SELECT * FROM users WHERE username='$rec_user'";
        $run_sql = mysqli_query($link, $check_user);
        if(mysqli_num_rows($run_sql) > 0){
            session_start();

            $_SESSION["username"] = $rec_user;    

            header("location: pregunta1.php");
            } 
            else {
                echo "Este Usuario no existe";
            }
     }
        mysqli_close($link);
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
        <p>Por favor ingrese su Usuario.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Usuario</label>
                <input type="text" name="rec_user" class="form-control">
              
            </div>    
            
            <div class="form-group">
                <input type="submit" class="btn btn-primary" name="check-user"value="Chequear Usuario">
            </div>
            <a class="btn btn-link" href="index.php">Cancelar</a>
        </form>
    </div>    
</body>
</html>