<?php

session_start();

//check for session
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
<!DOCTYPE html>
<html lang="en">
<head>
<title>
Welcome 
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

<div id="header">
<h3>
<a href="page1.php">Home	</a>
-<a href="search.php">Search	</a>
-<a href="reservebook.php">Reserve A book </a>
-<a href="userbooks.php">view your reservered books </a>
-<a href="availablebooks.php"> view all available books </a>
-<a href="returnbook.php">return a reserved book </a>

<?php

if(! isset($_SESSION["username"]) )
{ //if session not found
?>
-<a href="signIn.php">Sign in		</a>
<?php 
}
else
{ //if session was vaild
?>
-<a href="signOut.php">Sign out		</a>
<?php
}
?>
</h3>
</div>
<div id="content">
<h3>
What would you like to do?
<table boarder="1">
<tr><td>
<a href="search.php"><img src="searchbook.jpg" alt="Smiley face" height="130" width="150"></a>
</td><td>
<a href="reservebook.php"><img src="reserve.jpg" alt="Smiley face" height="130" width="150"></a>
</td><td> 
<a href="userbooks.php"><img src="basket.jpg" alt="Smiley face" height="130" width="150"></a>
</td><td>
<a href="availablebooks.php"><img src="availablebooks.jpg" alt="Smiley face"height="130" width="150"></a>
</td><td>
<a href="returnbook.php"><img src="returnbook.jpg" alt="Smiley face" height="130" width="150"></a>
</td><td> 
<a href="signIn.php"><img src="signin.jpg" alt="Smiley face" height="130" width="150"></a>
</td></tr>
<tr><td>
search for a book		
</td><td>
reverse a book			
</td><td>
view your reserved books
</td><td>
view all available books
</td><td>
            return books			
</td><td>
		   Signin\signUp
</td><td>
</table>
</div>
</h3>
<div id="footer"><h3>
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
