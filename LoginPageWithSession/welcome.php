<?php 
session_start();
include 'config.php';  
$username="";
     

     if (isset($_POST['submit'])) {
  
     //   echo "hhhh";
         $username=$_SESSION['username'];
          $image = $_FILES['photo']['name'];
$target = "images/".basename($image); 
//$targetpath = $target.basename($_FILES['photo']['name']); 

     
   
$sql = "INSERT INTO image (image,username) VALUES ('$image','$username')";
    mysqli_query($conn, $sql);
  

if(move_uploaded_file($_FILES['photo']['tmp_name'],$target)) 
{  
   
    header('Location: welcome.php');

  
}
 else {
    $msg="hello";
}

    }
  if(!$_SESSION['username']==NULL)
      {
     $name=$_SESSION['username'];
     $result = mysqli_query($conn, "SELECT * FROM image where username='$name'");
    
    while ($row = mysqli_fetch_array($result)) {
     
      	echo "<img  class='px-2 mt-3 ' height='150' width='150' src='images/".$row['image']."' >";
       
              
     
    }
    
     
     }
   

?>
<html>
   
   <head>
      <title>Welcome </title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
   </head>
   
   <body>
   
     
       <h1>WELCOME</h1>
      <h2 class="float-right mt-0"><a href = "logout.php">Sign Out</a></h2>
      <form method="POST" action=""  enctype="multipart/form-data">
   
	
	<div class="form-group">
    <label for="exampleInputFile">File input:</label>
    <input type="file"  name="photo" size="60" accept=".png, .jpg, .jpeg" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp" required/>
  </div>
   
    <button type="submit" name="submit"  value="Read Contents" class="btn btn-primary">Submit</button>
  </form>
   </body>
   
</html> 