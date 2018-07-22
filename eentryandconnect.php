<?php
//connecting to employe entry database
$con = mysql_connect("localhost", "id3687712_stevenhayes97", "7uX!w26S");
if (!$con){
die('Could not connect:' .mysql_error());
}
mysql_select_db("id3687712_patientdb", $con);
$select = "INSERT INTO Doctor(DoFNAME, DoLNAME, DoADDRESS, DoDOB, DoCELLNUM, DoEXTENSION, DoEMAIL, DoGENDER, DoTITLE, DoHIREDATE, DoSPECIALITY)
VALUES('$fName', '$lName', '$address', '$dob', '$phone', '$extension', '$email', '$gender_select', '$job_title', '$hire_date', '$certification')";
$data = mysql_query($select);
if(!$data){
			die("SQL error during query" .mysql_error());
		}
		print "You have entered $fName $lName $address $dob $phone $extension $email $gender_select $job_title $hire_date $certification into the River Falls Hospital Worker database.";	
		?>
