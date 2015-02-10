<?php
//start session
session_start();

if ( isset($_SESSION["error"]) ) 
{ 
echo('<p>Error:'.$_SESSION["error"]."</p>\n"); 
unset($_SESSION["error"]); 
} 
if ( isset($_SESSION["success"]) ) 
{ 
echo('<p style="color:black">'.$_SESSION["success"]."</p>\n");

} 
?>

<html lang="en">
<head>
<title>
Seach results
</title>
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


<div id="content">
<?php
echo '<table border="4">'."\n"; 
require_once"db.php";
//get the Search KEy and the Search method from pervious page.

$key = $_POST['searchkey'] ;
$method = $_POST['searchmethod'] ;
// To protect MySQL injection 
$key= stripslashes($key);
$method= stripslashes($method);
$key= mysql_real_escape_string($key);
$method= mysql_real_escape_string($method);


$flag = 0 ;
//if the user chosed categories as method
if ( $method == "categories")
{
$result = mysql_query("SELECT * FROM books WHERE CategoryID= '$key'");

echo ("<tr><td>");
echo ("Category ID"); 
echo("</td><td>"); 
echo("Category Name"); 
echo("</td><td>"); 
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

}
else
{ // if user chose another method
$result = mysql_query("SELECT * FROM books WHERE $method like '%$key%'");


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
echo ("</table>\n"); 
}

if ( $flag == 0)
{
echo ("cant find the book in our database! please check the name or use other search feature!") ;
}
mysql_close($db); 
?>

</div>

<div id="footer"><h3>
<a href="page1.php">Home	</a>
-<a href="search.php">Search a book	</a>
-<a href="reservebook.php">Reserve A book </a>
-<a href="userbooks.php">view your reservered books </a>
-<a href="availablebooks.php"> view all available books </a>
-<a href="returnbook.php">return a reserved book </a>
</h3>

</body>
</html>