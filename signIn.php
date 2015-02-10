<?php
//always start a session first thing in the page
session_start();

unset($_SESSION["username"]); 

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
<?php
require_once"db.php";

if ( isset($_POST["username"]) && isset($_POST["password"]) ) 
{
	$n1 = htmlentities($_POST['username']);
	$p1 = htmlentities($_POST['password']);
	// To protect MySQL injection 
	$n1= stripslashes($n1);
	$p1= stripslashes($p1);
$n1= mysql_real_escape_string($n1);
$p1= mysql_real_escape_string($p1);
	$flag = 0 ;
	//search the database for the entered username and password
	$result = mysql_query("SELECT Username, Password FROM users");
	while ( $row = mysql_fetch_row($result)) 
	{
	//check username and password if both matches
		if(strcmp($n1 , $row[0]) == 0 && $p1 == $row[1] ) 
		{
			
			$_SESSION["username"] = $_POST["username"] ; 
			$_SESSION["success"] = "Welcome, ".$_POST["username"]; 
			
			header( 'Location: page1.php' ) ; 
			$flag = 1 ;
		}
	}
	//if username does not match
	if ( $flag == 0 )
	{ 
		$_SESSION["error"] = "Incorrect password OR username."; 
		header( 'Location: page1.php' ) ; 
	}
	
	return;
}	

if ( count($_POST) > 0 ) 
{ 
$_SESSION["error"] = "Missing Required Information"; 
header( 'Location: page1.php' ) ; 
return; 
} 
?>


<html lang="en">
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="style.css" />

</head>


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
{
?>

<div id="content">
<h3>Log in:</h3>


<form  method="post">
	Name:
<input type="text" name="username"><br>
Password:
<input type="password" name="password"><br>

<input type="submit" value="Send">
<input type="reset" value="Reset">
</form>
<a href="register.php"><img src="signup.png" alt="Smiley face" height="100" width="150"></a>

</div>
<?php
}
else
{
?>
<table border="0">
<tr><td>
<h4> You are Logged in </h4>
</td></tr>
</table>
<?php
}
?>
<div id="footer"><h3>
<a href="page1.php">Home	</a>
-<a href="search.php">Search a book	</a>
-<a href="reservebook.php">Reserve A book </a>
-<a href="userbooks.php">view your reservered books </a>
-<a href="availablebooks.php"> view all available books </a>
-<a href="returnbook.php">return a reserved book </a>
</h3>
</html>