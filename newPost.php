<?php
session_start();
 include "databaseConnect.php";

if(($_POST['postData']) != ""){
$query = "INSERT INTO `posts`(`post_data`, `user_id`, `post_time`) VALUES ('".mysqli_real_escape_string($link, $_POST['postData'])."',".$_SESSION['userId'].",'".date("Y-m-d H:i:s")."')";
if(mysqli_query($link,$query)){
    header("Location: home.php");
    // date("Y-m-d H:i:s")
}
else{
    setcookie("postError", 'ERROR!', time() + (86400 * 30), 'home.php');
    header("Location: home.php#post");

}
}
else{
    setcookie("postError", "You can't submit an empity post!!", time() + (86400 * 30), 'home.php');
    header("Location: home.php#post");
}



?>