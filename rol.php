
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
    <h2>
        <?php
            echo "Hola " . $_SESSION["name"] . ", ets un ". $_SESSION["rol"] ;
        ?>
    </h2>

    <a href="informacio.php?id=<?php echo $_SESSION["user_id"]?>">Mostrar informació</a>
    <a href="desconectar.php">Desconnectar</a>

    <br>
    <br>

    <?php
        if(isset($_SESSION["rol"])){
            if($_SESSION["rol"] == "professor"){

                include "dbconfig.php";

                $conecta = mysqli_connect(DB_HOST,DB_USER,DB_PSW,DB_NAME);
                if($conecta){
                    $query = "SELECT * FROM `user`";          
                    $info= mysqli_query($conecta, $query);   
                }
                mysqli_close($conecta);
            }
        
    ?>
                <table style="border: 1px solid black">
                    <tr>
                        <th>Nom</th>
                        <th>Cognom</th>
                        <th>Email</th>
                    </tr>
                    <?php 
                    foreach ( $usuaris as $user){
                        ?>
                        <tr>
                            <td><?php echo $user["name"]; ?></td>
                            <td><?php echo $user["surname"]; ?></td>
                            <td><?php echo $user["email"]; ?></td>
                        </tr>
                        <?php
                    }
                    ?>
                </table>
               <?php
        }  

    ?>
</body>
</html>