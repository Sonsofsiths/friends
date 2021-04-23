<?php 
    include('classes/connect.php');
    include('classes/signup.php');

    $username = "";
    $email = "";

    if($_SERVER['REQUEST_METHOD']=='POST'){
        $signup = new SignUp();
        $result= $signup->evaluate($_POST);
        
        if($result != ""){
            echo "<div style='text-align:center;font-size:12px;color:white;background-color:grey;'>";
            echo "The following errors occured<br>";
            echo $result;
            echo "</div>";
        }
        else{
            header("Location: login.php");
            die;
        }
        $username = $_POST['username'];
        $email = $_POST['email'];
    
    }

   
?>
<!DOCTYPE html>
<html>
<head>
    <title>User Registration</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="header">
    <h2>Register</h2>
    </div>
    <form method="post" action="register.php">
        <div class="input-group">
        <label>Username</label>
        <input type="text" name="username" value="<?php echo $username?>">
        </div>
        <div class="input-group">
        <label>Email</label>
        <input type="text" name="email" value="<?php echo $email?>">
        </div>
        <div class="input-group">
        <label>Password</label>
        <input type="password" name="password_1">
        </div>
        <div class="input-group">
        <label>Confirm Password</label>
        <input type="password" name="password_2">
        </div>
        <div class="input-group">
            <input type="submit" id="button" value="Sign in">
        </div>
        <p>
            Already a member? <a href="login.php">Sign in</a>
        </p>
    </form>
</body>
</html>