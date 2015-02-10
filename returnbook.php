<?php
//check for session if there any started one
session_start();


if ( isset($_SESSION["error"]) ) 
{ 
echo('<p style="color:red">Error:'.$_SESSION["error"]."</p>\n"); 
unset($_SESSION["error"]); 
} 
if ( isset($_SESSION["success"]) ) 
{ 
echo('<p style="color:black">'.$_SESSION["success"]."</p>\n"); 
} 
?>

<html lang="en">
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="style.css" />

</head>
<body>
<table align="center" valign="center">
   <tr><td>
<img src="logo.jpg" alt="Smiley face" id="icon" align="center" height="200" Width="700">
   </td></tr>
   </table>

<div id="header"><h3>
<a href="page1.php">Home	</a>
-<a href="search.php">Search a book	</a>
-<a href="reservebook.php">Reserve A book </a>
-<a href="userbooks.php">view your reservered books </a>
-<a href="availablebooks.php"> view all available books </a>
-<a href="returnbook.php">return a reserved book </a>

<?php

if(! isset($_SESSION["username"]) )
{ //if no session print sign in
?>
-<a href="signIn.php">Sign in		</a>
<?php 
}
else
{ //if user already loged in
?>
-<a href="signIn.php">Sign out		</a>
</h3>
</div>
<?php
}

if(! isset($_SESSION["username"]) )
{//if session was invalid stop the page script
?>

<h4> You Need To Sign in before You Can Make a Reservation </h4>

<?php
}
else
{

?>
<div id="content">
<form method="post">

Please Enter The book ISBN:

<input type="text" name="ISBN"><br>

<input type="submit" value="Send">
<input type="reset" value="Reset">

<?php

require_once"db.php";


if ( isset($_POST['ISBN']))
{

$key = $_POST['ISBN'] ;
$name = $_SESSION["username"] ;
// To protect MySQL injection 
$key= stripslashes($key);
$name= stripslashes($name);
$key= mysql_real_escape_string($key);
$name= mysql_real_escape_string($name);
//search for the book which the user entered and the uername has to be the same
$result = mysql_query("SELECT * FROM reservation where ISBN = '$key' and username = '$name'");
$flag = 0 ;
echo '<table border="1">'."\n"; 
echo ("<tr><td>"); 
echo("ISPN");
echo("</td><td>"); 
echo("User Name"); 
echo("</td><td>"); 
echo("Reservation Date");  
echo("</td></tr>\n"); 
while ( $row = mysql_fetch_row($result)) 
{
echo ("<tr><td>"); 
echo($row[0]);
echo("</td><td>"); 
echo($row[1]); 
echo("</td><td>"); 
echo($row[2]); 
echo("</td></tr>\n"); 
$flag = 1 ;
echo '</table>';
}

if ( $flag == 0 ) 
{//if the book does not have the same username as the session name
echo ("Book is not in your basket\n");
}
else
{// if everything matches remove it from reversation and  update the book in Books to N
echo ("the book has been removed from your books basket.\n");
$w = $_POST['ISBN'] ;
$sql = "DELETE FROM reservation where ISBN = '$w'";

$sql2 = "UPDATE books SET reserved = 'N' WHERE ISBN = '$w'";
//run the SQL queries
mysql_query($sql);
mysql_query($sql2);
}
}
}
mysql_close($db);
?>
</div>

<div id="footer">
<a href="page1.php">Home	</a>
-<a href="search.php">Search a book	</a>
-<a href="reservebook.php">Reserve A book </a>
-<a href="userbooks.php">view your reservered books </a>
-<a href="availablebooks.php"> view all available books </a>
-<a href="returnbook.php">return a reserved book </a>
</h3>
</div>
</body>
</html>