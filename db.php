<?php
//this page connects to the DB in mySQL folder
$db = mysql_connect('localhost', 'root', '');
if ( $db === FALSE ) die('Fail message');
if ( mysql_select_db("webdb") === FALSE ) die("Fail message");
?>