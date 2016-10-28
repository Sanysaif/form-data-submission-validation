<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Home</title>
</head>
<body>
<?php
session_start();
if($_SESSION["change_flag"]==true)
{
	$_SESSION["change_flag"]=false;	
	$un=$_SESSION["user"];
	$record = fopen("".$un.".txt", "w") or die("Unable to open file!");
	fwrite($record, $_POST["email"].",".$_POST["password"].",".$_POST["fname"].",".$_POST["lname"].",".$_POST["day"].",".$_POST["month"].",".$_POST["year"].",".$_POST["gender"].",".$_POST["phone"].",".$_POST["pic"]);
	echo "<h1 align='center'>Your data is registered into a file.</h1><a align='center' href='home.php'>Back to Home</a>";	
	fclose($record);
}
else if($_SESSION["changepass_flag"]==true)
{	
	$_SESSION["changepass_flag"]=false;
	$un=$_SESSION["user"];
	$password=$_POST["password"];
	$rpassword=$_POST["rpassword"];
	if ($_POST["rpassword"]==$_POST["password"])
	{
		if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $password)&& strlen($password)>8)
		{
			$file1=fopen("".$un.".txt","r") or die("Unable to open file.");
			$arr=explode(",",fgets($file1));
			$fname=$arr[2];
			$lname=$arr[3];
			$day=$arr[4];
			$month=$arr[5];
			$year=$arr[6];
			$phone=$arr[7];
			$email=$arr[0];
			$gender=$arr[8];
			$pic=$arr[9];
			fclose($file1);
			$file2=fopen("".$un.".txt","w") or die("<h1 align='center'>Unable to open file.</h1>");
			fwrite($file2, $email.",".md5($password).",".$fname.",".$lname.",".$day.",".$month.",".$year.",".$gender.",".$phone.",".$pic);
			echo "<h1 align='center'>Your Password was changed.</h1>";
			fclose($file2);
		}
		else
		{
			echo "<h3 align='center'>Your Password should contain a special character and length should be more than 8 characters!!!</h3><br><br>";
		}
	}
	else
		echo "<h3 align='center'>Passwords dont match!!</h3><br><br>";
}

else
{
	if($_SESSION["flag"]==true)
	{
		$un=$_SESSION["user"];
		$myfile=fopen("".$un.".txt","r") or die("Unable to open file.");
		$arr=explode(",",fgets($myfile));
		if(sizeof($arr)==10)
		{
			$user=$arr[0];
			if($user==$_SESSION["user"])
			{
				echo "<h1 align='center'>Information</h1>
					<img src='".$arr[9]."' align='right' alt='Profile Picture' style='max-width:30%;max-height:450px;float:right;width:auto;height:auto;'>
					<table align='center'>
					<tr><td>First Name : </td><td><h4>".$arr[2]."</h4></td></tr>
					<tr><td>Last Name : </td><td><h4>".$arr[3]."</h4></td></tr>
					<tr><td>Date Of Birth : </td><td><h4>".$arr[4]."/".$arr[5]."/".$arr[6]."</h4></td></tr>
					<tr><td>Gender : </td><td><h4>".$arr[7]."</h4></td></tr>
					<tr><td>Email ID: </td><td><h4>".$arr[0]."</h4></td></tr>
					<tr><td>Phone: </td><td><h4>".$arr[8]."</h4></td></tr></table>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<h2><a href='signout.php'>Sign Out</a>&nbsp;&nbsp;<a href='edit.php'>Change Info</a>&nbsp;&nbsp;<a href='changepass.php'>Change Password</a></h2>";
			}
		}
		fclose($myfile);
	}
	else
		header("Location:signout.php");
}

?>
</body>
</html>