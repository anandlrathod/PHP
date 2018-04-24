// <?php
// $username = "root";
// $password = "root";
// $hostname = "localhost"; 
// $dbname="cmis";

// $dbhandle = new mysqli($hostname, $username, $password, $dbname);
  // or die("Unable to connect to MySQL");
// echo "Connected to MySQL<br>";
// $sql = "SELECT * FROM cmis.cvl_ems_login_user_credentials";
// $result = $dbhandle->query($sql);
// echo $result;
// ?>

<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "cmis";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else
{
	 echo "Connected to MySQL<br>";
}

$sql = "SELECT * FROM cvl_ems_login_user_credentials";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
	echo "$result";
    while($row = $result->fetch_assoc()) {
        echo "employee_id: " . $row["employee_id"].$row["user_id"];
    }
} else {
  
} 
$conn->close();
?>