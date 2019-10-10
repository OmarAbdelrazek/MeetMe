<?php
    session_start();
    
    include "databaseConnect.php";
    
    if($_POST['action'] == "accept"){
        $query = "UPDATE `friend_reqs` SET `friend_reqs`.`status` = 1 WHERE `friend_reqs`.`friend_id` = '".$_POST['friend_id']."'";
        mysqli_query($link,$query);
        header("Location: friendRequests.php");
    }
    else if($_POST['action'] == "reject"){
        $query = "DELETE FROM `friend_reqs` WHERE `friend_reqs`.`friend_id` = '".$_POST['friend_id']."'";
        mysqli_query($link,$query);
        header("Location: friendRequests.php");

    }



?>