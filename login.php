<?php
   //log in check database connection call
        ob_start();
        session_start();
        include_once 'dbconnect.php';
   
        if ( isset($_SESSION['user'])!="" ) {
         header("Location: employeeview.php");
         exit;
        }
        
        $error = false;
        
        if( isset($_POST['btn-login']) ) { 
         
         $email = trim($_POST['email']);
         $email = strip_tags($email);
         $email = htmlspecialchars($email);
         
         $pass = trim($_POST['pass']);
         $pass = strip_tags($pass);
         $pass = htmlspecialchars($pass);
         
         if(empty($email)){
          $error = true;
          $emailError = "Please enter your email address.";
         } else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
          $error = true;
          $emailError = "Please enter a valid email address.";
         }
         
         if(empty($pass)){
          $error = true;
          $passError = "Please enter your password.";
         }
         
         if (!$error) {
          
          $password = hash('sha256', $pass);
         
          $res=mysqli_query($conn,"SELECT userId, userName, userPass FROM users WHERE userEmail='$email'");
          $row=mysqli_fetch_array($res);
          $count = mysqli_num_rows($res);
          
          if( $count == 1 && $row['userPass']==$password ) {
           $_SESSION['user'] = $row['userId'];
           header("Location: employeeview.php");
          } else {
           $errMSG = "Incorrect Credentials, Please try again...";
          }
           
         }
         
        }
       ?>
<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
         Remove this if you use the .htaccess -->
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
      <title>River Falls Hosptial | Log In</title>
      <meta name="description" content="">
      <meta name="author" content="lifea">
      <meta name="viewport" content="width=device-width; initial-scale=1.0">
      <!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
      <link rel="shortcut icon" href="/favicon.ico">
      <link rel="apple-touch-icon" href="/apple-touch-icon.png">
      <link rel="stylesheet" href="styles.css">
   </head>
   <body background="https://images.freecreatives.com/wp-content/uploads/2015/04/3336-grey-texture-1920x1080-abstract-wallpaper.gif">
      <div>
      <header>
         <h1 >Log In</h1>
         <ul id="links">
            <li><a href="index.php"> Home </a></li>
            <li><a href="login.php">Log In</a></li>
            <li><a href="PatientInformation.php"> Patient Entry </a></li>
            <li><a href="newemployeeform.php">Employee Entry</a></li>
            <li><a href="patients.php">View Patients</a></li>
            <li><a href="employeeview.php">View Employees</a></li>
         </ul>
      </header>
      <div class="container">
         <div id="login-form">
            <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="on">
               <div class="col-md-12">
                  <div class="form-group">
                  </div>
                  <?php
                     if ( isset($errMSG) ) {
                      
                      ?>
                  <div class="form-group">
                     <div class="alert alert-danger">
                        <span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG; ?>
                     </div>
                  </div>
                  <?php
                     }
                     ?>
                  <div class="form-group">
                     <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
                        Username(email) <br> <input type="email" name="email" class="form-control" placeholder="Your Email" value="<?php echo $email; ?>" maxlength="40" /> 
                     </div>
                     <span class="text-danger"><?php echo $emailError; ?></span>
                  </div>
                  <div class="form-group">
                     <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                        <br> Password <br>     <input type="password" name="pass" class="form-control" placeholder="Your Password" maxlength="15" />
                     </div>
                     <span class="text-danger"><?php echo $passError; ?></span>
                  </div>
                  <br>
                  <div class="form-group">
                     <button type="submit" class="btn btn-block btn-primary" name="btn-login">Sign In</button>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </body>
</html>
<?php ob_end_flush(); ?>
