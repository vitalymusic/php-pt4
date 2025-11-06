<?php
session_start();
if ($_POST) {
    $username = "administrator";
    $pass = "12345";

    $pass_hash3 = password_hash($pass, PASSWORD_BCRYPT);
    $formasDati = $_POST;

    if ($username == $formasDati["username"] && password_verify($formasDati["password"], $pass_hash3)) {
        echo json_encode(["login" => "success"]);
        $_SESSION["loggedin"] = true;
        $_SESSION["username"] = $formasDati["username"];
        header("location:./admin.php");

    } else {
        $_SESSION["loggedin"] = false;
        unset($_SESSION["username"]);
        echo json_encode(["login" => "incorrect"]);
        header("location:./index.php");
    }

}




// Logout 
if($_GET){
    if(isset($_GET["izlogoties"]) && $_GET["izlogoties"]=="true"){
            session_destroy();
            header("location:./index.php");
    }

}

?>