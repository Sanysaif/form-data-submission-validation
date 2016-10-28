<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Registration</title>
</head>
<body>
<h1 align="center">Form Data Submit</h1>
<?php
$fname="";
$lname="";
$day="day";
$month="month";
$year="year";
$phone="";
$email="";
$gender="";
$password="";
$rpassword="";
if(isset($_POST["submit"]))
{	
	if(isset($_POST["gender"]))
	{
		$fname=$_POST["fname"];
		$lname=$_POST["lname"];
		$day=$_POST["day"];
		$month=$_POST["month"];
		$year=$_POST["year"];
		$gender=$_POST["gender"];
		$phone=$_POST["phone"];
		$email=$_POST["email"];
		$pic=$_POST["pic"];
		if ($_POST["rpassword"]==$_POST["password"])
			{
				$password=$_POST["password"];
				if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $password)&& strlen($password)>8)
				{
					$record = fopen("".$email.".txt", "w") or die("Unable to open file!");
					fwrite($record, $email.",".md5($password).",".$fname.",".$lname.",".$day.",".$month.",".$year.",".$gender.",".$phone.",".$pic);
					echo "<h1 align='center'>Your data is registered into a file.</h1>";	
					fclose($record);					
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
		echo "<h3 align='center'>Please select a gender!!!</h3>";
		$fname=$_POST["fname"];
		$lname=$_POST["lname"];
		$phone=$_POST["phone"];
		$email=$_POST["email"];
	}
}
?>
<form action="register.php" method="post">
<table align="center">
<tr><td>First Name : </td><td><input type="text" name="fname" value="<?php echo $fname;?>" required></td></tr>
<tr><td>Last Name : </td><td><input type="text" name="lname" value="<?php echo $lname;?>" required></td></tr>
<tr><td>Date Of Birth : </td><td>
<select name="year">
<option value="year" selected>Year</option>
<?php 
for($i=1970; $i<=2016; $i++)
{

    echo "<option ";
    if ($year == $i ) echo "selected";
    echo  " value=".$i.">".$i."</option>";
}
?> 
</select> 

<select name="month">
<option value="month" selected>Month</option>
<?php 
for($i=1; $i<=12; $i++)
{
   echo "<option ";
    if ($month == $i ) echo "selected";
    echo  " value=".$i.">".$i."</option>";
}
?> 
</select> 
<select name="day">
<option value="day" selected>Day</option>
<?php 
for($i=1; $i<=31; $i++)
{
    echo "<option ";
    if ($day == $i ) echo "selected";
    echo  " value=".$i.">".$i."</option>";
}
?> 
</select> 
</td></tr>
	<tr><td>Gender : </td><td><input type="radio" name="gender" value="male" <?php if($gender=="male") echo "checked";?>> Male&nbsp;&nbsp;
	<input type="radio" name="gender" value="female" <?php if($gender=="female") echo "checked";?>> Female&nbsp; &nbsp; </td></tr>
<tr><td>Phone : </td><td><input type="text" name="phone" value="<?php echo $phone;?>" required></td></tr>
<tr><td>Email ID: </td><td><input type="email" name="email" value="<?php echo $email;?>" required></td></tr>
<tr><td>Password :  </td><td><input type="password" name="password" required></td></tr>
<tr><td>Confirm Password :  </td><td><input type="password" name="rpassword" required></td></tr>
<tr><td>Profile Picture: </td><td><input type="file" name="pic" accept="image/*" required></td></tr>
<tr><td></td><td><br><input type="submit" name="submit" value="submit"></td></tr>
<tr><td><br><a href="login.html">Back to Login</a></td></tr>

</table>
</form>

</body>
</html>