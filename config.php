 <?php
$xampp = "localhost";
$username = "root";
$password = " ";

// Create connection
$conn = new mysql($localhost, $username, $password);
if ($conn = connect_error)
 {
  die("Connection failed: " . $conn = connect_error);
}
echo "Connected successfully";
?> 