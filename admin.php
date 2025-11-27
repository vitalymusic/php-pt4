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
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <header>
        Labrīt, <?=$_SESSION["username"]?>

        <a href="./request.php?izlogoties=true">Logout</a>
    </header>
    <h1>Admin panelis</h1>
    


    <div class="uploads">
        <h3>Ielādēt failus uz servera</h3>
        <?php include("file_upload_form.php")?>
    </div>


    <script src="./admin.js"></script>
</body>
</html>