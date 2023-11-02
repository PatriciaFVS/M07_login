<?php
    include "dbconfig.php";
    $conecta = mysqli_connect(DB_HOST,DB_USER,DB_PSW,DB_NAME);

    $email= $_POST["mail"];
    $password= $_POST["psswd"];

    if(!$conecta){
        echo "Error de connexió: ". mysqli_connect_error();
    }else{
        $query ="SELECT * FROM `user` WHERE email=$email";
        $info = mysqli_query($conecta,$query);
        $comptarinfo=mysqli_num_rows($info);
    }



?>