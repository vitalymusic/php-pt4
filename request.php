<?php 

    $username = "administrator";
    $pass="12345";

    $pass_hash3 = password_hash($pass,PASSWORD_BCRYPT); 

    $formasDati = $_POST;

    if($username == $formasDati["username"] && password_verify($formasDati["password"],$pass_hash3)){
        echo json_encode(["login"=>"success"]);

    }else{
         echo json_encode(["login"=>"incorrect"]);
    }

?>