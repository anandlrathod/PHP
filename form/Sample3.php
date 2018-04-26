<!DOCTYPE html>
<html lang="en">
<head>
    <title>Example of PHP POST method</title>
</head>
<body>
<?php
if(isset($_POST["firstname"])){
    echo "<p>Hi, " . $_POST["firstname"] . "</p>";
}
?>
<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
    <label for="inputName">Name:</label>
    <input type="text" name="firstname" id="inputName">
    <input type="submit" value="Submit">
</form>
</body>