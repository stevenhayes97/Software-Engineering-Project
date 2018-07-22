<?php
//database connection call for log in
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
			<h1>Employee Information</h1>
				<ul id="links">
					<li><a href="index.php"> Home </a></li>
					<li><a href="login.php">Log In</a></li>
					<li><a href="PatientInformation.php"> Patient Entry </a></li>
					<li><a href="newemployeeform.php">Employee Entry</a></li>
					<li><a href="patients.php">View Patients</a></li>
					<li><a href="employeeview.php">View Employees</a></li>
				</ul>
		</header>
		<?php
//database connection call
include_once 'edbconnect.php';
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
Address
</th>
<th>
Date of Birth 
</th>
<th>
Cell Number
</th>
<th>
Extension
</th>
<th>
Email   
</th>
<th>
Gender    
</th>
<th>
Title
</th>
<th>
Date Hired
</th>
<th>
Speciality
</th>
</tr>
<?php
//loop through database table
while($row = mysql_fetch_array($result)){
$DoID = $row["DoID"];
$DoFNAME = $row["DoFNAME"];
$DoLNAME = $row["DoLNAME"];
$DoADDRESS = $row["DoADDRESS"];
$DoDOB = $row["DoDOB"];
$DoCELLNUM = $row["DoCELLNUM"];
$DoEXTENSION = $row["DoEXTENSION"];
$DoEMAIL = $row["DoEMAIL"];
$DoGENDER = $row["DoGENDER"];
$DoTITLE = $row["DoTITLE"];
$DoHIREDATE = $row["DoHIREDATE"];
$DoSPECIALITY = $row["DoSPECIALITY"];
echo "<tr>";
echo "<td>";
echo $DoFNAME;
echo "</td>";
echo "<td>";
echo $DoLNAME;
echo "</td>";
echo "<td>";
echo $DoADDRESS;
echo "</td>";
echo "<td>";
echo $DoDOB;
echo "</td>";
echo "<td>";
echo $DoCELLNUM;
echo "</td>";
echo "<td>";
echo $DoEXTENSION;
echo "</td>";
echo "<td>";
echo $DoEMAIL;
echo "</td>";
echo "<td>";
echo $DoGENDER;
echo "</td>";
echo "<td>";
echo $DoTITLE;
echo "</td>";
echo "<td>";
echo $DoHIREDATE;
echo "</td>";
echo "<td>";
echo $DoSPECIALITY;
echo "</td>";
echo "</tr>";
}
mysql_close($con); 


?>
</tr>
</table>

	<footer>
		<p> &copy; Copyright by River Falls Hospital </p>
	</footer>
</body>
</html>
