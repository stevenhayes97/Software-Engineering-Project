<?php
//database connection call for logging in 
 error_reporting( ~E_DEPRECATED & ~E_NOTICE );
 
 define('DBHOST', 'localhost');
 define('DBUSER', 'id3687712_stevenhayes97');
 define('DBPASS', '7uX!w26S');
 define('DBNAME', 'id3687712_patientdb');
 
 $conn = mysqli_connect(DBHOST,DBUSER,DBPASS);
 $dbcon = mysqli_select_db($conn,DBNAME);
 
 if ( !$conn ) {
  die("Connection failed : " . mysqli_error());
 }
 
 if ( !$dbcon ) {
  die("Database Connection failed : " . mysqli_error());
 }
?>
