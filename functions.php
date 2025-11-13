<?php
        require_once("./db.php");

        ini_set('display_errors', 1); 
        ini_set('display_startup_errors', 1); 
        error_reporting(E_ALL); 
        
        // Funkcionāls
    

if(isset($_GET["action"])){

    if($_GET["action"]=="comments"){
        $id = $_GET["postid"];
        echo get_comments_by_postId($id);
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




function get_comments_by_postId($id){
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

    return json_encode($data,JSON_UNESCAPED_UNICODE);


}



?>