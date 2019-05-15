<?php
session_start();
if(isset( $_SESSION['id']) && !empty($_SESSION['id'])){
    
    return true;

}

    else{
        header("location:index.php?login-first");
        
    }

?> 