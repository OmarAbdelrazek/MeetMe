<?php
    $error ="";
    include "databaseConnect.php";


//    if($_POST['email'] && $_POST['password']&& $_POST['firstname']&& $_POST['lastname'] ) {
     $query = "select * from users where email = '" . mysqli_real_escape_string($link, $_POST['email']) . "' limit 1 ";
        $result = mysqli_query($link, $query);
        if (mysqli_num_rows($result) > 0) {
            $error .= "Email is already taken";
            setcookie("error",$error,time() + (86400 * 30),"signup.html");
            header("Location: signup.html");
        } else {
            $query = "insert into users(email,password,first_name,last_name,gender) values('" . mysqli_real_escape_string($link, $_POST['email']) . "','" . mysqli_real_escape_string($link, $_POST['password']) . "','" . mysqli_real_escape_string($link, $_POST['firstName']) . "','" . mysqli_real_escape_string($link, $_POST['lastName']) . "','" . mysqli_real_escape_string($link, $_POST['gender']) . "')";
            if (mysqli_query($link, $query)) {
                $query = "update users set password = '" . md5(md5(mysqli_insert_id($link)) . $_POST['password']) . "' where user_id = '" . mysqli_insert_id($link) . "' limit 1 ";
                mysqli_query($link, $query);
                header("Location: index.php");
            } else {
                $error.= "Sign up error, please try again later";
                setcookie("error",$error,time() + (86400 * 30),"signup.html");
                header("Location: signup.html");
            }
        }
    // print_r($_POST); 
    // header("Location: login.html");
//    }


?>