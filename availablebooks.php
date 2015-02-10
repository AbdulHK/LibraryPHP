<?php
//start session and check for existing one
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
-<a href="search.php">Search for books	</a>
-<a href="reservebook.php">Reserve books </a>
-<a href="userbooks.php">view your reservered books </a>
-<a href="availablebooks.php"> view all available books </a>
-<a href="returnbook.php">return reserved books </a>


<?php
//if there is no session
		if(! isset($_SESSION["username"]) )
		{
		?>
		-<a href="signIn.php">Sign in		</a>
		<?php 
		}
		else
		{// if no session
		?>
		-<a href="signIn.php">Sign out		</a>
		<?php
		}
		?>
</h3>
</div>

<?php

if(! isset($_SESSION["username"]) )
{ //if there is no session stop the page script and print this massage to user
?>
<div id="content">

<h4> You Need To Sign in before You Can Make a Reservation </h4>
<?php
}
else
{
//only print this if a valid session was started

require_once"db.php";
echo '<div id="content">';
$user = $_SESSION["username"] ;
//search in the table for book where reversion is N
$result = mysql_query("SELECT * FROM books where reserved = 'N' ");

echo '<table border="1">'."\n"; 

echo ("<tr><td>"); 
echo("ISBN");
echo("</td><td>"); 
echo("Book Title"); 
echo("</td><td>"); 
echo("Author"); 
echo("</td><td>"); 
echo("Edition");
echo("</td><td>"); 
echo("Year");
echo("</td><td>"); 
echo("Category ID");
echo("</td><td>"); 
echo("Reservation State"); 
echo("</td></tr>\n"); 



while ( $row = mysql_fetch_row($result)) 
{ 
echo ("<tr><td>"); 
echo($row[0]);
echo("</td><td>"); 
echo($row[1]); 
echo("</td><td>"); 
echo($row[2]); 
echo("</td><td>"); 
echo($row[3]);
echo("</td><td>"); 
echo($row[4]);
echo("</td><td>"); 
echo($row[5]);
echo("</td><td>"); 
echo($row[6]); 
echo("</td></tr>\n"); 
}
echo '</table>';
echo '</div>';
}

?>
</div>


<div id="footer">
<h3>
<a href="page1.php">Home	</a>
<a href="search.php">Search a book	</a>
-<a href="reservebook.php">Reserve A book </a>
-<a href="userbooks.php">view your reservered books </a>
-<a href="availablebooks.php"> view all available books </a>
-<a href="returnbook.php">return a reserved book </a>
</h3>
</div>

</body>
</html>