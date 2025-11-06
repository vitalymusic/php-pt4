<?php 
    $name = "Hello PHP";

    $settings = [
        "background"=>"#b5b3b3ff",
        "font"=>"Arial",
        "fontSize"=>"16pt",
        "WebSiteEnabled"=>true,
        "showErrors"=>true
    ];


    $username = "administrator";
    $pass="12345";
    $pass_hash1 = md5($pass);
    $pass_hash2 = sha1($pass);
    $pass_hash3 = password_hash($pass,PASSWORD_BCRYPT); 

    // var_dump([$pass_hash1,$pass_hash2,$pass_hash3]);

    // var_dump(password_verify("123456",$pass_hash3));



    if($settings["showErrors"]){
        ini_set('display_errors', 1); 
        ini_set('display_startup_errors', 1); 
        error_reporting(E_ALL);
    }




    // Super mainīgie

    //  print_r($_SERVER);
    //  print_r($_GET);


  
?> 