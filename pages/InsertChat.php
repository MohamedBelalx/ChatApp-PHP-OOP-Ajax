<?php
session_start();

include('classes.php');

if(isset($_POST['chat'])){
    $chat = new chat();

    $chat->SetChatUserId($_SESSION['id']);
    $chat->SetChatText($_POST['chat']);

    var_dump($chat->GetChatText());

    $chat->Insert_Chat();

    
}
    var_dump($chat->GetChatText());

?>