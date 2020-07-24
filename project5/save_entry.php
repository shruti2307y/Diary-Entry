<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "diaryentry";
$text=$_REQUEST["q"];

$date=date("h:i:sa");
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO entries (dat,entry)
VALUES ('$date', '$text')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
  header("day schedule.html");
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
