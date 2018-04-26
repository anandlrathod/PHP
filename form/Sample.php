
<!DOCTYPE HTML>  
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
</head>
<body>  

<?php

$nameErr = $emailErr = $genderErr= $phoneerr = $commenterr = "";
$name = $email = $gender = $phone =$comment = $phone = "";



if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
  }
    
  if (empty($_POST["phone"])) {
    $phoneerr = "";
  } else {
    $phone = test_input($_POST["phone"]);
  }

  if (empty($_POST["comment"])) {
    $commenterr = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<div class=" text-center">
  <h1>PHP Registration Form</h1>
</div>

<div class="container">
<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  enctype="multipart/form-data">
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" minlength=3  class="form-control" id="name"  name="name" placeholder="Enter name" required>
    </div>
	
	   <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
    </div>
	
	
	<div class="form-group">
      <label for="phone">Phone number:</label>
      <input type="text" pattern="^[0-9]*$"   minlength=10  maxlength=10 id="phone" name="phone"  class="form-control" placeholder="Enter phone number"  required>
    </div>
	
	
    <div class="form-group" 
      <label for="gender">Gender:</label>
       <label class="radio-inline">
      <input type="radio" name="gender" value="Male" required>Male
    </label>
    <label class="radio-inline">
      <input type="radio" name="gender" value="Female">Female
    </label>
    </div>
   
   <div class="form-group">
      <label for="comment">Comment:</label>
      <textarea minlength=10 class="form-control" placeholder="Enter comment" rows="3" id="comment"name="comment" required></textarea>
    </div>
	
	<div class="form-group">
    <label for="exampleInputFile">File input:</label>
    <input name="file" size="60" type="file" accept=".txt" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp">
  </div>
   
    <button type="submit"  value="Read Contents" class="btn btn-primary">Submit</button>
  </form>

</div>

<div class=" text-center">
<?php
echo "<h2>Details:</h2>";
echo "<br>";
echo "Name :".$name;
echo "<br>";
echo "Email :".$email;
echo "<br>";
echo "Phone :".$phone;
echo "<br>";
echo "Gender :".$gender;
echo "<br>";
echo "Comment :".$comment;
echo "<br>";
if($_FILES){
  //Checking if file is selected or not
  if($_FILES['file']['name'] != "") {
  
        //Checking if the file is plain text or not
  if(isset($_FILES) && $_FILES['file']['type'] != 'text/plain') {
  echo "<span>File could not be accepted ! Please upload any '*.txt' file.</span>";
  exit();
  } 
  echo "<center><span id='Content'>Contents of ".$_FILES['file']['name']." File</span></center>";
  
  //Getting and storing the temporary file name of the uploaded file
  $fileName = $_FILES['file']['tmp_name'];
  
  //Throw an error message if the file could not be open
  $file = fopen($fileName,"r") or exit("Unable to open file!");
   
  // Reading a .txt file line by line
  while(!feof($file)) {
  echo fgets($file). "";
  }
   
  //Reading a .txt file character by character
  while(!feof($file)) {
 echo fgetc($file);
 }
 fclose($file);
 }

 else {
 if(isset($_FILES) && $_FILES['file']['type'] == '')
 echo "<span>Please Choose a file by click on 'Browse' or 'Choose File' button.</span>";
 }
}
?>
</div>
</body>
</html>