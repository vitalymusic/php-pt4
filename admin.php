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
    <style>
        .photos{
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            gap:20px;
            justify-content: center;
            max-width: 900px;
            margin: 50px auto;

            .image{
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                padding: 10px;
                border:1px solid;
            }

            img{
                width: 70%;
                object-fit: contain;
                margin: auto;
            }

            button{
                width:200px;
                padding: 10px;

            }


        }



    </style>
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
    <div class="photos">

    </div>


    <script src="./admin.js"></script>
</body>
</html>