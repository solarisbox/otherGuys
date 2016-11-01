<?php


$servername = "localhost";
$username = "root";
$password = "usbw";
$dbname = "ephemeral";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$title = $_POST['posttitle'];
$message = $_POST['postbody'];

$sql = "INSERT INTO test (title, message)
VALUES ('$title', '$message')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();


?>