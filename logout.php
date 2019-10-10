<?php
    include "databaseConnect.php";
    session_start();
    $query = "UPDATE `users` SET `status`= 0 WHERE user_id = '".$_SESSION['userId']."' LIMIT 1";
    mysqli_query($link,$query);
    session_unset();
    session_destroy();
    header("Location: index.php");


?>