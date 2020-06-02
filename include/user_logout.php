<?php
session_start();
$_SESSION = [];
session_destroy();
echo "successfully disconnected";
// header('location:../index.php');
?>