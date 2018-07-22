<?php 
//connecting to patient table in database
$con = mysql_connect("localhost", "id3687712_stevenhayes97", "7uX!w26S");
if (!$con){
die('Could not connect:' .mysql_error());
}
mysql_select_db("id3687712_patientdb", $con);
$query ="SELECT * FROM Patient ORDER BY PaLNAME";
$result = mysql_query($query);
?>
