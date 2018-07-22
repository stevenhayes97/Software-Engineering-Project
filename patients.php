<?php
//check to see if user is logged in through database call
 ob_start();
 session_start();
 require_once 'dbconnect.php';
 
 if( !isset($_SESSION['user']) ) {
  header("Location: login.php");
  exit;
 }
 $res=mysqli_query($conn,"SELECT * FROM users WHERE userId=".$_SESSION['user']);
 $userRow=mysqli_fetch_array($res);
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">

		<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
		Remove this if you use the .htaccess -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title>Patient Information</title>
		<meta name="description" content="">
		<meta name="author" content="lifea">

		<meta name="viewport" content="width=device-width; initial-scale=1.0">

		<!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
		<link rel="shortcut icon" href="/favicon.ico">
		<link rel="apple-touch-icon" href="/apple-touch-icon.png">
		<link rel="stylesheet" href="styles.css">
	</head>

	<body background="https://images.freecreatives.com/wp-content/uploads/2015/04/3336-grey-texture-1920x1080-abstract-wallpaper.gif">
		

		<header>
			<h1>Patient Information</h1>
				<ul id = "links">
					<li><a href="index.php"> Home </a></li>
					<li><a href="login.php">Log In</a></li>
					<li><a href="PatientInformation.php"> Patient Entry </a></li>
					<li><a href="newemployeeform.php">Employee Entry</a></li>
					<li><a href="patients.php">View Patients</a></li>
					<li><a href="employeeview.php">View Employees</a></li>
				</ul>
		</header>
		<?php

include_once 'pdbconnect.php';
?>
<table border="1">
<tr>
<th>
First Name
</th>
<th>
Last Name
</th>
<th>
Date of Birth
</th>
<th>
Gender
</th>
<th>
Email
</th>
<th>
Address
</th>
<th>
Insurance    
</th>
<th>
Phone Number    
</th>
</tr>
<?php
//loop through database table
while($row = mysql_fetch_array($result)){
$PaID = $row["PaID"];
$PaFNAME = $row["PaFNAME"];
$PaLNAME = $row["PaLNAME"];
$PaDOB = $row["PaDOB"];
$PaGENDER = $row["PaGENDER"];
$PaEMAIL = $row["PaEMAIL"];
$PaADDRESS = $row["PaADDRESS"];
$PaINSURANCE = $row["PaINSURANCE"];
$PaPHONE = $row["PaPHONE"];
echo "<tr>";
echo "<td>";
echo $PaFNAME;
echo "</td>";
echo "<td>";
echo $PaLNAME;
echo "</td>";
echo "<td>";
echo $PaDOB;
echo "</td>";
echo "<td>";
echo $PaGENDER;
echo "</td>";
echo "<td>";
echo $PaEMAIL;
echo "</td>";
echo "<td>";
echo $PaADDRESS;
echo "</td>";
echo "<td>";
echo $PaINSURANCE;
echo "</td>";
echo "<td>";
echo $PaPHONE;
echo "</td>";
echo "</tr>";
}
mysql_close($con); 


?>
</tr>
</table>
</form>
	<footer>
		<p> &copy; Copyright by River Falls Hospial </p>
	</footer>
</body>
</html>
