<?php
    session_start();
    $link = mysqli_connect('localhost','root','2182104667','social_network');
    if (mysqli_connect_errno()) {
        print_r(mysqli_connect_error());
        exit();
    }
    if(isset($_FILES["pic"])){
        $target_dir = "assets/img/user/";
        $file_name = $_FILES['pic']['name'];
      $file_tmp =$_FILES['pic']['tmp_name'];
        // echo $_FILES["pic"]["size"];
        if(move_uploaded_file($file_tmp,$target_dir.$file_name)){
            $query = "UPDATE `users` SET `pic` = '".$target_dir.$file_name."' WHERE user_id = ".$_SESSION['userId']."";
            mysqli_query($link,$query);
            header("Location: home.php");

        }
    }





?>