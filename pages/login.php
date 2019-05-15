<?php
session_start();
include('classes.php');

$user =new user;
$user->SetUserMail($_POST['maili']);
$user->SetUserPass($_POST['passs']);

if($user->UserLogin()){

    $_SESSION['id'] = $user->GetUser();
    
    $_SESSION['mail'] = $user->GetUserMail();

    $_SESSION['user'] = $user->GetUserName();
}
if(!isset($_POST['submit'])){
    header('location: ../index.php');
}
echo $user->GetUser();
var_dump($user->UserLogin());
echo '<br>';
echo '<br>';

echo $_SESSION['name'];
echo '<br>';
echo $user->GetUserName();
echo '<br>';
echo $_SESSION['id'];
echo '<br>';
echo $_SESSION['mail'];

?>