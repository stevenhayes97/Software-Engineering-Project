<?php
//database connection for employee database
$con = mysql_connect("localhost", "id3687712_stevenhayes97", "7uX!w26S");
if (!$con){
die('Could not connect:' .mysql_error());
}
mysql_select_db("id3687712_patientdb", $con);
$query ="SELECT * FROM Doctor ORDER BY DoTITLE";
$result = mysql_query($query);
?>
