<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Signout</title>
</head>
<body>
<?php
session_start();
session_unset();
session_destroy();
header("Location:login.html");
?>

</body>

</html>