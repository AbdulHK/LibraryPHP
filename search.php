<?php
//always start a session
session_start();


if ( isset($_SESSION["error"]) ) 
{ 
echo('<p>Error:'.$_SESSION["error"]."</p>\n"); 
unset($_SESSION["error"]); 
} 
if ( isset($_SESSION["success"]) ) 
{ 
echo('<p style="color:black" >'.$_SESSION["success"]."</p>\n");
} 


?>
<html lang="en">
<head>
<title>
Search for a book
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
Search for a book in our database
<h3>Please Chose the Search Method:</h3>
<form  method="post" action="search2.php">
Search By:

<input list="browsers" name="searchmethod">
<datalist id="browsers">
  <option value="ISBN">
  <option value="BookTitle">
  <option value="Author">
  <option value="Categories">
</datalist>
<br>

Search Key:

<input type="text" name="searchkey"><br>
<input type="submit" value="Send">
<input type="reset" value="Reset">
</form>

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