<?php
session_start();

if(isset($_SESSION['sharespace_id'])){
    unset($_SESSION['sharespace_id']);
    $_SESSION['sharespace_id'] = NULL;
}
header("Location: login.php");
?>