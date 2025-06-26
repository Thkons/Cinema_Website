<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "my_db1";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "UPDATE reservations SET seat_number='$_GET[seat_number]', reservation_date='$_GET[reservation_date]', reservation_time='$_GET[reservation_time]' WHERE res_id='$_GET[res_id]'";
if ($conn->query($sql) === TRUE) {
    header('Location:Yukon_Admin.php?msg=2');
} else {
    echo "Error updating record: " . $conn->error;
}
$conn->close(); ?>

