<?php 
session_start(); 
unset($_SESSION["success"]);
session_destroy(); 
header("Location: signIn.php");
?>
