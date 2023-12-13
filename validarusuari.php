<?php
    //Començar sessió
    session_start();
    
    include "dbconfig.php";
    $conecta = mysqli_connect(DB_HOST,DB_USER,DB_PSW,DB_NAME);

    $email= $_POST["email"];
    $password= $_POST["psswd"];

    if(!$conecta){
        echo "Error de connexió: ". mysqli_connect_error();
    }else{
        if(isset($_POST["mail"]) && isset($_POST["psswd"])){

        
            $query ="SELECT * FROM `user` WHERE email=$email";
            $info = mysqli_query($conecta,$query);
            $comptarinfo=mysqli_num_rows($info);
            if ($info){
                if($comptarinfo>0){
                    $user = mysqli_fetch_array($info);

                    $_SESSION["loggedIn"] = true;
                    $_SESSION["name"] = $user["name"];
                    $_SESSION["user_id"] = $user["user_id"];
                    $_SESSION["rol"] = $user["rol"];
                    
                    header('Location: rol.php');
                }else{
                    include "practica5.html";
                    echo "Login incorrecte";
                }
            }else{
                include "practica5.html";
                echo "Login incorrecte"; 
            }
        }else{
            include "practica5.html";
            echo "Login incorrecte";
        }
        
    }
    mysqli_close($conecta);


?>