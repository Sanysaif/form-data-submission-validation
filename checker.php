<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Checker</title>
</head>
<body>
<?php
$un=$_POST["un"];
$myfile=fopen("".$un.".txt","r") or die("Unable to open file.");
while(!feof($myfile))
{   
	$arr=explode(",",trim(fgets($myfile)));
	if(sizeof($arr)==10)
	{	
		$user=$arr[0];
		$pass=$arr[1];
		if($user==$_POST["un"]&&$pass==md5($_POST["ps"]))
		{
			session_start();
			$_SESSION["flag"]=true;
			$_SESSION["user"]=$user;
			$_SESSION["changepass_flag"]=false;
			$_SESSION["change_flag"]=false;
			header("Location:home.php");
			break;
		}
	}
	else
		break;
}
	echo "<h1 align='center'>You are not authorized!!</h1>
		 <a href='login.html'> Back to Login page</a>";
fclose($myfile);
?>
</body>
</html>