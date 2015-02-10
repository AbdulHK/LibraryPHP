<?php
require_once"db.php";

//get the userinput from the form 
$user = $_POST['user'];
$pass = $_POST['password'];
$firstname = $_POST['firstname'];
$surname = $_POST['surname'];
$addr1 = $_POST['address1'];
$addr2 = $_POST['address2'];
$city = $_POST['city'];
$phone = $_POST['phone'];
$mobile = $_POST['mobile'];
// To protect MySQL injection 
$user= stripslashes($user);
$pass= stripslashes($pass);
$user= mysql_real_escape_string($user);
$pass= mysql_real_escape_string($pass);
$firstname= stripslashes($firstname);
$surname= stripslashes($surname);
$firstname= mysql_real_escape_string($firstname);
$surname= mysql_real_escape_string($surname);
$addr1= stripslashes($addr1);
$addr2= stripslashes($addr2);
$addr1= mysql_real_escape_string($addr1);
$addr2= mysql_real_escape_string($addr2);
$city= stripslashes($city);
$phone= stripslashes($phone);
$city= mysql_real_escape_string($city);
$phone= stripslashes($phone);
$mobile= stripslashes($mobile);
$mobile= mysql_real_escape_string($mobile);
$phone= mysql_real_escape_string($phone);
//add it to the users table
$sql = "INSERT INTO users (Username, Password,Firstname,Surname,AddressLine1,AddressLine2,City,Telephone,Mobile)
VALUES ('$user', '$pass', '$firstname', '$surname', '$addr1', '$addr2', '$city', '$phone' , '$mobile')";
mysql_query($sql);
mysql_close($db);
require_once"page1.php";
?>