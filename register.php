<?php
//start a session
//this page has a form and all the data is sent to add_user page later.
session_start();

?>


<html lang="en">
<head>
<meta charset="utf-8">


<link rel="stylesheet" type="text/css" href="style.css" />

</head>
<body>

<div id="header">
<h3>
<a href="page1.php">Home	</a>
-<a href="search.php">Search	</a>
-<a href="reservebook.php">Reserve A book </a>
-<a href="userbooks.php">view your reservered books </a>
-<a href="availablebooks.php"> view all available books </a>
-<a href="returnbook.php">return a reserved book </a>
</h3>
</div>

<div id="content">
<h3>Please fill in the form below to register:</h3>


<form  method="post" action="add_user.php">
<table border="1" >
<tr><td>
User Name:
</td>
<td>
<input type="text" name="user"><br>
</td></tr>
<tr><td>
Password:
</td>
<td>
<input type="password" name="password"><br>
</td></tr>
<tr><td>
First Name:
</td>
<td>
<input type="text" name="firstname">
</td></tr>
<tr><td>
Sur Name:
</td>
<td>
<input type="text" name="surname">
</td></tr>
<tr><td>
Address line 1:
</td>
<td>
<input type="text" name="address1">
</td></tr>
<tr><td>
Address line 2:
</td>
<td>
<input type="text" name="address2">
</td></tr>
<tr><td>
City:
</td>
<td>
<input type="text" name="city">
</td></tr>
<tr><td>
Telephone:
</td>
<td>
<input type="text" name="phone">
</td></tr>
<tr><td>
Mobile:
</td>
<td>
<input type="text" name="mobile">
</td></tr>
</table>
<input type="submit" value="Send">
<input type="reset" value="Reset">
</form>

</div>
<div id="footer"><h3>
<a href="page1.php">Home	</a>
-<a href="search.php">Search	</a>
-<a href="reservebook.php">Reserve A book </a>
-<a href="userbooks.php">view your reservered books </a>
-<a href="availablebooks.php"> view all available books </a>
-<a href="returnbook.php">return a reserved book </a>
</div>
</body>
</html>