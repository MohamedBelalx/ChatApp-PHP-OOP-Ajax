<?php

include('pages/access.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="js/jQuery.js"></script>
    <script>
        $(document).ready(function(){
            $('#chat').keyup(function(e){
                if(e.keyCode == 13){
                    var chat = $('#chat').val();
                    $.ajax({
                        type:'POST',
                        url:'pages/InsertChat.php',
                        data:{chat:chat},
                        success:function(){
                            $('#chatbox').load('pages/DisplayChat.php');
                            $('#chat').val("");
                        }
                    });
                }
            });
            
            setInterval(function(){
                $('#chatbox').load('pages/DisplayChat.php');
            },350);
            
            $('#chatbox').load('pages/DisplayChat.php');

        });
    </script>
</head>
<body>
    <h2>Welcome To ChatApp <span><?php echo $_SESSION['user'];?></span></h2>
    <h3><a href="pages/logout.php">logout</a></h3>
    <br>
    <div style="width:500px;height:450px;border:1px solid black;">
        <div style="width:500px;height:450px;font-size:19px;" id='chatbox'></div>
            <textarea style="width:500px;height:50px" name="chat" id="chat"></textarea>
    </div>
    
</body>
</html>