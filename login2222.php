<html>
<head>
</head>
<body>
<?php
ob_start();
$con = mysql_connect("localhost", "id3687712_stevenhayes97", "7uX!w26S");
if (!$con){
die('Could not connect:' .mysql_error());
}
mysql_select_db("id3687712_patientdb", $con);

$user = $_POST["username"];
$pwd = $_POST["password"];

$user = stripslashes($user);
$pwd = stripslashes($pwd);
$user = mysql_real_escape_string($user);
$pwd = mysql_real_escape_string($pwd);
$sql="SELECT * FROM users WHERE userName='$user' and userpass='$pwd'";
$result=mysql_query($sql);

$count=mysql_num_rows($result);

if($count==1){

$_SESSION['user']= "user";
$_SESSION['pwd']= "pwd";
header("Location:employeeview.php");
exit();
}
else {
echo "Wrong Username or Password";
}
ob_end_flush();
?>
</body>
</html>
