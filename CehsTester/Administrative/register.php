<?php
$username = $_POST['username'];
$pass1 = $_POST['pass1'];
$pass2 = $_POST['pass2'];
if($pass1 != $pass2)
    header('Location: register.html');
    if(strlen($username) > 30)
        header('Location: register.html');
header('Location: login.html');
?>
