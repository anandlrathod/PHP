<?php

require_once 'config.php';
 
 
$username = $password = $confirm_password = $alertdata="";
$username_err = $password_err = $confirm_password_err = "";
$result="";

if (isset($_POST["reset"])) {
  //  echo "Yes, mail is set";    
}else{  
   // echo "N0, mail is not set";
}
if($_SERVER["REQUEST_METHOD"] == "POST"){
 

    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a emailid.";
    } else{

        $sql = "SELECT id FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($conn, $sql)){
         
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
      
            $param_username = trim($_POST["username"]);
            

            if(mysqli_stmt_execute($stmt)){
               
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
   
        mysqli_stmt_close($stmt);
    }
    

    if(empty(trim($_POST['password']))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST['password'])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST['password']);
    }
    
   
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = 'Please confirm password.';     
    } else{
        $confirm_password = trim($_POST['confirm_password']);
        if($password != $confirm_password){
            $confirm_password_err = 'Password do not match.';
        }
    }
    
 
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        
      
        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
         
        if($stmt = mysqli_prepare($conn, $sql)){
           
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);
     
            $param_username = $username;
            $param_password = $password; 
            
          
            if(mysqli_stmt_execute($stmt)){
          $alertdata='<div class="px-2 alert alert-success">
  <strong>Success!</strong> Account Created Successfully.
</div>
';
          $username = $password = $confirm_password ="";
          //header("location:index.php");
               
            } else{
                   $alertdata='<div class=" alert alert-danger">
  <strong>Registartion not Sucessful!</strong> Please Try Again.
</div>';
                echo "Something went wrong. Please try again later.";
            }
        }
         
   
        mysqli_stmt_close($stmt);
    }
    
   
    mysqli_close($conn);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
   
</head>
<body>
     <span class="help-block text-danger"><?php echo $alertdata; ?></span>
    <div class="container col-xs-6 col-sm-4 p-5">
        <h2>Sign Up</h2>
       
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Email</label>
                <input type="email" name="username" class="form-control"  placeholder="Enter email" value="<?php echo $username; ?>">
                <span class="help-block text-danger"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="password" placeholder="Enter password" name="password" class="form-control" value="<?php echo $password; ?>">
                <span class="help-block text-danger"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" placeholder="Enter confirm password" class="form-control" value="<?php echo $confirm_password; ?>">
                <span class="help-block text-danger"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" name="reset" class="btn btn-default" value="Reset">
            </div>
            <p>Already have an account? <a href="index.php">Login here</a>.</p>
         
        </form>
       
    </div>
    </div>    
</body>
</html