<?php
// Funkcionāls
require_once("./db.php");

function get_all_posts()
{
    global $conn;
    $data = [];

    $sql = "SELECT * FROM posts";
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



?>