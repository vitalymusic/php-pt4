<?php
require_once("./db.php");

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Funkcionāls


if (isset($_GET["action"])) {

    if ($_GET["action"] == "comments") {
        $id = $_GET["postid"];
        echo get_comments_by_postId($id);
    }

    if ($_GET["action"] == "add_comments") {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            add_newComment($_POST);
        }

    }


    if ($_GET["action"] == "listImages") {
        // echo "test";
        echo listImages();

    }

    if ($_GET["action"] == "getImageByID") {
        if (!isset($_GET["id"]))
            exit();
        echo getImageById($_GET["id"]);

    }






}



function listImages()
{
    global $conn;
    $sql = "SELECT * from `images`";

    $result = $conn->query($sql);
    $data = [];

    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

    return  json_encode($data, JSON_UNESCAPED_UNICODE);

}



function getImageById($id)
{

    global $conn;
    $sql = "SELECT * from `images` WHERE id=$id";

    $result = $conn->query($sql);
    $data = json_encode($result->fetch_assoc(), JSON_UNESCAPED_UNICODE);
    return $data;

}

// PUT vaicājumi

if ($_SERVER["REQUEST_METHOD"] === "POST" && $_GET["action"] == "uploadfile") {
    // echo "test";
    // exit();

    if ($_FILES) {
        $fileName = $_FILES["file"]["name"];
        $uploadFolder = "upload/";
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $uploadFolder . $fileName)) {
            // Faila nosaukuma ieraksts datubāzē
            global $conn;

            $sql = "INSERT INTO `images` (`image_name`,`url`) VALUES ('{$_POST["fileName"]}','$fileName')";

            if ($conn->query($sql)) {
                echo json_encode(["upload" => "success"]);
            } else {
                echo json_encode([
                    "upload" => "error",
                    "error" => $conn->error
                ]);
            }
        }
    }

}






function get_all_posts()
{
    global $conn;
    $data = [];

    $sql = "SELECT * FROM posts order by 'create_date' DESC LIMIT 100";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    } else {
        $data[] = null;
    }

    return $data;

}




function get_comments_by_postId($id)
{
    global $conn;
    $data = [];

    $sql = "SELECT * FROM comments WHERE post_id=$id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    } else {
        $data[] = null;
    }

    return json_encode($data, JSON_UNESCAPED_UNICODE);


}


function add_newComment($data)
{
    global $conn;
    //  $sql = "INSERT into comments (`user`, `comment_text`,`post_id`) VALUES ('{$data["user"]}','{$data["comment"]}','{$data["post_id"]}')";  
    $stmt = $conn->prepare("INSERT into comments (`user`, `comment_text`,`post_id`) VALUES (?,?,?)");
    $stmt->bind_param("sss", $data["user"], $data["comment"], $data["post_id"]);


    if ($stmt->execute()) {
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["error" => $conn->error]);
    }
    ;
}




// function getImages()
// {
//     global $conn;
//     $data = [];


//     $sql = "SELECT * FROM images";
//     $result = $conn->query($sql);
//     if ($result->num_rows > 0) {
//         // output data of each row
//         while ($row = $result->fetch_assoc()) {
//             $data[] = $row;
//         }
//     } else {
//         $data[] = null;
//     }

//     return json_encode($data, JSON_UNESCAPED_UNICODE);

// }



function deleteImageById($id){
     global $conn;
      $sql = "DELETE from images WHERE id='$id'";
      $uploadFolder = "upload/";

      try{
        $conn->query($sql);

      }
      catch(Exception $e){
        echo json_encode(["error"=>$e]);
      }

    //   $result = $conn->query($sql);


}

?>