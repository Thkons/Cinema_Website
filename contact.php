<?php
  

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "my_db1";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 

$name = $_POST('name');
$email = $_POST('email');
$subject = $_POST('subject');
$message = $_POST('message');

$sql = "INSERT INTO messages (name, email, subject, message)
    VALUES ('$name', '$email', '$subject', '$message')";

if ($conn->query($sql) === TRUE) {
  echo "Thank You <br> Message Has Been Sent";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();
?>
