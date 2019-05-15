<?php

include('classes.php');


$user = new user;

if(isset($_POST['reg'])){
    echo 'heelodsa';

    $name = $_POST['nameuser'];
    $mail = $_POST['mail'];
    $pass = $_POST['pas'];

    $user->SetUserName($name);
    $user->SetUserMail($mail);
    $user->SetUserPass($pass);

    $user->InsertUser();


    header('location: ../index.php?success=1');
}



?>