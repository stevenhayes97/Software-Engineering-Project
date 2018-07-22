<?php
//connection for patient entry 
$con = mysql_connect("localhost", "id3687712_stevenhayes97", "7uX!w26S");
if (!$con){
die('Could not connect:' .mysql_error());
}
mysql_select_db("id3687712_patientdb", $con);
$select = "INSERT INTO Patient(PaFNAME, PaLNAME, PaDOB, PaGENDER, PaEMAIL, PaADDRESS, PaINSURANCE, PaPHONE)
VALUES('$firstname', '$lastname', '$DOB', '$gender_select', '$email', '$homeaddress', '$insurance', '$phonenumber')";
$data = mysql_query($select);
if(!$data){
			die("SQL error during query" .mysql_error());
		}
		print "You have entered $firstname $lastname $DOB $gender_select $email $homeaddress $insurance $phonenumber into the River Falls Hospital Patient database.";	
		?>
