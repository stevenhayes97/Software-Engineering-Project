<?php
   //database connection to check if user is logged in
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
      <title>New Patient Form</title>
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
         <h1>Patient Submitted</h1>
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
         //variables
         echo "<div id='entrymsg'>";
         $firstname = $_POST["firstname"];
         $lastname = $_POST["lastname"];
         $DOB = $_POST["DOB"];
         $gender_select = $_POST["gender_select"];
         $email = $_POST["email"];
         $homeaddress = $_POST["homeaddress"];
         $insurance = $_POST["insurance"];
         $phonenumber = $_POST["phonenumber"];
         
         include_once 'pentryandconnect.php';
         mysql_close($con); 
         echo "<br>";
         echo "</div>";
         ?>
   </body>
</html>
