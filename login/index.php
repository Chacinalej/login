<?php
session_start();
 

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="stylesheet" href="styles.css">
        <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>
    <div class="page-header">
        <h1>Hola, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Bienvenido!!.</h1>
        
    </div>
    <p>
        <a href="reset-password.php" class="btn btn-warning">Cambia tu contraseña</a>
        <a href="logout.php" class="btn btn-danger">Cierra la sesión</a>
        <br><br>
        <h2>Lista de Usuarios</h2>
        <div class="table-responsive">
                <table border="1" width="80%" class="table">
                    <thead>
                        <tr>
                            <th>Usuario</th>
                            <th>Clave</th>
                            <th>Pregunta Nº1</th>
                            <th>Respuesta Nº1</th>
                            <th>Pregunta Nº2</th>
                            <th>Respuesta Nº1</th>
                            
                        
                        </tr>
                    </thead>
                    
                    <tbody>
                        <?php 
                        require_once "config.php";

                        $query = "SELECT * FROM users";

                        if ($result = $link->query($query)) { 
                            while ($row = $result->fetch_assoc()) {
                                $user = $row["username"];
                                $pass = $row["password"];
                                $question1 = $row["question1"];
                                $answer1 = $row["answer1"];
                                $question2 = $row["question2"];
                                $answer2 = $row["answer2"];
                         
                            echo "<tr>";    
                            echo "<td>".$user."</td>";
                            echo "<td>".$pass."</td>";
                            echo "<td>".$question1."</td>";
                            echo "<td>".$answer1."</td>";
                            echo "<td>".$question2."</td>";
                            echo "<td>".$answer2."</td>";
                            echo "</tr>";
                        }
                        $result->free(); 
                    } 
                        ?>
                    </tbody>
                    
                </table>

</body>
</html>