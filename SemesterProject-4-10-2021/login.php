<?php 
session_start();
    include('classes/connect.php');
    include('classes/login2.php');

    $username = "";
    $password = "";

    if($_SERVER['REQUEST_METHOD']=='POST'){
        $login = new Login();
        $result= $login->evaluate($_POST);
        
        if($result != ""){
            echo "<div style='text-align:center;font-size:12px;color:white;background-color:grey;'>";
            echo "The following errors occured<br>";
            echo $result;
            echo "</div>";
        }
        else{
            header("Location: profilepage.php");
            die;
        }
        $username = $_POST['username'];
        $password = $_POST['password'];
    
    }

   
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="header">
    <h2>Login</h2>
    </div>
    <form method="post" action="login.php">
        <div class="input-group">
        <label>Username</label>
        <input type="text" name="username">
        </div>

        <div class="input-group">
        <label>Password</label>
        <input type="password" name="password">
        </div>
        <div class="input-group">
        <input type="submit" id="button" value="Login">
        </div>
        <p>
            Not a member? <a href="register.php">Sign up</a>
        </p>
    </form>
</body>
</html>