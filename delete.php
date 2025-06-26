<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "my_db1";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "DELETE FROM user WHERE id=$_GET[id]";
if ($conn->query($sql) === TRUE) {
    //echo "Record deleted successfully";
    header('Location:Yukon_Admin.php?msg=3');
} else {    echo "Error deleting record: " . $conn->error; }
$conn->close(); ?>
