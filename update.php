<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "my_db1";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "UPDATE user SET name='$_GET[name]', email='$_GET[email]', userType='$_GET[userType]' WHERE id='$_GET[id]'";
if ($conn->query($sql) === TRUE) {
    header('Location:Yukon_Admin.php?msg=2');
} else {
    echo "Error updating record: " . $conn->error;
}
$conn->close(); ?>

