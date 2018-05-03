<?php
 session_start();
include 'config.php';

if(isset($_POST['submit'])) {
    if (!empty($_POST["email"]) && !empty($_POST["email"])) {
   $data=trim($_POST["email"]); 
   $data1=trim($_POST["password"]);
  
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
else
{
 $sql ="SELECT username, password FROM users WHERE username = ?"; 
        if($stmt = mysqli_prepare($conn, $sql)){
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            $param_username = $data;
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt) == 1){                    
  
                    mysqli_stmt_bind_result($stmt, $username,$passworddata );
                    if(mysqli_stmt_fetch($stmt)){
                          // echo "get db data1".$passworddata;
                        if($passworddata===$data1){
                  
                            $_SESSION['username'] = $username;      
                              header("location: welcome.php");
                        } else{
                           echo "The password you entered was not valid.";
                        }
                        echo "Connected successfullyegrgrdsss  ---end";
                    }
                } else{
                    // Display an error message if username doesn't exist
                    echo "No account found with that username.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
}
echo "Connected successfully";
    }
 else {
          echo "Please Enter emailid and password";
    }
}
?>
<!DOCTYPE HTML>  
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
</head>
<body>  

<div class=" text-center p-5">
  <h1>PHP Login Form</h1>
</div>

<div class="container col-xs-6 col-sm-4 ">
<form method="POST"   action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>' >
    
	
	   <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
    </div>
	
	
	<div class="form-group">
      <label for="phone">Password:</label>
      <input type="password" id="password" name="password"  class="form-control" placeholder="Enter password "  required>
    </div>
	

    <br>
    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
     <a class="float-right" href="register.php">Register here</a>
  </form>

</div>

</body>
</html>