<?php
   include_once 'dbconnect.php';
   
   $error = false;
   
   if ( isset($_POST['btn-signup']) ) {
    
    $name = trim($_POST['name']);
    $name = strip_tags($name);
    $name = htmlspecialchars($name);
    
    $email = trim($_POST['email']);
    $email = strip_tags($email);
    $email = htmlspecialchars($email);
    
    $pass = trim($_POST['pass']);
    $pass = strip_tags($pass);
    $pass = htmlspecialchars($pass);
    
    if (empty($name)) {
     $error = true;
     $nameError = "Please enter your full name.";
    } else if (strlen($name) < 3) {
     $error = true;
     $nameError = "Name must have atleat 3 characters.";
    } else if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
     $error = true;
     $nameError = "Name must contain alphabets and space.";
    }
    
    if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
     $error = true;
     $emailError = "Please enter valid email address.";
    } else {
     $query = "SELECT userEmail FROM users WHERE userEmail='$email'";
     $result = mysqli_query($conn,$query);
     $count = mysqli_num_rows($result);
     if($count!=0){
      $error = true;
      $emailError = "Provided Email is already in use.";
     }
    }
    if (empty($pass)){
     $error = true;
     $passError = "Please enter password.";
    } else if(strlen($pass) < 6) {
     $error = true;
     $passError = "Password must have atleast 6 characters.";
    }
    
    $password = hash('sha256', $pass);
    
    if( !$error ) {
     
     $query = "INSERT INTO users(userName,userEmail,userPass) VALUES('$name','$email','$password')";
     $res = mysqli_query($conn,$query);
      
     if ($res) {
      $errTyp = "success";
      $errMSG = "Successfully registered, you may login now";
      unset($name);
      unset($email);
      unset($pass);
     } else {
      $errTyp = "danger";
      $errMSG = "Something went wrong, try again later..."; 
     } 
      
    }
    
    
   }
   ?>
<!DOCTYPE html>
<html>
   <head>
      <link rel="icon" type="image/png" href="favicon.png" />
      <link href="styles.css" rel="stylesheet" type="text/css" />
      <title>Create Staff Account</title>
   </head>
   <br><br><br><br><br><br><br><br><br>
   <h1>Staff View</h1>
   <br><br><br><br><br><br><br>
   <div class="tabs">
      <form>
         <input id="button2" type="button" value="Home" onclick="window.location.href='index.php'">
         <input id="button2" type="button" value="Database View" onclick="window.location.href='studentdatabaseview.php'">
         <input id="button2" type="button" value="Student Entry" onclick="window.location.href='Entry.php'">
         <input id="button2" type="button" value="Playlist Entry" onclick="window.location.href='Playlistentry.php'">
         <input id="button2" type="button" value="Create Staff Account" onclick="window.location.href='StaffEntry.php'">
      </form>
   </div>
   <body content="width=device-width,initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
      <center>
         <div id="create">
         <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
            <h2 class="">Sign Up</h2>
            <?php
               if ( isset($errMSG) ) {
                
                ?>
            <span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG; ?>
            <?php
               }
               ?>
            <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
            Name <br>
            <input type="text" name="name" class="form-control" placeholder="Enter Name" maxlength="50" value="<?php echo $name ?>" />
            <span class="text-danger"><?php echo $nameError; ?></span>
            <br>
            <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
            UWRF Email <br>
            <input type="email" name="email" class="form-control" placeholder="Enter Your Email" maxlength="40" value="<?php echo $email ?>" />
            <span class="text-danger"><?php echo $emailError; ?></span>
            <br>
            <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
            Create Password(remember this after creating it) <br>
            <input type="password" name="pass" class="form-control" placeholder="Enter Password" maxlength="15" />
            <span class="text-danger"><?php echo $passError; ?></span>
            <br>
            <div class="form-group">
               <br>
               <button type="submit" class="btn btn-block btn-primary" name="btn-signup">Create Account</button>
         </form>
         </div>
      </center>
   </body>
</html>
