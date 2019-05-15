<?php

class user{
    private $userid;
    private $username;
    private $usermail;
    private $userpass;

    public function GetUser(){
        return $this ->userid;
    }
    public function SetUser($userid){
        $this -> userid = $userid;
    }
    public function GetUserName(){
        return $this -> username;
    }
    public function SetUserName($username){
        $this -> username = $username;
    }
    public function GetUserMail(){
        return $this -> usermail;
    }
    public function SetUserMail($usermail){
        $this -> usermail = $usermail;
    }
    public function GetUserPass(){
        return $this -> userpass;
    }
    public function SetUserPass($userpass){
        $this -> userpass = $userpass;
    }
    public function InsertUser(){
        include('db_connection.php');
        $username = $this->GetUserName();
        $usermail = $this->GetUserMail();
        $userpass = $this->GetUserPass();


        $sql = "INSERT INTO users (user_name, mail, password)
        VALUES ('$username', '$usermail', '$userpass')";
        
        if (mysqli_query($connection, $sql)) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($connection);
        }
    }

    public function UserLogin(){
        include('db_connection.php');

        $mail = $this->GetUserMail();
        $pass = $this->GetUserPass();
        $sql = "SELECT * FROM users WHERE mail='$mail' AND password='$pass'";

        $result = mysqli_query($connection, $sql);


        if(mysqli_num_rows($result) ==0){
            header('location: ../index.php?error=1');
        }else{
            while($rows = mysqli_fetch_assoc($result)){
                $this->SetUser($rows['id']);
                $this->SetUserName($rows['user_name']);
                $this->SetUserMail($rows['mail']);
                $this->SetUserPass($rows['password']);

                header('location: ../Home.php');
            }
        }
        return true;
    }
    
}

class chat{
    private $chatid;
    private $chatuserid;
    private $chattext;

    public function GetChatId(){
        return $this -> chatid;
    }
    public function SetChatId($chatid){
        $this -> chatid = $chatid;
    }

    public function GetChatUserId(){
        return $this -> chatuserid;
    }
    public function SetChatUserId($chatuserid){
        $this -> chatuserid = $chatuserid;
    }

    public function GetChatText(){
        return $this -> chattext;
    }
    public function SetChatText($chattext){
        $this -> chattext = $chattext;
    }

    public function Insert_Chat(){
        include('db_connection.php');
        $chatuserid = $this->GetChatUserId();
        $chattext = $this->GetChatText();


        $sql = "INSERT INTO chats (chat_user_id, chat)
        VALUES ('$chatuserid', '$chattext')";
        
        if (mysqli_query($connection, $sql)) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($connection);
        }
    }

    public function Display_Chat(){
        include('db_connection.php');

        $sql = "SELECT * FROM chats ORDER BY chat_id";
        $result = mysqli_query($connection,$sql);

        while($rows = mysqli_fetch_assoc($result)){
            $userchatid = $rows["chat_user_id"]; 
            $sql1 = "SELECT * FROM USERS WHERE id ='$userchatid'";
            $result1 = mysqli_query($connection,$sql1);
            $rows1 = mysqli_fetch_assoc($result1);
?>

            <span style='color:red;'><?php echo $rows1['user_name'] . ': ';?></span>
            <span style='color:green'><?php echo $rows['chat']; ?></span><br>
            <?php
        }

    }


   
}

?>