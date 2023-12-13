<?php

    session_start();

    if(isset($_SESSION["loggedIn"])){
        if(!$_SESSION["loggedIn"]){
            header("Location: practica5.html");
        }  
    }
    else{
        header("Location: practica5.html");
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h1> Informació usuari</h1>
   
    <?php

        $user_id = $_GET["user_id"];

        include "dbconfig.php";
        $conecta = mysqli_connect(DB_HOST,DB_USER,DB_PSW,DB_NAME);

        if($conn){

            $query = "SELECT * FROM `user` where user_id= $user_id";          
            $info = mysqli_query($conn, $query);   
            $comptarinfo=mysqli_num_rows($info);

            if( $comptarinfo > 0){
                $user = mysqli_fetch_array($info);
                echo "Id usuari: ". $user["user_id"]; ?><br>
                <?php echo "Nom: ". $user["name"]; ?><br>
                <?php echo "Cognom: ". $user["surname"]; ?><br>
                <?php echo "Email: ". $user["email"]; ?><br>
                <?php echo "Rol: ". $user["rol"]; ?><br>
                <?php echo "Actiu: ". $user["active"]; ?><br>
                <?php

            }
            else{
                echo "Aquest usuari no té informació";
            }
        }
        mysqli_close($conn);

    ?>
    <br>

    <a href="init.php">TORNAR</a>
    
</body>
</html>