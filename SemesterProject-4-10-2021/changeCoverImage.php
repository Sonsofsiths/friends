<!DOCTYPE html>
<html lang="en">
<?php 
session_start();

include('classes/connect.php');
include('classes/login2.php');
include('classes/user.php');
include('classes/post.php');
//include('classes/image.php');

//check login
$login = new Login();
$user_data = $login->check_login($_SESSION['sharespace_id']);
  if($_SERVER['REQUEST_METHOD']=="POST"){
 
    if(isset($_FILES['file']['name']) && $_FILES['file']['name'] != ""){
      if($_FILES['file']['type'] == "image/jpeg"){
        $size = (1024*1024)* 3;
        if($_FILES['file']['size'] < $size){
          //everything is fine
          $filename = "uploads/" . $_FILES['file']['name'];
          move_uploaded_file($_FILES['file']['tmp_name'], $filename );
        
         // $image = new Image();
          //$image -> crop_image($filename,$filename,1000,1000);
        if(file_exists($filename)){
          $userid = $user_data['id'];
          $query = "update users set cover_image = '$filename' where id = '$userid' limit 1";
          $db = new Database();
          $db -> save($query);
    
          header("Location: profilepage.php");
          die;
        }
      }
        else{
          echo "Only pictures of size 3Mb or lower are allowed.";
        }
      }
      else{
        echo "Please enter an image";
      }
     

  }
    else{
      echo "Please add a valid image.";
    }
  }
 
?>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Change Image</title>
  <link rel="stylesheet" href="profilepage.css">
  <script defer src="profilepage.js"></script>
</head>
<body>
  <form method="post" enctype="multipart/form-data">
    <input type="file" name="file">
    <br>
    <input id="post_button" type="submit" value="Post">
</form>
</body>
</html>