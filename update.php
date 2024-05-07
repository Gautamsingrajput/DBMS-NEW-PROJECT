<?php
        $servername = "localhost";
        $username = "root"; // Replace with your MySQL username
        $password = ""; // Replace with your MySQL password
        $dbname = "newdb"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname, 3307);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$update_id = $_POST['update_id'];
$new_name = $_POST['new_name'];
$new_age = $_POST['new_age'];
$new_phone = $_POST['new_phone'];
$new_address = $_POST['new_address'];

$sql = "UPDATE record SET name='$new_name', age='$new_age', phone='$new_phone', address='$new_address' WHERE id='$update_id'";

if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
}

$conn->close();
?>
