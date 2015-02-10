<?php
//start session and check if theres a sucess one or no.
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

<div id="header">
<h3>
<a href="page1.php">Home	</a>
-<a href="search.php">Searh for books</a>
-<a href="reservebook.php">Reserve books </a>
-<a href="userbooks.php">view your reservered books </a>
-<a href="availablebooks.php"> view all available books </a>
-<a href="returnbook.php">return reserved books </a>

<?php

if(! isset($_SESSION["username"]) )
{//print sign in if no session
?>
-<a href="signIn.php">Sign in		</a>
<?php 
}
else
{//print sign out if there is session
?>
-<a href="signIn.php">Sign out		</a>
</h3>
</div>
<?php
}
if(! isset($_SESSION["username"]) )
{
?>
<div id="content">
please sign in before you can make a reservation
</div>
<?php
}
else
{
require_once"db.php";
echo("in this page you will find all the books which are reserved under your name");
echo '<div id="content">';

$user = $_SESSION["username"] ;
//search in the reservation table for books with the same session username
$result = mysql_query("SELECT * FROM reservation where username = '$user' ");

echo '<table border="1"'."\n"; 

echo ("<tr><td>"); 
echo("ISBN");
echo("</td><td>"); 
echo("User name"); 
echo("</td><td>"); 
echo("Reservation Date"	);  
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

}
echo '</table>';
echo '</div>';
}
?>

<div id="footer">
<h3>
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