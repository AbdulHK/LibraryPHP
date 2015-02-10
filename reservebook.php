
<?php

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
-<a href="search.php">Search for books</a>
-<a href="reservebook.php">Reserve book </a>
-<a href="userbooks.php">view your reservered books </a>
-<a href="availablebooks.php"> view all available books </a>
-<a href="returnbook.php">return reserved book </a>


<?php

if(! isset($_SESSION["username"]) )
{
?>
-<a href="signIn.php">Sign in		</a>
<?php 
}
else
{
?>
-<a href="signIn.php">Sign out		</a>
</h3>
 </div>
<div id="content">

<?php
}
//if there is no session stop page script
if(! isset($_SESSION["username"]) )
{
?>

<h4> You Need To Sign in before You Can Make a Reservation </h4>


<?php
}
else
{
?>

Welcome to the reservation page! all you have to do is enter the book ISBN in the field below and the book will be yours
<br>
<br>
<form method="post">

Please Enter The book ISBN:
<input type="text" name="ISBN"><br>
<br>
<input type="submit" value="Send">
<input type="reset" value="Reset">

<?php

require_once"db.php";


if ( isset($_POST['ISBN']))
{

$key = $_POST['ISBN'] ;
// To protect MySQL injection 
$key= stripslashes($key);
$key= mysql_real_escape_string($key);
//search for the book using the ISBN and resversion is N
$result = mysql_query("SELECT * FROM books where ISBN = '$key' and reserved = 'n'");
$flag = 0 ;
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
$flag = 1 ;
}
echo '</table>';

// if the book statues is Y
if ( $flag == 0 ) 
	{
echo '<br>';
echo ("Book is not available for reservation\n");

	}
else
	{
	//if the book was found and the book stats were N
echo '<br>';
echo ("The Book is  now in your reservations basket.\n");

$name = $_SESSION["username"] ;
$w = $_POST['ISBN'] ;
$date = date('Y-m-d H:i:s'); //get date
echo ($_POST['ISBN']);
//SQL statement to update the book statues
$sql = "UPDATE books SET reserved = 'Y' WHERE ISBN = '$w'";
//SQL statment to add ISBN,username,date into the reservation table
$sql2 = "INSERT INTO reservation (isbn, username, reserveddate)
VALUES ('$w', '$name', '$date')";
//run the queries
mysql_query($sql);
mysql_query($sql2);
	}
		}
	}
mysql_close($db);
?>
</div>

<div id="footer"><h3>
<a href="page1.php">Home</a>
-<a href="search.php">Search a book	</a>
-<a href="reservebook.php">Reserve A book </a>
-<a href="userbooks.php">view your reservered books </a>
-<a href="availablebooks.php"> view all available books </a>
-<a href="returnbook.php">return a reserved book </a>

</h3>
</div>
</body>
</html>