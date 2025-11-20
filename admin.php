<?php
    session_start();
    var_dump($_SESSION);
    // if(!$_SESSION["loggedin"]){
    //     header("location: ./index.php");
    //     json_encode(["error"=>"not authorized"]);
    //     exit("Nepieciešams autorizēties");
    // }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header>
        Labrīt, <?=$_SESSION["username"]?>

        <a href="./request.php?izlogoties=true">Logout</a>
    </header>
    <h1>Admin panelis</h1>
    

</body>
</html>