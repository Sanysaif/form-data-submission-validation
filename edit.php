<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Edit</title>
</head>
<body>

<?php
session_start();
	if($_SESSION["flag"]==true)
	{
		$_SESSION["change_flag"]=true;
		$un=$_SESSION["user"];
		$file1=fopen("".$un.".txt","r") or die("Unable to open file.");
		$arr=explode(",",fgets($file1));
		$fname=$arr[2];
		$lname=$arr[3];
		$day=$arr[4];
		$month=$arr[5];
		$year=$arr[6];
		$phone=$arr[8];
		$email=$arr[0];
		$gender=$arr[7];
		$pic=$arr[9];
		$password=$arr[1];
		fclose($file1);
		echo "<h1 align='center'>Update Information</h1><form action='home.php' method='post'>
			<table align='center'>
			<tr><td>First Name : </td><td><input type='text' name='fname' value='".$fname."' required></td></tr>
			<tr><td>Last Name : </td><td><input type='text' name='lname' value='".$lname."' required></td></tr>
			<tr><td>Date Of Birth : </td><td>
			<select name='year'>
			<option value='year' selected>Year</option>";
		for($i=1970; $i<=2016; $i++)
		{
		    echo "<option ";
		    if ($year == $i) echo " selected ";
		    echo  " value='".$i."'>".$i." </option>";
		}
		echo "</select> 
			<select name='month'>
			<option value='month' selected>Month</option>";
		for($i=1; $i<=12; $i++)
		{
		   echo "<option ";
		    if ($month == $i ) echo " selected ";
		    echo  "value='".$i."'>".$i."</option>";
		}
		echo "</select> 
			<select name='day'>
			<option value='day' selected>Day</option>";
		for($i=1; $i<=31; $i++)
		{
		    echo "<option ";
		    if ($day == $i ) echo " selected ";
		    echo  "value='".$i."'>".$i."</option>";
		}
		echo "</select> 
			</td></tr>
			<tr><td>Gender : </td><td><input type='radio' name='gender' value='male'";
			if($gender=='male') 
				echo " checked";
			echo "> Male&nbsp;&nbsp;
			    <input type='radio' name='gender' value='female'";
			if($gender=='female') 
				echo " checked";
			echo "> Female&nbsp; &nbsp; </td></tr>
			<tr><td>Phone : </td><td><input type='text' name='phone' value='".$phone."' required></td></tr>
			<tr><td>Email ID: </td><td><input type='email' name='email' value='".$email."' required></td></tr>
			<tr><td>Profile Picture: </td><td><input type='file' name='pic' accept='image/*' required></td></tr>
			<tr><td></td><td><br><input type='submit' name='submit' value='submit'></td></tr>
			<tr hidden><td hidden>Password :  </td><td hidden><input hidden type='text' name='password' value='".$password."' required></td></tr>
			</table>
			</form>";
	}
	else
		header("Location:signout.php");

?>

</body>
</html>