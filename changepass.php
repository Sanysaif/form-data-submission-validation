<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Change Password</title>
</head>
<body>
<?php
session_start();
if($_SESSION["flag"]==true)
{
	$un=$_SESSION["user"];
	$myfile=fopen("".$un.".txt","r") or die("Unable to open file.");
	$arr=explode(",",trim(fgets($myfile)));
		if(sizeof($arr)==10)
		{
			$user=$arr[0];
			if($user==$_SESSION["user"])
			{
				$_SESSION["changepass_flag"]=true;
				echo "<h1 align='center'>Change Password</h1>
					<form action='home.php' method='post'>
					<table align='center'>
					<tr><td><label>New Password: </label></td><td><input type='password' name='password' required></td></tr>
					<tr><td><label>Confirm Pasword: </label></td><td><input type='password' name='rpassword' required></td></tr>
					<tr><td></td><br><br><td><br><input type='submit' name='submit' value='Change'>
					</table>
					</form>";
			}
		}
}
?>
</body>
</html>