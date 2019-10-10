<?php
$link = mysqli_connect('localhost','root','','social_network');
if (mysqli_connect_errno()) {
    print_r(mysqli_connect_error());
    exit();
}    


?>