<?php
session_start();
    include "databaseConnect.php";

    $query = "INSERT INTO `friend_reqs`( `user_id`, `friend_id`, `status`) VALUES ('".$_SESSION['userId']."','".$_POST['friendId']."',0)";
    mysqli_query($link,$query);
        header("Location: discover.php");
    


?>