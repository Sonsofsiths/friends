 <div id="friends">
    <?php
      $login = new Login();
      $user_data = $login->check_login($_SESSION['sharespace_id']);
       $image = "";
       if(file_exists($user_data['profile_image'])){
         $image = $user_data['profile_image'];
       }
    ?>
    <img id="friends_img" src="echo $image" width="30px" height="40px">
    <br>
    <?php echo $friend_row['username'];?>
 </div>
