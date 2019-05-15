<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ChatApp</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>
<section class="container-fluid">

<section class="row">

    <div class="col" align="center" style="background-color:#f1f1f1;height:100vh">
    <form action="pages/login.php" method="POST">

    <h2>Login Form</h2>
        <input type="email" name="maili" placeholder="usrernae" required><br>
        
        <input type="password" name="passs" placeholder="pass" required><br>

        <input type="submit" name="submit"><br>

        <?php
        if(isset($_GET['error'])){
        ?>
        <h4 style="color:lightskyblue">Error Login</h4>
        <?php
        }
        ?>
         <?php
        if(isset($_GET['login-first'])){
        ?>
        <h4 style="color:red">Login to access</h4>
        <?php
        }
        ?>
              




    
    </form>
    </div>
    <!-- 
    <br>
    <br>
    -->
    <div class="col-8" align="center"style="background-color:dodgerblue;height:100vh;">
    <h2>Registration</h2>

    <form action="pages/InsertUser.php" method="POST">
    <input type="text" name="nameuser" placeholder="usrernae" required><br>
    <input type="email" name="mail" placeholder="mail" required><br>
    <input type="password" name="pas" placeholder="pass" required><br>
    <input type="submit" name="reg">
    <?php
    if(isset($_GET['success'])){
        ?>
        <h4 style="color:lightskyblue">User Added</h4>
        <?php
    }
    ?>
    

    </form>
    </div>
    </section>
    </section>
</body>
</html>