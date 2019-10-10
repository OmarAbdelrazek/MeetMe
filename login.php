<?php
session_start();
$error = "";
include "databaseConnect.php";


 $query = "select * from users where email = '" . mysqli_real_escape_string($link, $_POST['email']) . "' limit 1 ";

 $result = mysqli_query($link, $query);

 $row = mysqli_fetch_assoc($result);

 if ($row['password'] == md5(md5($row['user_id']).$_POST['password'])) {
    $query = "UPDATE `users` SET `status`= 1 WHERE user_id = '".$row['user_id']."' LIMIT 1";
    mysqli_query($link,$query);
    $_SESSION["status"] = 1;
    $_SESSION["userId"] = $row['user_id'];
    $_SESSION["email"] = $row['email'];
    $_SESSION["firstname"] = $row['first_name'];
    $_SESSION["lastname"] = $row['last_name'];
    $_SESSION["gender"] = $row['gender'];
    $_SESSION["pic"] = $row['pic'];
    header("Location: home.php");
    
} else {
    $error = "Wrong Email/Password";
    setcookie("error",$error,time() + (86400 * 30),"index.php");
    header("Location: index.php");
}

?>