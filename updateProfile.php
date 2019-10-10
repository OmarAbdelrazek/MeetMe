<?php
    session_start();
    include "databaseConnect.php";
    $query = "UPDATE `users` SET ";
    if($_POST['newFirstName']){
        $query .="`first_name` = '".mysqli_real_escape_string($link,$_POST['newFirstName'])."' ";
    }


    if($_POST['newLastName'] && $_POST['newFirstName']){
        $query .=",`last_name` = '".mysqli_real_escape_string($link,$_POST['newLastName'])."' ";
    }
    else if($_POST['newLastName'] && !$_POST['newFirstName']){
        $query .="`last_name` = '".mysqli_real_escape_string($link,$_POST['newLastName'])."' ";
    }



    if($_POST['newEmail'] && $_POST['newFirstName']){
        $query .=",`email` = '".mysqli_real_escape_string($link,$_POST['newEmail'])."' ";
    }
    else if($_POST['newEmail'] && $_POST['newLastName'] && !$_POST['newFirstName']){
        $query .=",`email` = '".mysqli_real_escape_string($link,$_POST['newEmail'])."' ";
    }
    else if($_POST['newEmail'] && !$_POST['newLastName'] && !$_POST['newFirstName']){
        $query .="`email` = '".mysqli_real_escape_string($link,$_POST['newEmail'])."' ";
    }

    if(isset($_FILES["pic"]) && $_POST['newFirstName']){
        $target_dir = "assets/img/user/";
        $file_name = $_FILES['pic']['name'];
        $file_tmp =$_FILES['pic']['tmp_name'];
        // echo $_FILES["pic"]["size"];
        if(move_uploaded_file($file_tmp,$target_dir.$file_name)){
            $query .= ", `pic` = '".$target_dir.$file_name."'";
            

        }
    }
    else if(isset($_FILES["pic"]) && $_POST['newLastName'] && !$_POST['newFirstName']){
        $target_dir = "assets/img/user/";
        $file_name = $_FILES['pic']['name'];
        $file_tmp =$_FILES['pic']['tmp_name'];
        // echo $_FILES["pic"]["size"];
        if(move_uploaded_file($file_tmp,$target_dir.$file_name)){
            $query .= ", `pic` = '".$target_dir.$file_name."'";
            

        }
    }
    else if(isset($_FILES["pic"]) && $_POST['newEmail'] && !$_POST['newLastName'] && !$_POST['newFirstName']){
        $target_dir = "assets/img/user/";
        $file_name = $_FILES['pic']['name'];
        $file_tmp =$_FILES['pic']['tmp_name'];
        // echo $_FILES["pic"]["size"];
        if(move_uploaded_file($file_tmp,$target_dir.$file_name)){
            $query .= ", `pic` = '".$target_dir.$file_name."'";
            

        }

    }
    else if(isset($_FILES["pic"]) && !$_POST['newEmail'] && !$_POST['newLastName'] && !$_POST['newFirstName']){
        $target_dir = "assets/img/user/";
        $file_name = $_FILES['pic']['name'];
        $file_tmp =$_FILES['pic']['tmp_name'];
        // echo $_FILES["pic"]["size"];
        if(move_uploaded_file($file_tmp,$target_dir.$file_name)){
            $query .= "`pic` = '".$target_dir.$file_name."'";
            

        }

    }
    
    
    
    
    $query .= "WHERE `user_id` = '".$_SESSION['userId']."' LIMIT 1";
    mysqli_query($link,$query);
            header("Location: index.php");








?>