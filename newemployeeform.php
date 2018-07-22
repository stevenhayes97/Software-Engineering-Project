<?php
   //connection to check if user logged in or not
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
      <title>New Employee Form</title>
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
         <h1>Employee Entry</h1>
         <ul id = "links">
            <li><a href="index.php"> Home </a></li>
            <li><a href="login.php">Log In</a></li>
            <li><a href="PatientInformation.php"> Patient Entry </a></li>
            <li><a href="newemployeeform.php">Employee Entry</a></li>
            <li><a href="patients.php">View Patients</a></li>
            <li><a href="employeeview.php">View Employees</a></li>
         </ul>
      </header>
      <form action="employeeformsubmit.php" method ="post" >
         <label> <br> First Name:
         <input type="text" name="fName">
         </label>
         <label> <br> Last Name:
         <input type="text" name="lName">
         </label>
         <label> <br> Address:
         <input type="text" name="address">
         </label>
         <label> <br> Date of Birth:
         <input type="date" name="dob">
         </label>
         <label> <br> Phone:
         <input type="text" name="phone">
         </label>
         <label> <br> Extension:
         <input type="text" name="extension">
         </label>
         <label> <br> Email:
         <input type="text" name="email">
         </label>
         <label>
            <br> Gender:
            <select name="gender_select">
               <option>Male</option>
               <option>Female</option>
               <option>Other</option>
            </select>
         </label>
         <label> <br> Job Title: 
         <input type="text" name="job_title">
         </label>
         <label> <br> Hire Date:
         <input type="date" name="hire_date">
         </label>
         <label> <br> Specialty/Certification:
         <input type="text" name="certification"/>
         </label>  
         <!--When pushed this button will take the information that is put in the textboxes and save them to the database-->
         <input class="button" type="submit" id="submit" value="Submit">
      </form>
   </body>
</html>
